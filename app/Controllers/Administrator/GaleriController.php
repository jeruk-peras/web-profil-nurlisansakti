<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\GaleriModel;
use App\Models\KategoriGaleriModel;
use CodeIgniter\HTTP\ResponseInterface;

class GaleriController extends BaseController
{
    protected $title = 'Galeri';
    protected $modelKategori;
    protected $modelGaleri;

    public function __construct()
    {
        $this->modelKategori = new KategoriGaleriModel();
        $this->modelGaleri = new GaleriModel();
    }

    //####### Kategori Galeri #########

    public function kategori()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin/pages/galeri/kategori/index', $data);
    }

    public function saveKategori()
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'kategori' => $data['kategori'],
        ];

        try {
            $save = $this->modelKategori->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelKategori->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil disimpan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editKategori(int $id)
    {
        try {
            $data = $this->modelKategori->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return ResponseJSONCollection::error([], 'Data tidak ditemukan.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateKategori(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'kategori' => $data['kategori'],
        ];

        try {
            $update = $this->modelKategori->update($id, $data); // update data
            // jika update gagal maka
            if (!$update) {
                $errors = $this->modelKategori->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil diubah.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteKategori(int $id)
    {
        try {
            $this->modelKategori->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    //####### Galeri #########
    public function index()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin/pages/galeri/foto/index', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/galeri/';
        $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);

        $data = [
            'kategori_id' => $data['kategori_id'],
            'gambar' => $fileName
        ];

        try {
            $save = $this->modelGaleri->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelGaleri->errors(); // mengambil data error
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
            $data = $this->modelGaleri->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return ResponseJSONCollection::error([], 'Data tidak ditemukan.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            $data['gambar'] = '/images/galeri/' . $data['gambar'];

            return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $oldGambar = $this->modelGaleri->find($id)['gambar'];
        $path = './images/galeri/';
        if (isset($data['gambar'])) {
            $path = './images/galeri/';
            UploadFileLibrary::deleteFile($path, $oldGambar);
            $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);
        };

        $data = [
            'kategori_id' => $data['kategori_id'],
            'gambar' => $fileName ?? $oldGambar
        ];

        try {
            $save = $this->modelGaleri->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelGaleri->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil disimpan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(int $id)
    {
        try {
            $gambar = $this->modelGaleri->find($id)['gambar'];
            $path = './images/galeri/';
            if (!empty($gambar) && file_exists($path . $gambar)) {
                unlink($path . $gambar);
            }

            $this->modelGaleri->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
