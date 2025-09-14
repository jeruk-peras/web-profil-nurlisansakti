<?php

namespace App\Controllers\Serverside;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use App\Models\MenuModel;
use CodeIgniter\HTTP\ResponseInterface;

class RenderController extends BaseController
{

    // data url
    public function menu(int $id = 0)
    {
        try {
            $model = new MenuModel();

            $data = [
                'menu' => $model->when($id !== 0, function ($query) use ($id) {
                    $query->where('level', 2);
                    $query->where('parent_id', $id);
                })->when($id == 0, function ($query) {
                    $query->where('level', 1);
                })->orderBy('order', 'ASC')->findAll(),
            ];

            $html = view('admin/pages/menu/side-data', $data);

            return ResponseJSONCollection::success($html, 'Success load Data', ResponseInterface::HTTP_OK);
        } catch (\Throwable $th) {
            return ResponseJSONCollection::success($th->getMessage(), 'Terjadi Kesalahan', ResponseInterface::HTTP_BAD_GATEWAY);
        }
    }

    public function slider()
    {
        try {
            $data = [
                'slider' => $this->db->table('slider')->get()->getResultArray()
            ];

            $html = view('admin/pages/slider/side-data', $data);

            return ResponseJSONCollection::success($html, 'Success load Data', ResponseInterface::HTTP_OK);
        } catch (\Throwable $th) {
            return ResponseJSONCollection::success($th->getMessage(), 'Terjadi Kesalahan', ResponseInterface::HTTP_BAD_GATEWAY);
        }
    }

    public function service()
    {
        try {
            $data = [
                'service' => $this->db->table('service')->get()->getResultArray()
            ];

            $html = view('admin/pages/service/side-data', $data);

            return ResponseJSONCollection::success($html, 'Success load Data', ResponseInterface::HTTP_OK);
        } catch (\Throwable $th) {
            return ResponseJSONCollection::success($th->getMessage(), 'Terjadi Kesalahan', ResponseInterface::HTTP_BAD_GATEWAY);
        }
    }
}
