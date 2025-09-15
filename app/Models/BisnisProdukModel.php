<?php

namespace App\Models;

use CodeIgniter\Model;

class BisnisProdukModel extends Model
{
    protected $table            = 'bisnis_produk';
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
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'bisnis_produk' => 'required|max_length[200]',
        'konten'        => 'required',
        'slug'          => 'required|max_length[200]',
        'deskripsi'     => 'permit_empty|max_length[300]',
        'kata_kunci'    => 'permit_empty|max_length[300]',
        'publish'       => 'permit_empty|integer',
    ];
    protected $validationMessages   = [
        'bisnis_produk' => [
            'required'   => 'Nama produk bisnis wajib diisi.',
            'max_length' => 'Nama produk bisnis maksimal 200 karakter.',
        ],
        'konten' => [
            'required'   => 'Konten wajib diisi.',
        ],
        'slug' => [
            'required'   => 'Slug wajib diisi.',
            'max_length' => 'Slug maksimal 200 karakter.',
        ],
        'deskripsi' => [
            'max_length' => 'Deskripsi maksimal 300 karakter.',
        ],
        'kata_kunci' => [
            'max_length' => 'Kata kunci maksimal 300 karakter.',
        ],
        'publish' => [
            'integer'  => 'Status publish harus berupa angka.',
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
