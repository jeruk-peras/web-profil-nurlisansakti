<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\UserModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;

class AccountController extends BaseController
{
    public function loginPage()
    {
        return view('pages/login');
    }

    public function validLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek di tabel users
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return ResponseJSONCollection::error([], 'Username atau password salah.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Set session jika login berhasil
        session()->set([
            'id'   => $user['id'],
            'nama' => $user['nama'],
            'username'  => $user['username'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        return ResponseJSONCollection::success(['redirect' => base_url('adm/menu')], 'Login berhasil.', ResponseInterface::HTTP_OK);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
