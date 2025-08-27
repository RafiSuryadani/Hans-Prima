<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'email'      => 'admin@gmail.com',
                'password'   => password_hash('123456', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'level'      => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'user_demo',
                'email'      => 'user@gmail.com',
                'password'   => password_hash('123456', PASSWORD_DEFAULT),
                'role'       => 'user',
                'level'      => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];


        // Memasukkan data ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}
