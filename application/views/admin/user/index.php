  <!-- Content Wrapper. Contains page content -->

  <body class="hold-transition sidebar-mini">
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Pengguna</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <a href="<?php echo base_url("admin/user"); ?>">Pengguna</a>
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
                                  <h3 class="card-title"> <i class="nav-icon fas fa-users"></i>&nbsp;&nbsp;Berikut
                                      merupakan
                                      data
                                      pengguna</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body  shadow-sm">
                                  <a class='btn btn-primary' href="user/tambah">
                                      <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                      <span>
                                          Tambah
                                      </span>
                                  </a>
                                  <p>

                                  <table id="tabel1" class="table table-striped table-bordered" style="width:100%">
                                      <thead>
                                          <tr>
                                              <th>No.</th>
                                              <th>Nama</th>
                                              <th>NIK</th>
                                              <th>Status</th>
                                              <th>Level</th>
                                              <th>Tgl.Pembuatan</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $no = 1; foreach ($user as $u) : ?>
                                          <tr>
                                              <td><?= $no++ ?></td>
                                              <td><?= $u->nama ?></td>
                                              <td><?= $u->nik ?></td>
                                              <?php if ($u->status == 1) : ?>
                                              <td class="project-state">
                                                  <span class="badge badge-success">Aktif</span>
                                              </td>
                                              <?php else : ?>
                                              <td class="project-state">
                                                  <span class="badge badge-danger">Tidak Aktif</span>
                                              </td>
                                              <?php endif ?>
                                              <td><?= $u->level ?></td>
                                              <td>
                                                  <?=  date('d-m-Y H:i:s', strtotime($u->created_at)); ?></td>
                                              </td>
                                              <td>

                                                  <a class="btn btn-warning   btn-circle btn-sm" data-toggle="modal"
                                                      data-target="#editmodal<?=$u->id_user?>"><i class="fas fa-edit"
                                                          aria-hidden="true"></i></a>

                                                  <a href="<?= base_url('admin/user/toggle/') . $u->id_user ?> "
                                                      class="btn btn-circle btn-sm <?= $u->status ? 'btn-secondary' : 'btn-success' ?>"
                                                      title="<?= $u->status ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i
                                                          class="fa fa-fw fa-power-off"></i></a>

                                                  <a class="btn btn-primary   btn-circle btn-sm" data-toggle="modal"
                                                      data-target="#detailmodal<?=$u->id_user?>"><i class="fas fa-eye"
                                                          aria-hidden="true"></i></a>

                                                  <a href="#modalDelete" data-toggle="modal"
                                                      onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/user/hapus/' . $u->id_user) ?>')"
                                                      class='btn btn-danger btn-circle btn-sm'>
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
                                              <th>Status</th>
                                              <th>Level</th>
                                              <th>Tgl.Pembuatan</th>
                                              <th>Aksi</th>
                                          </tr>
                                          </tr>
                                      </tfoot>
                                      </tbody>
                                  </table>
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
  <?php $no=0; foreach($user as $u): $no++; ?>
  <div class="modal fade" id="detailmodal<?=$u->id_user?>">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fas fa-users"></i>&nbsp;&nbsp;Detail
                      Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <b>Nama</b> : <?= $u->nama ?>
                  <hr>
                  <b>NIK</b> : <?= $u->nik ?>
                  <hr>
                  <b>No.telp</b> : <?= $u->no_telp ?>
                  <hr>
                  <b>Alamat</b> : <?= $u->alamat ?>
                  <hr>
                  <?php if ($u->status == 1) : ?>
                  <td class="project-state">
                      <b>Status</b> : <span class="badge badge-success">Aktif</span>
                  </td>
                  <?php else : ?>
                  <td class="project-state">
                      <b>Status</b> : <span class="badge badge-danger">Tidak Aktif</span>
                  </td>
                  <?php endif ?>
                  <hr>
                  <b>Level</b> : <?= $u->level ?>
                  <hr>
                  <b>Tgl.Pembuatan </b> : <?=  date('d-m-Y H:i:s', strtotime($u->created_at)); ?></td>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
              </div>
          </div>
      </div>
  </div>
  <?php endforeach; ?>

  <!-- Modal -->
  <?php $no=0; foreach($user as $u): $no++; ?>
  <div class="modal fade" id="editmodal<?=$u->id_user?>">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fas fa-edit"></i>&nbsp;&nbsp;Edit
                      Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?php echo site_url('admin/user/edit') ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" id="id_user" name="id_user" value="<?= $u->id_user; ?>">

                      <div class="form-group">
                          <label for="text">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="<?= $u->nama; ?>"
                              required>
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                          <label for="">NIK</label>
                          <input type="number" class="form-control" id="nik" name="nik" value="<?= $u->nik; ?>"
                              required>
                          <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>


                      <div class="form-group">
                          <label for="">No. Telp</label>
                          <input type="number" class="form-control" id="no_telp" name="no_telp"
                              value="<?= $u->no_telp; ?>" required>
                          <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>


                      <div class=" form-group">
                          <label for="alamat">Alamat</label>
                          <textarea name="alamat" id="alamat" cols="50" rows="" class="form-control"
                              required><?= $u->alamat; ?></textarea>
                          <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                          <label for="nim">level</label>
                          <?php if ($u->level == "admin") : ?>
                          <div class="form-check">
                              <input type="radio" name="level" value="admin" checked> Admin
                          </div>
                          <div class="form-check">
                              <input type="radio" name="level" value="pengunjung"> pengunjung
                          </div>
                          <?php else : ?>
                          <div class="form-check">
                              <input type="radio" name="level" value="admin"> Admin
                          </div>
                          <div class="form-check">
                              <input type="radio" name="level" value="pengunjung" checked> Pengunjung
                          </div>
                          <?php endif ?>
                          <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
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