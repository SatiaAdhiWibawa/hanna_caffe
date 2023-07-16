<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $currentDate = date('Y-m-d H:i:s'); // Mendapatkan waktu saat ini dalam format jam:menit:detik
                        ?>
                        <img src="<?= base_url('assets/images/logo.jpg') ?>" class="brand-image img-circle elevation-8" style="opacity: .9" width="100px">
                        <span class="brand-text font-weight-light"><b> Sistem Informasi Pengelolaan Stock Opname Hanna Caffe </b></span> <br><br>
                        <small class="float-right">Date: <?= $currentDate  ?></small>
                    </h2>
                </div>
            </div>

            <b>Laporan Data Harian</b>
            <!-- Table row -->
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
                    foreach ($laporan_tabel as $value) { ?>
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
        </section>
    </div>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>