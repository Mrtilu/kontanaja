<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
</head>

<body class="bg-white text-white">

  <!--Navbar-->
  <?php $this->load->view('front/_layout/Navbar'); ?>

  <main id="main" style="padding:0;">

    <div class="blackexpostyle">
      <div class="container slide-home pt-2 pb-2 pl-0 pr-0">
        <div class="container col-md-12 col-12">
          <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
            <div class="carousel-inner">
              <?php $i=0; foreach ($dataSlide as $d): $i++?>
              <div class="carousel-item <?php if ($i == 1) {
                echo "active";
              } ?>" >
              <img class="d-block w-100 rounded-4" src="<?php echo $d->FotoSlide; ?>" alt="Games Populer di <?php echo SITE_NAME; ?>" title="Games Populer di <?php echo SITE_NAME; ?>">
            </div>
          <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span style="display:none">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span style="display:none">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php if ($this->ion_auth->logged_in()): ?>
<div class="blackexpostyle">
  <div class="container slide-home pt-2 pb-2 pl-0 pr-0">
    <div class="col-md-12 col-12">

      <!--info akun-->
      <div class="align-items-center">
        <?php if ($this->ion_auth->logged_in()): ?>
          <div class="rounded-4 col-md-12 col-lg-12 text-dark bg-light pr-3 pl-3 pt-2 pb-2">
            <p class="mb-0">
              <?php echo $this->ion_auth->user()->row()->email ?><br>
              <?php $group = 'resseler'; echo($this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php
        if ($this->session->flashdata('message')) { ?>
          <div class="rounded-4 col-md-12 col-lg-12 text-dark bg-light pr-3 pl-3 pt-2 pb-2 mt-3">
            <div class="alert alert-danger alert-has-icon flash m-0">
              <div class="alert-icon">
                <i class="far fa-lightbulb"></i>
              </div>
              <div class="alert-body">
                <div class="alert-title"></div>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
            </div>
            <?php
            unset($_SESSION['message']); ?>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<section class="section site-portfolio text-white blackexpostyle pt-2 pb-3">
  <div class="container">
    <div class="rounded-4 bg-light">
      <?php foreach ($dataCat as $dc): ?>
        <div class="col-md-12 col-lg-12" id="<?php echo str_replace(' ', '', $dc->ProductCat); ?>"></div>
        <div class="col-md-12 col-lg-6 pt-4">
          <h2 class="text-dark"><?php echo $dc->ProductCat; ?></h2>
        </div>
        <div id="portfolio-grid" class="row no-gutter rounded-4 mx-1" data-aos-delay="200">
          <?php foreach ($dataProduct as $d): ?>
            <?php if ($dc->ProductCat == $d->ProductCat): ?>
              <div class="item branding col-4 col-sm-4 col-md-2 col-lg-2 mb-3">
                <a href="<?php if ($d->ProductLink == '-') {
                  echo base_url('order/id/').$d->ProductSlug;
                  }else {
                    echo $d->ProductLink;
                  }  ?>" class="item-wrap fancybox">
                  <div class="work-info">
                    <h3><?php echo $d->ProductName ?></h3>
                    <span></span>
                  </div>
                  <img class="bg-dark img-fluid rounded-4" src="<?php echo $d->ProductImage; ?>?<?php echo BLACKEXPOVERSION; ?>" style="width:190px;height:auto;" alt="<?php echo $d->ProductName ?>" title="<?php echo $d->ProductName ?>">
                </a>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="container pt-5 pb-3">
  <div class="col-md-12 col-12">
    <div class="title text-dark text-center">
      <h1><?php echo SITE_NAME ?> - <?php echo TAGLINE_NAME ?></h1>
    </div>
    <div class="text-dark text-center mb-3 d-none">
      <hr>
      <?php echo DESKRIPSI_1; ?>
      <hr>
      <?php echo DESKRIPSI_2; ?>
      <hr>
    </div>
  </div>
  <div class="row text-dark">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div class="mb-4">
        <div class="row">
          <div class="icon text-dark col-2 text-right">
            <i class="bi bi-clock-history" style="font-size:30px;"></i>
          </div>
          <div class="col-10">
            <h2 class="title text-left" style="font-size:22px;">
              Transaksi hitungan detik
            </h2>
            <div class="text-left subtitle">
              Hanya membutuhkan beberapa detik saja untuk menyelesaikan transaksi, dan mendukung berbagai metode pembayaran yang dikonfirmasi secara otomatis.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div class="mb-4">
        <div class="row">
          <div class="icon text-dark col-2 text-right">
            <i class="bi bi-wallet-fill" style="font-size:30px;"></i>
          </div>
          <div class="col-10">
            <h2 class="title text-left" style="font-size:22px;">
              Metode pembayaran lengkap
            </h2>
            <div class="text-left subtitle">
              Kami menawarkan berbagai channel pembayaran mulai dari bank transfer, convenience store (indomaret, alfamart, dll) dan e-wallet (ovo, gopay, dana, dll).
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div class="mb-4">
        <div class="row">
          <div class="icon text-dark col-2 text-right">
            <i class="bi bi-tags-fill" style="font-size:30px;"></i>
          </div>
          <div class="col-10">
            <h2 class="title text-left" style="font-size:22px;">
              Promosi & diskon menarik
            </h2>
            <div class="text-left subtitle">
              Kami memberikan berbagai penawaran menarik, diskon dan kode item dari promosi game, kamu juga dapat mendaftar sebagai reseller untuk harga yang jauh lebih murah.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div class="mb-4">
        <div class="row">
          <div class="icon text-dark col-2 text-right">
            <i class="bi bi-gem" style="font-size:30px;"></i>
          </div>
          <div class="col-10">
            <h3 class="title text-left" style="font-size:22px;">
              Proses pengiriman instan
            </h3>
            <div class="text-left subtitle">
              Ketika kamu melakukan top-up di <?php echo SITE_NAME; ?>, item yang kamu beli akan dikirim secara instan dan cepat, tanpa ada penundaan. Kami memproses semua transaksi secara instan untuk semua produk.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div class="mb-4">
        <div class="row">
          <div class="icon text-dark col-2 text-right">
            <i class="bi bi-people-fill" style="font-size:30px;"></i>
          </div>
          <div class="col-10">
            <h3 class="title text-left" style="font-size:22px;">
              Layanan pelanggan 24/7
            </h3>
            <div class="text-left subtitle">
              Tim support kami siap membantu setiap hari 24 jam. Kirimkan tiket melalui Form dan kami segera menghubungimu! Jangan khawatir jika slow respon, karna setiap tiket dibalas sesuai urutannya.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div class="mb-4">
        <div class="row">
          <div class="icon text-dark col-2 text-right">
            <i class="bi bi-cart-fill" style="font-size:30px;"></i>
          </div>
          <div class="col-10 d-none">
            <h3 class="title text-left" style="font-size:22px;">
              Mendukung transaksi H2H
            </h3>
            <div class="text-left subtitle">
              Sistem kami mendukung transaksi melalui API. Kamu dapat mengintegrasikan API dengan panduan lengkap dan mudah yang kami sediakan pada halaman dokumentasi API.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<!--Footer-->
<?php $this->load->view('front/_layout/Footer'); ?>

<!--Vendor JS Files-->
<script>
  if ($(window).width() < 960) {
   $('.slide-home').removeClass('container');
 }
 else {
   $('.slide-home').addClass('container');
 }
</script>

</body>
</html>
