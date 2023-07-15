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
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="kode_barang" value="<?= $barang['kode_barang'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="nama_barang" value="<?= $barang['nama_barang'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Kategori Barang</label>
                                <Select name="id_kategori" id="id_kategori" class="form-control">
                                    <option value='<?= $barang['id_kategori'] ?>'><?= $barang['nama_kategori'] ?></option>
                                    <?php foreach ($kategori_barang as $value) { ?>
                                        <option value='<?= $value['id'] ?>'><?= $value['nama_kategori'] ?></option>
                                    <?php } ?>
                                </Select>
                            </div>

                            <div class=" form-group">
                                <label>Stok</label>
                                <input type="text" name="stok" id="stok" class="form-control" placeholder="stok" value="<?= $barang['stok'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Expired:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="exp" name="exp" class="form-control" placeholder="Pilih tanggal Expired" readonly value="<?= $barang['exp'] ?>">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#exp", {
            dateFormat: "Y-m-d",
            allowInput: true
        });
    });
</script>
<?= $this->endSection(); ?>