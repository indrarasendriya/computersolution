<main id="main">

  <!--==========================
      About Section
    ============================-->
  <section id="about" class="wow fadeInUp">
    <div class="container">
      <div class="row">
        <?php foreach ($tertinggi as $tinggi) : ?>
          <div class="col-lg-6 about-img">
            <img src="<?= base_url('assets/images/kerusakan/' . $tinggi['gambar']); ?>">
          </div>

          <div class="col-lg-6 content">
            <h2>Halo, <?= $user['username'] ?></h2>
            <h3>Setelah sistem kami menganalisa data dari gejala-gejala kerusakan yang anda pilih, dapat disimpulkan komputer anda mengalami kerusakan :</h3>
            <?php
            if ($tinggi['id_kerusakan'] == 1) {
              $tinggi['id_kerusakan'] = 'PSU Bermasalah';
            } elseif ($tinggi['id_kerusakan'] == 2) {
              $tinggi['id_kerusakan'] = 'HDD Bermasalah';
            } elseif ($tinggi['id_kerusakan'] == 3) {
              $tinggi['id_kerusakan'] = 'Monitor Bermasalah';
            } elseif ($tinggi['id_kerusakan'] == 4) {
              $tinggi['id_kerusakan'] = 'Motherboard Bermasalah';
            } elseif ($tinggi['id_kerusakan'] == 5) {
              $tinggi['id_kerusakan'] = 'Prosesor Bermasalah';
            } elseif ($tinggi['id_kerusakan'] == 6) {
              $tinggi['id_kerusakan'] = 'VGA Bermasalah';
            } elseif ($tinggi['id_kerusakan'] == 7) {
              $tinggi['id_kerusakan'] = 'RAM Bermasalah';
            }

            ?>
            <div class="col-lg animate-box">
              <h2><?= $tinggi['id_kerusakan']; ?></h2>
              <h2 style="text-align: center;"><?= $tinggi['hasil_probabilitas'] * 100; ?>%</h2>
            </div>

            <div class="col-lg animate-box">
              <h2>Solusi :</h2>
              <ul>
                <li> <?= $tinggi['solusi']; ?>
                </li>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    </div>
  </section><!-- #about -->


  <!--==========================
      Contact Section
    ============================-->
  <section id="contact" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>Contact Us</h2>
      </div>

      <div class="row contact-info">

        <div class="col-md-4">
          <div class="contact-address">
            <i class="ion-ios-location-outline"></i>
            <h3>Address</h3>
            <address>Jl. Merpati Jl. Ketandan Lor No.191, RW.RT 04, Pringgolayan, Banguntapan, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55798</address>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-phone">
            <i class="ion-ios-telephone-outline"></i>
            <h3>Phone Number</h3>
            <p><a href="tel:+6282325733459">+6282325733459</a></p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-email">
            <i class="ion-ios-email-outline"></i>
            <h3>Email</h3>
            <p><a href="digitalsolution.jogja@gmail.com">digitalsolution.jogja@gmail.com</p>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>