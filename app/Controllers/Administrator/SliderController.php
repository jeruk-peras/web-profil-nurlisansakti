<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\SliderModel;
use CodeIgniter\HTTP\ResponseInterface;

class SliderController extends BaseController
{
    protected $title = 'Slider';
    protected $modelSlider;

    public function __construct()
    {
        $this->modelSlider = new SliderModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelSlider->findAll()
        ];

        return view('admin/pages/slider/index', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/slider/';
        $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);

        $data = [
            'konten' => $data['konten'],
            'gambar' => $fileName
        ];

        try {
            $save = $this->modelSlider->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelSlider->errors(); // mengambil data error
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
            $data = $this->modelSlider->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return ResponseJSONCollection::error([], 'Data tidak ditemukan.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            $data['gambar'] = '/images/slider/' . $data['gambar'];

            return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        // upload gambar
        $path = './images/slider/';
        $oldGambar = $this->modelSlider->find($id)['gambar'];
        if (isset($data['gambar'])) {
            UploadFileLibrary::deleteFile($path, $oldGambar);
            $fileName = UploadFileLibrary::uploadImageBase64($data['gambar'], $path);
        };

        $data = [
            'konten' => $data['konten'],
            'gambar' => $fileName ?? $oldGambar
        ];

        try {
            $save = $this->modelSlider->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelSlider->errors(); // mengambil data error
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
            $gambar = $this->modelSlider->find($id)['gambar'];
            $path = './images/slider/';
            unlink($path . $gambar);

            $this->modelSlider->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
