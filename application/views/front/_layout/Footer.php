<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<footer class="footer blackexpostyle text-white">
  <div class="container pt-5 pb-0">
    <div class="col-md-12 col-12">
      <div class="row">

        <div class="col-md-3 col-12 mb-5">
          <h4 style="font-size:20px;">KONTAK</h4>
          <hr>
          <ul>
            <li>
              <i class="bi bi-whatsapp"></i> <a href="http://wa.me/<?php echo ADMINPHONE; ?>"> WhatsApp</a>
            </li>
            <li>
              <i class="bi bi-envelope-open-fill"></i> <a href="mailto:<?php echo EMAIL_ADMIN; ?>">Email</a>
            </li>
            <li>
              <i class="bi bi-youtube"></i> <a href="<?php echo YOUTUBELINK; ?>"> Youtube</a>
            </li>
            <li>
              <i class="bi bi-facebook"></i> <a href="<?php echo FACEBOOKLINK; ?>">Facebook</a>
            </li>
            <li>
              <i class="bi bi-instagram"></i> <a href="<?php echo INSTAGRAMLINK; ?>"> Instagram</a>
            </li>
            <li>
              <i class="bi bi-twitter"></i> <a href="<?php echo TWITTERLINK; ?>"> Twitter</a>
            </li>
            <li>
              <i class="bi bi-linkedin"></i> <a href="<?php echo LINKEDINLINK; ?>"> Linkedin</a>
            </li>
          </ul>
        </div>

        <div class="col-md-3 col-12 mb-5">
          <h4 style="font-size:20px;">HALAMAN</h4>
          <hr>
          <ul>
            <li>
              <a href="<?php echo base_url(); ?>">Beranda</a>
            </li>
            <li>
              <a href="https://play.google.com/store/apps/details?id=id.mcproject.kincaimedia" target="_blank">Download</a>
            </li>
            <?php if (!$this->ion_auth->logged_in()): ?>
              <li>
                <a href="<?php echo base_url('login'); ?>">Masuk</a>
              </li>
              <li>
                <a href="<?php echo base_url('register'); ?>">Registrasi</a>
              </li>
            <?php endif; ?>
            <?php if ($this->ion_auth->logged_in()): ?>
              <li>
                <a href="<?php echo base_url('profile'); ?>">Pengaturan</a>
              </li>
              <li>
                <a href="<?php echo base_url('transaksi'); ?>">Riwayat</a>
              </li>
            <?php endif; ?>
            <li>
              <a href="<?php echo base_url('listharga'); ?>">Daftar Harga</a>
            </li>
            <li>
              <a href="<?php echo base_url('pesanan'); ?>">Cek Pesanan</a>
            </li>
            <li>
              <a href="http://wa.me/<?php echo ADMINPHONE; ?>/?text=Halo%20admin%20*<?php echo SITE_NAME; ?>*.%20Saya%20minat%20join%20member%20reseller,%20gimana caranya?">Join Reseller</a>
            </li>
          </ul>
        </div>

        <div class="col-md-3 col-12 mb-5">
          <h4 style="font-size:20px;">TOP 7 GAMES</h4>
          <hr>
          <ul>
            <li>
              <a href="<?php echo base_url('order/id/higgs-domino'); ?>">Higgs Domino</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/pubg-mobile'); ?>">PUBG Mobile</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/mobile-legend'); ?>">Mobile Legends</a></li>
            <li>
              <a href="<?php echo base_url('order/id/free-fire'); ?>">Free Fire</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/call-of-duty-mobile'); ?>">Call of Duty</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/point-blank'); ?>">Point Blank</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/valorant'); ?>">Valorant</a>
            </li>
          </ul>
        </div>

        <div class="col-md-3 col-12 mb-5">
          <h4 style="font-size:20px;">TOP 7 PPOB</h4>
          <hr>
          <ul>
            <li>
              <a href="<?php echo base_url('pulsa'); ?>">Pulsa Reguler</a>
            </li>
            <li>
              <a href="<?php echo base_url('data'); ?>">Paket Internet</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/pln'); ?>">Token Listrik</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/wifi-id'); ?>">Akun Wifi ID</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/spotify'); ?>">Spotify Premium</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/google-play-indonesia'); ?>">Voucher Google Play</a>
            </li>
            <li>
              <a href="<?php echo base_url('order/id/garena'); ?>">Voucher Garena</a>
            </li>
          </ul>
        </div>
        
      </div>
    </div>

  </div>
</footer>

<footer class="col-md-12 bg-dark text-white">
  <div class="row pt-2 pb-2">
    <div class="col-md-12 col-12 text-center">
      Copyright &copy;<?php echo date("Y"); ?> <?php echo SITE_NAME; ?> - Powered by <a href="<?php echo URLWEB_PERUSAHAAN; ?>" rel="dofollow" target="_blank"><?php echo NAMA_PERUSAHAAN; ?></a>
    </div>
  </div>
</footer>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-arrow-up-short"></i></button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/aos/aos.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/isotope-layout/isotope.pkgd.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/php-email-form/validate.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/swiper/swiper-bundle.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url() ?>assets/assets/js/main.js?<?php echo BLACKEXPOVERSION; ?>"></script>

<script>
  $(document).ready(function(){
    console.log('ready11');
    $('.tombol').click(function(e){
      e.stopPropagation();
      $('.menu').toggleClass("slide-menu-tampil");
    });
    $('.close-mv').click(function(e){
      $('.menu').toggleClass("slide-menu-tampil");
    });
    function handleMousePos(event) {
      var mouseClickWidth = event.clientX;
      console.log(mouseClickWidth);
      if(mouseClickWidth>=300){
        $('.menu').removeClass("slide-menu-tampil");
      }
    }
    document.addEventListener("click", handleMousePos);
  });
</script>

<script type="text/javascript">
  mybutton = document.getElementById("myBtn");
  window.onscroll = function() {scrollFunction()};
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    $('.burger').hide();
  }
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    $('.burger').show();
  }
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
  setTimeout(function() {
    $(".flash").hide();
  }, 10000);
  $.LoadingOverlaySetup({
    background : "rgba(58,58,58,0.8)",
  });
</script>

<!--Scroll Indicator Load-->
<div class='progress-container'>
    <div class='progress-bar' id='progressbar'>
</div>
<script>
  window.addEventListener("scroll", myFunction);
  function myFunction() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progressbar").style.width = scrolled + "%";
  }
</script>