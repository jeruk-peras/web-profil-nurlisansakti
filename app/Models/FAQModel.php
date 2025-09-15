<?php

namespace App\Models;

use CodeIgniter\Model;

class FAQModel extends Model
{
    protected $table            = 'faq';
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
        'pertanyaan' => 'required|max_length[500]',
        'jawaban'    => 'required',
        'publish'    => 'permit_empty|in_list[0,1]',
    ];
    protected $validationMessages   = [
        'pertanyaan' => [
            'required'   => 'Pertanyaan wajib diisi.',
            'max_length' => 'Pertanyaan maksimal 500 karakter.',
        ],
        'jawaban' => [
            'required' => 'Jawaban wajib diisi.',
        ],
        'publish' => [
            'in_list'  => 'Status publish harus bernilai 0 atau 1.',
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
