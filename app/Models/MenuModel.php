<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_menu' => [
            'label' => 'Menu',
            'rules' => 'required|max_length[200]'
        ],
        'level' => [
            'label' => 'Level',
            'rules' => 'required|integer'
        ],
        'url' => [
            'label' => 'URL',
            'rules' => 'required|max_length[200]'
        ],
        'link' => [
            'label' => 'Link',
            'rules' => 'permit_empty|max_length[400]'
        ],
        'new_tab' => [
            'label' => 'New Tab',
            'rules' => 'permit_empty|integer'
        ],
        'order' => [
            'label' => 'Order',
            'rules' => 'permit_empty|integer'
        ],
        'publish' => [
            'label' => 'Publish',
            'rules' => 'permit_empty|integer'
        ],
        'parent_id' => [
            'label' => 'Parent ID',
            'rules' => 'permit_empty|integer'
        ],
    ];
    protected $validationMessages   = [
        'nama_menu' => [
            'required'   => 'Menu harus diisi.',
            'max_length' => 'Menu maksimal 200 karakter.'
        ],
        'level' => [
            'required' => 'Level harus diisi.',
            'integer'  => 'Level harus berupa angka.'
        ],
        'url' => [
            'required'   => 'URL harus diisi.',
            'max_length' => 'URL maksimal 200 karakter.'
        ],
        'link' => [
            'max_length' => 'Link maksimal 400 karakter.'
        ],
        'new_tab' => [
            'integer' => 'New Tab harus berupa angka.'
        ],
        'order' => [
            'integer'  => 'Order harus berupa angka.'
        ],
        'publish' => [
            'integer' => 'Publish harus berupa angka.'
        ],
        'parent_id' => [
            'integer' => 'Parent ID harus berupa angka.'
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
