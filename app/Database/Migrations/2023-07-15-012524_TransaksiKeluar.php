<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'        => null,
            ],
            'jumlah'             => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'user_id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tanggal'            => [
                'type'           => 'DATE',
            ],
            'keterangan'         => [
                'type'           => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_barang', 'barang', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi_keluar');
    }
}
