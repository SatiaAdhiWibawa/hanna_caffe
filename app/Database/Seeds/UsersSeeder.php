<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_user'  => 'owner',
            'username'   => 'owner',
            'password'   => md5('owner'),
            'role'       => 'owner',
            'foto'       => 'default.jpg',
            'created_at' => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at' => Time::now('Asia/Jakarta', 'en_US')
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
