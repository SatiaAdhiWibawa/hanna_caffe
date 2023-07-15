<?php

namespace App\Models;

use CodeIgniter\Model;

class StockOfnameModel extends Model
{
    protected $table         = 'stok_ofname';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id_barang', 'jumlah', 'user_id', 'selisih', 'tanggal', 'keterangan'];

    public function getStockOfname()
    {
        return $this->db->table('stok_ofname')
            ->join('barang', 'barang.id = stok_ofname.id_barang')
            ->join('users', 'users.id = stok_ofname.user_id')
            ->select('stok_ofname.*, barang.nama_barang, users.nama_user')
            ->get()->getResultArray();
    }
}
