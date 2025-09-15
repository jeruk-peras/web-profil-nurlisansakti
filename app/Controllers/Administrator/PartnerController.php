<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Libraries\UploadFileLibrary;
use App\Models\PartnerModel;
use CodeIgniter\HTTP\ResponseInterface;

class PartnerController extends BaseController
{
    protected $title = 'Partner & Client';
    protected $modelPartner;

    public function __construct()
    {
        $this->modelPartner = new PartnerModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelPartner  ->findAll()
        ];

        return view('admin/pages/partner/index', $data);
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
        $path = './images/partner/';
        if ($gambar) $fileName = UploadFileLibrary::uploadImage($gambar, $path);

        $data = [
            'partner' => $data['partner'],
            'gambar' => $fileName
        ];

        try {
            $save = $this->modelPartner->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelPartner  ->errors(); // mengambil data error
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
            $data = $this->modelPartner->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return ResponseJSONCollection::error([], 'Data tidak ditemukan.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            $data['gambar'] = '/images/partner/' . $data['gambar'];

            return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
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
        $path = './images/partner/';
        $oldGambar = $this->modelPartner->find($id)['gambar'];
        if ($_FILES['gambar']['name'] != '' && $gambar) {
            $path = './images/partner/';
            if (!empty($oldGambar) && file_exists($path . $oldGambar)) {
                unlink($path . $oldGambar);
            }
            $fileName = UploadFileLibrary::uploadImage($gambar, $path);
        };

        $data = [
            'partner' => $data['partner'],
            'gambar' => $fileName ?? $oldGambar
        ];

        try {
            $save = $this->modelPartner->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelPartner  ->errors(); // mengambil data error
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
            $gambar = $this->modelPartner  ->find($id)['gambar'];
            $path = './images/partner/';
            unlink($path . $gambar);

            $this->modelPartner->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
