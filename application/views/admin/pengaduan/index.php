<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pengaduan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="<?php echo base_url("admin/pengaduan"); ?>">Pengaduan</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?= $this->session->flashdata('message'); ?>
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card  card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"> <i class="nav-icon fas fa-bullhorn"></i>&nbsp;&nbsp;Berikut
                                    merupakan
                                    data
                                    pengaduan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body  shadow-sm">
                                <table id="tabel1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Tgl.Pengaduan</th>
                                            <th>Status</th>
                                            <th>Tanggapan</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($pengaduan as $u) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $u->nama ?></td>
                                            <td><?= $u->nik ?></td>
                                            <td><?= $u->nama_kategori ?></td>
                                            <td><?= $u->judul ?></td>
                                            <td><?=  date('d-m-Y H:i:s', strtotime($u->created_at)); ?></td>
                                            <?php if ($u->status == 'disetujui') :  ?>
                                            <td class="project-state">
                                                <span class="badge badge-success"><?= $u->status ?></span>
                                            </td>
                                            <?php elseif ($u->status == 'diajukan') :  ?>
                                            <td class="project-state">
                                                <span class="badge badge-warning"><?= $u->status ?></span>
                                            </td>

                                            <?php else : ?>
                                            <td class="project-state">
                                                <span class="badge badge-danger"><?= $u->status ?></span>
                                            </td>
                                            <?php endif ?>



                                            <?php if ($u->tanggapan == null) :  ?>
                                            <td class="project-state">
                                                <span class="badge badge-info">Belum ada tanggapan</span>
                                            </td>
                                            <?php else : ?>
                                            <td class="project-state">
                                                <?= $u->tanggapan ?>
                                            </td>
                                            <?php endif ?>

                                            <td>

                                                <a class="btn btn-primary   btn-circle btn-sm" data-toggle="modal"
                                                    data-target="#detailmodal<?=$u->id_pengaduan?>"><i
                                                        class="fas fa-eye" aria-hidden="true"></i></a>

                                                <a class="btn btn-warning   btn-circle btn-sm" data-toggle="modal"
                                                    data-target="#editmodal<?=$u->id_pengaduan?>"><i class="fas fa-edit"
                                                        aria-hidden="true"></i></a>

                                                <a href="#modalDelete" data-toggle="modal"
                                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/pengaduan/hapus/' . $u->id_pengaduan) ?>')"
                                                    class='btn btn-danger btn-sm'>
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>


                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Tgl.Pengaduan</th>
                                            <th>Status</th>
                                            <th>Tanggapan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('admin/pengaduan/laporan_pdf') ?>"
                                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                        class="fa fa-file-pdf"></i>
                                    Unduh PDF</a>
                            </div>
                            <!-- /.card-body -->


                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<?php $no=0; foreach($pengaduan as $u): $no++; ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="detailmodal<?=$u->id_pengaduan?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i
                        class="nav-icon fas fa-bullhorn"></i>&nbsp;&nbsp;Detail
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



<!-- Modal -->
<?php $no=0; foreach($pengaduan as $u): $no++; ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="editmodal<?=$u->id_pengaduan?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fas fa-edit"></i>&nbsp;&nbsp;Edit
                    pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/pengaduan/edit') ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" id="id_pengaduan" name="id_pengaduan" value="<?= $u->id_pengaduan; ?>">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="text">Nama Pengirim</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $u->nama; ?>"
                                    required readonly>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="text">Tgl.Pengaduan</label>
                                <input type="text" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan"
                                    value="<?= $u->created_at; ?>" required readonly>
                                <?= form_error('tgl_pengaduan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <?php if ($u->updated_at == null) :  ?>
                            <div class="form-group">
                                <label><b>Terakhir di edit</b> </label>
                                <input type="text" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan"
                                    value="Belum pernah di edit" required readonly>
                            </div>
                            <?php else : ?>
                            <div class="form-group">
                                <label> <b>Terakhir di edit</b> </label>
                                <input type="text" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan"
                                    value="<?= $u->updated_at; ?>" required readonly>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="text">Status</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="<?= $u->status; ?>" required readonly>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>


                    <?php if ($u->tanggapan == null) :  ?>
                    <div class="form-group">
                        <label><b>Tanggapan</b> </label>
                        <input type="text" class="form-control" id="tanggapan" name="tanggapan"
                            value="Belum disetujui tanggapan" required readonly>
                    </div>
                    <?php else : ?>
                    <div class="form-group">
                        <label> <b>Tanggapan</b> </label>
                        <input type="text" class="form-control" id="tanggapan" name="tanggapan"
                            value="<?= $u->tanggapan; ?>" required readonly>
                    </div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col-6">
                            <div class=" form-group">
                                <label class="" for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="id_kategori" name="id_kategori" readonly
                                    value="<?= $u->nama_kategori; ?>" required>
                                <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                        </div>

                        <div class="col-6">

                            <div class="form-group">
                                <label for="text">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" readonly
                                    value="<?= $u->judul; ?>" required>
                                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class=" form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="50" rows="" readonly
                                    class="form-control"><?= $u->keterangan; ?></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="image">Foto Bukti</label>
                            <br>
                            <img src="<?= base_url('assets/bukti/') . $u->bukti ?>" class="img-thumbnail" width="50%">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <?php if ($u->status == "disetujui") : ?>
                                <div class=" form-check">
                                    <input type="radio" name="status" value="disetujui" checked> Disetujui
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="diajukan"> Diajukan
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="ditolak"> Ditolak
                                </div>


                                <?php elseif ($u->status == "diajukan") : ?>
                                <div class=" form-check">
                                    <input type="radio" name="status" value="disetujui"> Disetujui
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="diajukan" checked> Diajukan
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="ditolak"> Ditolak
                                </div>


                                <?php else : ?>
                                <div class="form-check">
                                    <input type="radio" name="status" value="disetujui"> Disetujui
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="diajukan"> Diajukan
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="status" value="ditolak" checked> Ditolak
                                </div>
                                <?php endif ?>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class=" form-group">
                                <label for="tanggapan"> Beri Tanggapan</label>
                                <textarea name="tanggapan" id="tanggapan" cols="50" rows=""
                                    class="form-control"><?= $u->tanggapan; ?></textarea>
                                <?= form_error('tanggapan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>

                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
                </form>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>