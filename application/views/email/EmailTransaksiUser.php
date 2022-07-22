<!DOCTYPE html>
<html lang="id">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title><?php echo SITE_NAME; ?></title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:50px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">

                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:24px;font-family:'Rubik',sans-serif;">
                                            <?php echo 'Transaksi '.$InvoiceId; ?>
                                        </h1>
                                        <hr>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0; text-align: left;">
                                            Invoice ID: <?php echo $InvoiceId; ?> <br>
                                            Username: <?php if ($UserId == 0) {
                                                echo "Guest";
                                            } else {
                                            $user = $this->db->where('id', $UserId)->get('users')->row();
                                            echo $user->first_name;
                                            } ?> <br>
                                            Item: <?php echo $ItemName; ?> <br>
                                            SN/Ket: <?php echo $Ket; ?> <br>
                                            Total:  <?php echo "Rp " . number_format($Amount, 0, ',', '.'); ?><br>
                                            Tanggal: <?php echo $TanggalOrder; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong><?php echo SITE_NAME; ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:50px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
