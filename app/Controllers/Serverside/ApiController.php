<?php

namespace App\Controllers\Serverside;

use App\Controllers\BaseController;
use App\Libraries\ResponseJSONCollection;
use CodeIgniter\HTTP\ResponseInterface;

class ApiController extends BaseController
{

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
}
