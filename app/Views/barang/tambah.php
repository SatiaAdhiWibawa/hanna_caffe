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
                <h3 class="card-title">Tambah Data Barang</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 ">

                        <form action="<?= base_url('barang/tambah_barang') ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang">
                            </div>

                            <div class="form-group">
                                <label>Katagory Barang</label>
                                <input type="text" name="id_kategori" id="id_kategori" class="form-control" placeholder="Kategori Barang">
                            </div>

                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" name="harga_beli" id="harga_beli" class="form-control" placeholder="Harga Beli">
                            </div>

                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" name="harga_jual" id="harga_jual" class="form-control" placeholder="Harga Jual">
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                            </div>

                            <div class="form-group">
                                <label>User</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" placeholder="User">
                            </div>

                            <!-- <div class="form-group">
                                <label>Status</label>
                                <Select name="status" id="status" class="form-control">
                                    <option value='ok'>Ok</option>
                                    <option value='reject'>Reject</option>
                                </Select>
                            </div> -->

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