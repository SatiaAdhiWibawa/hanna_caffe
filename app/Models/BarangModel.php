<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table         = 'barang';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nama_barang', 'id_kategori', 'harga_beli', 'harga_jual', 'quantity', 'created_at', 'updated_at'];
}
