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



    <div class="content">
        <!-- general form elements -->
        <div class="card card-primary">

            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Tambah Data Kategori Barang</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 ">

                        <form action="<?= base_url('kategori_barang/tambah_kategori') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Kategori Barang</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Nama Kategori Barang">
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
<?= $this->endSection(); ?>