<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
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
    }

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


}
