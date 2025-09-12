<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $title = 'Asuransi';
    
    public function index(): string
    {
        $data = [
            'title' => $this->title,
        ];
        return view('/pages/beranda', $data);
    }
}
