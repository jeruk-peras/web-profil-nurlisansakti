<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\FAQModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;

class FAQController extends BaseController
{
    protected $title = 'FAQ Management';
    protected $modelFAQ;

    public function __construct()
    {
        $this->modelFAQ = new FAQModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
        ];

        return view('admin/pages/faq/index', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'pertanyaan' => $data['pertanyaan'],
            'jawaban' => $data['jawaban'],
        ];

        try {
            $save = $this->modelFAQ->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelFAQ->errors(); // mengambil data error
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
            $data = $this->modelFAQ->find($id); // mengambil data
            // jika data tidak ditemukan
            if (!$data) {
                return ResponseJSONCollection::error([], 'Data tidak ditemukan.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success($data, 'Data ditemukan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data
        
        $data = [
            'pertanyaan' => $data['pertanyaan'],
            'jawaban' => $data['jawaban'],
        ];

        try {
            $update = $this->modelFAQ->update($id, $data); // update data
            // jika update gagal maka
            if (!$update) {
                $errors = $this->modelFAQ->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil diubah.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(int $id)
    {
        try {
            $this->modelFAQ->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    public function orderData()
    {
        $arrayPostOrder = $this->request->getPost('posisi');
        $order = [];
        foreach ($arrayPostOrder as $key => $row) {
            if (count($row) < 2) continue;

            $order[] = [
                'id' => $row['id'],
                'order' => $row['order']
            ];
        }

        try {
            $this->modelFAQ->updateBatch($order, 'id');
            return ResponseJSONCollection::success([], 'Success', ResponseInterface::HTTP_OK);
        } catch (DatabaseException $e) {
            return ResponseJSONCollection::error([$e], 'Error', ResponseInterface::HTTP_OK);
        }
    }
}
