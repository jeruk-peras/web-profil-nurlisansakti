<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    private $title = 'Asuransi';

    public function beranda(): string
    {
        $data = [
            'title' => $this->title,
        ];
        return view('/pages/beranda', $data);
    }

    public function bisnis_produk($slug = ''): string
    {
        $data = [
            'title' => $this->title,
        ];

        $data['bisnis_produk'] = $this->db->table('bisnis_produk')->when($slug, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get()->getRowArray();

        return view('/pages/bisnis_produk_detail', $data);
    }

    public function faq(): string
    {
        $data = [
            'title' => $this->title,
        ];

        return view('/pages/faq', $data);
    }
}
