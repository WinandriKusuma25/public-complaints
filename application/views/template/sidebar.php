<!-- <style>
nav-treeview:hover {
    color: #28a745;
}
</style> -->
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<?php
if (
$this->session->userdata('level') != 'admin'
) {
redirect('/user/home');
}
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url().'admin/home' ?>" class="nav-link">Home</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>
            <div class="text-muted">Halo, <?php echo 
                  $this->session->userdata('nama');
                         ?></div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                    <a class="nav-link" data-slide="true" href="" <?php echo base_url().'auth/logout';?> role="button"
                        data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-in-alt "></i>

                    </a>

                </li>

            </ul>



        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class=" main-sidebar sidebar-light-gray elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url().'admin/home' ?>" class="brand-link">
                <img src="<?php echo base_url().'assets/img/logo.png' ?>" alt="AdminLTE Logo"
                    class="brand-image img-circle ">
                <span class="brand-text font-weight-light">Pengaduan </span>
            </a>


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item ">
                            <a href="<?php echo base_url().'admin/home' ?>"
                                class="nav-link  <?= activate_menu('home') ?>" id="navHome">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>





                        <li class="nav-item ">
                            <a href="<?php echo base_url().'admin/user' ?>"
                                class="nav-link  <?= activate_menu('user') ?>" id="navUser">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pengguna
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url().'admin/kategori' ?>"
                                class="nav-link  <?= activate_menu('kategori') ?>" id="navUser">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="<?php echo base_url().'admin/pengaduan' ?>"
                                class="nav-link  <?= activate_menu('pengaduan') ?>" id="navHome">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>
                                    Daftar Pengaduan
                                </p>
                            </a>
                        </li>






                        <li class="nav-item">
                            <a href="<?php echo base_url().'auth/logout';?>" class="nav-link" id="navHome"
                                data-toggle="modal" data-target="#logoutModal">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Keluar
                                </p>
                            </a>
                        </li>



                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
</body>



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin untuk keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "<b>Keluar</b>" apabila Anda ingin keluar</div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>