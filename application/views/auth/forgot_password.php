<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/HeaderNew');
?>
<body class="bg-dark">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>" alt="<?php echo SITE_NAME; ?>" title="<?php echo SITE_NAME; ?>" width="250" class="rounded-4"></a>
            </div>
            <div class="card card-primary">
              <?php
              if($this->session->flashdata('message') || $message){
                ?>
                <div class="alert alert-warning m-1 alert-has-icon">
                  <div class="alert-icon">
                    <i class="far fa-lightbulb"></i>
                  </div>
                  <div class="alert-body">
                    <div class="alert-title"></div>
                    <?php echo $message; ?>
                  </div>
                </div>
                <?php
                unset($_SESSION['message']);
              }
              ?>
              <div class="card-header mt-2">
                <h1 class="text-primary"><?php echo lang('forgot_password_heading');?></h1>
                <h2 style="display:none"><?php echo lang('forgot_password_heading');?> <?php echo SITE_NAME; ?></h2>
                <h3 style="display:none"><?php echo lang('forgot_password_heading');?> Akun <?php echo SITE_NAME; ?></h3>
              </div>
              <div class="card-body">
                <?php echo form_open("dashboard/auth/forgot_password");?>
                <div class="form-group">
                  <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
                  <?php echo form_input($identity);?>
                  <div class="invalid-feedback">
                    Silakan isi email anda
                  </div>
                </div>
                <div class="form-group">
                  <?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary btn-lg btn-block"');?>
                </div>
                <?php echo form_close();?>
              </div>
              <div class="text-muted text-center mb-5">
                Tidak punya akun? <a href="<?php echo base_url(); ?>register" class="text-primary">Buat akun</a>
              </div>
            </div>
            <div class="simple-footer text-white">
              Copyright &copy;<?php echo date("Y"); ?> <?php echo SITE_NAME; ?> - Powered by <a href="<?php echo URLWEB_PERUSAHAAN; ?>" rel="dofollow" target="_blank"><?php echo NAMA_PERUSAHAAN; ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('_layout/js'); ?>
