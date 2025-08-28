<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupCategory extends Model
{

    protected $table            = 'group_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\GroupCategory::class;// Menggunakan Entity
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['group_name', 'slug', 'user_id'];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    // Aturan Validasi
    protected $validationRules = [
        'group_name' => 'required|max_length[255]|is_unique[group_categories.group_name,id,{id}]',
        'user_id'    => 'permit_empty|integer',
    ];

    protected $validationMessages = [
        'group_name' => [
            'required'   => 'Nama grup tidak boleh kosong.',
            'is_unique'  => 'Nama grup sudah ada, silakan gunakan nama lain.',
        ],
    ];
}
