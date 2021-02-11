  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Computer Solution</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href=""><?= $user['nama_user'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php

      $url = $this->uri->segment(1);
      $suburl = $this->uri->segment(2);

      ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('admin'); ?>" class="nav-link <?= $url == "admin" ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('gejala'); ?>" class="nav-link <?= $url == "gejala" ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-disease"></i>
              <p>
                Gejala Kerusakan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kerusakan'); ?>" class="nav-link <?= $url == "kerusakan" ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-laptop-house"></i>
              <p>
                Diagnosa Kerusakan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('aturan'); ?>" class="nav-link <?= $url == "aturan" ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-laptop-medical"></i>
              <p>
                Aturan Kerusakan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('laporan'); ?>" class="nav-link <?= $url == "laporan" ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-headset"></i>
              <p>
                Rekap Hasil Konsultasi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>