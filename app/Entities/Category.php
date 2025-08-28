<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Category extends Entity
{
    protected $datamap = [];
    protected $casts   = [
        'id'                => 'integer',
        'group_category_id' => 'integer',
        'user_id'           => '?integer',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];

    public function setCategoryName(string $categoryname): self
    {
        $this->attributes['category_name'] = $categoryname;
        $this->attributes['slug'] = url_title($categoryname, '-', true);

        return $this;
    }
}
