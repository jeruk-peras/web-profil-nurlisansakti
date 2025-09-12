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
            'menu' => $this->modelMenu->where('level', 1)->orderBy('order', 'ASC')->findAll(),
            'submenu' => $this->modelMenu->where('level', 2)->orderBy('order', 'ASC')->findAll(),
        ];

        return view('viewcell/slider', $data);
    }
}
