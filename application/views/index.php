<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pengaduan Masyarakat | Beranda </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="icon" href="<?php echo base_url().'assets/img/logo.png';?>">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url().'assets/user/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/user/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url(). 'assets/user/vendor/ionicons/css/ionicons.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url(). 'assets/user/vendor/owl.carousel/assets/owl.carousel.min.css'?>"
        rel="stylesheet">
    <link href="<?php echo base_url(). 'assets/user/vendor/venobox/venobox.css'?>" rel="stylesheet">
    <link href="<?php echo base_url(). 'assets/user/vendor/aos/aos.css'?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(). 'assets/user/css/style.css'?>" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NewBiz - v2.2.1
  * Template URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container">

            <div class="logo float-left">
                <!-- Uncomment below if you prefer to use an text logo -->
                <!-- <h1><a href="index.html">NewBiz</a></h1> -->
                <a href="<?php echo base_url().'home' ?>"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
                <!-- <b>Pengaduan</b> Masyarakat -->
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?php echo base_url().'home' ?>">Beranda</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#services">Pengaduan</a></li>
                    <li><a href="<?php echo base_url().'auth' ?>">Login</a></li>
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->

    <!-- ======= Intro Section ======= -->
    <section id="intro" class="clearfix">
        <div class="container" data-aos="fade-up">

            <div class="intro-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="<?php echo base_url('assets/user/img/intro-img.svg') ?>" alt="" class="img-fluid">
            </div>

            <div class="intro-info" data-aos="zoom-in" data-aos-delay="100">
                <h2>Pengaduan<br><span>Masyarakat</span><br>Kec. Padangan</h2>
                <div>
                    <a href="<?php echo base_url().'auth' ?>" class="btn-get-started scrollto">Login</a>
                    <a href="<?php echo base_url().'auth/registrasi' ?>" class="btn-services scrollto">Register</a>
                </div>
            </div>

        </div>
    </section><!-- End Intro Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Tentang Kami</h3>
                    <p>Pengaduan Masyarakat merupakan layanan pengaduan untuk masyarakat Kecamatan Padangan.</p>
                </header>

                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        <p>
                            <b>Berikut merupakan tatacara melakukan pengaduan</b>
                        </p>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa fa-registered"></i></div>
                            <h4 class="title"><a href="">1. Melakukan Registrasi </a></h4>
                            <p class="description">Dengan memasukkan bioddata diri yang valid untuk membuat akun,
                                setelah itu menunggu validasi dari Admin untuk mengaktivasi akun.</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"> <i class="fa fa-sign-in"></i></div>
                            <h4 class="title"><a href="">2. Melakukan Login</a></h4>
                            <p class="description">Memasukkan nik dan password yang terdaftar apabila sudah mempunyai
                                akun yang sudah di validasi oleh Admin.</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"> <i class="fa fa-bullhorn"></i></div>
                            <h4 class="title"><a href="">3. Melakukan Pengaduan</a></h4>
                            <p class="description">Anda dapat menambahkan pengaduan yang akan di tanggapi oleh pihak
                                Admin.</p>
                        </div>

                    </div>

                    <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
                        <img src="<?php echo base_url('assets/user/img/about-img.svg')?>" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Daftar Pengaduan</h3>
                    <p>Berikut merupakan daftar pengaduan yang pernah di lakukan</p>
                </header>

                <div class="row justify-content-center">
                    <?php $no = 1; foreach ($pengaduan as $u) : ?>
                    <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <div class="icon"><i class="fa fa-bullhorn" style="color: #00428a"></i></div>
                            <h4 class="title"><a data-toggle="modal"
                                    data-target="#detailmodal<?=$u->id_pengaduan?>"><?= $u->judul ?></a></h4>
                            <p class="description">
                                <small><?=  date('d-m-Y H:i:s', strtotime($u->created_at)); ?></small>
                            </p>
                            <p class="description"><?= $u->keterangan ?></p>

                        </div>
                    </div>
                    <?php endforeach ?>


                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Pengaduan Masyarakat</strong>. All Rights Reserved
            </div>
            <div class="credits">


            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets/user/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/jquery.easing/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/counterup/counterup.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/owl.carousel/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/venobox/venobox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/user/vendor/aos/aos.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets/user/js/main.js') ?>"></script>

</body>


<!-- Modal -->
<?php $no=0; foreach($pengaduan as $u): $no++; ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="detailmodal<?=$u->id_pengaduan?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Detail
                    Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6">
                        <b>Nama pengirim</b> : <?= $u->nama ?>
                    </div>

                    <div class="col-6">
                        <b>Kategori</b> : <?= $u->nama_kategori ?>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <b>Judul</b> : <?= $u->judul ?>
                    </div>

                    <div class="col-6">

                        <?php if ($u->status == 'disetujui') :  ?>
                        <div class="project-state">
                            <b>Status</b> :
                            <span class="badge badge-success"><?= $u->status ?></span>
                        </div>
                        <?php elseif ($u->status == 'diajukan') :  ?>

                        <div class="project-state">
                            <b>Status</b> :
                            <span class="badge badge-warning"><?= $u->status ?></span>
                        </div>

                        <?php else : ?>
                        <div class="project-state">
                            <b>Status</b> :
                            <span class="badge badge-danger"><?= $u->status ?></span>
                        </div>
                        <?php endif ?>
                    </div>

                </div>

                <hr>
                <b>Keterangan</b> : <?= $u->keterangan ?>

                <hr>
                <div class="row">
                    <div class="col-6">
                        <b>Tgl.Pengaduan</b> : <?=  date('d-m-Y H:i:s', strtotime($u->created_at)); ?>
                    </div>

                    <div class="col-6">
                        <?php if ($u->updated_at == null) :  ?>
                        <div class="project-state">
                            <b>Terakhir di edit</b> : <span class="badge badge-info">Belum pernah di edit</span>
                        </div>
                        <?php else : ?>
                        <div class="project-state"> <b>Terakhir di edit</b> :
                            <?=  date('d-m-Y H:i:s', strtotime($u->updated_at)); ?>
                        </div>
                        <?php endif ?>
                    </div>

                </div>
                <hr>

                <b>Tanggapan</b> : <td><?= $u->tanggapan ?></td>
                <?php if ($u->tanggapan == null) :  ?>
                <td class="project-state">
                    <span class="badge badge-info">Belum ada tanggapan</span>
                </td>
                <?php else : ?>
                <td class="project-state">
                    <?= $u->tanggapan ?>
                </td>
                <?php endif ?>
                <hr>
                <b>Bukti</b> :


                <div class="row">

                    <div class="col-6">
                        <div class="img-magnifier-container">
                            <img id="myimage" src="<?= base_url('assets/bukti/') . $u->bukti ?>" alt="" width="100%">
                        </div>
                    </div>
                    <div class="col-6">


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</html>