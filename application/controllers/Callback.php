<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library(['ion_auth', 'form_validation']);
    $this->load->helper(['url', 'language']);
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->lang->load('auth');
  }

  public function index() {
    $WebsiteSetting = $this->db->get('data_setting')->row();
    $privateKey = PRIVATE_KEY;
    $callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';
    $json = file_get_contents("php://input");
    $signature = hash_hmac('sha256', $json, $privateKey);
    if( $callbackSignature !== $signature ) {
      exit("Invalid Signature");
    }
    $data = json_decode($json);
    $event = $_SERVER['HTTP_X_CALLBACK_EVENT'];
    $dataTest = 'PAID';
    $inputData['TanggalUpdate'] = date('Y-m-d H:i:s');

    //log 
    $dataTrigger = [
      'payload' => $json,
      'type' => "callback_from_payment_gateway",
      'created_at' => date("Y-m-d H:i:s"),
      'reference_id' => $data->merchant_ref
    ];
    $insertDataTrigger = $this->db->insert('log_triggered', $dataTrigger);    

    if ($event == 'payment_status') {
      $merchantRef = $data->merchant_ref;
      $cek = $this->db->where('InvoiceId', $merchantRef)->get('data_order')->row();
      if ($cek) {
        if ($cek->StatusOrder == 1 || $cek->StatusOrder == 5) {
          echo json_encode(['success' => true]);
        }else {
          if ($data->status == 'PAID') {
            $dataPro = $this->db->where('ProductCode',$cek->Game)->get('data_product')->row();
            $dataInputUntung = [
              'Status' => 1,
            ];
            $this->db->where('InvoiceId',$merchantRef)->update('data_untung',$dataInputUntung);
            if ($dataPro->ProductApi == 0) {
              $inputData['StatusOrder'] = 1;
              $update = $this->db->where('InvoiceId', $merchantRef)->update('data_order', $inputData);

              $dataDb = $this->db->where('InvoiceId',$merchantRef)->get('data_order')->row();
              $this->load->library('phpmailer_lib');
              $mail = $this->phpmailer_lib->load();
              $mail->isSMTP();
              $mail->Host     = SMTPHOST;
              $mail->SMTPAuth = true;
              $mail->Username = SMTPUSER;
              $mail->Password = SMTPPASS;
              $mail->SMTPSecure = SMTPCRYPTO;
              $mail->Port     = SMTPPORT;
              $mail->setFrom(SMTPUSER, SITE_NAME);
              $mail->addAddress(EMAIL_ADMIN);
              $mail->Subject = 'Pemesanan Baru - '.$dataDb->InvoiceId.' - '.$WebsiteSetting->SiteName;
              $mail->isHTML(true);
              $mail->Body = $this->load->view('email/EmailTransaksiUser',$dataDb,TRUE);
              $mail->send();
            }elseif ($dataPro->ProductApi == 1) {
              $inputData['StatusOrder'] = 1;
              $this->db->where('InvoiceId', $merchantRef);
              $update = $this->db->update('data_order', $inputData);
              $prosessC =  $this->prosessdigi($cek->ItemId,$cek->Note,$cek->InvoiceId);
              if ($prosessC->rc == 00) {
                $inputData['StatusOrder'] = 5;
                $dataInput['Ket'] = $prosessC->sn;
                $inputData['TanggalUpdate'] = date('Y-m-d H:i');
                $update = $this->db->where('InvoiceId', $merchantRef)->update('data_order', $inputData);
                $dataDb = $this->db->where('InvoiceId',$merchantRef)->get('data_order')->row();
                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = SMTPHOST;
                $mail->SMTPAuth = true;
                $mail->Username = SMTPUSER;
                $mail->Password = SMTPPASS;
                $mail->SMTPSecure = SMTPCRYPTO;
                $mail->Port     = SMTPPORT;
                $mail->setFrom(SMTPUSER, SITE_NAME);
                $mail->addAddress($dataDb->Email);
                $mail->Subject = 'Transaksi Sukses - '.$dataDb->InvoiceId.' - '.$WebsiteSetting->SiteName;
                $mail->isHTML(true);
                $mail->Body = $this->load->view('email/EmailTransaksiUser',$dataDb,TRUE);
                $mail->send();
              }elseif ($prosessC->rc == 03) {
                $inputData['StatusOrder'] = 6;
                $dataInput['Ket'] = $prosessC->sn;
                $inputData['TanggalUpdate'] = date('Y-m-d H:i');
                $this->db->where('InvoiceId', $merchantRef)->update('data_order', $inputData);
              } else {
                $inputData['StatusOrder'] = 4;
                $dataInput['Ket'] = $prosessC->sn;
                $inputData['TanggalUpdate'] = date('Y-m-d H:i');
                $this->db->where('InvoiceId', $merchantRef)->update('data_order', $inputData);
              }
            }elseif ($dataPro->ProductApi == 99) { //FC
              $inputData['StatusOrder'] = 1;
              $update = $this->db->where('InvoiceId', $merchantRef)->update('data_order', $inputData);

              //process forexchanger
              $prosessFC =  $this->processForechanger($merchantRef, $data->status);
              log_message('error', json_encode($prosessFC));
            }
          } elseif ($data->status== 'EXPIRED') {
            $inputData['StatusOrder'] = 2;
            $this->db->where('InvoiceId', $merchantRef);
            $update = $this->db->update('data_order', $inputData);

            if ($dataPro->ProductApi == 99) { //FC
              //process forexchange
              $prosessFC =  $this->processForechanger($merchantRef, $data->status);
              log_message('error', json_encode($prosessFC));
            } 

          } elseif ($data->status == 'FAILED') {
            $inputData['StatusOrder'] = 3;
            $this->db->where('InvoiceId', $merchantRef);
            $update = $this->db->update('data_order', $inputData);

            if ($dataPro->ProductApi == 99) { //FC
              //process forexchange
              $prosessFC =  $this->processForechanger($merchantRef, $data->status);
              log_message('error', json_encode($prosessFC));
            }
          }
          echo json_encode(['success' => true]);
        }
      }
    }
  }

  private function prosessdigi($buyerSku,$customer_no,$refid){
    $curl = curl_init();
    $sign = md5(USERNAME_DIGI.KEY_GIDI.$refid);
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.digiflazz.com/v1/transaction',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'
      {
        "username": "'.USERNAME_DIGI.'",
        "buyer_sku_code": "'.$buyerSku.'",
        "customer_no": "'.$customer_no.'",
        "ref_id": "'.$refid.'",
        "testing": false,
        "sign": "'.$sign.'"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
      ),
    ));

    $response = json_decode(curl_exec($curl));
    $dataJson = $response->data;
    return $dataJson;
  }

  private function processForechanger($merchantRef, $paymentStatus){
    $token = $this->getSwaggerToken();
    $valid_token = $token->token_type.' '.$token->access_token;
    // log_message('DEBUG', 'jalan processForechanger');
    // $valid_token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2V4Y2hhbmdlclwvcHVibGljXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjgwODc4MjExLCJleHAiOjE2ODM0NzAyMTEsIm5iZiI6MTY4MDg3ODIxMSwianRpIjoiUE5YVmNCcmsweHBHNFFyZSIsInN1YiI6OSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.vg6QUbCDJEcZ8rrqHJ7sKtlGANwpMWOV17yMOm80Uas";

    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => 'https://dev.forexchanger.com/api/v2/call_back_payment',
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => '',
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => 'POST',
    //   CURLOPT_POSTFIELDS =>'
    //   {
    //     "reference_id": "'.$merchantRef.'",
    //     "payment_status" : "'.$payment_status.'"
    //   }',
    //   CURLOPT_HTTPHEADER => array(
    //     'Content-Type: text/plain',
    //     'Authorization : '.$valid_token.''
    //   ),
    // ));
    // log_message('DEBUG', $curl);
    // $response = json_decode(curl_exec($curl));
    // $dataJson = $response->data;
    // return $dataJson;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => URL_FOREXCHANGER.'/api/v2/call_back_payment/erroin',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "reference_id" : "'.$merchantRef.'",
        "payment_status" : "'.$paymentStatus.'"
    }',
      CURLOPT_HTTPHEADER => array(
        'Authorization: "'.$valid_token.'"',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);
    log_message('error', $response);
    log_message('error', $statusCode);
    return $statusCode;

  }

  private static function setSwaggerToken() {
    $CI = get_instance();
    $mt_user = USERNAME_FOREXCHANGER;
    $mt_key = PASSWORD_FOREXCHANGER;

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => URL_FOREXCHANGER.'/api/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>array('email' => $mt_user,'password' => $mt_key),
    ));

    $response = json_decode(curl_exec($curl));
    $dataJson = $response->data;

    $CI->db->truncate('fc_token');
    $fcToken = [
      'token_type' => "Bearer",
      'access_token' => $response->token,
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
      'expired_date' => date('Y-m-d H:i:s', strtotime('+1 days'))
    ];
    $insert = $CI->db->insert('fc_token', $fcToken);  
    return true;
  }

  private static function updateSwagger() {
    $CI = get_instance();
    $mt_user = USERNAME_FOREXCHANGER;
    $mt_key = PASSWORD_FOREXCHANGER;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => URL_FOREXCHANGER.'/api/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>array('email' => $mt_user,'password' => $mt_key),
    ));

    $response = json_decode(curl_exec($curl));
    $dataJson = $response->data;

    $fcToken = [
      'token_type' => "Bearer",
      'access_token' => $response->token,
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
      'expired_date' => date('Y-m-d H:i:s', strtotime('+1 days'))
    ];
    $update = $CI->db->where('id', 1)->update('fc_token', $fcToken);
    $NewDate=Date('d:m:Y', strtotime('+1 days'));
    return true;
  }

  private static function getSwaggerToken() {
    $CI = get_instance();
    $swagger = $CI->db->where('id', 1)->get('fc_token')->row();
    if($swagger == null) {
        $CI->setSwaggerToken();
        $nswagger = $CI->db->where('id', 1)->get('fc_token')->row();
        return $nswagger;
    } else {
        $date_now = date("Y-m-d H:i:s");
        $data_swagger = $CI->db->where('id', 1)->get('fc_token')->row();

        if($date_now > $data_swagger->expired_date) {
            $CI->updateSwagger();
            $swagger_updated = $CI->db->where('id', 1)->get('fc_token')->row();
            return $swagger_updated;
        }
        $swagger_old = $CI->db->where('id', 1)->get('fc_token')->row();
        return $swagger_old;
    }
    $swagger = $CI->db->where('id', 1)->get('fc_token')->row();
    return $swagger;
  }

}