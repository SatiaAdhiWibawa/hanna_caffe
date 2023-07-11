<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Users extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $usersModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /users
    public function index()
    {
        $data = [
            'title'     => 'Kelola User',
            'subtitle'  => 'Daftar User',
            'list_user' => $this->usersModel->findAll() // AMBIL SEMUA DATA USER DARI DATABASE USERS
        ];
        return view('users/index', $data);
    }


    // FUNGSI TAMBAH USER INI DIJALANKAN KETIKA MEMBUKA URL /users/tambah
    public function tambah()
    {
        $data = [
            'title'    => 'Kelola User',
            'subtitle' => 'Tambah User'
        ];
        return view('users/tambah', $data);
    }


    // FUNGSI TAMBAH USER DENGAN METODE POST
    public function tambah_user()
    {
        $file = $this->request->getFile('foto');
        if ($file === null || $file->isValid() === false) {
            $foto = 'default.png';
        } else {
            $foto = $file->getRandomName();
            $file->move('assets/images/', $foto);
        }

        $data = [
            'nama'        => $this->request->getVar('nama'),
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'password'    => md5($this->request->getVar('password')),
            'role'        => $this->request->getVar('role'),
            'foto'        => $foto,
            'created_at'  => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('/users');
    }


    //  FUNGSI UNTUK TAMPILAN EDIT USER DENGAN METODE GET
    public function edit($id)
    {
        $data = [
            'title'       => 'Kelola User',
            'subtitle'    => 'Edit User',
            'detail_user' => $this->usersModel->getDetailUser($id)
        ];
        return view('users/edit', $data);
    }


    // FUNGSI UNTUK EDIT USER DENGAN METODE POST
    public function edit_users($id)
    {
        $getUser  = $this->usersModel->getDetailUser($id);
        $passLama = $getUser['password'];
        $file     = $this->request->getFile('foto');

        // JIKA TIDAK ADA FOTO YANG DIUPLOAD/DIEDIT
        if ($file == "") {
            $foto = $getUser['foto'];
        } else {
            $foto = $file->getRandomName();
            $file->move('assets/images/', $foto);
        }

        // JIKA PASSWORD TIDAK DIUBAH
        if ($this->request->getVar('password') == $passLama) {
            $password = $passLama;
        } else {
            $password = md5($this->request->getVar('password'));
        }

        $data = [
            'id'          => (int)$id,
            'nama'        => $this->request->getVar('nama'),
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'password'    => $password,
            'foto'        => $foto,
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/users');
    }


    // FUNGSI UNTUK HAPUS USER
    public function hapus_users($id)
    {
        $getUser = $this->usersModel->getDetailUser($id);

        // JIKA FOTO BUKAN DEFAULT.PNG MAKA HAPUS FOTO
        if ($getUser['foto'] != 'default.png') {
            unlink('assets/images/' . $getUser['foto']);
        }

        $this->usersModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/users');
    }
}
