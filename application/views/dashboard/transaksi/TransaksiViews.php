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
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Invoice</th>
                    <th>Pembayaran</th>
                    <th>Keuntungan</th>
                    <th>Tujuan</th>
                    <th>Produk</th>
                    <th>Ket</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i =0; ?>
                  <?php foreach ($dataOrder as $d):?>
                   <?php $i++ ?>
                   <tr>
                    <td><?php echo $d->Id; ?></td>
                    <td><?php if ($d->UserId == 0) {
                      echo "Guest";
                    } else {
                      $user = $this->db->where('id', $d->UserId)->get('users')->row();
                      echo $user->first_name;
                    } ?></td>
                    <td><p class="bg-info text-center text-white rounded-3 pr-2 pl-2"><?php echo $d->InvoiceId; ?></p> </td>
                    <td><?php echo $d->Payment.' - '."Rp " . number_format($d->Amount, 0, ',', '.'); ?></td>
                    <?php
                    $dataUntung = $this->db->where('InvoiceId',$d->InvoiceId)->get('data_untung')->row();
                    if ($dataUntung ){ ?>
                      <td><?php echo "Rp " . number_format($dataUntung->Untung, 0, ',', '.'); ?></td>
                    <?php }else {?>
                      <td><?php echo "Rp " . number_format(0, 0, ',', '.'); ?></td>
                    <?php } ?>

                    <td><?php echo $d->NickName;?></td>
                    <td><?php echo $d->Game.' - '.$d->ItemName; ?></td>
                    <td><?php echo $d->Ket; ?></td>
                    <td><?php if ($d->StatusOrder == 0) {
                      echo '<div class="bg-primary text-white text-center rounded-3 pr-2 pl-2">
                      <p>Belum dibayar</p>
                      </div>';
                    } elseif ($d->StatusOrder == 1) {
                      echo '<div class="bg-success text-white text-center rounded-3 pr-2 pl-2">
                      <p>Sudah Dibayar</p>
                      </div>';
                    } elseif ($d->StatusOrder == 2) {
                      echo '<div class="bg-warning text-white text-center rounded-3 pr-2 pl-2">
                      <p>Expired</p>
                      </div>';
                    } elseif ($d->StatusOrder == 3) {
                      echo '<div class="bg-danger text-white text-center rounded-3 pr-2 pl-2">
                      <p>Gagal</p>
                      </div>';
                    } elseif ($d->StatusOrder == 4) {
                      echo '<div class="bg-danger text-white text-center rounded-3 pr-2 pl-2">
                      <p>Gagal By Server</p>
                      </div>';
                    } elseif ($d->StatusOrder == 5) {
                      echo '<div class="bg-success text-white text-center rounded-3 pr-2 pl-2">
                      <p>Success</p>
                      </div>';
                    } elseif ($d->StatusOrder == 6) {
                      echo '<div class="bg-warning text-white text-center rounded-3 pr-2 pl-2">
                      <p>Pending</p>
                      </div>';
                    } ?>
                  </td>
                  <td>
                    <?php 
                    echo $d->Ket." -"; 
                    echo gettype($d->Ket);
                    if($d->Ket && $d->Game == "FC"){
                      echo '<a href="'.base_url('dashboard/transaksi/repeat/'.$d->Id.'').'" class="btn btn-info">Prosess Ulang, FC</a>';
                    }else{
                      if ($d->StatusOrder == 0) {
                      } elseif ($d->StatusOrder == 1) {
                        $dataProduct = $this->db->where('ProductCode',$d->Game)->get('data_product')->row();
                        if ($dataProduct) {
                          if ($dataProduct->ProductType == 0) {
                            echo '<a href="'.base_url('dashboard/transaksi/pro/'.$d->Id.'').'" class="btn btn-info">Prosess</a>';
                          }
                        }
                      } elseif ($d->StatusOrder == 2) {
                      } elseif ($d->StatusOrder == 3) {
                      } elseif ($d->StatusOrder == 4) {
                        echo '<a href="'.base_url('dashboard/transaksi/repeat/'.$d->Id.'').'" class="btn btn-info">Prosess Ulang</a>';


                      } elseif ($d->StatusOrder == 5) {
                      } elseif ($d->StatusOrder == 6) {
                        $dataProduct = $this->db->where('ProductCode',$d->Game)->get('data_product')->row();
                        if ($dataProduct) {
                          if ($dataProduct->ProductType == 0) {
                            echo '<a href="'.base_url('dashboard/transaksi/pro/'.$d->Id.'').'" class="btn btn-success">Prosess Ulang</a>';
                          }
                        }
                      } 
                    }
                    ?>
                    
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
