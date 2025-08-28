<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class GroupCategory extends Entity
{
    protected $datamap = [];

    protected $casts   = [
        'id'         => 'integer',
        'user_id'    => '?integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setGroupName(string $groupname): self
    {
        $this->attributes['group_name'] = $groupname;
        $this->attributes['slug'] = url_title($groupname, '-', true);

        return $this;
    }
}
