<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
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
        'judul_artikel' => 'required|max_length[300]',
        'konten'        => 'required',
        'penulis'       => 'required|max_length[200]',
        'tanggal'       => 'required|max_length[200]|valid_date[Y-m-d]',
        'slug'          => 'required|max_length[200]',
        'deskripsi'     => 'permit_empty|max_length[300]',
        'kata_kunci'    => 'permit_empty|max_length[300]',
        'publish'       => 'permit_empty|in_list[0,1]',
    ];
    protected $validationMessages   = [
        'judul_artikel' => [
            'required'   => 'Judul artikel wajib diisi.',
            'max_length' => 'Judul artikel maksimal 300 karakter.',
        ],
        'gambar' => [
            'max_length' => 'Nama file gambar maksimal 200 karakter.',
        ],
        'konten' => [
            'required'   => 'Konten artikel wajib diisi.',
        ],
        'penulis' => [
            'required'   => 'Nama penulis wajib diisi.',
            'max_length' => 'Nama penulis maksimal 200 karakter.',
        ],
        'tanggal' => [
            'required'   => 'Tanggal wajib diisi.',
            'max_length' => 'Tanggal maksimal 200 karakter.',
            'valid_date' => 'Format tanggal tidak valid. Gunakan format Y-m-d (2023-01-31).',
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
            'in_list'  => 'Status publish harus 0 atau 1.',
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
