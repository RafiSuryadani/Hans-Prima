<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Product extends Entity
{
    protected $datamap = [];
    protected $casts   = [
        'id'                => 'integer',
        'group_category_id' => 'integer',
        'category_id'       => 'integer',
        'sub_category_id'   => '?integer',
        'price'             => 'float',
        'stock'             => 'integer',
        'version'           => 'integer',
        'variant'           => 'integer',
        'top_seller'        => 'boolean',
        'popular_item'      => 'boolean',
        'top_viewed'        => 'boolean',
        'user_id'           => '?integer',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    /**
     * Mutator untuk membuat slug dari product_name.
     */
    public function setProductName(string $name): self
    {
        $this->attributes['product_name'] = $name;
        $this->attributes['slug'] = url_title($name, '-', true);

        return $this;
    }
}
