<?php

namespace App\Controllers\Serverside;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use CodeIgniter\HTTP\ResponseInterface;

class ApiController extends BaseController
{
    public function upload_image()
    {
        $imageFolder = 'assets/images/uploads/';

        if ($this->request->getMethod() === 'options') {
            return $this->response->setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS');
        }

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getName();

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $filename)) {
                return $this->response->setStatusCode(400, 'Invalid file name.');
            }

            // Verify extension
            $allowedExtensions = ['gif', 'jpg', 'jpeg', 'png'];
            if (!in_array($file->getExtension(), $allowedExtensions)) {
                return $this->response->setStatusCode(400, 'Invalid extension.');
            }

            // Move file to upload folder
            $file->move($imageFolder, $filename);
            $baseurl = base_url();

            return $this->response->setJSON(['location' => $baseurl . 'assets/images/uploads/' . $filename]);
        }

        return $this->response->setStatusCode(500, 'Server Error');
    }

    // data url
    public function url()
    {
        $data = [];
        if (!$this->request->getGet('lv')) {
            $data[] = [
                'name' => '--parent--',
                'url'  => 'parent'
            ];
        }

        $data = array_merge($data, [
            [
                'name' => '/beranda',
                'url'  => '/beranda'
            ],
            [
                'name' => '/karir',
                'url'  => '/karir'
            ],
            [
                'name' => '/artikel',
                'url'  => '/artikel'
            ],
            [
                'name' => '/faq',
                'url'  => '/faq'
            ],
            [
                'name' => '/galeri',
                'url'  => '/galeri'
            ],
            [
                'name' => '/kontak',
                'url'  => '/kontak'
            ],
            [
                'name' => '--link--',
                'url'  => 'link'
            ],
        ]);

        // tabah dengan halaman

        return ResponseJSONCollection::success($data);
    }

     // data kategori
    public function kategori()
    {
        $data = $this->db->table('kategori')->get()->getResultArray();

        // tabah dengan halaman

        return ResponseJSONCollection::success($data);
    }
}
