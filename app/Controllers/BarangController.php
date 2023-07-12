<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class BarangController extends BaseController
{
    // DEKLARASI VARIABLE GLOBAL
    protected $barangModel;
    protected $usersModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->usersModel  = new UsersModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /barang
    public function index()
    {
        $data = [
            'title'       => 'Kelola Barang',
            'subtitle'    => 'Daftar Barang',
            'list_barang' => $this->barangModel->orderBy('updated_at', 'DESC')->findAll() // AMBIL SEMUA DATA BARANG DARI DATABASE BARANG URUTKAN BERDASARKAN UPDATED_AT TERBARU
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
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'harga_beli'  => $this->request->getVar('harga_beli'),
            'harga_jual'  => $this->request->getVar('harga_jual'),
            'user_id'     => $this->request->getVar('user_id'),
            'quantity'    => $this->request->getVar('quantity'),
            'created_at'  => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->barangModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('barang'));
    }


    // FUNGSI EDIT BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/edit
    public function edit($id)
    {
        $data = [
            'title'     => 'Kelola Barang',
            'subtitle'  => 'Edit Barang',
            'barang'    => $this->barangModel->find($id),
        ];
        return view('barang/edit', $data);
    }


    // FUNGSI EDIT BARANG DENGAN METODE POST
    public function edit_barang($id)
    {
        $data = [
            'id'          => $id,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'harga_beli'  => $this->request->getVar('harga_beli'),
            'harga_jual'  => $this->request->getVar('harga_jual'),
            'user_id'     => $this->request->getVar('user_id'),
            'quantity'    => $this->request->getVar('quantity'),
            'updated_at'  => Time::now('Asia/Jakarta', 'en_US')
        ];

        $this->barangModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('barang'));
    }


    // FUNGSI HAPUS BARANG INI DIJALANKAN KETIKA MEMBUKA URL /barang/hapus
    public function hapus_barang($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to(base_url('barang'));
    }
}
