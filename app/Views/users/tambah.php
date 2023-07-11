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
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Karyawan">
                            </div>

                            <div class="form-group">
                                <label>ID Karyawan</label>
                                <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" placeholder="ID Karyawan">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <Select name="role" id="role" class="form-control">
                                    <option value='admin'>Admin</option>
                                    <option value='leader'>Leader</option>
                                    <option value='operator'>Operator</option>
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