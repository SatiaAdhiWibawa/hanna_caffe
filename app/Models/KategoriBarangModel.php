<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriBarangModel extends Model
{
    protected $table         = 'kategori_barang';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nama_kategori', 'created_at', 'updated_at'];
}
