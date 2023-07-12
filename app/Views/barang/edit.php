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
        <div class="card card-dark">

            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Edit Data Barang</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 ">

                        <form action="<?= base_url('barang/edit_barang/' . $barang['id']) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="nama_barang" value="<?= $barang['nama_barang'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Kategori Barang</label>
                                <input type="text" name="id_kategori" id="id_kategori" class="form-control" placeholder="id_kategori" value="<?= $barang['id_kategori'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" name="harga_beli" id="harga_beli" class="form-control" placeholder="harga_beli" value="<?= $barang['harga_beli'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" name="harga_jual" id="harga_jual" class="form-control" placeholder="harga_jual" value="<?= $barang['harga_jual'] ?>">
                            </div>

                            <div class=" form-group">
                                <label>User</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" placeholder="user_id" value="<?= $barang['user_id'] ?>">
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