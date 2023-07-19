<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <div class="col-4">
                <form method="post" action="<?= base_url('logout') ?>" onsubmit="return confirm('Apakah yakin akan melakuakn logout?')">
                    <button type="submit" class="btn btn-danger"><a style="color: white;">Logout</a></button>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->