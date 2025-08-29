<?php

namespace App\Models;

use CodeIgniter\Model;

class SubCategory extends Model
{
    protected $table            = 'sub_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\SubCategory::class;
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'category_id',
        'category_subname',
        'slug',
        'user_id'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $validationRules = [
        'category_id'      => 'required|integer|is_not_unique[categories.id]',
        'category_subname' => 'required|max_length[255]|is_unique[sub_categories.category_subname,id,{id}]',
        'user_id'          => 'permit_empty|integer',
    ];

    protected $validationMessages = [
        'category_id' => [
            'required'      => 'Kategori harus dipilih.',
            'is_not_unique' => 'Kategori yang dipilih tidak valid.',
        ],
        'category_subname' => [
            'required'  => 'Nama sub kategori tidak boleh kosong.',
            'is_unique' => 'Nama sub kategori tersebut sudah ada.',
        ],
    ];
}
