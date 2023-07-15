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
            <h3 class="card-title">Data Table Stock Ofname</h3>
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

            <button type="submit" class="btn btn-success"><a href="<?= base_url('stock_ofname/tambah') ?>" style="color: white;"> + Tambah Data Stock Ofname</a></button>
            <br><br><br>

            <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Selisih</th>
                        <th>User</th>
                        <th>Tanggal Input</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($list_barang as $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_barang'] ?></td>
                            <td><?= $value['jumlah'] ?></td>
                            <td style="color: red;"><?= $value['selisih'] ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td><?= $value['keterangan'] ?? "-" ?></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<?= $this->endSection(); ?>