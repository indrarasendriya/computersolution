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
                      <div class="x_content">
                        <div class="row mt-3">

                        </div>
                      </div>
                      <table id="example1" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 3px; text-align: center;">No</th>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Kerusakan</th>
                            <th style="text-align: center;">Presentase Kerusakan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($laporan as $l) : ?>
                            <tr>
                              <td style="text-align: center"><?= $i; ?></td>
                              <td style="text-align: center"><?= date('d F Y', $l['waktu']); ?></td>
                              <td><?= $l['nama_user']; ?></td>
                              <td><?= $l['nama_kerusakan']; ?></td>
                              <td><?= $l['hasil_probabilitas_tertinggi']; ?></td>

                            </tr>
                            <?php $i++; ?>
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
              <?= form_open_multipart('kerusakan/tambah'); ?>
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
                    <input type="text" class="form-control" id="nama" name="solusi">
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