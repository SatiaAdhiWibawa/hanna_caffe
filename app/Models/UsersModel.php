<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_user', 'username', 'password', 'role', 'foto', 'created_at', 'updated_at'];


    // FUNGSI UNTUK CEK LOGIN BERDASARKAN USERNAME DAN PASSWORD
    public function cekLogin($username, $password)
    {
        $builder = $this->db->table('users');
        $builder->where(array('username' => $username, 'password' => $password));
        return $builder->get()->getRowArray();
    }
}
