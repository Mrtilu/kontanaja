<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
  public function __construct()
  {
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
    if ($this->ion_auth->logged_in()) {
      $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
    }else {
      $user_groups = 'members';
    }
    $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
    $WebsiteSetting = $this->db->get('data_setting')->row();
    $dataProduct = $this->db->where('ProductCode','DATA')->get('data_product')->row();
    $data = [
      'title' => $WebsiteSetting->SiteName.' - Paket Data All Operator',
      'dataProduct' => $dataProduct,
    ];
    $this->load->view('front/PaketDataViews', $data);
  }

  public function getdata() {
    if ($this->ion_auth->logged_in()) {
      $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
    }else {
      $user_groups = 'members';
    }
    $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
    $WebsiteSetting = $this->db->get('data_setting')->row();
    $operator = $this->input->post('operator');
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
        "cmd" : "prepaid",
        "username": "'.USERNAME_DIGI.'",
        "sign": "'.$sign.'"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
      ),
    ));

    $response = json_decode(curl_exec($curl));
    $dataJson = $response->data;
    usort($dataJson, function ($a, $b) {
      return $a->price < $b->price ? -1 : 1 ;
    });
    curl_close($curl);
    foreach ($dataJson as $k => $value) {
      if ($value->category == 'Data' && $value->brand == $operator) {
        $resultFinal2[$value->type][] = $value;
        $feeMv = 0;
        if ($dataHarga) {
          foreach ($dataHarga as $dhm) {
            if ($value->price >= $dhm->Price && $value->price <= $dhm->Price2) {
              $feeMv = $dhm->MarkUp;
            }else if($feeMv == 0) {
              $feeMv = 1.01;
            }
          }
        }else {
          $feeMv = 1.01;
        }
        $dataJson[$k]->newprice = ceil($value->price * $feeMv);
      }
    }
    $data = [
      'data' => $dataJson,
      'dataCat' => $resultFinal2,
    ];
    echo json_encode($data);
  }

}