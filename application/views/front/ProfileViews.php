<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">

  <head>
    <?php $this->load->view('front/_layout/Head'); ?>
  </head>
  
  <body class="bg-white text-white">

    <!-- preloader -->
    <div class="preloader">
      <div class="loading">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
    <!-- preloader-end -->

    <!-- header-area -->
    <header class="transparent-header">
      <?php $this->load->view('front/_layout/Navbar'); ?>
    </header>

    <main id="main">
      <section class="blackexpostyle section pt-5 pb-5">
        <div class="container">
          <div class="row rounded-3 p-2">
            <h3 class="text-white m-0">Pengaturan Profil</h3>
          </div>
          <form class="" action="<?php echo base_url('profile/update'); ?>" method="post">
            <div class="row col-md-12 col-12 p-2 rounded-3">
              <div class="col-md-6 col-12">
                <div class="text-white">Nama Depan</div>
                <input value="<?php echo $this->ion_auth->user()->row()->first_name; ?>"  style="" type="text" placeholder="First Name" name="fname" class="inputnew" required>
                <input value="<?php echo $this->ion_auth->user()->row()->id; ?>"  style="" type="hidden" placeholder="First Name" name="id" class="inputnew" required>
                <hr>
                <div class="text-white">Nama Belakang</div>
                <input value="<?php echo $this->ion_auth->user()->row()->last_name; ?>"   type="text" placeholder="Last Name" name="lname" class=" inputnew" required>
                <hr>
                <div class="text-white">Nama Perusahaan</div>
                <input value="<?php echo $this->ion_auth->user()->row()->company; ?>"  style="" type="text" placeholder="Company Name" name="companyname" class="inputnew" required>
                <hr>
                <div class="text-white">No. Telp / WA</div>
                <input value="<?php echo $this->ion_auth->user()->row()->phone; ?>"  style="" type="number" placeholder="Phone" name="phone" class="inputnew" required>
                <hr>
              </div>
              <div class="col-md-6 col-12">
                <div class="text-white">Password: (jika mengubah password)</div>
                <input value="" minlength="8" style="" type="text" placeholder="Password" name="password1" class="inputnew">
                <hr>
                <div class="text-white">Konfirmasi Password: (jika mengubah password)</div>
                <input value="" minlength="8" style="" type="text" placeholder="Repeat password" name="password2" class="inputnew">
                <hr>
              </div>
            </div>
            <div class="col-md-3 col-12">
              <div class="text-center p-0">
                <button type="submit" class="btn btn-primary col-md-12 m-0" name="button">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </main>

    <?php $this->load->view('front/_layout/Footer'); ?>

    <?php $this->load->view('front/_layout/Script'); ?>
    <script type="text/javascript">
      $( document ).ready(function() {
      })
    </script>

  </body>

</html>