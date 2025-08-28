<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table          = 'products';
    protected $primaryKey     = 'id';
    protected $returnType     = \App\Entities\Product::class;
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'group_category_id',
        'category_id',
        'sub_category_id',
        'product_name',
        'product_subname',
        'slug',
        'image',
        'description',
        'price',
        'stock',
        'version',
        'variant',
        'top_seller',
        'popular_item',
        'top_viewed',
        'user_id'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id'                => 'required|integer',
        'product_name'      => 'required|max_length[255]|is_unique[products.product_name,id,{id}]',
        'product_subname'   => 'required|max_length[255]',
        'price'             => 'required|numeric',
        'stock'             => 'required|integer',
        'group_category_id' => 'required|integer',
        'category_id'       => 'required|integer',
        'sub_category_id'   => 'required|integer',
        'user_id'           => 'permit_empty|integer',
    ];
    
    protected $validationRulesImage = [
        'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,png,jpg,jpeg]',
    ];

    public function getValidationRules(array $options = []): array
    {
        if (isset($options['image'])) {
            return $this->validationRulesImage;
        }
        return $this->validationRules;
    }

    protected $validationMessages = [
        'group_category_id' => [
            'required'      => 'Grup kategori harus dipilih.',
            'is_not_unique' => 'Grup kategori yang dipilih tidak valid.',
        ],
        'category_id' => [
            'required'      => 'Kategori harus dipilih.',
            'is_not_unique' => 'Kategori yang dipilih tidak valid.',
        ],
        'sub_category_id' => [
            'required'      => 'Sub Kategori harus dipilih.',
            'is_not_unique' => 'Sub Kategori yang dipilih tidak valid.',
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
