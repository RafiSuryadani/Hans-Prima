<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SubCategory extends Entity
{
    protected $datamap = [];
    protected $casts   = [
        'id'          => 'integer',
        'category_id' => 'integer',
        'user_id'     => '?integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    public function setCategorySubname(string $subname): self
    {
        $this->attributes['category_subname'] = $subname;
        $this->attributes['slug'] = url_title($subname, '-', true);

        return $this;
    }
}
