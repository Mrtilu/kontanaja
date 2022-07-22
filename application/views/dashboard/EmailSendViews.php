<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/HeaderNew'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
     <h1><?php echo $title; ?></h1>
   </div>
   <div class="section-body">
    <?php
    if ($this->session->flashdata('message')) {
      ?>
      <div class="alert alert-info alert-has-icon">
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
      <?php
    }
    ?>
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body">
            <form <?php if ($page == 'edit') { ?>
             action="<?php echo base_url('dashboard/Emailuser/submit') ?>"
             <?php } else { ?> action="<?php echo base_url('dashboard/Emailuser/submit') ?>" <?php } ?> method="post" enctype="multipart/form-data">

             <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email tujuan: (kosongkan jika mengirim ke semua pengguna)</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="EmailSend" value="">
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subjek</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="Subject" value="">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi email</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control h-100" name="Body" rows="8" cols="80"></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div></div>
</div>
</section>
</div>

<?php $this->load->view('_layout/footer'); ?>
