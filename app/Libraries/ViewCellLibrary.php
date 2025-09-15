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
    
    public function menu(){

        $data = [
            'menu' => $this->modelMenu->where('level', 1)->orderBy('order', 'ASC')->findAll(),
            'submenu' => $this->modelMenu->where('level', 2)->orderBy('order', 'ASC')->findAll(),
        ];

        return view('viewcell/main-menu', $data);
    }

    public function slider(){

        $data = [
            'slider' => $this->db->table('slider')->get()->getResultArray()
        ];

        return view('viewcell/slider', $data);
    }

    public function service(){

        $data = [
            'service' => $this->db->table('service')->get()->getResultArray()
        ];

        return view('viewcell/service', $data);
    }

    public function bisnis_produk(){

        $data = [
            'bisnis_produk' => $this->db->table('bisnis_produk')->get()->getResultArray()
        ];

        return view('viewcell/bisnis_produk', $data);
    }

    public function aside_bisnis_produk(){

        $data = [
            'bisnis_produk' => $this->db->table('bisnis_produk')->get()->getResultArray()
        ];

        return view('viewcell/bisnis_produk_aside', $data);
    }
}
