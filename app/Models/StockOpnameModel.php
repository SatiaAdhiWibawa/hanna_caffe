<?php

namespace App\Models;

use CodeIgniter\Model;

class StockOpnameModel extends Model
{
    protected $table         = 'stok_opname';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id_barang', 'jumlah', 'user_id', 'selisih', 'tanggal', 'keterangan'];

    public function getStockOpname()
    {
        return $this->db->table('stok_opname')
            ->join('barang', 'barang.id = stok_opname.id_barang')
            ->join('users', 'users.id = stok_opname.user_id')
            ->select('stok_opname.*, barang.nama_barang, users.nama_user')
            ->get()->getResultArray();
    }
}
