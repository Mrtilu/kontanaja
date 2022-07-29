<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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

<!--OG2-->
<?php if ($this->uri->segment(1) == null || $this->uri->segment(1) == 'listharga' || $this->uri->segment(1) == 'pesanan' || $this->uri->segment(1) == 'profile' || $this->uri->segment(1) == 'transaksi'): ?>
<!--Title-->
<title><?php echo $title ?></title>
<meta name="title" content="<?php echo $title ?>">
<meta name="description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
<meta name="keywords" content="<?php echo SITE_KEYWORDS; ?>">
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:type" content="Website">
<meta property="og:description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
<meta property="og:image" content="<?php echo base_url(); ?>assets/upload/Kincaimedia.png?<?php echo BLACKEXPOVERSION; ?>">
<meta name="twitter:title" content="<?php echo $title ?>">
<meta name="twitter:description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
<meta name="twitter:image" content="<?php echo base_url(); ?>assets/upload/Kincaimedia.png?<?php echo BLACKEXPOVERSION; ?>">
<meta itemprop="title" content="<?php echo $title ?>">
<meta itemprop="name" content="<?php echo $title ?>">
<meta itemprop="description" content="<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.">
<meta itemprop="image" content="<?php echo base_url(); ?>assets/upload/Kincaimedia.png?<?php echo BLACKEXPOVERSION; ?>">
<?php endif; ?>
<?php if ($this->uri->segment(1) == 'pulsa'): ?>
<!--Title-->
<title><?php echo $title ?> Termurah</title>
<meta name="title" content="<?php echo $title ?> Termurah">
<meta name="description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel PPOB Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta name="keywords" content="Topup Pulsa, Web Topup PPOB, Pulsa Murah, Panel PPOB Murah">
<meta property="og:title" content="<?php echo $title ?> Termurah">
<meta property="og:type" content="Article">
<meta property="og:description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Pulsa Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta property="og:image" content="<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>">
<meta name="twitter:title" content="<?php echo $title ?> Termurah">
<meta name="twitter:description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Pulsa Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta name="twitter:image" content="<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>">
<meta itemprop="title" content="<?php echo $title ?> Termurah">
<meta itemprop="name" content="<?php echo $title ?> Termurah">
<meta itemprop="description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Pulsa Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta itemprop="image" content="<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>">
<?php endif; ?>
<?php if ($this->uri->segment(1) == 'data'): ?>
<!--Title-->
<title><?php echo $title ?> Termurah</title>
<meta name="title" content="<?php echo $title ?> Termurah">
<meta name="description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta name="keywords" content="Topup Paket Data, Web Topup PPOB, Paket Murah, Panel PPOB Murah">
<meta property="og:title" content="<?php echo $title ?> Termurah">
<meta property="og:type" content="Article">
<meta property="og:description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta property="og:image" content="<?php echo base_url(); ?>assets/upload/home/data.png?<?php echo BLACKEXPOVERSION; ?>">
<meta name="twitter:title" content="<?php echo $title ?> Termurah">
<meta name="twitter:description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta name="twitter:image" content="<?php echo base_url(); ?>assets/upload/home/data.png?<?php echo BLACKEXPOVERSION; ?>">
<meta itemprop="title" content="<?php echo $title ?> Termurah">
<meta itemprop="name" content="<?php echo $title ?> Termurah">
<meta itemprop="description" content="<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.">
<meta itemprop="image" content="<?php echo base_url(); ?>assets/upload/home/data.png?<?php echo BLACKEXPOVERSION; ?>">
<?php endif; ?>
<?php if ($this->uri->segment(1) == 'order'): ?>
<!--Title-->
<title><?php echo $title ?> Termurah</title>
<meta name="title" content="<?php echo $title ?> Termurah">
<meta name="description" content="<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.">
<meta name="keywords" content="Topup <?php echo $gameName; ?>, Web <?php echo $gameName; ?>, <?php echo $gameName; ?> Murah, Panel <?php echo $gameName; ?> Murah">
<meta property="og:title" content="<?php echo $title ?> Termurah">
<meta property="og:type" content="Article">
<meta property="og:description" content="<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.">
<meta property="og:image" content="<?php echo $gamePic; ?>">
<meta name="twitter:title" content="<?php echo $title ?> Termurah">
<meta name="twitter:description" content="<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.">
<meta name="twitter:image" content="<?php echo $gamePic; ?>">
<meta itemprop="title" content="<?php echo $title ?> Termurah">
<meta itemprop="name" content="<?php echo $title ?> Termurah">
<meta itemprop="description" content="<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.">
<meta itemprop="image" content="<?php echo $gamePic; ?>">
<?php endif; ?>

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
<link rel="manifest" href="<?php echo base_url(); ?>manifest.json">
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
<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia144.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia180.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="32x32" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia32.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="48x48" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia48.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="72x72" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia72.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="96x96" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia96.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="144x144" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia144.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="168x168" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia168.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="180x180" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia180.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia192.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="256x256" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia256.png?<?php echo BLACKEXPOVERSION; ?>">
<link rel="icon" sizes="512x512" href="<?php echo base_url(); ?>assets/upload/kincaimedia/kincaimedia512.png?<?php echo BLACKEXPOVERSION; ?>">

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

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Oxanium:400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css?<?php echo BLACKEXPOVERSION; ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css?<?php echo BLACKEXPOVERSION; ?>">

<!-- Vendor CSS Files -->
<link href="<?php echo base_url() ?>assets/assets/vendor/aos/aos.css?<?php echo BLACKEXPOVERSION; ?>" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css?<?php echo BLACKEXPOVERSION; ?>" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css?<?php echo BLACKEXPOVERSION; ?>" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/assets/vendor/swiper/swiper-bundle.min.css?<?php echo BLACKEXPOVERSION; ?>" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css?<?php echo BLACKEXPOVERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.css?<?php echo BLACKEXPOVERSION; ?>">

<!-- Template Main CSS File -->
<link href="<?php echo base_url() ?>assets/assets/css/style.css?<?php echo BLACKEXPOVERSION; ?>" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js?<?php echo BLACKEXPOVERSION; ?>" async defer></script>

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

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo google_analytics; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo google_analytics; ?>');
</script>

<!--SCHEMA.ORG 1-->
<!--WebSite-->
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "WebSite",
		"@id": "#WebSite",
		"name": "<?php echo SITE_NAME; ?>",
		"alternateName": "<?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>",
		"headline": "<?php echo SITE_NAME; ?>",
		"url": "<?php echo base_url(); ?>",
		"description": "<?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>. <?php echo DESKRIPSI_1; ?>.",
		"disambiguatingDescription": "<?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>. <?php echo DESKRIPSI_1; ?>. - <?php echo DESKRIPSI_2; ?>",
		"keywords":["voucher games","top up games","panel topup game","panel PPOB","PPOB termurah","voucher termurah"],
		"genre":["top up","payment","store","voucher","finance","fintech"],
		"image": {
    		"@type": "ImageObject",
    		"@id": "#ImageWebSite",
    		"inLanguage": "id-ID",
    		"url": "<?php echo base_url() ?>assets/upload/Kincaimedia.png?<?php echo BLACKEXPOVERSION; ?>",
    		"caption": "<?php echo SITE_NAME; ?>"
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
		"publisher": {"@id": "#Store"},
		"sponsor": {"@id": "#Corporation"}
	}
</script>
<!--Store-->
<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Store",
		"@id": "#Store",
		"name": "<?php echo SITE_NAME; ?>",
		"alternateName": "<?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>",
		"url": "<?php echo base_url(); ?>",
		"description": "<?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>. <?php echo DESKRIPSI_1; ?>.",
		"disambiguatingDescription": "<?php echo SITE_NAME; ?> - <?php echo TAGLINE_NAME; ?>. <?php echo DESKRIPSI_1; ?>. - <?php echo DESKRIPSI_2; ?>",
  		"image": {
      		"@type": "ImageObject",
      		"@id": "#ImageWebSite",
      		"inLanguage": "id-ID",
      		"url": "<?php echo base_url() ?>assets/upload/Kincaimedia.png?<?php echo BLACKEXPOVERSION; ?>",
      		"caption": "<?php echo SITE_NAME; ?>"
  		},
  		"address": {"@id": "#PostalAddressCorporation"},
  		"telephone": "<?php echo COMPANY_PHONE; ?>",
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
		"priceRange": "$"
	}
</script>
<!--Corporation-->
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Corporation",
        "@id": "#Corporation",
        "url": "<?php echo URLWEB_PERUSAHAAN; ?>",
        "name": "<?php echo NAMA_PERUSAHAAN; ?>",
        "alternateName": "<?php echo NAMA_PERUSAHAAN_ALT; ?>",
        "description": "<?php echo DESC_PERUSAHAAN; ?>",
        "disambiguatingDescription": "<?php echo DESC_PERUSAHAAN_ALT; ?>",
        "telephone": "<?php echo COMPANY_PHONE; ?>",
        "sameAs": [
            "https://instagram.com/401xd",
            "<?php echo URLWEB_PERUSAHAAN; ?>",
            "mailto:mycoding@401xd.com"
        ],
        "logo": {
            "@type": "ImageObject",
            "@id": "#LogoCorporation",
            "inLanguage": "id-ID",
            "url": "<?php echo base_url() ?>assets/upload/401XDGroup.png?<?php echo BLACKEXPOVERSION; ?>",
            "caption": "<?php echo NAMA_PERUSAHAAN_ALT; ?>"
        },
        "image": {
            "@type": "ImageObject",
            "@id": "#ImageCorporation",
            "inLanguage": "id-ID",
            "url": "<?php echo base_url() ?>assets/upload/401XDGroupIndonesia.png?<?php echo BLACKEXPOVERSION; ?>",
            "caption": "<?php echo NAMA_PERUSAHAAN_ALT; ?>"
        },
        "address": {
            "@type": "PostalAddress",
            "@id": "#PostalAddressCorporation",
            "streetAddress": "<?php echo NAMA_PERUSAHAAN; ?>, <?php echo COMPANY_ADDRESS; ?>",
            "addressLocality": "<?php echo COMPANY_CITY; ?>",
            "addressRegion": "<?php echo COMPANY_PROVINCE; ?>",
            "postalCode": "<?php echo COMPANY_CODE; ?>",
            "addressCountry": "<?php echo COMPANY_COUNTRY; ?>"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "1<?php echo date("d"); ?><?php echo date("m"); ?>"
        },
        "review": {
            "@type": "Review",
            "@id": "#ReviewCorporation",
            "name": "Ulasan <?php echo SITE_NAME; ?>",
            "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
            "description": "<?php echo DESKRIPSI_2; ?>",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "4.9",
                "worstRating": "1",
                "bestRating": "5"
            }
        }
    }
</script>

<!--SCHEMA.ORG 2-->
<?php if ($this->uri->segment(1) == 'listharga' || $this->uri->segment(1) == 'pesanan' || $this->uri->segment(1) == 'profile' || $this->uri->segment(1) == 'transaksi'): ?>
<!--WebPage-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebPage",
    "name": "<?php echo $title ?>",
    "alternateName": "<?php echo $title ?> - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?>",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>: <?php echo SITE_KEYWORDS; ?>.",
    "disambiguatingDescription": "<?php echo $title ?>. <?php echo DESKRIPSI_1; ?>. <?php echo DESKRIPSI_2; ?>",
    "keywords":["voucher games","top up games","panel topup game","panel PPOB","PPOB termurah","voucher termurah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url() ?>assets/upload/Kincaimedia.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>"
  }
</script>
<?php endif; ?>

<?php if ($this->uri->segment(1) == 'pulsa'): ?>
<!--Product-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel PPOB Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Pulsa Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "category":["Topup Pulsa","Web Topup PPOB","Pulsa Murah","Panel PPOB Murah"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
    },
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
    "brand": [
      { "@id": "#Store", "@type": "Store" },
      { "@id": "#Corporation", "@type": "Corporation" }
    ],

    "mainEntityOfPage": "true",

    "sku": "<?php echo SITE_NAME; ?>PULSA",
    "mpn": "PULSA",
    "identifier": "PULSA",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "1<?php echo date("d"); ?><?php echo date("m"); ?>"
    },
    "review": {
      "@type": "Review",
      "@id": "#ReviewProduct",
      "name": "Ulasan <?php echo SITE_NAME; ?>",
      "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
      "description": "<?php echo DESKRIPSI_2; ?>",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "4.9",
        "worstRating": "1",
        "bestRating": "5"
      }
    },
    "offers": {
      "@type": "AggregateOffer",
      "lowPrice": "10000",
      "highPrice": "100000",
      "priceCurrency": "IDR",
      "availability": "https://schema.org/InStock",
      "itemCondition": "https://schema.org/UsedCondition",
      "priceValidUntil": "2030-12-12",
      "offerCount": "<?php echo date("Y"); ?>1"
    }
  }
</script>
<!--Article-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Article",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> Termurah",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel PPOB Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Pulsa Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "keywords":["Topup Pulsa","Web Topup PPOB","Pulsa Murah","Panel PPOB Murah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>",

    "dateCreated": "<?php echo date("Y-m-d H:i:s"); ?>",
    "datePublished": "<?php echo date("Y-m-d H:i:s"); ?>",
    "dateModified": "<?php echo date("Y-m-d H:i:s"); ?>",
    "articleSection": ["Topup Pulsa","Web Topup PPOB","Pulsa Murah","Panel PPOB Murah"]
  }
</script>
<!--NewsArticle-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> Termurah",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel PPOB Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Pulsa Termurah untuk Melakukan Isi Ulang Pulsa All Operator. Daftar Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "keywords":["Topup Pulsa","Web Topup PPOB","Pulsa Murah","Panel PPOB Murah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>",

    "dateCreated": "<?php echo date("Y-m-d H:i:s"); ?>",
    "datePublished": "<?php echo date("Y-m-d H:i:s"); ?>",
    "dateModified": "<?php echo date("Y-m-d H:i:s"); ?>",
    "articleSection": ["Topup Pulsa","Web Topup PPOB","Pulsa Murah","Panel PPOB Murah"]
  }
</script>
<?php endif; ?>

<?php if ($this->uri->segment(1) == 'data'): ?>
<!--Product-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "category":["Topup Paket Data","Web Topup PPOB","Paket Murah","Panel PPOB Murah"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
    },
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
    "brand": [
      { "@id": "#Store", "@type": "Store" },
      { "@id": "#Corporation", "@type": "Corporation" }
    ],

    "mainEntityOfPage": "true",

    "sku": "<?php echo SITE_NAME; ?>PULSA",
    "mpn": "PULSA",
    "identifier": "PULSA",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "1<?php echo date("d"); ?><?php echo date("m"); ?>"
    },
    "review": {
      "@type": "Review",
      "@id": "#ReviewProduct",
      "name": "Ulasan <?php echo SITE_NAME; ?>",
      "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
      "description": "<?php echo DESKRIPSI_2; ?>",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "4.9",
        "worstRating": "1",
        "bestRating": "5"
      }
    },
    "offers": {
      "@type": "AggregateOffer",
      "lowPrice": "10000",
      "highPrice": "100000",
      "priceCurrency": "IDR",
      "availability": "https://schema.org/InStock",
      "itemCondition": "https://schema.org/UsedCondition",
      "priceValidUntil": "2030-12-12",
      "offerCount": "<?php echo date("Y"); ?>1"
    }
  }
</script>
<!--Article-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Article",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> Termurah",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "keywords":["Topup Paket Data","Web Topup PPOB","Paket Murah","Panel PPOB Murah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>",

    "dateCreated": "<?php echo date("Y-m-d H:i:s"); ?>",
    "datePublished": "<?php echo date("Y-m-d H:i:s"); ?>",
    "dateModified": "<?php echo date("Y-m-d H:i:s"); ?>",
    "articleSection": ["Topup Paket Data","Web Topup PPOB","Paket Murah","Panel PPOB Murah"]
  }
</script>
<!--NewsArticle-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> Termurah",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo $title ?> Termurah. <?php echo SITE_NAME; ?> Menyediakan Web Panel Topup Paket Internet Termurah untuk Melakukan Isi Ulang Paket Data Internet All Operator. Daftar Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "keywords":["Topup Paket Data","Web Topup PPOB","Paket Murah","Panel PPOB Murah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo base_url(); ?>assets/upload/home/pulsa.png?<?php echo BLACKEXPOVERSION; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>",

    "dateCreated": "<?php echo date("Y-m-d H:i:s"); ?>",
    "datePublished": "<?php echo date("Y-m-d H:i:s"); ?>",
    "dateModified": "<?php echo date("Y-m-d H:i:s"); ?>",
    "articleSection": ["Topup Paket Data","Web Topup PPOB","Paket Murah","Panel PPOB Murah"]
  }
</script>
<?php endif; ?>

<?php if ($this->uri->segment(1) == 'order'): ?>
<!--Product-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "category":["Topup <?php echo $gameName; ?>","Web <?php echo $gameName; ?>","<?php echo $gameName; ?> Murah","Panel <?php echo $gameName; ?> Murah"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo $gamePic; ?>",
      "caption": "<?php echo $title ?>"
    },
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
    "brand": [
      { "@id": "#Store", "@type": "Store" },
      { "@id": "#Corporation", "@type": "Corporation" }
    ],

    "mainEntityOfPage": "true",

    "sku": "<?php echo SITE_NAME; ?><?php echo $gameName; ?>",
    "mpn": "<?php echo $gameName; ?>",
    "identifier": "<?php echo $gameName; ?>",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "1<?php echo date("d"); ?><?php echo date("m"); ?>"
    },
    "review": {
      "@type": "Review",
      "@id": "#ReviewProduct",
      "name": "Ulasan <?php echo SITE_NAME; ?>",
      "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
      "description": "<?php echo DESKRIPSI_2; ?>",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "4.9",
        "worstRating": "1",
        "bestRating": "5"
      }
    },
    "offers": {
      "@type": "AggregateOffer",
      "lowPrice": "10000",
      "highPrice": "1000000",
      "priceCurrency": "IDR",
      "availability": "https://schema.org/InStock",
      "itemCondition": "https://schema.org/UsedCondition",
      "priceValidUntil": "2030-12-12",
      "offerCount": "<?php echo date("Y"); ?>1"
    }
  }
</script>
<!--Article-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Article",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> Termurah",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "keywords":["Topup <?php echo $gameName; ?>","Web <?php echo $gameName; ?>","<?php echo $gameName; ?> Murah","Panel <?php echo $gameName; ?> Murah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo $gamePic; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>",

    "dateCreated": "<?php echo date("Y-m-d H:i:s"); ?>",
    "datePublished": "<?php echo date("Y-m-d H:i:s"); ?>",
    "dateModified": "<?php echo date("Y-m-d H:i:s"); ?>",
    "articleSection": ["Topup <?php echo $gameName; ?>","Web <?php echo $gameName; ?>","<?php echo $gameName; ?> Murah","Panel <?php echo $gameName; ?> Murah"]
  }
</script>
<!--NewsArticle-->
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "name": "<?php echo $title ?> Termurah",
    "alternateName": "<?php echo $title ?> Termurah - <?php echo TAGLINE_NAME; ?>",
    "headline": "<?php echo $title ?> Termurah",
    "url": "<?php echo base_url(uri_string()); ?>",
    "description": "<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah.",
    "disambiguatingDescription": "<?php echo SITE_NAME; ?> Menyediakan Web Panel Topup <?php echo $gameName; ?> Termurah dan Isi Ulang <?php echo $gameName; ?> Online Tercepat untuk Pembelian dan Top Up Item, Voucher, dan Kredit <?php echo $gameName; ?>. <?php echo $title ?> Termurah. Daftar <?php echo SITE_NAME; ?> Sekarang dan Dapatkan Harga Termurah. <?php echo DESKRIPSI_2; ?>",
    "keywords":["Topup <?php echo $gameName; ?>","Web <?php echo $gameName; ?>","<?php echo $gameName; ?> Murah","Panel <?php echo $gameName; ?> Murah"],
    "genre":["top up","payment","store","voucher","finance","fintech"],
    "image": {
      "@type": "ImageObject",
      "@id": "#Image",
      "inLanguage": "id-ID",
      "url": "<?php echo $gamePic; ?>",
      "caption": "<?php echo $title ?>"
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
    "publisher": {"@id": "#Store"},
    "sponsor": {"@id": "#Corporation"},
    "isPartOf": {"@id": "#WebSite"},

    "mainEntityOfPage": "true",
    "isFamilyFriendly": "true",
    "author": { "@type": "Person", "name": "<?php echo SITE_NAME; ?>", "url": "<?php echo base_url() ?>" },
    "creator": "<?php echo NAMA_OWNER_WEB; ?>",
    "accountablePerson": "<?php echo NAMA_OWNER_WEB; ?>",
    "copyrightYear": "<?php echo date("Y"); ?>",
    "copyrightHolder": "<?php echo NAMA_OWNER_WEB; ?>",

    "dateCreated": "<?php echo date("Y-m-d H:i:s"); ?>",
    "datePublished": "<?php echo date("Y-m-d H:i:s"); ?>",
    "dateModified": "<?php echo date("Y-m-d H:i:s"); ?>",
    "articleSection": ["Topup <?php echo $gameName; ?>","Web <?php echo $gameName; ?>","<?php echo $gameName; ?> Murah","Panel <?php echo $gameName; ?> Murah"]
  }
</script>
<?php endif; ?>