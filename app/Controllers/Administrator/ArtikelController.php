<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class ArtikelController extends BaseController
{
    protected $title = 'Artikel';
    protected $modelArtikel;

    public function __construct()
    {
        $this->modelArtikel = new ArtikelModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelArtikel->findAll()
        ];

        return view('admin/pages/artikel/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelArtikel->findAll()
        ];

        return view('admin/pages/artikel/form', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/artikel/';
        $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);

        $data = [
            'judul_artikel' => $data['judul_artikel'],
            'konten' => $data['konten'],
            'penulis' => $data['penulis'],
            'tanggal' => $data['tanggal'],
            'gambar' => $fileName,
            'slug' => url_title($data['judul_artikel'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelArtikel->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelArtikel->errors(); // mengambil data error
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
            $data = $this->modelArtikel->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
            }

            $data['gambar'] = '/images/artikel/' . $data['gambar'];

            return view('admin/pages/artikel/form', [
                'title' => $this->title,
                'data' => $data
            ]);
        } catch (\Throwable $e) {
            return PageNotFoundException::forPageNotFound($e->getMessage());
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/artikel/';
        $oldGambar = $this->modelArtikel->find($id)['gambar'];
        if (isset($data['gambar'])) {
            UploadFileLibrary::deleteFile($path, $oldGambar);
            $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);
        };

        $data = [
            'judul_artikel' => $data['judul_artikel'],
            'konten' => $data['konten'],
            'penulis' => $data['penulis'],
            'tanggal' => $data['tanggal'],
            'gambar' => $fileName ?? $oldGambar,
            'slug' => url_title($data['judul_artikel'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelArtikel->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelArtikel->errors(); // mengambil data error
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
            $gambar = $this->modelArtikel->find($id)['gambar'];
            $path = './images/artikel/';
            UploadFileLibrary::deleteFile($path, $gambar);

            $this->modelArtikel->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
