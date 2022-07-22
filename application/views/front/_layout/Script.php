<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script src="<?php echo base_url() ?>assets/newassets/js/vendor/jquery-3.5.0.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/popper.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/bootstrap.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/isotope.pkgd.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/imagesloaded.pkgd.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/jquery.magnific-popup.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/owl.carousel.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/jquery.odometer.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/jquery.appear.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/slick.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/ajax-form.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/wow.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/aos.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/plugins.js?<?php echo BLACKEXPOVERSION; ?>"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/main.js?<?php echo BLACKEXPOVERSION; ?>"></script>

<?php if ($this->uri->segment(1) != null): ?>
  <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js?<?php echo BLACKEXPOVERSION; ?>"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php endif; ?>

<script type="text/javascript">
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan){ // tambahkan titik jika yang di input sudah menjadi angka ribuan
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
