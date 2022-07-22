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
        <div class="col-md-12 col-12 mb-3">
          <h4>Pengguna</h4>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pengguna</h4>
              </div>
              <div class="card-body">
                <?php echo $totalUsers; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="far fa-check-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Order Sukses</h4>
              </div>
              <div class="card-body">
                <?php echo $orderSukses; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="far fa-check-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Keuntungan</h4>
              </div>
              <div class="card-body">
                <?php echo "Rp " . number_format($totalkeuntungan, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
          <h4>Transaksi</h4>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Order Gagal</h4>
              </div>
              <div class="card-body">
                <?php echo $orderFailed; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-clock"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Order Expired</h4>
              </div>
              <div class="card-body">
                <?php echo $orderExpired; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="far fa-pause-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Order Pending</h4>
              </div>
              <div class="card-body">
                <?php echo $orderPending; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
          <h4>Keuntungan</h4>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pendapatan Hari ini.</h4>
              </div>
              <div class="card-body">
                <?php echo "Rp " . number_format($pembelianHariIni, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-pause-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Keuntungan Hari Ini</h4>
              </div>
              <div class="card-body">
                <?php echo "Rp " . number_format($keuntungantoday, 0, ',', '.'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Transaksi Sukses</h4>
              </div>
              <div class="card-body">
                <?php echo $transaksiSukses; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('_layout/footer'); ?>
