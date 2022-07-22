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
        color: black;
      }
      a.readmore{
        cursor: pointer;
        color: black;
      }
      a.readmore:hover{
        color: white;
      }
      p.readmore{
        cursor: pointer;
        color: white;
      }
      .balance{
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
      <section class="section bg-white text-dark pt-5 pb-5">
        <div class="container">
          <div class="row mb-3">
            <div class="col-md-4 col-12">
              <div class="col-md-12 blackexpostyledua rounded-3 p-3 mb-2 mt-2">
                <h3 class="h3 text-white"><?php echo $this->ion_auth->user()->row()->email ?></h3>
                <div class="text-white">
                  <?php $group = 'resseler'; echo($this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name); ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="col-md-12 blackexpostyledua rounded-3 p-3 mb-2 mt-2">
                <h3 class="h3 text-white">Pembelian Hari ini</h3>
                <div class="text-white">
                  <?php echo "Rp " . number_format($pembelianHariIni, 0, ',', '.'); ?>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="col-md-12 blackexpostyledua rounded-3 p-3 mb-2 mt-2">
                <h3 class="h3 text-white">Total Pembelian</h3>
                <div class="text-white">
                  <?php echo "Rp " . number_format($totalPembelian, 0, ',', '.'); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 blackexpostyledua rounded-3 p-3 mb-2 mt-2">
            <h3 class="h3 text-white m-0">Riwayat Pembelian</h3>
          </div>
          <div class="row align-items-stretch pb-3">
            <div class="col-md-12 ml-auto text-dark"  data-aos-delay="100">
              <div class="sticky-content table-responsive">
                <table id="example" class="table " >
                  <thead class="text-dark">
                    <tr>
                      <th>Id</th>
                      <th>User</th>
                      <th>Invoice</th>
                      <th>Payment</th>
                      <th>Produk</th>
                      <th>Tujuan</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Tanggal</th>
                      <th>Ket</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="text-dark">
                    <?php $i=0; foreach ($data as $d): $i++?>
                    <tr>
                      <td><?php echo $d->Id; ?></td>
                      <td>
                        <?php if ($d->UserId == 0) {
                          echo "Guest";
                        } else {
                          $user = $this->db->where('id', $d->UserId)->get('users')->row();
                          echo $user->first_name;
                        } ?>
                      </td>
                      <td><?php echo $d->InvoiceId; ?></td>
                      <td><?php echo $d->Payment; ?></td>
                      <td><?php echo $d->ItemName; ?></td>
                      <td><?php echo $d->NickName.' - '.$d->Note; ?></td>
                      <td><?php echo $d->Game; ?></td>
                      <td><?php echo "Rp " . number_format($d->Amount, 0, ',', '.'); ?></td>
                      <td><?php echo $d->TanggalUpdate; ?></td>
                      <td><?php echo $d->Ket; ?></td>
                      <td class="text-white">
                        <?php if ($d->StatusOrder == 0) {
                        echo '<div class="bg-primary text-center rounded-3 p-2">
                        <div>Belum dibayar</div>
                        </div>';
                        } elseif ($d->StatusOrder == 1) {
                        echo '<div class="bg-success text-center rounded-3 p-2">
                        <div>Sudah Dibayar</div>
                        </div>';
                        } elseif ($d->StatusOrder == 2) {
                        echo '<div class="bg-warning text-center rounded-3 p-2">
                        <div>Expired</div>
                        </div>';
                        } elseif ($d->StatusOrder == 3) {
                        echo '<div class="bg-danger text-center rounded-3 p-2">
                        <div>Gagal</div>
                        </div>';
                        } elseif ($d->StatusOrder == 4) {
                        echo '<div class="bg-danger text-center rounded-3 p-2">
                        <div>Gagal By Server</div>
                        </div>';
                        } elseif ($d->StatusOrder == 5) {
                        echo '<div class="bg-success text-center rounded-3 p-2">
                        <div>Success</div>
                        </div>';
                        } elseif ($d->StatusOrder == 6) {
                        echo '<div class="bg-warning text-center rounded-3 p-2">
                        <div>Pending</div>
                        </div>';
                        } ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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

    <!--Footer-->

    <!-- Vendor JS Files -->
    <?php $this->load->view('front/_layout/Footer'); ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        $('#example').DataTable({
          "order": [[ 0, "desc" ]],
          "pageLength": 20,
          "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
        });
        $('#example2').DataTable({
          "order": [[ 0, "desc" ]],
          "pageLength": 5,
          "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
        });
        console.log( "ready" );

        function formatRupiah(angka, prefix){
         var number_string = angka.replace(/[^,\d]/g, '').toString(),
         split = number_string.split(','),
         sisa = split[0].length % 3,
         rupiah = split[0].substr(0, sisa),
         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

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
