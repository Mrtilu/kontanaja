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
             action="<?php echo base_url('dashboard/transaksi/repeatsubmit') ?>"
             <?php } else { ?> action="<?php echo base_url('dashboard/item/submit') ?>" <?php } ?> method="post" enctype="multipart/form-data">
             <div class="form-group row mb-4">
              <input type="hidden" name="Id" value="<?php if ($page == 'edit'): echo $data->Id; ?>

              <?php endif; ?>">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Item</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" disabled class="form-control" name="ItemName" required value="<?php if ($page == 'edit') {echo $data->ItemName;} ?>">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Data Pembeli</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" disabled class="form-control" name="NickName" required value="<?php if ($page == 'edit') {echo $data->NickName;} ?>">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Invoice Id</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" disabled class="form-control" name="NickName" required value="<?php if ($page == 'edit') {echo $data->InvoiceId;} ?>">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Pembayaran</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" disabled class="form-control" name="Amount" required value="Rp. <?php if ($page == 'edit') {echo $data->Amount;} ?>">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select New Order</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="NewId">
                  <?php foreach ($dataOpt as $d): ?>
                    <option value="<?php echo $d->Id; ?>"><?php echo $d->InvoiceId.' - '.$d->Email.' - '.$d->ItemName; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Submit</button>
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
