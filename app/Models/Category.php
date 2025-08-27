<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Category'; // Menggunakan Entity
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'group_category_id',
        'category_name',
        'slug',
        'image',
        'user_id'
    ];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    // Aturan Validasi
    protected $validationRules = [
        'group_category_id' => 'required|integer|is_not_unique[group_categories.id]',
        'category_name'     => 'required|max_length[255]|is_unique[categories.category_name,id,{id}]',
        'slug'              => 'required|max_length[255]|is_unique[categories.slug,id,{id}]',
        'user_id'           => 'permit_empty|integer',
        'image'             => 'permit_empty|uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
    ];

    protected $validationMessages = [
        'group_category_id' => [
            'required'      => 'Grup kategori harus dipilih.',
            'is_not_unique' => 'Grup kategori yang dipilih tidak valid.',
        ],
        'category_name' => [
            'required'  => 'Nama kategori tidak boleh kosong.',
            'is_unique' => 'Nama kategori sudah ada.',
        ],
        'image' => [
            'max_size' => 'Ukuran gambar maksimal adalah 2MB.',
            'is_image' => 'File yang diunggah harus berupa gambar.',
        ]
    ];
}
