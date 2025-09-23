<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $title = 'User Management';
    protected $modelUser;

    private $setRules = [
        'password'         => 'required|max_length[100]|password_strength',
        'confirm_password' => 'required|matches[password]',
    ];

    private $setMessage = [
        'password' => [
            'required'   => 'Password wajib diisi.',
            'max_length' => 'Password maksimal 100 karakter.',
            'password_strength' => 'Minimal 8 Karakter kombinasi huruf kapital, huruf kecil, angka dan simbol.',
        ],
        'confirm_password' => [
            'required' => 'Konfirmasi Password wajib diisi.',
            'matches'  => 'Konfirmasi Password harus sama dengan Password.',
        ],
    ];

    public function __construct()
    {
        $this->modelUser = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'data' => $this->modelUser->findAll()
        ];

        return view('admin/pages/user/index', $data);
    }

    public function save()
    {
        $data = $this->request->getPost(); // mengambil post data

        // rules tambahan
        $this->validator->setRules($this->setRules, $this->setMessage);
        $validate = $this->validator->run($data);
        if (!$validate) {
            $errors = $this->validator->getErrors(); // mengambil data error
            return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $data = [
            'id' => null,
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => $data['role'],
        ];

        try {
            $save = $this->modelUser->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelUser->errors(); // mengambil data error
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
            $data = $this->modelUser->find($id); // mengambil data
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
            'id' => $id,
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => $data['role'],
        ];

        try {
            $save = $this->modelUser->update($id, $data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelUser->errors(); // mengambil data error
                return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
            }

            return ResponseJSONCollection::success([], 'Data berhasil disimpan.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update_pass(int $id)
    {
        $data = $this->request->getPost(); // mengambil post data

        // set rules
        $this->validator->setRules($this->setRules, $this->setMessage);
        $validate = $this->validator->run($data); // melakukan validasi
        if (!$validate) {
            $errors = $this->validator->getErrors(); // mengambil data error
            return ResponseJSONCollection::error($errors, 'Data tidak valid.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $data = [
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ];

        try {
            $this->modelUser->skipValidation(); // skip validasi dari model, karena sudah melakukan validasi diatas
            $this->modelUser->update($id, $data); // update data

            return ResponseJSONCollection::success([], 'Password berhasil diubah.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([$e->getMessage()], 'Terjadi kesalahan server.', ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete(int $id)
    {
        try {
            $this->modelUser->delete($id);
            return ResponseJSONCollection::success([], 'Data berhasil dihapus.', ResponseInterface::HTTP_OK);
        } catch (\Throwable $e) {
            return ResponseJSONCollection::error([], 'Data tidak bisa dihapus.', ResponseInterface::HTTP_BAD_REQUEST);
        }
    }
}
