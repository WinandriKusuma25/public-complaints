<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?php echo base_url("admin/home"); ?>">Dashboard</a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="callout callout-info">
                <div class="row">
                    <div class="col-6">
                        <h5><i class="fas fa-primary"></i>&nbsp;Selamat Datang</h5>
                        Mempermudah <b>komunikasi</b>, menampung <b>saran</b>, <b>pendapat</b>, dan <b>suara</b>
                        dari
                        masyarakat sekitar.
                    </div>
                    <div class="col-6">
                        <img src="<?php echo base_url().'assets/img/background.svg' ?>" width="150px">
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3> <?php echo $this->db->get_where('user', array('level' => 'admin'))->num_rows() ?></h3>
                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo base_url("admin/user"); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3> <?php echo $this->db->get_where('user', array('level' => 'pengunjung'))->num_rows() ?>
                            </h3>

                            <p>Pengunjung</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url("admin/user"); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $this->db->get('kategori')->num_rows() ?></h3>

                            <p>Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url("admin/kategori"); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $this->db->get('pengaduan')->num_rows() ?></h3>

                            <p>Pengaduan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url("admin/pengaduan"); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->



            <!-- Pie Chart -->

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Rekap Pengaduan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor"
                            style="display: block; width: 302px; height: 245px;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Pengaduan Disetujui
                        </span>
                        <span class="mr-2">

                            <i class="fas fa-circle text-warning"></i> Pengaduan Diajukan
                        </span>
                        <br>
                        <span class="mr-2">

                            <i class="fas fa-circle text-danger"></i> Pengaduan Ditolak
                        </span>
                    </div>
                </div>
            </div>




            <!-- Main content -->


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">

                            <div class="card">

                                <div class="d-flex justify-content-between">

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
</div>


<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<script>
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Pengaduan Diajukan", "Pengaduan Ditolak", "Pengaduan Disetujui"],
        datasets: [{
            data: [
                <?php echo $this->db->get_where('pengaduan', array('status' => 'diajukan'))->num_rows() ?>,
                <?php echo $this->db->get_where('pengaduan', array('status' => 'ditolak'))->num_rows() ?>,
                <?php echo $this->db->get_where('pengaduan', array('status' => 'disetujui'))->num_rows() ?>
            ],
            backgroundColor: ['#f6c23e ', '#e74a3b ',
                '#1cc88a'
            ],
            hoverBackgroundColor: ['#5a5c69', '#5a5c69'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
</script>