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
                          <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target=".tambah">Tambah Data Gejala</a>
                        </div>
                      </div>
                      <table id="example1" class="table table-striped table-bordered">
                        <thead class="text-center" style="vertical-align: middle;">
                          <tr>
                            <th style="width: 3px; text-align: center;vertical-align: middle;">No</th>
                            <th style="width: 40px; text-align: center;vertical-align: middle;">Kode Gejala</th>
                            <th style="text-align: center;vertical-align: middle;">Nama Gejala</th>
                            <th style="width: 225px; text-align: center;vertical-align: middle;">Kelola</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $i = 1;
                          foreach ($gejala as $gjl) : ?>
                            <tr>
                              <td style="text-align: center"><?= $i++; ?></td>
                              <td style="text-align: center"><?= $gjl['kode_gejala']; ?></td>
                              <td><?= $gjl['nama_gejala']; ?></td>
                              <td style="text-align: center;">
                                <a href="<?= base_url('gejala/hapus/') . $gjl['id_gejala']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data akan dihapus');">Hapus</a>
                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahGejala<?= $gjl['id_gejala']; ?>">Ubah</a>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>

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

        <!-- tambah data gejala -->
        <div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= base_url('gejala'); ?>" method="post">
                  <!-- <input type="hidden" name="id" id="id"> -->
                  <div class="form-group">
                    <label for="kode">Kode Gejala</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                      <label for="nama">Nama Gejala</label>
                      <input type="text" class="form-control" id="nama" name="nama">
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

        <!-- ubah data gejala -->
        <?php foreach ($gejala as $ug) : ?>
          <div class="modal fade" id="ubahGejala<?= $ug['id_gejala']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Gejala</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url('gejala/ubah/' . $ug['id_gejala']); ?>" method="post">
                    <!-- <input type="hidden" name="id" id="id"> -->
                    <div class="form-group">
                      <label for="kode">Kode Gejala</label>
                      <input type="text" class="form-control" id="kode" name="kode" value="<?= $ug['kode_gejala']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <div class="form-group">
                        <label for="nama">Nama Gejala</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $ug['nama_gejala']; ?>">
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