<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\ServiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class ServiceController extends BaseController
{
    protected $title = 'Service';
    protected $modelService;

    public function __construct()
    {
        $this->modelService = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelService->findAll()
        ];

        return view('admin/pages/service/index', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/service/';
        $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);

        $data = [
            'service' => $data['service'],
            'konten' => $data['konten'],
            'gambar' => $fileName
        ];

        try {
            $save = $this->modelService->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelService->errors(); // mengambil data error
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
            $data = $this->modelService->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return ResponseJSONCollection::error([], 'Data tidak ditemukan.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            $data['gambar'] = '/images/service/' . $data['gambar'];

            return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/service/';
        $oldGambar = $this->modelService->find($id)['gambar'];
          if (isset($data['gambar'])) {
            UploadFileLibrary::deleteFile($path, $oldGambar);
            $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);
        };

        $data = [
            'service' => $data['service'],
            'konten' => $data['konten'],
            'gambar' => $fileName ?? $oldGambar
        ];

        try {
            $save = $this->modelService->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelService->errors(); // mengambil data error
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
            $gambar = $this->modelService->find($id)['gambar'];
            $path = './images/service/';
            unlink($path . $gambar);

            $this->modelService->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}