<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        if ($this->ion_auth) {
            if (!$this->ion_auth->logged_in()) {
                redirect('dashboard/login', 'refresh');
            } else {
                if (!$this->ion_auth->is_admin()) {
                    $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
                    redirect('/', 'refresh');
                }
            }
        }
    }

    public function index()
    {
        $totalPembelian = 0;
        $pembelianHariIni = 0;
        $totalDeposit = 0;
        $totalUsers = $this->db->where('active', 1)->get('users')->num_rows();
        $transaksiSukses = 0;
        if (!$this->ion_auth->is_admin()) {
            $dataDb = $this->db->where('UserId', $User->id)->get('data_order')->result();
            $dataDepo = $this->db->where('UserId', $User->id)->get('data_deposit')->result();
        } else {
            $dataDb = $this->db->get('data_order')->result();
            $dataDepo = $this->db->get('data_deposit')->result();
        }
        foreach ($dataDb as $d) {
            if ($d->StatusOrder == 5) {
                $transaksiSukses += 1;
                $totalPembelian += $d->Amount;
                if ($d->TanggalOrder == date('Y-m-d')) {
                    $pembelianHariIni += $d->Amount;
                }
            }
        }
        foreach ($dataDepo as $d) {
            if ($d->Status == 1) {
                $totalDeposit += $d->Balance;
            }
        }
        $data = [
        'title' => 'Transaksi Produk',
        'dataOrder' => $dataDb,
        'totalPembelian' => $totalPembelian,
        'pembelianHariIni' => $pembelianHariIni,
        'totalDeposit' => $totalDeposit,
        'totalUsers' => $totalUsers,
        'transaksiSukses' => $transaksiSukses,
        ];
        $this->load->view('dashboard/transaksi/TransaksiViews', $data);
    }

    public function pro($Id){
      $Id = $Id;
      $dataDb = $this->db->where('Id',$Id)->get('data_order')->row();
      if ($dataDb->StatusOrder != 6 and $dataDb->StatusOrder != 1) {
        $this->session->set_flashdata('message', 'Data tidak bisa dirubah lagi.');
        redirect('dashboard/transaksi');
      }
      $data = [
        'title' => 'Transaksi Produk',
        'data' => $dataDb,
        'page' => 'edit'
      ];
      $this->load->view('dashboard/transaksi/TransaksiProViews', $data);
    }
    public function prosubmit(){

      $WebsiteSetting = $this->db->get('data_setting')->row();
      $EmailSend = $this->input->post('EmailSend');
      $Id = $this->input->post('Id');
      $Ket = $this->input->post('Ket');
      $StatusOrder = $this->input->post('StatusOrder');
      $dataInput = [
        'Ket' =>  $Ket,
        'StatusOrder' => $StatusOrder,
      ];
      if ($this->db->where('Id',$Id)->update('data_order',$dataInput)) {
        if ($EmailSend != '') {
          if ($StatusOrder == 5) {
            $StatusMessage = 'SUKSES';
          }elseif ($StatusOrder == 4) {
            $StatusMessage = 'GAGAL';
          }elseif ($StatusOrder == 6) {
            $StatusMessage = 'SEDANG DI PROSESS';
          }
          $dataDb = $this->db->where('Id',$Id)->get('data_order')->row();
          $this->load->library('phpmailer_lib');
          $mail = $this->phpmailer_lib->load();
          $mail->isSMTP();
          $mail->Host     = SMTPHOST;
          $mail->SMTPAuth = true;
          $mail->Username = SMTPUSER;
          $mail->Password = SMTPPASS;
          $mail->SMTPSecure = 'ssl';
          $mail->Port     = SMTPPORT;
          $mail->setFrom(SMTPUSER, SITE_NAME);
          $mail->addAddress($EmailSend);
          $mail->Subject = 'Transaksi '.$StatusMessage.' - '.$dataDb->InvoiceId.' - '.$WebsiteSetting->SiteName;
          $mail->isHTML(true);
          $mail->Body = $this->load->view('email/EmailTransaksiUser',$dataDb,TRUE);
          $mail->send();
        }
        $this->session->set_flashdata('message', 'Data berhasil diubah.');
        redirect('dashboard/transaksi');
      }else {
        $this->session->set_flashdata('message', 'Data gagal diubah.');
        redirect('dashboard/transaksi/prosubmit/'.$Id.'');
      }

    }

    public function repeat($Id){
      $Id = $Id;
      $dataDb = $this->db->where('Id',$Id)->get('data_order')->row();
      $url =  $dataDb->url.'/getdata/'.$dataDb->InvoiceId;
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache"
        ),
      ));

      $response = json_decode(curl_exec($curl));
      $err = curl_error($curl);
      if ($response->UserId != 0) {
        $this->session->set_flashdata('message', 'Data tidak bisa dirubah lagi.');
        redirect('dashboard/transaksi');
      }
      curl_close($curl);
      if ($dataDb->StatusOrder != 4 and $dataDb->StatusOrder != 5) {
        $this->session->set_flashdata('message', 'Data tidak bisa dirubah lagi.');
        redirect('dashboard/transaksi');
      }
      $data = [
        'title' => 'Transaksi Produk',
        'data' => $dataDb,
        'dataJson' => $response,
        'dataOpt' => $this->db->where('StatusOrder',5)->order_by('Id','desc')->get('data_order')->result(),
        'page' => 'edit'
      ];
      $this->load->view('dashboard/transaksi/TransaksiReViews', $data);
    }

    public function repeatsubmit(){
      $Id = $this->input->post('Id');
      $NewId = $this->input->post('NewId');
      $newDb = $this->db->where('Id',$NewId)->get('data_order')->row();
      $dataDb = $this->db->where('Id',$Id)->get('data_order')->row();
      $dataInput = [
        'StatusOrder' => 5,
        'Ket' => $newDb->Ket,
      ];
      $this->db->where('Id',$Id)->update('data_order',$dataInput);
      $userDb = $this->db->where('id',$dataDb->UserId)->get('users')->row();
      $newBalance = $userDb->Balance - $dataDb->Amount;
      $dataInputUser = [
        'Balance' => $newBalance,
      ];
      $this->db->where('id',$dataDb->UserId)->update('users',$dataInputUser);
      $newJson = [
        'data' => [
          "trx_id"=>  $dataDb->InvoiceId,
          "ref_id"=>  $dataDb->InvoiceId,
          "customer_no"=>  $dataDb->Note,
          "buyer_sku_code" => $dataDb->ItemId,
          "message"=>  "Transaksi Sukses",
          "status"=>  "Sukses",
          "rc"=>  "00",
          "buyer_last_saldo"=> 100000,
          "sn"=>  $newDb->Ket,
          "price"=> $dataDb->Amount,
          "tele"=>  "@mycodingxd",
          "wa"=>  "082233445566"
        ],
      ];
      $newData = [
        'PrivateKey' => $userDb->PrivateKey,
        'Item' => $newJson
      ];
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => $dataDb->url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($newData),
      CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);
      $this->session->set_flashdata('message', 'Data berhasil diubah.');
      redirect('dashboard/transaksi');
    }
}
