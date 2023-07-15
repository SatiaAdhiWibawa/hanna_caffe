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
                <h3 class="card-title">Edit Data User</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-8 ">

                        <form action="<?= base_url('users/edit_users/' . $detail_user['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama" value="<?= $detail_user['nama_user'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= $detail_user['username'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $detail_user['password'] ?>">
                            </div>

                            <div class=" form-group">
                                <label>Role</label>
                                <Select name="role" id="role" class="form-control">
                                    <option value=" <?= $detail_user['role'] ?>"><?= ucwords($detail_user['role']) ?></option>
                                    <?php if ($detail_user['role'] == 'owner') { ?>
                                        <option value='barista'>Barista</option>
                                        <option value='chef'>Chef</option>
                                    <?php } else if ($detail_user['role'] == 'barista') { ?>
                                        <option value='owner'>Owner</option>
                                        <option value='chef'>Chef</option>
                                    <?php } else { ?>
                                        <option value='owner'>Owner</option>
                                        <option value='barista'>Barista</option>
                                    <?php } ?>
                                </Select>
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/images/' . $detail_user['foto']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
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