<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <!--Viewport -->
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Search engines verification -->
  <meta name="google-site-verification" content="<?php echo google_verification; ?>">
  <meta name="msvalidate.01" content="<?php echo bing_verification; ?>">
  <meta name="yandex-verification" content="<?php echo yandex_verification; ?>">
  <meta name="norton-safeweb-site-verification" content="<?php echo norton_safeweb; ?>">

  <!-- Social media verification-->
  <meta name="p:domain_verify" content="<?php echo pinterest_verification; ?>">
  <meta name="facebook-domain-verification" content="<?php echo facebook_verification; ?>">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>" rel="icon">
  <link href="<?php echo base_url() ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>" rel="apple-touch-icon">

  <!-- Canonical -->
  <meta name="robots" content="all,index,follow">
  <link rel="home" href="<?php echo base_url(); ?>">
  <link rel="canonical" href="<?php echo base_url(uri_string()); ?>">

  <!--Author-->
  <meta name="author" content="<?php echo NAMA_OWNER_WEB; ?>">
  <meta name="publisher" content="<?php echo NAMA_PERUSAHAAN; ?>">

  <!--OG1-->
  <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
  <meta property="og:url" content="<?php echo base_url(uri_string()); ?>">
  <meta property="og:locale" content="id_ID">
  <meta property="og:locale:alternate" content="en_US">
  <meta property="fb:app_id" content="<?php echo ID_FACEBOOK_APP; ?>">
  <meta property="pinterest-rich-pin" content="true">
  <meta property="article:author" content="<?php echo NAMA_OWNER_WEB; ?>">
  <meta property="og:rich_attachment" content="true">
  <meta name="og:image:width" content="590">
  <meta name="og:image:height" content="auto">
  <meta name="twitter:url" content="<?php echo base_url(uri_string()); ?>">
  <meta name="twitter:site" content="<?php echo base_url(); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta itemprop="url" content="<?php echo base_url(uri_string()); ?>">

  <!--Title-->
  <title><?php echo $title ?> - <?php echo SITE_NAME; ?></title>
  <meta name="title" content="<?php echo $title ?> - <?php echo SITE_NAME; ?>">
  <meta name="description" content="<?php echo $title ?> - <?php echo SITE_NAME; ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
  <meta name="keywords" content="<?php echo SITE_KEYWORDS; ?>">
  <meta property="og:title" content="<?php echo $title ?>">
  <meta property="og:type" content="Website">
  <meta property="og:description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
  <meta property="og:image" content="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <meta name="twitter:title" content="<?php echo $title ?>">
  <meta name="twitter:description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
  <meta name="twitter:image" content="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <meta itemprop="title" content="<?php echo $title ?>">
  <meta itemprop="name" content="<?php echo $title ?>">
  <meta itemprop="description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
  <meta itemprop="image" content="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">

  <!--global-->
  <link rel="schema.DC" href="<?php echo base_url(uri_string()); ?>">
  <link rel="schema.DCTERMS" href="https://kincaimedia.net/halaman/ketentuan-layanan">
  <meta name="DC.title" lang="id" content="<?php echo $title ?>">
  <meta name="DC.creator" content="<?php echo NAMA_OWNER_WEB; ?>">
  <meta name="DC.identifier" scheme="DCTERMS.URI" content="<?php echo base_url(uri_string()); ?>">
  <meta name="DC.format" scheme="DCTERMS.IMT" content="text/html">
  <meta name="DC.type" scheme="DCTERMS.DCMIType" content="text">
  <meta name="DCTERMS.type" content="Product">
  <meta name="DCTERMS.abstract" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
  <meta name="DCTERMS.source" property="og:site_name" content="<?php echo SITE_NAME; ?>">
  <meta name="DCTERMS.contributor" content="<?php echo NAMA_PERUSAHAAN; ?>">
  <meta name="DCTERMS.language" content="id-ID">
  <link rel="DCTERMS.replaces" hreflang="id" href="<?php echo base_url(uri_string()); ?>">

  <!--Webapp-->
  <link rel="manifest" href="<?php echo base_url(); ?>manifest.json?<?php echo BLACKEXPOVERSION; ?>">
  <meta name="msapplication-starturl" content="<?php echo base_url(); ?>">
  <meta name="start_url" content="<?php echo base_url(); ?>">
  <meta name="application-name" content="<?php echo SITE_NAME; ?>">
  <meta name="apple-mobile-web-app-title" content="<?php echo SITE_NAME; ?>">
  <meta name="msapplication-tooltip" content="<?php echo SITE_NAME; ?>">
  <meta name="theme-color" content="#0D47A1">
  <meta name="background_color" content="#FFFFFF">
  <meta name="msapplication-navbutton-color" content="#0D47A1">
  <meta name="msapplication-TileColor" content="#0D47A1">
  <meta name="apple-mobile-web-app-status-bar-style" content="#0D47A1">
  <meta name="mssmarttagspreventparsing" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="32x32" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="48x48" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="72x72" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="96x96" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="144x144" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="168x168" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="180x180" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="256x256" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="icon" sizes="512x512" href="<?php echo base_url(); ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>">

  <!--Location-->
  <meta content="id-ID" name="language">
  <meta content="id-ID" name="geo.region">
  <meta content="Indonesia" name="geo.country">
  <meta content="Indonesia" name="geo.placename">
  <meta content="x;x" name="geo.position">
  <meta content="x,x" name="ICBM">

  <!--resource-->
  <link href="//www.youtube.com" rel="preconnect dns-prefetch">
  <link href="//pagead2.googlesyndication.com" rel="preconnect dns-prefetch">
  <link href="//googleads.g.doubleclick.net" rel="preconnect dns-prefetch">
  <link href="//ad.doubleclick.net" rel="preconnect dns-prefetch">
  <link href="//www.googletagmanager.com" rel="preconnect dns-prefetch">
  <link href="//partner.googleadservices.com" rel="preconnect dns-prefetch">
  <link href="//www.googletagservices.com" rel="preconnect dns-prefetch">
  <link href="//static.doubleclick.net" rel="preconnect dns-prefetch">
  <link href="//tpc.googlesyndication.com" rel="preconnect dns-prefetch">
  <link href="//www.google-analytics.com" rel="preconnect dns-prefetch">
  <link href="//adservice.google.com" rel="preconnect dns-prefetch">
  <link href="//www.recaptcha.net" rel="preconnect dns-prefetch">
  <link href="//www.google.com" rel="preconnect dns-prefetch">
  <link href="//i.ytimg.com" rel="preconnect dns-prefetch">
  <link href="//www.gstatic.com" rel="preconnect dns-prefetch">
  <link href="//yt3.ggpht.com" rel="preconnect dns-prefetch">
  <link href="//cdn.jsdelivr.net" rel="preconnect dns-prefetch">
  <link href="//fonts.gstatic.com" rel="preconnect dns-prefetch">
  <link href="//ajax.cloudflare.com" rel="preconnect dns-prefetch">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css?<?php echo BLACKEXPOVERSION; ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css?<?php echo BLACKEXPOVERSION; ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css?<?php echo BLACKEXPOVERSION; ?>">

  <!-- Form advance form -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css?<?php echo BLACKEXPOVERSION; ?>">
  
  <!-- post create -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css?<?php echo BLACKEXPOVERSION; ?>">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?<?php echo BLACKEXPOVERSION; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css?<?php echo BLACKEXPOVERSION; ?>">
  <style type="text/css">
    /*Scroll Indicator Load*/
    .progress-container{width:100%;position:fixed;top:0;left:0;z-index:9999}.progress-bar{height:5px;background:#333333;width:0%}
    /*Scroll Bar Page Element*/
    html{scrollbar-width:thin}
    html::-webkit-scrollbar{width:5px;background-color:#F5F5F5}
    html::-webkit-scrollbar-thumb{background-color:#333333;border-radius:0px}
    .element{scrollbar-width:thin}
    .element::-webkit-scrollbar{width:5px;background-color:#F5F5F5}
    .element::-webkit-scrollbar-thumb{background-color:#333333;border-radius:0px}
  </style>
</head>

<?php
  if ($this->uri->segment(3) != 'login' and $this->uri->segment(2) != 'login' and $this->uri->segment(1) != 'login' and $this->uri->segment(1) != 'register' and $this->uri->segment(3) != 'register' and $this->uri->segment(1) != 'forgot_password' and $this->uri->segment(3) != 'forgot_password' and $this->uri->segment(1) != 'reset_password' and $this->uri->segment(3) != 'reset_password'){
    $this->load->view('_layout/LayoutNew');
    $this->load->view('_layout/SidebarNew');
  }else {
  }
?>

<!--WebPage-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "<?php echo $title ?> - <?php echo SITE_NAME; ?>",
    "alternateName": "<?php echo $title ?> - <?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> - <?php echo SITE_NAME; ?>",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.",
    "disambiguatingDescription": "<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?> - <?php echo TAGLINE_NAME; ?>",
    "keywords":["voucher games","top up games","web topup","topup game murah","panel topup game","panel ppob","topup voucher","ppob termurah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
        "@type": "ImageObject",
        "@id": "#Image",
        "inLanguage": "id-ID",
        "url": "<?php echo base_url() ?>assets/upload/logo-oval.png?<?php echo BLACKEXPOVERSION; ?>",
        "caption": "<?php echo $title ?> - <?php echo SITE_NAME; ?>"
    },
    "inLanguage": "id-ID",
    "sameAs": [
        "<?php echo YOUTUBELINK; ?>",
        "<?php echo FACEBOOKLINK; ?>",
        "<?php echo INSTAGRAMLINK; ?>",
        "<?php echo TWITTERLINK; ?>",
        "<?php echo LINKEDINLINK; ?>"
    ],
    "potentialAction": {
        "@type": "SearchAction",  
        "target": "<?php echo base_url('pesanan'); ?>?inv={query}",
        "query-input": "required name=query"
    },
    "speakable": {
        "@type": "SpeakableSpecification",
        "xpath": [
            "/html/head/title",
            "/html/head/meta[@name='description']/@content"
        ]
    },
    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>"
    }
</script>

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo google_analytics; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo google_analytics; ?>');
</script>