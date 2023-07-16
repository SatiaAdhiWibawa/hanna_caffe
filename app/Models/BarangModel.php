<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table         = 'barang';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['kode_barang', 'nama_barang', 'id_kategori', 'stok', 'exp', 'created_at', 'updated_at'];


    // AMBIL SEMUA DATA BARANG DARI DATABASE BARANG DAN NAMA KATEGORI BARANG DARI DATABASE KATEGORI BARANG
    public function getBarang($id = null)
    {
        $builder = $this->db->table('barang');
        $builder->select('barang.*, kategori_barang.nama_kategori');
        $builder->join('kategori_barang', 'kategori_barang.id = barang.id_kategori');

        if ($id === null) {
            // JIKA ID KOSONG, MAKA AMBIL SEMUA DATA BARANG DARI DATABASE BARANG DAN NAMA KATEGORI BARANG DARI DATABASE KATEGORI BARANG
            return $builder->get()->getResultArray();
        } else {
            // JIKA ID TIDAK KOSONG, MAKA AMBIL DATA BARANG DARI DATABASE BARANG DAN NAMA KATEGORI BARANG DARI DATABASE KATEGORI BARANG
            $builder->where('barang.id', $id);
            return $builder->get()->getRowArray();
        }
    }
}
