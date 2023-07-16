<?php

namespace App\Controllers;

use App\Models\KategoriBarangModel;
use CodeIgniter\I18n\Time;


class KategoriBarangController extends BaseController
{
    // DEKLARASI VARIABLE
    protected $kategoriBarangModel;


    // FUNGSI CONSTRUCT INI DIJALANKAN SETIAP KALI MEMBUAT OBJEK BARU DARI CLASS INI
    public function __construct()
    {
        $this->kategoriBarangModel = new KategoriBarangModel();
    }


    // FUNGSI INDEX INI DIJALANKAN KETIKA MEMBUKA URL /kategori_barang
    public function index()
    {
        $data = [
            'title'    => 'Kelola Kategori Barang',
            'subtitle' => 'List Kategori Barang',
            'kategori' => $this->kategoriBarangModel->findAll() // AMBIL SEMUA DATA BARANG DARI DATABASE BARANG URUTKAN BERDASARKAN UPDATED_AT TERBARU
        ];
        return view('kategori_barang/index', $data);
    }


    // FUNGSI TAMBAH BARANG INI DIJALANKAN KETIKA MEMBUKA URL /kategori_barang/tambah
    public function tambah()
    {
        $data = [
            'title'    => 'Kelola Kategori Barang',
            'subtitle' => 'Tambah Kategori Barang'
        ];
        return view('kategori_barang/tambah', $data);
    }


    // FUNGSI TAMBAH BARANG DENGAN METODE POST
    public function tambah_kategori()
    {
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'created_at'    => Time::now('Asia/Jakarta', 'en_US'),
            'updated_at'    => Time::now('Asia/Jakarta', 'en_US')
        ];

        // INSERT DATA BARU KE DATABASE MENGGUNAKAN MODEL
        $this->kategoriBarangModel->insert($data);
        // SET FLASHDATA UNTUK MENAMPILKAN ALERT SUCCESS
        session()->setFlashdata('success', 'Berhasil menambahkan kategori baru');
        // ARAHKAN KE HALAMAN /kategori_barang
        return redirect()->to('/kategori_barang');
    }


    // FUNGSI EDIT BARANG INI DIJALANKAN KETIKA MEMBUKA URL /kategori_barang/edit
    public function edit($id)
    {
        $data = [
            'title'           => 'Kelola Kategori Barang',
            'subtitle'        => 'Edit Kategori Barang',
            'kategori_barang' => $this->kategoriBarangModel->find($id) // AMBIL DATA BARANG BERDASARKAN ID
        ];
        return view('kategori_barang/edit', $data);
    }


    // FUNGSI EDIT BARANG DENGAN METODE POST
    public function edit_kategori($id)
    {
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'updated_at'    => Time::now('Asia/Jakarta', 'en_US')
        ];

        // UPDATE DATA BARANG BERDASARKAN ID
        $this->kategoriBarangModel->update($id, $data);
        // SET FLASHDATA UNTUK MENAMPILKAN ALERT SUCCESS
        session()->setFlashdata('success', 'Berhasil mengubah kategori');
        // ARAHKAN KE HALAMAN /kategori_barang
        return redirect()->to(base_url('kategori_barang'));
    }


    // FUNGSI HAPUS BARANG
    public function hapus_kategori($id)
    {
        $this->kategoriBarangModel->delete($id);
        return redirect()->to(base_url('kategori_barang'));
    }
}
