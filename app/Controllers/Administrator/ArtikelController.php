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
        $gambar = $this->request->getFile('gambar');

        // validasi gambar
        $setRules = [
            'gambar' => [
                'rules'  => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'is_image' => 'File yang diupload bukan gambar.',
                    'mime_in' => 'Format gambar tidak valid. Hanya jpg, jpeg, png, gif yang diperbolehkan.'
                ],
            ],
        ];

        $this->validator->setRules($setRules);
        $isValid = $this->validator->run($data);

        if (!$isValid) { // jika validasi gagal
            // Mengambil error dari validasi
            $errors = $this->validator->getErrors();
            // Mengembalikan response error dengan status 400
            return ResponseJSONCollection::error($errors, 'Validasi gagal', ResponseInterface::HTTP_BAD_REQUEST);
        }
        // end validasi gambar

        // upload gambar
        $path = './images/artikel/';
        if ($gambar) $fileName = UploadFileLibrary::uploadImage($gambar, $path);

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
        $gambar = $this->request->getFile('gambar');

        // validasi gambar
        $setRules = [
            'gambar' => [
                'rules'  => 'permit_empty|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'is_image' => 'File yang diupload bukan gambar.',
                    'mime_in' => 'Format gambar tidak valid. Hanya jpg, jpeg, png, gif yang diperbolehkan.'
                ],
            ],
        ];

        $this->validator->setRules($setRules);
        $isValid = $this->validator->run($data);

        if (!$isValid) { // jika validasi gagal
            // Mengambil error dari validasi
            $errors = $this->validator->getErrors();
            // Mengembalikan response error dengan status 400
            return ResponseJSONCollection::error($errors, 'Validasi gagal', ResponseInterface::HTTP_BAD_REQUEST);
        }
        // end validasi gambar

        // upload gambar
        $path = './images/artikel/';
        $oldGambar = $this->modelArtikel->find($id)['gambar'];
        if (isset($_FILES['gambar']['name']) && $gambar) {
            if (!empty($oldGambar) && file_exists($path . $oldGambar)) {
                unlink($path . $oldGambar);
            }
            $fileName = UploadFileLibrary::uploadImage($gambar, $path);
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
            unlink($path . $gambar);

            $this->modelArtikel->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
