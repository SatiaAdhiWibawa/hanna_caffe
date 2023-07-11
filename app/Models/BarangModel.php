<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table         = 'barang';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['nama', 'harga', 'stok', 'foto', 'created_at', 'updated_at'];

    public function getDetailBarang($id)
    {
        $builder = $this->db->table('barang');
        $builder->where(array('id' => $id));
        return $builder->get()->getRowArray();
    }
}
