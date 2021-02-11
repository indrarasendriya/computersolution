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
                  <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target=".tambah">Tambah Data Aturan</a>
                </div>
              </div>
              <table id="example1" class="table table-striped table-bordered">
                <thead class="text-center" style="vertical-align: middle;">
                  <tr>
                    <th style="width: 3px; text-align: center;vertical-align: middle;">No</th>
                    <th style="width:100px;text-align: center;vertical-align: middle;">Nama Kerusakan</th>
                    <th style="width: 225px; text-align: center;vertical-align: middle;">Nama Gejala</th>
                    <th style="width: 225px; text-align: center;vertical-align: middle;">Bobot Aturan</th>
                    <th style="width: 225px; text-align: center;vertical-align: middle;">Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($aturan as $rule) : ?>
                    <tr>
                      <td style="text-align: center"><?= $i++; ?></td>
                      <td style="text-align: center"><?= $rule['nama_kerusakan']; ?></td>
                      <td style="text-align: left"><?= $rule['nama_gejala']; ?></td>
                      <td style="text-align: center"><?= $rule['nilai_kemunculan']; ?></td>
                      <td style="text-align: center;">
                        <a href="<?= base_url('aturan/hapus/') . $rule['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data akan dihapus');">Hapus</a>
                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahAturan<?= $rule['id']; ?>">Ubah</a>
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

<!-- tambah data aturan kerusakan -->
<div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aturan Kerusakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('aturan'); ?>" method="post">
          <!-- <input type="hidden" name="id" id="id"> -->
          <div class="form-group">
            <label for="kode">Nama Kerusakan</label>
            <select name="kerusakan" id="kerusakan" class="form-control">
              <option value="">Pilih Kerusakan</option>
              <?php foreach ($kerusakan as $K) : ?>
                <option value="<?= $K['id_kerusakan']; ?>"><?= $K['kode_kerusakan']; ?> - <?= $K['nama_kerusakan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="nama">Nama Gejala</label>
              <select name="gejala" id="gejala" class="form-control">
                <option value="">Pilih Gejala</option>
                <?php foreach ($gejala as $G) : ?>
                  <option value="<?= $G['id_gejala']; ?>"><?= $G['kode_gejala']; ?> - <?= $G['nama_gejala']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="nama">Bobot Aturan</label>
              <input type="text" class="form-control" id="nama" name="bobot">
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

<!-- ubah data aturan kerusakan -->
<?php foreach ($aturan as $uA) : ?>
  <div class="modal fade" id="ubahAturan<?= $uA['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Data Aturan Kerusakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('aturan/ubah/' . $uA['id']); ?>" method="post">
            <!-- <input type="hidden" name="id" id="id"> -->
            <div class="form-group">
              <div class="form-group">
                <label for="nama">Nama Kerusakan</label>
                <select name="kerusakan" id="kerusakan" class="form-control">
                  <option value="<?= $uA['id_kerusakan']; ?>" selected><?= $uA['kode_kerusakan']; ?> - <?= $uA['nama_kerusakan']; ?></option>
                  <?php foreach ($kerusakan as $k) : ?>
                    <option value="<?= $k['id_kerusakan']; ?>"><?= $k['kode_kerusakan']; ?>-<?= $k['nama_kerusakan']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="nama">Nama Gejala</label>
                  <select name="gejala" id="gejala" class="form-control">
                    <option value="<?= $uA['id_gejala']; ?>" selected><?= $uA['nama_gejala']; ?> - <?= $uA['nama_kerusakan']; ?></option>
                    <?php foreach ($gejala as $G) : ?>
                      <option value="<?= $G['id_gejala']; ?>"><?= $G['kode_gejala']; ?> - <?= $G['nama_gejala']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="nama">Bobot Kerusakan</label>
                  <input type="text" class="form-control" id="nama" name="bobot" value="<?= $uA['nilai_kemunculan']; ?>">
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
  </div>

<?php endforeach; ?>