<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library(['ion_auth', 'form_validation']);
    $this->load->helper(['url', 'language']);
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->lang->load('auth');
  }

  public function plncek() {
    $buyerId = $this->input->post('UserId');
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.digiflazz.com/v1/transaction",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\r\n    \"commands\": \"pln-subscribe\",\r\n    \"customer_no\": \"".$buyerId."\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: f992c131-68ff-eac0-283b-d4d6bf0e2075"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $dataJson = json_decode($response);
    if ($dataJson->data->name == '') {
      $dataRespone = [
        'NickName' => '',
        'UserId' => $buyerId,
        'Status' => false,
      ];
    } else {
      $dataRespone = [
        'NickName' => $dataJson->data->name.' - '.$dataJson->data->segment_power,
        'UserId' => $buyerId,
        'Status' => true,
      ];
    }
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($dataRespone));
  }

  public function get_payment(){
    $chanelPembayaran = $this->chanelPembayaran();

    $c = 0;
    if ($chanelPembayaran) {
      foreach ($chanelPembayaran->data as $r) {
        $data[$c]['code'] = $r->code;
        $data[$c]['image'] = $r->icon_url;
        $data[$c]['group'] = $r->group;
        $data[$c]['name'] = $r->name;
        $data[$c]['price'] = 0;
        $c++;
      }
    }

    $this->output
    ->set_content_type('application/json')
    ->set_status_header(200)
    ->set_output(json_encode([
        'status' => true,
        'message' => 'success get data',
        'data' => $data
    ]));
  }

  public function chanelPembayaran(){
    $apiKey = API_KEY;
    $UrlTriPay = URL_TRIPAY;
    $payload = [];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_FRESH_CONNECT     => true,
      CURLOPT_URL               => $UrlTriPay."/merchant/payment-channel?".http_build_query($payload),
      CURLOPT_RETURNTRANSFER    => true,
      CURLOPT_HEADER            => false,
      CURLOPT_HTTPHEADER        => array(

        "Authorization: Bearer ".$apiKey
      ),
      CURLOPT_FAILONERROR       => false
    ));
    $response = curl_exec($curl);
    $response = json_decode($response);
    $err = curl_error($curl);
    curl_close($curl);
    return $response;
  }

  public function payment_process(){
      $amount = $this->input->post('amount');
      $merchantRef = $this->input->post('reference_id');
      $payment = $this->input->post('payment_code');
      $email = $this->input->post('email');
      $phone = $this->input->post('phone');
      $name = $this->input->post('name');

      //log 
      $dataTrigger = [
        'payload' => json_encode($this->input->post()),
        'type' => "payment_from_fc",
        'created_at' => now()
      ];
      $insertDataTrigger = $this->db->insert('log_triggered', $dataTrigger);      

      $data = [
        "amount" => $amount,
        "merchant_ref" => $merchantRef,
        "paymnet" => $payment,
        "email" => $email,
        "phone" => $phone
      ];

      $privateKey = PRIVATE_KEY;
      $apiKey = API_KEY;
      $merchantCode = MERCHANT_CODE;

      $produk = array("TELKOMSEL","XL","TRI","INDOSAT","SMARTFREN");
      $final_produk = $produk[array_rand($produk)];
    
      $data = [
        'method'            => $payment,
        'merchant_ref'      => $merchantRef,
        'amount'            => $amount,
        'customer_name'     => $name,
        'customer_email'    => $email,
        'customer_phone'    => $phone,
        'order_items'       => [
          [
            'sku'       => "PULSA",
            'name'      => $final_produk,
            'price'     => $amount,
            'quantity'  => 1
          ]
        ],
        'callback_url'      => base_url('callback'),
        'return_url'        => base_url('redirect'),
        'expired_time'      => (time()+(24*60*60)),
        'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
      ];

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_FRESH_CONNECT     => true,
        CURLOPT_URL               => URL_TRANSAKSI,
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HEADER            => false,
        CURLOPT_HTTPHEADER        => array(
          "Authorization: Bearer ".$apiKey
        ),
        CURLOPT_FAILONERROR       => false,
        CURLOPT_POST              => true,
        CURLOPT_POSTFIELDS        => http_build_query($data)
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      $newResponse = json_decode($response);
      $TrxId = $newResponse->data->reference;

      //save response & data in here
      $dataInput = [
        'UserId' => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->id : 0,
        'Email' => $email,
        'Payment' => $payment,
        'ItemId' => "PULSA",
        'ItemName' => $final_produk,
        'NickName' => $phone,
        'InvoiceId' => $merchantRef,
        'StatusOrder' => 0,
        'TanggalOrder' => date('Y-m-d'),
        'TanggalUpdate' => date('Y-m-d H:i:s'),
        'Game' => "FC",
        'TrxId' => $TrxId,
        'Amount' => $newResponse->data->amount,
        'Note' => $phone
      ];
      $insert = $this->db->insert('data_order', $dataInput);      

      if($newResponse->success){
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(200)
        ->set_output(json_encode([
            'status' => true,
            'message' => 'success',
            'data' => $newResponse->data
        ]));
      }

      return $this->output
        ->set_content_type('application/json')
        ->set_status_header(406)
        ->set_output(json_encode([
            'status' => false,
            'message' => $newResponse->message,
            'data' => null
        ]));
      
  }

}