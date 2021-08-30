  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Pengaduan</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <a href="<?php echo base_url("user/pengaduan/tambah"); ?>">Tambah</a>
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
                              <h3 class="card-title"><i class="nav-icon fas fa-bullhorn"></i>&nbsp;&nbsp;Tambah Data
                                  Pengaduan</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form method="post" action="<?= base_url('user/pengaduan/tambah'); ?>"
                              enctype="multipart/form-data">
                              <div class="card-body">

                                  <div class="row">
                                      <div class="col-6">
                                          <?php foreach ($user as $b) : ?>
                                          <div class="form-group">
                                              <label for="">Nama Pengirim</label>
                                              <input type="text" name="nama" class="form-control" id="nama" readonly
                                                  value="<?= $b->nama; ?>">
                                              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                          <?php endforeach ?>
                                      </div>

                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Tgl. Pengaduan</label>
                                              <input type="text" name="tgl_pengaduan" class="form-control"
                                                  id="tgl_pengaduan" readonly value="<?= date('d/m/Y') ?>">
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label class="" for="user">Kategori</label>
                                              <div class="input-group">
                                                  <select name="id_kategori" id="id_kategori" class="form-control">
                                                      <option value="" selected disabled>Pilih Kategori</option>

                                                      <?php foreach ($kategori as $p) : ?>
                                                      <option value="<?= $p->id_kategori?>"><?= $p->nama_kategori ?>
                                                      </option>
                                                      <?php endforeach ?>

                                                  </select>
                                              </div>
                                              <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?>
                                          </div>
                                      </div>

                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Judul</label>
                                              <input type="text" name="judul" class="form-control" id="judul"
                                                  placeholder="Masukkan Judul" value="<?= set_value('judul') ?>">
                                              <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Keterangan</label>
                                              <textarea name="keterangan" id="keterangan" cols="50" rows=""
                                                  class="form-control" placeholder="Masukkan keterangan"
                                                  value="<?= set_value('keterangan') ?>"></textarea>
                                              <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>

                                      </div>

                                      <div class="col-6">
                                          <div class="form-group">
                                              <label for="">Bukti</label>
                                          </div>
                                          <input type="file" name="bukti" class="form-control" id="bukti"
                                              placeholder="Masukkan bukti">
                                          <div class="text-danger"> <small>Format file jpg | jpeg | png</small>
                                              <?= form_error('bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                          </div>

                                      </div>


                                  </div>

                              </div>
                              <!-- /.card-body -->
                              <div class=" card-footer">
                                  <button type="submit" class="btn btn-primary"><i
                                          class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                  <a href="<?=base_url("user/pengaduan");?>" class="btn btn-primary">Kembali</a>
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