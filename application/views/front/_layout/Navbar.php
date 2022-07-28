<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-light custom-navbar text-white">
  <div class="container">
    <a class="navbar-brand text-white" href="<?php echo base_url(); ?>">
      <!-- logo -->
      <img style="margin-left: 10px;width: 150px;max-width: 100%;height:100%;" src="<?php echo base_url() ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>" alt="<?php echo SITE_NAME; ?>" title="<?php echo SITE_NAME; ?>">
    </a>
    <div class="burger tombol" style="margin-right:10px;">
      <span class="text-white"></span>
    </div>
  </div>
</nav>

<header>
	<nav class="menu">
    <div class="row pb-3">
      <div class="col-md-8 col-8">
        <img style="width:150px;" src="<?php echo base_url('assets/upload/logo-oval.png'); ?>?<?php echo BLACKEXPOVERSION; ?>" alt="<?php echo SITE_NAME; ?>" title="<?php echo SITE_NAME; ?>">
      </div>
      <div class="col-md-4 col-4 text-right close-mv text-white">
        <i class="bi bi-x-lg"></i>
      </div>
    </div>
    <div class="row pb-3">
      <div class="rounded-4 col-md-12 col-12 pr-0 pl-0">
        <!--info akun-->
        <div class="blackexpostyledua">
          <div class="container">
            <div class="row align-items-center">
              <?php if ($this->ion_auth->logged_in()): ?>
                <div class="rounded-4 col-md-12 col-lg-12 text-dark bg-light p-2">
                  <p class="mb-0">
                    <?php echo $this->ion_auth->user()->row()->email ?><br>
                    <?php $group = 'resseler'; echo($this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name); ?>
                  </p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul>
      <li>
        <a href="<?php echo base_url(); ?>" class="text-white">Beranda</a>
      </li>
      <li class="d-none">
        <a href="https://play.google.com/store/apps/details?id=id.mcproject.kincaimedia" target="_blank" class="text-white">Download</a>
      </li>
      <?php if (!$this->ion_auth->logged_in()): ?>
        <li>
          <a href="<?php echo base_url(); ?>login" class="text-white">Masuk</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>register" class="text-white">Registrasi</a>
        </li>
      <?php endif; ?>
      <?php if ($this->ion_auth->logged_in()): ?>
        <li>
          <a href="<?php echo base_url('profile'); ?>" class="text-white">Pengaturan</a>
        </li>
        <li>
          <a href="<?php echo base_url('transaksi'); ?>" class="text-white">Riwayat</a>
        </li>
      <?php endif; ?>
      <li>
        <a href="<?php echo base_url('listharga'); ?>" class="text-white">Daftar Harga</a>
      </li>
      <li>
        <a href="<?php echo base_url('pesanan'); ?>" class="text-white">Cek Pesanan</a>
      </li>
      <?php if ($this->ion_auth->is_admin()): ?>
        <li>
          <a href="<?php echo base_url('dashboard/home'); ?>" class="text-white">Administrator</a>
        </li>
      <?php endif; ?>
      <?php if ($this->ion_auth->logged_in()): ?>
        <li>
          <a href="<?php echo base_url('dashboard/auth/logout'); ?>" class="text-white">Keluar</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</header>