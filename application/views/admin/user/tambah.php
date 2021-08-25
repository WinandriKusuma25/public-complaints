  <!-- Content Wrapper. Contains page content -->
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
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                          <li class="breadcrumb-item active">Tambah</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- jquery validation -->
                      <div class="card card-primary card-outline">
                          <div class="card-header">
                              <h3 class="card-title"><i class="nav-icon fas fa-users"></i>&nbsp;&nbsp;Tambah Data
                                  Pengguna</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form method="post" action="<?= base_url('admin/user/tambah'); ?>">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="">Nama</label>
                                      <input type="text" name="nama" class="form-control" id="nama"
                                          placeholder="Masukkan Nama" value="<?= set_value('nama') ?>">
                                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>
                                  <div class=" row">
                                      <div class="col-6">

                                          <div class="form-group">
                                              <label for="">NIK</label>
                                              <input type="number" name="nik" class="form-control" id="nik"
                                                  placeholder="Masukkan NIK" value="<?= set_value('nik') ?>">
                                              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                      </div>

                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">No. Telp</label>
                                              <input type="number" name="no_telp" class="form-control" id="no_telp"
                                                  placeholder="Masukkan No. Telp" value="<?= set_value('no_telp') ?>">
                                              <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Password</label>
                                              <input type="password" name="password1" class="form-control"
                                                  id="password1" placeholder="Masukkan Password">
                                              <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>

                                      </div>

                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Konfirmasi Password</label>
                                              <input type="password" name="password2" class="form-control"
                                                  id="password2" placeholder="Masukkan Password">
                                              <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                      </div>


                                  </div>
                                  <div class="row">
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Status</label>
                                              <div class="form-check">
                                                  <input type="radio" name="status" value="aktif"> Aktif
                                              </div>
                                              <div class="form-check">
                                                  <input type="radio" name="status" value="pasif"> Pasif
                                              </div>
                                              <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                      </div>

                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Level</label>
                                              <div class="form-check">
                                                  <input type="radio" name="level" value="admin"> Admin
                                              </div>
                                              <div class="form-check">
                                                  <input type="radio" name="level" value="pengunjung">
                                                  Pengunjung
                                              </div>
                                              <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="col-6">
                                      <div class="form-group">
                                          <label for="">Alamat</label>
                                          <textarea name="alamat" id="alamat" cols="50" rows="" class="form-control"
                                              placeholder="Masukkan Alamat"
                                              value="<?= set_value('alamat') ?>"></textarea>
                                          <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                      </div>
                                  </div>



                              </div>
                              <!-- /.card-body -->
                              <div class=" card-footer">
                                  <button type="submit" class="btn btn-primary"><i
                                          class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                  <a href="<?=base_url("Admin/user");?>" class="btn btn-primary">Kembali</a>
                              </div>
                          </form>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
  </div>