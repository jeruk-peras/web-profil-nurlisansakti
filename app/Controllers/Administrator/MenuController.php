<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\MenuModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;

class MenuController extends BaseController
{
    protected $title = 'Menu';
    protected $modelMenu;

    public function __construct()
    {
        $this->modelMenu = new MenuModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Menu'
        ];

        return view('admin/pages/menu/index', $data);
    }

    public function submenu(int $id)
    {
        $data = [
            'title' => $this->title,
            'page' => 'Submenu',
            'menu_id' => $id
        ];

        return view('admin/pages/menu/index', $data);
    }

    public function save(int $parent_id = 0)
    {
        $data = $this->request->getPost(); // mengambil post data

        $data = [
            'nama_menu' => $data['nama_menu'],
            'level'     => $parent_id ? 2 : 1,
            'url'       => $data['url'],
            'link'      => $data['link'] ?? null,
            'new_tab'   => isset($data['new_tab']) ? 1 : 0,
            'parent_id' => $parent_id ?? '',
        ];

        try {
            $save = $this->modelMenu->save($data); // save data
            // jika save gagal maka
            if (!$save) {
                $errors = $this->modelMenu->errors(); // mengambil data error
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
            $data = $this->modelMenu->find($id); // mengambil data
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
            'nama_menu' => $data['nama_menu'],
            'url'       => $data['url'],
            'link'      => $data['link'] ?? null,
            'new_tab'   => isset($data['new_tab']) ? 1 : 0,
        ];

        try {
            $update = $this->modelMenu->update($id, $data); // update data
            // jika update gagal maka
            if (!$update) {
                $errors = $this->modelMenu->errors(); // mengambil data error
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
            $this->modelMenu->delete($id);
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
            $this->modelMenu->updateBatch($order, 'id');
            return ResponseJSONCollection::success([], 'Success', ResponseInterface::HTTP_OK);
        } catch (DatabaseException $e) {
            return ResponseJSONCollection::error([$e], 'Error', ResponseInterface::HTTP_OK);
        }
    }
}
