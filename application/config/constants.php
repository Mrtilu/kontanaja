<?php

defined('BASEPATH') or exit('No direct script access allowed');

//DENGAN TANDA * HARUS DIISI/DIGANTI SESUAI WEB ANDA

//*EMAIL SETTING
define('MAILTYPE', 'html');
define('SMTPHOST', 'email-smtp.ap-southeast-1.amazonaws.com'); //host email
define('SMTPUSER', 'oki@forexchanger.com'); //email
define('SMTPPASS', 'BGIN838igcj3wa+egSKHKxJWoWR4xlPw49SVxLcDq/PA'); //password email
define('SMTPCRYPTO', 'tls');
define('SMTPPORT', 587);

//*INFO ADMIN
define('NAMA_OWNER_WEB', 'Rachmat Widodo'); //Nama pemilik web
define('EMAIL_ADMIN', 'ovalkapital.inter@gmail.com'); //email admin
define('ADMINPHONE', '+628122922952'); //Diawali +62
define('ADMINPHONEPAY', '08122922952'); //Diawali 08

//*CUSTOM Variables
define('AVAIL', true);
define('REF', 'INV'); //3 huruf ID invoice. Contoh: INV

//*META Data
define('SITE_NAME', 'Kontanaja'); //Nama Situs
define('TAGLINE_NAME', 'Games, Voucher dan PPOB Termurah'); //Tagline Situs

//*Deskripsi 1
define('DESKRIPSI_1', 'Kontanaja');

//*Deskripsi 2
define('DESKRIPSI_2', 'Kontanaja'); 
//Keyword Situs, Pisahkan dengan koma (,)
define('SITE_KEYWORDS', 'Kontanaja, PPOB Murah, Topup Game, PPOB Terpercaya'); 

//*INFO PERUSAHAAN/PT/CV TAMPIL DI FOOTER DAN DESKRIPSI SEO
define('NAMA_PERUSAHAAN', 'PT. Oval Kapital Internasional'); //Nama Perusahaan
define('NAMA_PERUSAHAAN_ALT', 'PT. Oval Kapital Internasional'); //Nama Panjang Perusahaan
define('URLWEB_PERUSAHAAN', 'https://ovalkapital.co.id/'); //URL Web Perusahaan
define('COMPANY_PHONE', '+628122922952'); //Nomor Telp. Perusahaan, Diawali +62
define('COMPANY_ADDRESS', 'Jl. Sumbawa, Ulak Karang Utara, Kec. Padang Utara'); //Alamat Jalan
define('COMPANY_CITY', 'Padang'); //Nama Kota
define('COMPANY_PROVINCE', 'Sumatera Barat'); //Nama Provinsi
define('COMPANY_CODE', '25133'); //Kode Pos
define('COMPANY_COUNTRY', 'Indonesia'); //Negara
define('DESC_PERUSAHAAN', 'Kontanaja'); //Deskripsi Perusahaan
define('DESC_PERUSAHAAN_ALT', 'Kontanaja'); //Deskripsi Perusahaan

//SOSIAL MEDIA
define('YOUTUBELINK', 'https://youtube.com/c/UserName');
define('FACEBOOKLINK', 'https://facebook.com/UserName');
define('ID_FACEBOOK_APP', 'XXXXXXXXXXXXXXXXX'); //ID APP FACEBOOK
define('INSTAGRAMLINK', 'https://instagram.com/UserName');
define('TWITTERLINK', 'https://twitter.com/UserName');
define('LINKEDINLINK', 'https://linkedin.com/company/UserName');

//KODE VERIFIKASI SITUS. HANYA KODE/ID (BUKAN SCRIPT) OPTIONAL
define('google_verification', 'XXXXXXXXXXXXXXXXX_XXXXXXXXXXXXXXXXXXXXX');
define('bing_verification', 'XXXXXXXXXXXXXXXXX');
define('yandex_verification', 'XXXXXXXXXXXXXXXXX');
define('norton_safeweb', 'XXXXXXXXXXXXXXXXX');
define('pinterest_verification', 'XXXXXXXXXXXXXXXXX');
define('facebook_verification', 'XXXXXXXXXXXXXXXXX');

//GOOGLE ANALITICS UNIVERSAL CODE
define('google_analytics', 'ganti');
//CONTOH ID: UA-163246813-9

//*GOOGLE reCAPTCHA v2
//Daftar di https://www.google.com/recaptcha/admin
define('GOOGLEKEY', '6LdPqJshAAAAAP3MHifohzU7ljq1U5GhXqg32SsQ');
define('GOOGLESITE_KEY', '6LdPqJshAAAAAJSAWuTP1KwEiFvb1dS6T-4HccWQ');

//*PAYMENT GATEWAY & PRODUK DIGIFLAZZ
$production = true; //true OR false

if ($production == true) { //true
//*JIKA PRODUCTION
    //tripay
    define('URL_TRANSAKSI', "https://tripay.co.id/api/transaction/create");
    define('API_KEY', 'PcMAIZa7x7alnOJ8Rv7nvMQuuIzT0N8IrhtlyfUS');
    define('PRIVATE_KEY', '2Sval-nUQJ5-TA4nu-n3UGO-SzMl7');
    define('MERCHANT_CODE', 'T14058');
    //digiflaz
    define('USERNAME_DIGI', 'vuvoniWMvjvg');
    define('KEY_GIDI', 'c108d5ab-d819-51bc-aa47-99455998a54e');
    define('PRIVATEDIGI', 'secret123');
} else { //false
//JIKA SANDBOX
    //tripay
    define('URL_TRANSAKSI', "https://tripay.co.id/api/transaction/create");
    define('API_KEY', 'DEV-6luhRGlEsBsCA6BY5UWuP3alaZhXJHlIWt9DLlZG');
    define('PRIVATE_KEY', 'pCY8J-T9pB2-zOGTM-vxsEG-FALQM');
    define('MERCHANT_CODE', 'T14060');
    //digiflaz
    define('USERNAME_DIGI', 'vuvoniWMvjvg');
    define('KEY_GIDI', 'dev-694808d0-2223-11ed-9a99-57e39f196baf');
    define('PRIVATEDIGI', 'secret123');
//Untuk mode sandbox, semua metode pembayaran tripay akan tetap aktif meskipun Anda nonaktifkan.
}


/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') or define('SHOW_DEBUG_BACKTRACE', true);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  or define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') or define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   or define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  or define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           or define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     or define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       or define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  or define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   or define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              or define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            or define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       or define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        or define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          or define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         or define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   or define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  or define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') or define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     or define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       or define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      or define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      or define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//don't change!!
define('BLACKEXPOVERSION', '3.1.1');