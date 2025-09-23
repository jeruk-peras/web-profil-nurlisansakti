<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
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
        'id' => 'permit_empty',
        'nama' => [
            'label' => 'Nama',
            'rules' => 'required|max_length[300]',
        ],
        'username' => [
            'label' => 'Username',
            'rules' => 'required|max_length[300]|is_unique[user.username,id,{id}]',
        ],
        'role' => [
            'label' => 'Role',
            'rules' => 'required|in_list[admin,user]',
        ],
    ];
    protected $validationMessages   = [
        'nama' => [
            'required' => 'Nama wajib diisi.',
            'max_length' => 'Nama maksimal 300 karakter.',
        ],
        'username' => [
            'required' => 'Username wajib diisi.',
            'max_length' => 'Username maksimal 300 karakter.',
            'is_unique' => 'Username sudah digunakan.',
        ],
        'role' => [
            'required' => 'Role wajib diisi.',
            'in_list' => 'Role harus admin atau user.',
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
