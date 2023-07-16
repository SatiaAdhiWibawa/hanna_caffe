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
                <h3 class="card-title">Tambah Data User</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 ">

                        <form action="<?= base_url('users/tambah_user') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama User">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <Select name="role" id="role" class="form-control">
                                    <option value='owner'>Owner</option>
                                    <option value='kepala_gudang'>Kepala Gudang</option>
                                    <option value='barista'>Barista</option>
                                    <option value='chef'>Chef</option>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png,.jpeg">
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
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