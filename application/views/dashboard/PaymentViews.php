<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/HeaderNew'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
     <h1>Transaksi Pembayaran</h1>
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
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>ID Tanggal</th>
                      <th>User</th>
                      <th>Invoice</th>
                      <th>Payment</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i =0; ?>
                    <?php foreach ($data->data as $d):?>
                    <?php $i++ ?>
                    <tr>
                      <td><?php echo $d->created_at; ?></td>

                      <td><?php echo $d->customer_name; ?></td>
                      <td><p class="bg-info text-center text-white rounded-3 pl-2 pr-2"><?php echo $d->merchant_ref; ?></p> </td>
                      <td><?php echo $d->payment_name.' - '."Rp " . number_format($d->amount_received, 0, ',', '.'); ?></td>
                      <td><?php if ($d->status == 'PAID') {
                        echo '<div class="bg-success text-white text-center rounded-3 pl-2 pr-2">
                        <p>'.$d->status.'</p>
                        </div>';
                      }elseif ($d->status == 'EXPIRED') {
                        echo '<div class="bg-primary text-white text-center rounded-3 pl-2 pr-2">
                        <p>'.$d->status.' - '.$d->note.'</p>
                        </div>';
                      } ?>
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
