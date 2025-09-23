<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\BisnisProdukModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Pager\Exceptions\PagerException;

class BisnisprodukController extends BaseController
{
    protected $title = 'Bisnis Produk';
    protected $modelBisnisProduk;

    public function __construct()
    {
        $this->modelBisnisProduk = new BisnisProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelBisnisProduk->findAll()
        ];

        return view('admin/pages/bisnis_produk/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelBisnisProduk->findAll()
        ];

        return view('admin/pages/bisnis_produk/form', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/bisnis_produk/';
        $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);

        $data = [
            'bisnis_produk' => $data['bisnis_produk'],
            'konten' => $data['konten'],
            'gambar' => $fileName,
            'slug' => url_title($data['bisnis_produk'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelBisnisProduk->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelBisnisProduk->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil disimpan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(int $id)
    {
        try {
            $data = $this->modelBisnisProduk->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
            }

            $data['gambar'] = '/images/bisnis_produk/' . $data['gambar'];

            return view('admin/pages/bisnis_produk/form', [
                'title' => $this->title,
                'data' => $data
            ]);

            // return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return PageNotFoundException::forPageNotFound($e->getMessage());
            // return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/bisnis_produk/';
        $oldGambar = $this->modelBisnisProduk->find($id)['gambar'];
        if (isset($data['gambar'])) {
            UploadFileLibrary::deleteFile($path, $oldGambar);
            $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);
        };

        $data = [
            'bisnis_produk' => $data['bisnis_produk'],
            'konten' => $data['konten'],
            'gambar' => $fileName ?? $oldGambar,
            'slug' => url_title($data['bisnis_produk'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelBisnisProduk->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelBisnisProduk->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil diupdate.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(int $id)
    {
        try {
            $gambar = $this->modelBisnisProduk->find($id)['gambar'];
            $path = './images/bisnis_produk/';
            unlink($path . $gambar);

            $this->modelBisnisProduk->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
