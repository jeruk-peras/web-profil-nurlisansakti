<?php

namespace App\Models;

use CodeIgniter\Model;

class KarirModel extends Model
{
    protected $table            = 'karir';
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
        'karir'      => 'required|max_length[300]',
        'konten'     => 'required',
        'slug'       => 'required|max_length[200]',
        'deskripsi'  => 'permit_empty|max_length[300]',
        'kata_kunci' => 'permit_empty|max_length[300]',
        'publish'    => 'permit_empty|integer',
    ];
    protected $validationMessages   = [
        'karir' => [
            'required'    => 'Karir harus diisi.',
            'max_length'  => 'Karir maksimal 300 karakter.',
        ],
        'konten' => [
            'required'    => 'Konten harus diisi.',
        ],
        'slug' => [
            'required'    => 'Slug harus diisi.',
            'max_length'  => 'Slug maksimal 200 karakter.',
        ],
        'deskripsi' => [
            'max_length'  => 'Deskripsi maksimal 300 karakter.',
        ],
        'kata_kunci' => [
            'max_length'  => 'Kata kunci maksimal 300 karakter.',
        ],
        'publish' => [
            'integer'     => 'Publish harus berupa angka.',
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
