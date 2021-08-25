<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="<?php echo base_url().'assets/img/logo.png';?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan Masyarakat | Regisrasi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="login-logo">
            <center><img src="<?php echo base_url().'assets/img/logo.png' ?>" alt="AdminLTE Logo" width="50px">
            </center>
            <p>
            <h5><a href="../../index2.html"><b>Pengaduan</b>&nbsp;Masyarakat</a></h5>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrasi Akun Baru</p>

                <form method="post" action="<?= base_url('auth/registrasi'); ?>">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama"
                            value="<?= set_value('nama') ?>">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <?= form_error('nama', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik"
                            value="<?= set_value('nik') ?>">
                        <div class=" input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <?= form_error('nik', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="No. Telp" name="no_telp" id="no_telp"
                            value="<?= set_value('no_telp') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <?= form_error('no_telp', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat"
                            value="<?= set_value('alamat') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-book"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <?= form_error('alamat', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password1"
                            id="password1">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-2">
                        <?= form_error('password1', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Konfirmasi password" name="password2"
                            id="password2">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-2">
                        <?= form_error('password2', '<small class="text-danger mb-2 ml-2">', '</small>'); ?>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-block"><i
                                class="fas fa-registered"></i>&nbsp;Register</button>

                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <a href="<?= base_url('auth'); ?>" class="text-center">Saya sudah mempunyai akun</a>
                <br>
                <a href="<?= base_url('home'); ?>" class="text-center">Kembali ke beranda</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</body>

</html>