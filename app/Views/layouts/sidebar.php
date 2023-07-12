 <!-- UNTUK MENENTUKAN POSISI URL SEKARANG -->
 <?php $uri = service('uri'); ?>


 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="" class="brand-link">
         <img src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Hanna Caffe</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header">DASHBOARD</li>
                 <li class="nav-item">
                     <a href="<?= base_url('dashboard') ?>" class="nav-link  <?php if (strtolower($uri->getPath()) == 'dashboard') echo 'bg-gradient-primary active' ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>


                 <li class="nav-header">MASTER DATA</li>
                 <li class="nav-item">
                     <a href="<?= base_url('users') ?>" class="nav-link <?php if (strtolower($uri->getPath()) == 'users') echo 'bg-gradient-primary active' ?>">
                         <i class="nav-icon fas fa-duotone fa-users"></i>
                         <p>
                             Kelola User
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('barang') ?>" class="nav-link <?php if (strtolower($uri->getPath()) == 'barang') echo 'bg-gradient-primary active' ?>">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Kelola Barang
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('katagori_barang') ?>" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Kelola Katagori Barang
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('barang_masuk') ?>" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Kelola Barang Masuk
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('barang_keluar') ?>" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Kelola Barang Keluar
                         </p>
                     </a>
                 </li>


                 <li class="nav-header">STOCK OF NAME</li>
                 <li class="nav-item">
                     <a href="<?= base_url('stok_opname') ?>" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Kelola Stok Opname
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('jadwal_stok_opname') ?>" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Kelola Jadwal Stok Opname
                         </p>
                     </a>
                 </li>


                 <li class="nav-header">LAPORAN</li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan') ?>" class="nav-link">
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