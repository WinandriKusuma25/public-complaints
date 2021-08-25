<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="<?php echo base_url().'assets/img/logo.png';?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan Masyarakat | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?= $this->session->flashdata('message'); ?>
        <div class="login-logo">
            <center><img src="<?php echo base_url().'assets/img/logo.png' ?>" alt="AdminLTE Logo" width="50px">
            </center>
            <p>
            <h5><a href="../../index2.html"><b>Pengaduan</b>&nbsp;Masyarakat</a></h5>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Masuk Akun Anda</p>
                <form class="user" method="post" action="<?= base_url('auth'); ?>">

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="NIK" id="nik" name="nik"
                            value="<?= set_value('nik') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <?= form_error('nik', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password"
                            name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-2">
                        <?= form_error('password', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </button>

                </form>
                <!-- /.social-auth-links -->
                <hr>
                <p class="mb-0">

                    <a href="<?= base_url('auth/registrasi'); ?>" class="text-center">Registrasi akun baru</a>
                    <br>
                    <a href="<?= base_url('home'); ?>" class="text-center">Kembali ke beranda</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>