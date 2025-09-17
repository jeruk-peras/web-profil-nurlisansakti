<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use CodeIgniter\HTTP\ResponseInterface;

class KontakController extends BaseController
{
    protected $title = 'Kontak';

    protected $responseJSON;

    public function __construct()
    {
        $this->responseJSON = new ResponseJSONCollection();
    }

    public function index()
    {
        // Load the model
        $data = [
            'title' => $this->title,
        ];

        $dataKontak = $this->db->table('kontak')->get()->getResultArray();

        foreach ($dataKontak as $row) {
            $data[$row['kontak']] = $row['data'];
        }

        return view('admin/pages/kontak/index', $data);
    }

    public function update()
    {
        try {
            // validate input
            foreach ($this->request->getPost() as $key => $value) {
                $this->db->table('kontak')->where('kontak', $key)->set('data', $value)->update();
            }
            return $this->responseJSON->success(
                [],
                'Data update successfully',
                ResponseInterface::HTTP_OK
            );
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menyimpan data, tangkap exception
            // dan kembalikan response error

            return $this->responseJSON->error(
                [],
                $e->getMessage(),
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }
    }
}
