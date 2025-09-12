<?php

namespace App\Controllers\Serverside;

use App\Controllers\BaseController;
use App\Libraries\SideServerDatatables;
use CodeIgniter\HTTP\ResponseInterface;

class DatatablesController extends BaseController
{
    public function menu()
    {
        $table = 'menu';
        $primaryKey = 'id';
        $columns = ['id', 'menu', 'url', 'publish'];
        $orderableColumns = ['menu', 'url', 'publish', 'order'];
        $searchableColumns = ['menu', 'url', 'publish', 'order'];
        $defaultOrder = ['order', 'ASC'];

        $sideDatatable = new SideServerDatatables($table, $primaryKey);

        $data = $sideDatatable->getData($columns, $orderableColumns, $searchableColumns, $defaultOrder);
        $countData = $sideDatatable->getCountFilter($columns, $searchableColumns);
        $countAllData = $sideDatatable->countAllData();

        $No = $this->request->getPost('start') + 1;
        $rowData = [];
        foreach ($data as $row) {
            $rowData[] = [
                $No++,
                htmlspecialchars($row['id']),
                htmlspecialchars($row['menu']),
                htmlspecialchars($row['url']),
                htmlspecialchars($row['publish']),
            ];
        }

        $outputdata = [
            "draw" => $this->request->getPost('draw'),
            "recordsTotal" => $countAllData,
            "recordsFiltered" => $countData,
            "data" => $rowData,
        ];

        return $this->response->setJSON($outputdata);
    }
}
