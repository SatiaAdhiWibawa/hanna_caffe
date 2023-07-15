<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AuthController extends BaseController
{

    // DEKLARASI MODEL
    protected $usersModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->usersModel =  new UsersModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /
    public function index()
    {
        return view('v_login');
    }


    // FUNGSI UNUTK PROSES LOGIN
    public function login()
    {
        $session  = session();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        // CEK LOGIN BERDASARKAN USERNAME DAN PASSWORD
        $data = $this->usersModel->cekLogin($username, $password);
        if ($this->usersModel->cekLogin($username, $password)) {
            $data = $this->usersModel->cekLogin($username, $password);
            $seesionDatas   = [
                'id'        => $data['id'],
                'nama_user' => $data['nama_user'],
                'username'  => $data['username'],
                'foto'      => $data['foto'],
                'role'      => $data['role'],
                'logged_in' => true
            ];
            $session->set($seesionDatas);
            return redirect()->to(base_url('users'));
        } else {
            session()->setFlashdata('pesan', 'Username atau Password Salah!');
            return redirect()->to(base_url('/'));
        }
    }


    // FUNGSI UNTUK LOGOUT
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
