<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>"><?php echo $this->db->get('data_setting')->row()->SiteName; ?></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>">BE</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?php echo $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/home">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'setting' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/setting">
          <i class="fa fa-cog"></i>
          <span>Website</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'price' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/price">
          <i class="fa fa-file-invoice"></i>
          <span>Harga</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'auth' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/auth">
          <i class="fa fa-users"></i>
          <span>Pengguna</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'emailuser' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/emailuser">
          <i class="fa fa-envelope"></i>
          <span>Email</span>
        </a>
      </li>
      <li class="menu-header">Homepage</li>
      <li class="<?php echo $this->uri->segment(2) == 'slide' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/slide">
          <i class="fa fa-sliders-h"></i>
          <span>Slider</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'product' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/product">
          <i class="fa fa-tag"></i>
          <span>Produk</span>
        </a>
      </li>
      <li class="menu-header">Transaksi</li>
      <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/transaksi">
          <i class="fa fa-shopping-cart"></i>
          <span>Transaksi</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'payment' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/payment">
          <i class="fa fa-fire"></i>
          <span>Pembayaran</span>
        </a>
      </li>
    </ul>

  </aside>
</div>
