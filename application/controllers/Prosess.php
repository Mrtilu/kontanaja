<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prosess extends CI_Controller{
  
  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library(['ion_auth', 'form_validation']);
    $this->load->helper(['url', 'language']);
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->lang->load('auth');

    if (!AVAIL) {
      if ($this->ion_auth->is_admin()) {
      } else {
        show_error('SEDANG DALAM PERBAIKAN SISTEM');
      }
    }
  }

  public function index() {
    $WebsiteSetting = $this->db->get('data_setting')->row();
    $token = $this->input->post('token');
    if ($this->ion_auth->logged_in()) {
      $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
    }else {
      $user_groups = 'members';
    }
    $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
    if (!$this->ion_auth->logged_in()) {
      $SendEmail = $this->input->post('SendEmail');
      if (!filter_var($SendEmail, FILTER_VALIDATE_EMAIL)) {
        $dataRespone = [
          'status' => 'FAILED',
          'message' => 'Masukkan email yang valid'
        ];
        echo json_encode($dataRespone);
        exit();
      }
    }
    $keySecret = GOOGLEKEY;
    $game = $this->input->post('game');
    $productCode = $this->input->post('productCode');
    $userId = $this->input->post('userid');
    $payment = $this->input->post('payment');
    $itemId = $this->input->post('itemid');
    $itemName= $this->input->post('itemName');
    $nickName = $this->input->post('nickName');
    $data['price'] = $this->input->post('price');
    $dataRow = $this->db->where('TanggalOrder', date('Y-m-d'))->get('data_order')->num_rows() + 1;
    $refid = REF.date("md").date("hsi").$dataRow;
    $dataPro = $this->db->where('ProductCode',$game)->get('data_product')->row();
    $TrxId = '';
    $ProductApi = $dataPro->ProductApi;
    if ($dataPro->ProductType == 0) {
      $itemDb = $this->db->where('ItemSku',$itemId)->get('data_item')->row();
      $itemPrice = $itemDb->ItemPrice;
      $ProductType = 0;
    } elseif ($dataPro->ProductType == 1) {
      if ($ProductApi == 1) {
        $itemPrice = $this->cekharga($itemId);
      } elseif ($ProductApi == 2) {
        $itemDb = $this->db->where('ItemSku',$itemId)->get('data_item')->row();
        $itemPrice = $itemDb->ItemPrice;
      }
      $ProductType = 1;
    }
    $feeMv = 0;
    if ($dataHarga) {
      foreach ($dataHarga as $dhm) {
        if ($itemPrice >= $dhm->Price && $itemPrice <= $dhm->Price2) {
          $feeMv = $dhm->MarkUp;
        }else if($feeMv == 0) {
          $feeMv = 1.01;
        }
      }
    } else {
      $feeMv = 1.01;
    }
    $amount = ceil($itemPrice * $feeMv);
    $untung = $amount - $itemPrice;
    if ($ProductType == 0) {
      if ($dataPro->ProductApi == 1) {
      }elseif ($dataPro->ProductApi == 2) {
      }
    } else {
      if ($ProductApi == 1) {
        if ($this->ceksaldo() < $itemPrice) {
          $dataRespone = [
            'status' => 'FAILED',
            'message' => 'Item tidak tersedia, silakan pilih item lain',
          ];
          echo json_encode($dataRespone);
          exit();
        }
      } elseif ($ProductApi == 2) {}
    }
    if ($payment != "BALANCE") {
      $privateKey = PRIVATE_KEY;
      $apiKey = API_KEY;
      $merchantCode = MERCHANT_CODE;
      $merchantRef = $refid;
      $signature = hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey);
      if ($payment == 'OVO') {
        $data = [
          'method'            => $payment,
          'merchant_ref'      => $merchantRef,
          'amount'            => $amount,
          'customer_name'     => $nickName,
          'customer_email'    => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->email : $SendEmail,
          'customer_phone'    => ADMINPHONEPAY,
          'order_items'       => [
            [
              'sku'       => REF,
              'name'      => $itemName,
              'price'     => $amount,
              'quantity'  => 1
            ]
          ],
          'callback_url'      => base_url('callback'),
          'return_url'        => base_url('redirect'),
          'expired_time'      => (time()+(24*60*60)),
          'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
        ];
      } else {
        $data = [
          'method'            => $payment,
          'merchant_ref'      => $merchantRef,
          'amount'            => $amount,
          'customer_name'     => $nickName,
          'customer_email'    => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->email : $SendEmail,
          'customer_phone'    => ADMINPHONEPAY,
          'order_items'       => [
            [
              'sku'       => REF,
              'name'      => $itemName,
              'price'     => $amount,
              'quantity'  => 1
            ]
          ],
          'callback_url'      => base_url('callback'),
          'return_url'        => base_url('redirect'),
          'expired_time'      => (time()+(24*60*60)),
          'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
        ];
      }
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
      $dataInput = [
        'UserId' => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->id : 0,
        'Email' => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->email : $SendEmail,
        'Payment' => $payment,
        'ItemId' => $itemId,
        'ItemName' => $itemName,
        'NickName' => $nickName,
        'InvoiceId' => $refid,
        'StatusOrder' => 0,
        'TanggalOrder' => date('Y-m-d'),
        'TanggalUpdate' => date('Y-m-d H:i:s'),
        'Game' => $game,
        'TrxId' => $TrxId,
        'Amount' => $newResponse->data->amount,
        'Note' => $userId
      ];
      $insert = $this->db->insert('data_order', $dataInput);
      $dataInputUntung = [
        'InvoiceId' => $refid,
        'Untung' => $untung,
        'Tanggal' => date('Y-m-d'),
        'Status' => 0,
      ];
      $this->db->insert('data_untung',$dataInputUntung);
      if ($insert) {
        echo !empty($err) ? $err : $response;
      }
    }
  }

  public function getdata(){
    if ($this->ion_auth->logged_in()) {
      $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
    }else {
      $user_groups = 'members';
    }
    $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
    $WebsiteSetting = $this->db->get('data_setting')->row();
    $itemid = $this->input->post('itemId');
    $priceInput = $this->input->post('price');
    $itemDb = $this->db->where('ItemSku',$itemid)->get('data_item')->row();
    if ($itemDb) {
      $price = $itemDb->ItemPrice;
    }else {
      $price = $this->cekharga($itemid);
    }
    $feeMv = 0;
    if ($dataHarga) {
      foreach ($dataHarga as $dhm) {
        if ($price >= $dhm->Price && $price <= $dhm->Price2) {
          $feeMv = $dhm->MarkUp;
        }else if($feeMv == 0) {
          $feeMv = 1.01;
        }
      }
    }else {
      $feeMv = 1.01;
    }
    $price = ceil($price * $feeMv);
    if ($priceInput != $price) {
      $dataRespone = [
        'status' => 'FAILED',
        'message' => 'BANNED',
        'priceInput' => $priceInput,
        'price' => $price
      ];
      echo json_encode($dataRespone);
      exit();
    }
    $chanelPembayaran = $this->chanelPembayaran();
    $feeTotal = $this->chanelCalculator($price);
    $group = 'resseler';
    $c = 0;
    foreach ($chanelPembayaran->data as $r) {
      $data['data'][$c]['code'] = $r->code;
      $data['data'][$c]['image'] = $r->icon_url;
      foreach ($feeTotal as $f) {
        if ($f->code == $r->code) {
          $data['data'][$c]['price'] = $f->total_fee->customer + $price;
        }
      }
      $c++;
    }
    $data['price'] = $price;
    echo json_encode($data);
  }

  private function prosess($buyerSku, $customer_no, $refid){
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

  public function ceksaldo(){
    $curl = curl_init();
    $sign = md5(USERNAME_DIGI.KEY_GIDI.'depo');
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.digiflazz.com/v1/cek-saldo',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'
      {
        "cmd": "deposit",
        "username": "'.USERNAME_DIGI.'",
        "sign": "'.$sign.'"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
      ),
    ));
    $response = json_decode(curl_exec($curl));
    $dataJson = $response->data;
    return $dataJson->deposit;
  }

  public function cekharga($skuCode){
    $curl = curl_init();
    $sign = md5(USERNAME_DIGI.KEY_GIDI.'pricelist');
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.digiflazz.com/v1/price-list',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'
      {
        "cmd": "prepaid",
        "code": "'.$skuCode.'",
        "username": "'.USERNAME_DIGI.'",
        "sign": "'.$sign.'"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
      ),
    ));
    $response = json_decode(curl_exec($curl));
    $dataJson = $response->data;
    return $dataJson[0]->price;
  }

  public function webhooks($d){
    if ($d == 1) {
      echo USERNAME_DIGI.KEY_GIDI.'pricelist <br>';
    } elseif ($d == 2) {
      $itemId = $this->input->post('itemId');
      $userId = $this->input->post('userId');
      if ($itemId == null) {
        echo "ERROR";
      }else {
        $refid = $this->generateid();
        $prosessC =  $this->prosess($itemId, $userId, $refid);
        print_r($prosessC);
      }
    } elseif ($d == 3) {
      $refid = $this->generateid();
      echo $refid;
    } elseif ($d == 6) {
      print_r(getallheaders());
    }
    else {
      echo "ERROR";
    }
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

  public function chanelCalculator($price = null){
    $apiKey = API_KEY;
    $UrlTriPay = URL_TRIPAY;
    $payload = [
      'amount'	=> $price,
      'code' => ''
    ];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_FRESH_CONNECT     => true,
      CURLOPT_URL               => $UrlTriPay."/merchant/fee-calculator?".http_build_query($payload),
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
    return $response->data;
  }

  public function getPayment(){
    $chanelPembayaran = $this->chanelPembayaran();
    $c = 0;
    foreach ($chanelPembayaran->data as $r) {
      $data['data'][$c]['code'] = $r->code;
      $data['data'][$c]['image'] = $r->icon_url;
      $data['data'][$c]['price'] = 0;
      $c++;
    }
    echo json_encode($data);
  }
}