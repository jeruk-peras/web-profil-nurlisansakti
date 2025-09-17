<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\HalamanModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class HalamanController extends BaseController
{
    protected $title = 'Halaman';
    protected $modelHalaman;

    public function __construct()
    {
        $this->modelHalaman = new HalamanModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin/pages/halaman/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelHalaman->findAll()
        ];

        return view('admin/pages/halaman/form', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'judul_halaman' => $data['judul_halaman'],
            'konten' => $data['konten'],
            'slug' => url_title($data['judul_halaman'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelHalaman->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelHalaman->errors(); // mengambil data error
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
            $data = $this->modelHalaman->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
            }

            return view('admin/pages/halaman/form', [
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

        $data = [
            'judul_halaman' => $data['judul_halaman'],
            'konten' => $data['konten'],
            'slug' => url_title($data['judul_halaman'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelHalaman->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelHalaman->errors(); // mengambil data error
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
            $this->modelHalaman->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
