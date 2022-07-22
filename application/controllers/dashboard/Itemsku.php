<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Itemsku extends CI_Controller
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
                if (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins
                    // redirect them to the home page because they must be an administrator to view this
                    // show_error('You must be an administrator to view this page.');
                    $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
                    redirect('/', 'refresh');
                }
            }
        }
    }

    public function index()
    {
        $dataDb = $this->db->get('data_sku')->result();
        $data = [
        'title' => 'Daftar Sku',
        'data' => $dataDb
        ];
        $this->load->view('dashboard/itemsku/ItemSkuViews', $data);
    }
    public function create()
    {
        $data = [
                    'title' => 'Tambah Item',
                    'page' => 'add'
                    ];
        $this->load->view('dashboard/item/ItemFormViews', $data);
    }


    public function delete($id)
    {
        if ($this->db->where('SkuCode', $id)->delete('data_sku')) {
          $this->session->set_flashdata('message', 'Data berhasil dihapus.');
          redirect('dashboard/itemsku', 'refresh');
        } else {
          $this->session->set_flashdata('message', 'Data gagal dihapus.');
          redirect('dashboard/itemsku', 'refresh');
        }
      }

    public function update()
    {
        $sku = $this->input->post('sku');
        $vip = $this->input->post('vip');
        $resseler = $this->input->post('resseler');
        $members = $this->input->post('members');
        $inputData = [
          'VipPrice' => $vip,
          'ResselerPrice' => $resseler,
          'MembersPrice' => $members,
        ];
        if ($this->db->where('SkuCode',$sku)->update('data_sku', $inputData)) {
          echo json_encode(['Status'=>true]);
        } else {
          echo json_encode(['Status'=>false]);
        }
      }
}
