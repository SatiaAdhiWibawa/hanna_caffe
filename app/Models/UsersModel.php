<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_user', 'username', 'password', 'role', 'foto', 'created_at', 'updated_at'];


    // FUNGSI UNTUK CEK LOGIN BERDASARKAN ID KARYAWAN DAN PASSWORD
    public function cekLogin($idKaryawan, $password)
    {
        $builder = $this->db->table('users');
        $builder->where(array('id_karyawan' => $idKaryawan, 'password' => $password));
        return $builder->get()->getRowArray();
    }

    public function getDetailUser($id)
    {
        $builder = $this->db->table('users');
        $builder->where(array('id' => $id));
        return $builder->get()->getRowArray();
    }
}
