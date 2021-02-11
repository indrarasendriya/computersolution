        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark"><?= $tabel; ?></h1>
                </div>
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h5 class="m-0"><?= $tabel; ?></h5>
                    </div>
                    <div class="card-body">

                      <?= $this->session->flashdata('pesan'); ?>
                      <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <b><?= validation_errors(); ?></b>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php endif; ?>
                      <div class="row mt-3">
                        <div class="col-md-6">
                          <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target=".tambah">Tambah Data Kerusakan</a>
                        </div>
                      </div>
                      <table id="example1" class="table table-striped table-bordered">
                        <thead class="text-center" style="vertical-align: middle;">
                          <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 10px">Kode Kerusakan</th>
                            <th style="width: 10px">Nama Kerusakan</th>
                            <th style="width: 30px">Solusi</th>
                            <th style="width: 10px">Probabilitas</th>
                            <th style="width: 10px">Gambar</th>
                            <th style="width: 150px">Kelola</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $i = 1;
                          foreach ($tbl_kerusakan as $rusak) : ?>
                            <tr>
                              <td style="text-align: center"><?= $i++; ?></td>
                              <td style="text-align: center"><?= $rusak['kode_kerusakan']; ?></td>
                              <td><?= $rusak['nama_kerusakan']; ?></td>
                              <td><?= $rusak['solusi']; ?></td>
                              <td style="text-align: center"><?= $rusak['probabilitas_kerusakan']; ?></td>
                              <td><img src="<?= base_url('assets/images/kerusakan/') . $rusak['gambar']; ?>" width="150"></td>
                              <td style="text-align: center;">
                                <a href="<?= base_url('kerusakan/hapus/') . $rusak['id_kerusakan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data akan dihapus');">Hapus</a>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahKerusakan<?= $rusak['id_kerusakan']; ?>">Ubah</a>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- tambah data kerusakan -->
        <div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?= form_open_multipart('kerusakan'); ?>
              <div class="modal-body">
                <!-- <input type="hidden" name="id" id="id"> -->
                <div class="form-group">
                  <label for="kode">Kode Kerusakan</label>
                  <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="nama">Nama Kerusakan</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="nama">Solusi Kerusakan</label>
                    <br>
                    <textarea class="form-control" name="solusi" id="" cols="106" rows="5"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="nama">Probabilitas</label>
                    <input type="text" class="form-control" id="nama" name="probabilitas">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="nama">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar Hardware">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>

              </div>
            </div>
          </div>
        </div>

        <!-- ubah data kerusakan -->
        <?php foreach ($tbl_kerusakan as $uk) : ?>
          <div class="modal fade" id="ubahKerusakan<?= $uk['id_kerusakan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kerusakan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?= form_open_multipart('kerusakan/tambah'); ?>
                <div class="modal-body">
                  <form action="<?= base_url('kerusakan/ubah/' . $uk['id_kerusakan']); ?>" method="post">
                    <!-- <input type="hidden" name="id" id="id"> -->
                    <div class="form-group">
                      <label for="kode">Kode Kerusakan</label>
                      <input type="text" class="form-control" id="kode" name="kode" value="<?= $uk['kode_kerusakan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="nama">Nama Kerusakan</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $uk['nama_kerusakan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="nama">Solusi Kerusakan</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $uk['solusi']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="nama">Probabilitas</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $uk['probabilitas_kerusakan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="nama">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar Hardware">
                      </div>
                    </div>
                    <div class=" modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>