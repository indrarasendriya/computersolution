<main id="main">
  <section id="about" class="wow fadeInUp">
    <div class="container">
      <div class="row">
        <!-- <div class="col-lg-6 about-img">
          <img src="<?= base_url('frontend'); ?>/img/about-img.jpg" alt="">
        </div> -->

        <div class="content" style="text-align: center;">
          <h2>Halo, <?= $user['username'] ?></h2>
          <h3 aria-colspan="30px">Pada halaman ini anda bisa memilih gejala-gejala kerusakan komputer yang dialami. Pastikan anda memilih gejala yang sesuai supaya sistem kami bisa mendiagnosa kerusakan komputer anda dengan akurat.</h3>
        </div>
      </div>

    </div>
  </section><!-- #about -->


  <?= $this->session->flashdata('pesan'); ?>
  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <b><?= validation_errors(); ?></b>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <!-- munculkan gejala -->
  <div class="section section-features">
    <div class="container">
      <section id="about" class="wow fadeInUp">
        <div class="content">
          <h2 style="text-align: center;">Pilih Gejala</h2>
        </div>

        <div class="row">
          <form action="<?= base_url('member/diagnosa'); ?>" method="POST">
            <div class="boxes">
              <table>
                <?php foreach ($gejala as $g) : ?>
                  <tr>
                    <td>
                      <input type="checkbox" id="<?= $g['id_gejala']; ?>" name="id_gejala[]" value="<?= $g['id_gejala']; ?>">
                    </td>
                    <td colspan="2">
                      <?= $g['kode_gejala']; ?> | Apakah <?= $g['nama_gejala']; ?> ?
                    </td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
        </div>
        <div class="wow fadeInUp" style="text-align: center;">
          <button type="submit" class="btn btn-primary">Proses!</button>
        </div>
        </form>
      </section>
    </div>

</main>