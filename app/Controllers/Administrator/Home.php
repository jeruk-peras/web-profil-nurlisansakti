<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class Home extends BaseController
{
    private $title = 'Asuransi';
    
    public function index(): string
    {
        $data = [
            'title' => $this->title,
        ];
        return view('admin/pages/asuransi/index', $data);
    }
}
