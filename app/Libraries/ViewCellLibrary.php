<?php

namespace App\Libraries;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class ViewCellLibrary extends BaseController
{
    protected $modelMenu;

    public function __construct()
    {
        $this->modelMenu = new MenuModel();
    }

    public function menu()
    {

        $data = [
            'menu' => $this->modelMenu->where('level', 1)->orderBy('order', 'ASC')->findAll(),
            'submenu' => $this->modelMenu->where('level', 2)->orderBy('order', 'ASC')->findAll(),
        ];

        return view('viewcell/main-menu', $data);
    }

    public function slider()
    {

        $data = [
            'slider' => $this->db->table('slider')->get()->getResultArray()
        ];

        return view('viewcell/slider', $data);
    }

    public function service()
    {

        $data = [
            'service' => $this->db->table('service')->get()->getResultArray()
        ];

        return view('viewcell/service', $data);
    }

    public function bisnis_produk()
    {

        $data = [
            'bisnis_produk' => $this->db->table('bisnis_produk')->get()->getResultArray()
        ];

        return view('viewcell/bisnis_produk', $data);
    }

    public function aside_bisnis_produk()
    {

        $data = [
            'bisnis_produk' => $this->db->table('bisnis_produk')->get()->getResultArray()
        ];

        return view('viewcell/bisnis_produk_aside', $data);
    }

    public function faq($limit = null)
    {
        $data = [
            'faq' => $this->db->table('faq')->when($limit, function ($query) use ($limit) {
                $query->limit($limit);
            })->get()->getResultArray()
        ];

        return view('/viewcell/faq', $data);
    }

    public function partner()
    {

        $data = [
            'partner' => $this->db->table('partner')->get()->getResultArray()
        ];

        return view('viewcell/partner', $data);
    }

    public function galeri()
    {

        $data = [
            'kategori' => $this->db->table('kategori')->get()->getResultArray(),
            'galeri' => $this->db->table('galeri')->get()->getResultArray()
        ];

        return view('viewcell/galeri', $data);
    }

    public function artikel($limit = 3, $col = 3)
    {

        $data = [
            'artikel' => $this->db->table('artikel')->orderBy('created_at', 'DESC')->limit($limit)->get()->getResultArray(),
            'col' => $col
        ];

        return view('viewcell/artikel', $data);
    }

    public function aside_artikel($limit = 2)
    {

        $data = [
            'artikel' => $this->db->table('artikel')->orderBy('created_at', 'DESC')->limit($limit)->get()->getResultArray(),
        ];

        return view('viewcell/aside_artikel', $data);
    }

    public function aside_media()
    {
        return view('viewcell/aside_media');
    }

    public function aside_phone()
    {
        return view('viewcell/aside_phone');
    }

    public function breadcrumb($title, $active_page, $img = '/img/bg/bdrc-bg.jpg')
    {
        $data = [
            'title' => $title,
            'active_page' => $active_page,
            'img' => $img
        ];

        return view('viewcell/breadcrumb', $data);
    }
}
