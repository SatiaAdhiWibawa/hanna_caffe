<!-- MEMANGGIL LAYOUTS -->
<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">

    <?php $session = session(); ?>
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



    <div class="content">
        <!-- general form elements -->
        <div class="card card-dark">

            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Tambah Data Transaksi Masuk</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 ">

                        <form action="<?= base_url('transaksi_masuk/tambah_transaksi_masuk') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <Select name="id_barang" id="id_barang" class="form-control">
                                    <option value=''>Pilih Barang</option>
                                    <?php foreach ($list_barang as $value) { ?>
                                        <option value='<?= $value['id'] ?>'><?= $value['nama_barang'] . "-" . $value['nama_kategori'] ?></option>
                                    <?php } ?>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
                            </div>

                            <div class="form-group">
                                <label>User</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" placeholder="user_id" value="<?= $session->get('nama_user') ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Input:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Pilih tanggal" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tanggal", {
            dateFormat: "Y-m-d",
            allowInput: true
        });
    });
</script>
<?= $this->endSection(); ?>