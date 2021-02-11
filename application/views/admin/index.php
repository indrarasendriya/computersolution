<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Selamat datang, <?= $user['nama_user'] ?></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>
                <div class="count"><?= $totalGejala; ?></div>
              </h3>

              <p>Gejala</p>
            </div>
            <div class="icon">
              <i class="fas fa-disease"></i>
            </div>
            <a href="<?= base_url('gejala'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <div class="count"><?= $totalKerusakan; ?></div>
              </h3>


              <p>Kerusakan</p>
            </div>
            <div class="icon">
              <i class="fas fa-laptop-house"></i>
            </div>
            <a href="<?= base_url('kerusakan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <div class="count"><?= $totalAturan; ?></div>
              </h3>


              <p>Aturan</p>
            </div>
            <div class="icon">
              <i class="fas fa-laptop-medical"></i>
            </div>
            <a href="<?= base_url('aturan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <div class="count"><?= $totalLaporan; ?></div>
              </h3>

              <p>Rekap Pengguna</p>
            </div>
            <div class="icon">
              <i class="fas fas fa-headset"></i>
            </div>
            <a href="<?= base_url('laporan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>