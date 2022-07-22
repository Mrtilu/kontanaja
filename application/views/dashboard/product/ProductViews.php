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
      <div class="alert alert-primary alert-has-icon">
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
          <div class="card-header">
            <a href="<?php echo base_url('dashboard/product/create'); ?>" style="border-radius:5px;" class="btn btn-info">Tambah Produk</a>
            <a href="<?php echo base_url('dashboard/product/allaktif'); ?>" style="border-radius:5px;margin-left:5px;" class="btn btn-info">Aktifkan Semua Produk</a>
            <a href="<?php echo base_url('dashboard/product/allnonaktif'); ?>" style="border-radius:5px;margin-left:5px;" class="btn btn-info">Nonaktifkan Semua Produk</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Logo</th>
                    <th>Type</th>
                    <th>Link</th>
                    <th>Api</th>
                    <th>Cek Id</th>
                    <th>Dibuat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i =0; ?>
                  <?php foreach ($data as $d):?>
                    <?php $i++ ?>
                    <tr>
                      <td><?php echo $d->Id; ?></td>
                      <td><?php echo $d->ProductName; ?></td>
                      <td><?php echo $d->ProductCode.' - '.$d->ProductCat; ?></td>
                      <td><img style="width:150px;" src="<?php echo $d->ProductImage; ?>?<?php echo BLACKEXPOVERSION; ?>"></td>
                      <td><?php if ($d->ProductType == 0) {
                        echo '<div class="bg-info text-center text-white rounded pr-2 pl-2" style="width:100%;">
                        <p>MANUAL</p>
                        </div>';
                      } else {
                        echo '<div class="bg-success text-center text-white rounded pr-2 pl-2" style="width:100%;">
                        <p>OTOMATIS</p>
                        </div>';
                      } ?> </td>
                      <td><?php echo $d->ProductLink; ?></td>
                      <td><?php if ($d->ProductApi == 0) {
                        echo "MANUAL";
                      }elseif ($d->ProductApi == 1) {
                        echo "DIGIFLAZZ";
                      } ?></td>
                      <td><?php echo $d->ProductCek; ?></td>
                      <td><?php echo $d->CreatedAt; ?></td>
                      <td><?php if ($d->ProductStatus == 0) {
                        echo '<div class="bg-danger text-center text-white rounded pr-2 pl-2" style="width:100%;">
                        <p>Non Aktif</p>
                        </div>';
                      } else {
                        echo '<div class="bg-success text-center text-white rounded pr-2 pl-2" style="width:100%;">
                        <p>Aktif</p>
                        </div>';
                      } ?></td>
                      <td> <?php if ($d->ProductStatus == 0) { ?>
                        <a href="<?php echo base_url('dashboard/product/active/'.$d->Id.''); ?>" class="btn btn-success">Aktifkan</a>
                      <?php } else {
                        ?>
                        <a href="<?php echo base_url('dashboard/product/active/'.$d->Id.''); ?>" class="btn btn-danger">Non Aktifkan</a>
                        <?php
                      } ?>
                      <a href="<?php echo base_url('dashboard/product/edit/'.$d->Id.''); ?>" class="btn btn-primary">Edit</a>
                    </td>

                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>
</section>
</div>

<?php $this->load->view('_layout/footer'); ?>
