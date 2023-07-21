<?php
// UNTUK MENENTUKAN POSISI URL SEKARANG
$uri        = service('uri');
$currentURL = strtolower($uri->getPath());

// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?= base_url('assets/images/logo.jpg') ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Hanna Caffe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/' . $session->get('foto')) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $session->get('nama_user') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">MASTER DATA</li>
                <?php if ($session->get('role') == 'owner') { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('users') ?>" class="nav-link <?= ($currentURL === 'users') ? 'bg-gradient-primary active' : ''; ?>">
                            <i class="nav-icon fas fa-duotone fa-users"></i>
                            <p>
                                Kelola User
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($session->get('role') == 'kepala_gudang') { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('barang') ?>" class="nav-link <?= ($currentURL === 'barang') ? 'bg-gradient-primary active' : ''; ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Kelola Barang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('kategori_barang') ?>" class="nav-link <?= ($currentURL === 'kategori_barang') ? 'bg-gradient-primary active' : ''; ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Kelola Kategori Barang
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($session->get('role') == 'barista' || $session->get('role') == 'chef') { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('transaksi_masuk') ?>" class="nav-link <?= ($currentURL === 'transaksi_masuk') ? 'bg-gradient-primary active' : ''; ?>">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Kelola Barang Masuk
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('transaksi_keluar') ?>" class="nav-link <?= ($currentURL === 'transaksi_keluar') ? 'bg-gradient-primary active' : ''; ?>">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Kelola Barang Keluar
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($session->get('role') == 'kepala_gudang') { ?>
                    <li class="nav-header">STOCK OPNAME</li>
                    <li class="nav-item">
                        <a href="<?= base_url('stock_opname') ?>" class="nav-link <?= (service('request')->uri->getPath() == 'stock_opname') ? 'bg-gradient-primary active' : ''; ?>">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Kelola Stok Opname
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="<?= base_url('laporan') ?>" class="nav-link <?= (service('request')->uri->getPath() == 'laporan') ? 'bg-gradient-primary active' : ''; ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>