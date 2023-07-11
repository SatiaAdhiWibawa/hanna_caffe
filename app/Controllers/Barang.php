<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\I18n\Time;

class Barang extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;

    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /barang
    public function index()
    {
        $data = [
            'title'     => 'Kelola Barang',
            'subtitle'  => 'Daftar Barang',
            'list_barang' => $this->barangModel->findAll() // AMBIL SEMUA DATA BARANG DARI DATABASE BARANG
        ];
        return view('barang/index', $data);
    }

    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/tambah
    public function tambah()
    {
        $data = [
            'title'    => 'Kelola Barang',
            'subtitle' => 'Tambah Barang'
        ];
        return view('barang/tambah', $data);
    }

    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_barang()
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

        $this->usersModel->insert($data);
        return redirect()->to('/users');
    }

    // FUNGSI EDIT BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/edit
    public function edit($id)
    {
        $data = [
            'title'    => 'Kelola Barang',
            'subtitle' => 'Edit Barang',
            'barang'   => $this->barangModel->find($id)
        ];
        return view('barang/edit', $data);
    }

    // FUNGSI EDIT BARANG DENGAN METODE POST
    public function edit_barang($id)
    {
        $file = $this->request->getFile('foto');
        if ($file === null || $file->isValid() === false) {
            $foto = $this->request->getVar('foto_lama');
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
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->usersModel->update($id, $data);
        return redirect()->to('/users');
    }

    // FUNGSI HAPUS BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/hapus
    public function hapus($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang');
    }
}
