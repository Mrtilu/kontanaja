<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<footer class="main-footer">
	<div class="footer-left">
		Copyright &copy;<?php echo date("Y"); ?> <?php echo SITE_NAME; ?>
	</div>
	<div class="footer-right">
		Powered by <a href="<?php echo URLWEB_PERUSAHAAN; ?>" rel="dofollow" target="_blank"><?php echo NAMA_PERUSAHAAN; ?></a>
	</div>
</footer>
</div>
</div>

<?php $this->load->view('_layout/js'); ?>

<!--Scroll Indicator Load-->
<div class='progress-container'>
    <div class='progress-bar' id='progressbar'>
</div>
<script>
  window.addEventListener("scroll", myFunction);
  function myFunction() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progressbar").style.width = scrolled + "%";
  }
</script>