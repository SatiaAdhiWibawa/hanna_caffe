<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokOpname extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true
            ],
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'jumlah'             => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'selisih'            => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tanggal'            => [
                'type'           => 'DATE',
            ],
            'keterangan'         => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_barang', 'barang', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stok_opname');
    }

    public function down()
    {
        $this->forge->dropTable('stok_opname');
    }
}
