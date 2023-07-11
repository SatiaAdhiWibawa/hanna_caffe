<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'INT',
                'constraint'        => 11,
                'auto_increment'    => true
            ],
            'nama_user'             => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'username'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'unique'            => true,
            ],
            'id_karyawan'   => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'unique'            => true,
            ],
            'password'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'role'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 20
            ],
            'foto'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
                'default'           => 'default.png'
            ],
            'created_at'    => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
            'updated_at'    => [
                'type'              => 'DATETIME',
                'null'              => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
