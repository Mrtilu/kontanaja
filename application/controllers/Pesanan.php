<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
        show_error('SEDANG DALAM PERBAIKAN.');
      }
    }
  }

  public function index()
  {
    $WebsiteSetting = $this->db->get('data_setting')->row();
    $data = [
      'title' => 'Cek Pesanan - '.$WebsiteSetting->SiteName,
    ];
    $this->load->view('front/PesananViews', $data);
  }

  public function getdata(){
    $invoiceid = $this->input->post('invoiceid');
    if ($invoiceid != null) {
      $dataDb = $this->db->where('InvoiceId',$invoiceid)->get('data_order')->row();
      if ($dataDb) {
        $d = $dataDb;
        if ($d->StatusOrder == 0) {
          $order = '<div class="bg-primary text-center rounded" style="widht:100%;">
          <p class="text-white">Belum dibayar</p>
          </div>';
        } elseif ($d->StatusOrder == 1) {
          $order = '<div class="bg-success text-center rounded" style="widht:100%;">
          <p class="text-white">Sudah Dibayar</p>
          </div>';
        } elseif ($d->StatusOrder == 2) {
          $order = '<div class="bg-warning text-center rounded" style="widht:100%;">
          <p class="text-white">Expired</p>
          </div>';
        } elseif ($d->StatusOrder == 3) {
          $order = '<div class="bg-danger text-center rounded" style="widht:100%;">
          <p class="text-white">Gagal</p>
          </div>';
        } elseif ($d->StatusOrder == 4) {
          $order = '<div class="bg-danger text-center rounded" style="widht:100%;">
          <p class="text-white">Gagal By Server</p>
          </div>';
        } elseif ($d->StatusOrder == 5) {
          $order = '<div class="bg-success text-center rounded" style="widht:100%;">
          <p class="text-white">Success</p>
          </div>';
        } elseif ($d->StatusOrder == 6) {
          $order = '<div class="bg-warning text-center rounded" style="widht:100%;">
          <p class="text-white">Pending</p>
          </div>';
        }
        $dataPro = $this->db->where('ProductCode',$d->Game)->get('data_product')->row();
        $data = [
          'data' => $dataDb,
          'dataStatus' => $order,
          'InvoiceId' => $invoiceid,
          'dataP' => $dataPro,
          'status' => true
        ];
        echo json_encode($data);
      }else {
        $data = [
          'status' => false
        ];
        echo json_encode($data);
      }
    } else {
      $data = [
        'status' => false
      ];
      echo json_encode($data);
    }

  }

  public function getInt(){
    $InvoiceId = $this->input->post('invoiceid');
    $dataDb = $this->db->where('InvoiceId',$InvoiceId)->get('data_order')->row();
    if ($dataDb) {
      if ($dataDb->StatusOrder == 0) {
        $apiKey = API_KEY;
        $payload = ['reference'	=> $dataDb->TrxId];
        $curl = curl_init();
        curl_setopt_array($curl, [
          //CURLOPT_IPRESOLVE    => CURL_IPRESOLVE_V4,
          CURLOPT_FRESH_CONNECT  => true,
          CURLOPT_URL            => 'https://tripay.co.id/api/transaction/detail?'.http_build_query($payload),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HEADER         => false,
          CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
          CURLOPT_FAILONERROR    => false,
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        echo empty($error) ? $response : $error;
      }else {
        $data = [
          'success' => false
        ];
        echo json_encode($data);
      }

    }else {
      $data = [
        'success' => false
      ];
      echo json_encode($data);
    }

  }

}