<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
  <style media="screen">
    .input-group-sm>.input-group-append>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-append>select.input-group-text:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.input-group-text:not([size]):not([multiple]), .input-group-sm>select.form-control:not([size]):not([multiple]), select.form-control-sm:not([size]):not([multiple]){
      height: calc(2.25rem + 2px);
    }
    
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { /* Chrome, Safari, Edge, Opera */
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] { /* Firefox */
      -moz-appearance: textfield;
    }
    a:not([href]):not([tabindex]){
      color: white;
    }
    a.readmore{
      cursor: pointer;
      color: white;
      border-color: white;
    }
    .readmorea{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;

    }
  </style>

</head>

<body class="bg-white text-white">

  <!--Navbar-->
  <?php $this->load->view('front/_layout/Navbar'); ?>

  <main id="main">

    <section class="section pt-5 pb-5">

      <div class="container">
        <div class="p-1">
          <div class="blackexpostyle row rounded-3 cekinput">
            <h1 style="display:none"><?php echo $title ?></h1>
            <h2 style="display:none">Cara <?php echo $title ?></h2>
            <h2 style="display:none">Daftar Pesanan <?php echo SITE_NAME; ?></h2>
            <h3 style="display:none">Cek Daftar Pesanan <?php echo SITE_NAME; ?></h3>
            <div class="col-md-8 col-8 mt-1 mb-1">
              <input value="<?php echo $this->input->get('inv') ? $this->input->get('inv') : ''; ?>"  type="text" placeholder="Masukan id pesanan" name="id" class="form-control text-dark cekid" id="id" required>
            </div>
            <div class="col-md-4 col-4 mt-1 mb-1">
              <p style="width:100%;margin:0px;height:46px;" class="text-center">
                <a style="width:100%;height:46px;padding-top:15px;" class="readmore text-center cek">CEK</a>
              </p>
            </div>
          </div>

          <div class="col-md-12 col-12 blackexpostyle rounded-3 data-pesanan mt-4 pt-3 pb-3">
            <h3 class="h3 invoiceid"></h3>
            <div class="status">
            </div>
            <div class="game" style="text-align: center;">
            </div>
            <hr>
            <div class="payment text-white"></div>
            <hr>
            <div class="itemname text-white"></div>
            <hr>
            <div class="id text-white"></div>
            <hr>
            <div class="total text-white" style="display: -webkit-box;"></div>
            <hr>
            <div class="tanggal text-white"></div>
            <hr>
            <div class="ket bg-primary text-white rounded-3 p-2"></div> <br>
          </div>
        </div>
      </div>


    </div>
  </section>
</main>

<!-- ======= Footer ======= -->

<!-- Vendor JS Files -->
<?php $this->load->view('front/_layout/Footer'); ?>
<script type="text/javascript">
  $( document ).ready(function() {
    var active = 0;
    $('.data-pesanan').hide();
    $('.intruksi-p').hide();
    function cektransaksi(){
      if (active == 0) {
        active = 1;
        setInterval(function(){
          var cekid = $('.cekid').val();
          if (cekid != '') {

            getTrans();
            getint();
          }
        }, 10000);
      }

    }
    $(document).on('click','.cek', function(){
      var cekid = $('.cekid').val();
      if (cekid != '') {
        cektransaksi();
      }
    });
    function getTrans(){

      var cekid = $('.cekid').val();
      if (cekid != '') {

        $.ajax({
          url: "<?php echo base_url('pesanan/getdata'); ?>",
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data:{
            'invoiceid' : cekid
          },
          success: function(data){
            if (data.status) {
              $('.status').empty();
              $('.total').empty();
              $('.data-pesanan').show();
              $('.intruksi-p').show();
              $('.game').empty();
              $('.game').append('<img style="height:100px;width:100px;border-radius:15px;" src="'+data.dataP.ProductImage+'?" alt="Status Pesanan" title="Status Pesanan">');
              $('.invoiceid').text(data.InvoiceId);
              $('.payment').text('Metode Pembayaran: '+data.data.Payment);
              $('.itemname').text('Produk/Item: '+data.data.ItemName);
              $('.id').text('Tujuan: '+data.data.NickName+' - '+data.data.Note);
              $('.total').append('Total Pembayaran: '+formatRupiah(data.data.Amount.toString(), 'Rp. '));
              $('.tanggal').text('Tanggal: '+data.data.TanggalUpdate);
              $('.ket').text('SN/Ket: '+data.data.Ket);
              $('.status').append(data.dataStatus);
            }else {
              $('.data-pesanan').hide();
              $('.intruksi-p').hide();
              $('.status').empty();
              $('.game').empty();
              $('.invoiceid').text('');
              $('.payment').text('');
              $('.itemname').text('');
              $('.id').text('');
              $('.total').empty();
              $('.tanggal').text('');
              $('.ket').text('TRANSAKSI GAGAL');
            }

          },
          error: function(){
          }
        });
      }
    }
    function getint(){
      var cekid = $('.cekid').val();
      if (cekid != '') {
        $.ajax({
          url: "<?php echo base_url('pesanan/getint'); ?>",
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data:{
            'invoiceid' : cekid
          },
          success: function(data){
            if (data.success) {
              $('.intruksi-p').empty();
              $('.intruksi-p').append('<h3>Detail Pembayaran</h3>');
              $('.intruksi-p').append('<hr>');
              $('.intruksi-p').append('<h5>Total Pembayaran: '+formatRupiah(data.data.amount.toString(), 'Rp. ')+'</h5>');
              $('.intruksi-p').append('<h5>Virtual Account: '+data.data.payment_name+'</h5>');
              if (data.data.pay_code == null) {
                $('.intruksi-p').append('<hr>');
                $('.intruksi-p').append('<h3>QR CODE PEMBAYARAN</h3>');
                $('.intruksi-p').append('<img src="'+data.data.qr_url+'" alt="QR Code" title="QR Code">');
                $('.intruksi-p').append('<hr>');

              }else {
                $('.intruksi-p').append('<h5>Nomor Virtual Account: '+data.data.pay_code+'</h5>');
              }


            }else {
              $('.intruksi-p').empty();
            }

          },
          error: function(){
            $('.status').empty();
          }
        });
      }
    }
    if ('<?php echo $this->input->get('inv')?>' != '') {
      cektransaksi();
    }

  });
</script>

</body>

</html>
