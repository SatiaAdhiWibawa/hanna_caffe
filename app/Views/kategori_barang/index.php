<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>

<!-- MEMANGGIL LAYOUTS -->
<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                        <li class="breadcrumb-item active"><?= $subtitle ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Kategori Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php

            // NOTIFIKASI BERHASIL SIMPAN DATA
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>' . session()->getFlashdata('pesan') . '</div>';
            }
            ?>

            <button type="submit" class="btn btn-success"><a href="<?= base_url('kategori_barang/tambah') ?>" style="color: white;"> + Tambah Data Kategori Barang</a></button>
            <br><br><br>

            <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategoti Barang</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($kategori as $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_kategori'] ?></td>
                            <td><?= $value['updated_at'] ?></td>

                            <td class="d-flex justify-content-center">
                                <a href="<?= base_url('kategori_barang/edit/' . $value['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form method="post" action="<?= base_url('kategori_barang/hapus/' . $value['id']) ?>" onsubmit="return confirm('Apakah yakin akan menghapus data ini?')">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<?= $this->endSection(); ?>