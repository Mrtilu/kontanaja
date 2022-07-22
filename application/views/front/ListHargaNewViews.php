<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
  <style media="screen">
    .input-group-sm>.input-group-append>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-append>select.input-group-text:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.input-group-text:not([size]):not([multiple]), .input-group-sm>select.form-control:not([size]):not([multiple]), select.form-control-sm:not([size]):not([multiple]){
      height: calc(2.25rem + 2px);
    }
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield;
    }
    a:not([href]):not([tabindex]){
      color: black;
    }
    a.readmore{
      cursor: pointer;
      color: black;
    }
    .readmorea{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;
    }
  </style>
  
</head>

<body class="bg-white text-dark">

  <!--Navbar-->
  <?php $this->load->view('front/_layout/Navbar'); ?>

  <main id="main">

    <section class="section pt-5 pb-5">

      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-12 ml-auto text-dark " data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12">
              <div class="row">
                <div class="form-group">
                  <h1 style="display:none"><?php echo $title ?></h1>
                  <h2 style="display:none"><?php echo $title ?> Produk Termurah</h2>
                  <h2 style="display:none">Daftar Harga Produk <?php echo SITE_NAME; ?></h2>
                  <h3 style="display:none">Daftar Produk Panel <?php echo SITE_NAME; ?></h3>
                  <h3 class="text-dark">Pilih Produk</h3>
                  <select class="form-control layanan" name="" style="height:50px;text-transform:uppercase;">
                    <?php foreach ($dataCat as $c): ?>
                      <option value="<?php echo $c; ?>"><?php echo $c ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="sticky-content table-responsive">
              <div class="row align-items-stretch">
                <div class="col-md-12 ml-auto text-dark"  data-aos-delay="100">
                  <div class="sticky-content table-responsive">
                    <table id="example" class="table " >
                      <thead class="text-dark">
                        <tr>
                          <!-- <th>Id</th> -->
                          <th>Brand</th>
                          <th>Item</th>
                          <!--<th>Catatan</th>-->
                          <th>Harga VIP</th>
                          <th>Harga Resseler</th>
                          <th>Harga Member</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="text-dark">
                        <?php  $i=0; foreach ($data as $d): $i++?>
                        <?php if ($d->buyer_product_status == true): ?>
                          <tr>
                            <td><?php echo $d->brand; ?></td>
                            <td><div class="bg-primary text-white text-center rounded-3" style="padding:2px;"><?php echo $d->product_name; ?></div></td>
                            <!--<td><?php echo $d->desc; ?></td>-->
                            <td><?php echo "Rp " . number_format($d->price_vip,0,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format($d->price_seller,0,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format($d->price_member,0,',','.'); ?></td>
                            <td><?php if ($d->seller_product_status != true) {
                              echo '<div class="bg-danger text-center rounded-3" style="padding:2px;">
                              <div class="text-white">Tidak Tersedia</div>
                              </div>';
                            }else {
                              echo '<div class="bg-success text-center rounded-3" style="padding:2px;">
                              <div class="text-white">Tersedia</div>
                              </div>';
                            } ?>

                          </td>

                        </tr>
                      <?php endif; ?>

                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-header" style="border-bottom: 1px solid #ffc107;">
        <h5 class="modal-title">Detail pembayaran</h5>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body payment-detail">
      </div>
      <div class="modal-footer" style="border-top: 1px solid #ffc107;">
        <p><?php echo $title ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Vendor JS Files -->
<?php $this->load->view('front/_layout/Footer'); ?>
<script type="text/javascript">
  $( document ).ready(function() {

    console.log( "ready!" );
    $('#example').DataTable({
      "pageLength": 20,
      "lengthMenu": [ [20,30, 40, 50, -1], [20,30, 40, 50, "All"] ]
    });
    function filterData () {
      $('#example').DataTable().search(
        $('.layanan').val()
        ).draw();
    }
    filterData();
    $('.layanan').on('change', function () {
     filterData();
   });
    function formatRupiah(angka, prefix){
     var number_string = angka.replace(/[^,\d]/g, '').toString(),
     split   		= number_string.split(','),
     sisa     		= split[0].length % 3,
     rupiah     		= split[0].substr(0, sisa),
     ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

     if(ribuan){mt-3
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
});
</script>

</body>

</html>
