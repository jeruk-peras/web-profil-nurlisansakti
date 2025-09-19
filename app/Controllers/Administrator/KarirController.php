<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\KarirModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class KarirController extends BaseController
{
    protected $title = 'Karir';
    protected $modelKarir;

    public function __construct()
    {
        $this->modelKarir = new KarirModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin/pages/karir/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelKarir->findAll()
        ];

        return view('admin/pages/karir/form', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'karir' => $data['karir'],
            'konten' => $data['konten'],
            'slug' => url_title($data['karir'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelKarir->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelKarir->errors(); // mengambil data error
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
            $data = $this->modelKarir->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
            }

            return view('admin/pages/karir/form', [
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
            'karir' => $data['karir'],
            'konten' => $data['konten'],
            'slug' => url_title($data['karir'], '-', true),
            'deskripsi' => $data['deskripsi'],
            'kata_kunci' => $data['kata_kunci'],
        ];

        try {
            $save = $this->modelKarir->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelKarir->errors(); // mengambil data error
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
            $this->modelKarir->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
