  <!-- Content Wrapper. Contains page content -->

  <body class="hold-transition sidebar-mini">
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1>Kategori</h1>
                      </div>
                      <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <a href="<?php echo base_url("admin/kategori"); ?>">Kategori</a>
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
                                  <h3 class="card-title"> <i class="nav-icon fas fa-kategoris"></i>&nbsp;&nbsp;Berikut
                                      merupakan
                                      data
                                      kategori</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body  shadow-sm">
                                  <a class='btn btn-primary' href="kategori/tambah">
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
                                              <th>Nama Kategori</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $no = 1; foreach ($kategori as $u) : ?>
                                          <tr>
                                              <td><?= $no++ ?></td>
                                              <td><?= $u->nama_kategori ?></td>
                                              <td>

                                                  <a class="btn btn-warning   btn-circle btn-sm" data-toggle="modal"
                                                      data-target="#editmodal<?=$u->id_kategori?>"><i
                                                          class="fas fa-edit" aria-hidden="true"></i></a>

                                                  <a href="#modalDelete" data-toggle="modal"
                                                      onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/kategori/hapus/' . $u->id_kategori) ?>')"
                                                      class='btn btn-danger btn-circle btn-sm'>
                                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                                  </a>
                                              </td>
                                          </tr>
                                          <?php endforeach ?>
                                      <tfoot>
                                          <tr>
                                              <th>No.</th>
                                              <th>Nama Kategori</th>
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
  <?php $no=0; foreach($kategori as $u): $no++; ?>
  <div class="modal fade" id="editmodal<?=$u->id_kategori?>">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fas fa-edit"></i>&nbsp;&nbsp;Edit
                      Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?php echo site_url('admin/kategori/edit') ?>" method="post"
                      enctype="multipart/form-data">
                      <input type="hidden" id="id_kategori" name="id_kategori" value="<?= $u->id_kategori; ?>">

                      <div class="form-group">
                          <label for="text">Nama Kategori</label>
                          <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                              value="<?= $u->nama_kategori; ?>" required>
                          <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
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