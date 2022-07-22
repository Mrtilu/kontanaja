<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

    public function index()
    {
        $dataSlide = $this->db->where('StatusSlide', 1)->get('data_slide')->result();
        $dataProduct = $this->db->where('ProductStatus',1)->get('data_product')->result();
        $dataTransaksi = $this->db->where('StatusOrder',5)->get('data_order')->num_rows();
        $dataUser = $this->db->get('users')->num_rows();
        $dataApi = $this->db->where('Payment','BALANCE/API')->get('data_order')->num_rows();
        $this->db->group_by('ProductCat');
        $dataCat = $this->db->where('ProductStatus', 1)->get('data_product')->result();
        $WebsiteSetting = $this->db->get('data_setting')->row();
        $data = [
            'title' => $WebsiteSetting->SiteName .' - '.TAGLINE_NAME,
            'dataSlide' => $dataSlide,
            'dataProduct' => $dataProduct,
            'dataTransaksi' => $dataTransaksi + 7298,
            'dataUser' => $dataUser + 1502,
            'dataApi' => $dataApi + 2800,
            'dataCat' => $dataCat,
        ];
        $this->load->view('front/Index', $data);
    }
}