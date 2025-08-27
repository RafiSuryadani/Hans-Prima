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

    public function setSlug(string $slug): self
    {
        if (empty($slug)) {
            $slug = url_title($this->attributes['category_name'] ?? '', '-', true);
        }

        $this->attributes['slug'] = $slug;
        return $this;
    }
}
