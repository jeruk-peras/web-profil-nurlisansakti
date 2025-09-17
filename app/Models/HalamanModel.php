<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanModel extends Model
{
    protected $table            = 'halaman';
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
        'judul_halaman' => [
            'label' => 'Judul Halaman',
            'rules' => 'required|max_length[300]'
        ],
        'konten' => [
            'label' => 'Konten',
            'rules' => 'required'
        ],
        'slug' => [
            'label' => 'Slug',
            'rules' => 'required|max_length[200]'
        ],
        'deskripsi' => [
            'label' => 'Deskripsi',
            'rules' => 'permit_empty|max_length[300]'
        ],
        'kata_kunci' => [
            'label' => 'Kata Kunci',
            'rules' => 'permit_empty|max_length[300]'
        ],
        'publish' => [
            'label' => 'Publish',
            'rules' => 'permit_empty|integer|in_list[0,1]'
        ],
    ];
    protected $validationMessages   = [
        'judul_halaman' => [
            'required'   => 'Judul halaman wajib diisi.',
            'max_length' => 'Judul halaman maksimal 300 karakter.'
        ],
        'konten' => [
            'required'   => 'Konten wajib diisi.'
        ],
        'slug' => [
            'required'   => 'Slug wajib diisi.',
            'max_length' => 'Slug maksimal 200 karakter.'
        ],
        'deskripsi' => [
            'max_length' => 'Deskripsi maksimal 300 karakter.'
        ],
        'kata_kunci' => [
            'max_length' => 'Kata kunci maksimal 300 karakter.'
        ],
        'publish' => [
            'integer'  => 'Publish harus berupa angka.',
            'in_list'  => 'Publish hanya boleh 0 atau 1.'
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
