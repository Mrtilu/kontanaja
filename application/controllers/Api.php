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

  public function get_payment() {
    $this->load->library('../controllers/Order');
    $payment = $this->Order->getPayment();

    $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(json_encode([
          'status' => true,
          'message' => 'success get data',
          'data' => $payment
      ]));
  }

}