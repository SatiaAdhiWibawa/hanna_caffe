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
            <h3 class="card-title">Data Table SO Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            // PESAN NOTIFIKASI
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>' . session()->getFlashdata('pesan') . '</div>';
            } ?>

            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-4">
                        <b>Download Laporan Per-Hari:</b>
                        <form action="<?= base_url('laporan/download-harian') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <label for="tanggal_download" class="sr-only">Download </label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="tanggal_download" name="tanggal_download" class="form-control" placeholder="Pilih tanggal" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-success">Download</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <br>


                <!-- TABLE -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Selisih</th>
                            <th>User</th>
                            <th>Tanggal SO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_table as $value) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_barang'] ?></td>
                                <td><?= $value['jumlah'] ?></td>
                                <td style="color: red;"><?= $value['selisih'] ?></td>
                                <td><?= $value['nama_user'] ?></td>
                                <td><?= $value['tanggal'] ?></td>
                                <td><?= $value['keterangan'] ?? "-" ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tanggal_download", {
            dateFormat: "Y-m-d",
            allowInput: true
        });
    });
</script>

<?= $this->endSection(); ?>