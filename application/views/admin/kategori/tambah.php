  <!-- Content Wrapper. Contains page content -->
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

                          <a href="<?php echo base_url("admin/kategori/tambah"); ?>">Tambah</a>
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
                              <h3 class="card-title"><i class="nav-icon fas fa-list"></i>&nbsp;&nbsp;Tambah Data
                                  Kategori
                              </h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form method="post" action="<?= base_url('admin/kategori/tambah'); ?>">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="">Nama Kategori</label>
                                      <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                          placeholder="Masukkan nama kategori"
                                          value="<?= set_value('nama_kategori') ?>">
                                      <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                  </div>

                              </div>
                              <!-- /.card-body -->
                              <div class=" card-footer">
                                  <button type="submit" class="btn btn-primary"><i
                                          class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                  <a href="<?=base_url("admin/kategori");?>" class="btn btn-primary">Kembali</a>
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