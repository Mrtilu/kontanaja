<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Emailuser extends CI_Controller
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
        $data = [
        'page' => 'Edit',
        'title' => 'Kirim Email',
        ];
        $this->load->view('dashboard/EmailSendViews.php', $data);
    }

    public function submit()
    {
      $email = $this->input->post('EmailSend');
      $subject = $this->input->post('Subject');
      $body = $this->input->post('Body',false);
      $data = [
        'subject' => $subject,
        'body' => $body,
      ];
      if (empty($email)) {
        $user = $this->db->where('active',1)->get('users')->result();
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();
        $mail->Host     = SMTPHOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTPUSER;
        $mail->Password = SMTPPASS;
        $mail->SMTPSecure = SMTPCRYPTO;
        $mail->Port     = SMTPPORT;
        $mail->SMTPKeepAlive = true;
        $mail->setFrom(SMTPUSER, SITE_NAME);

        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $this->load->view('email/EmailInfoUser',$data,TRUE);
        foreach ($user as $d) {
          $mail->addAddress($d->email);
          $mail->send();
          $mail->clearAddresses();
        }
        $this->session->set_flashdata('message', 'Email berhasil dikirim.');
        redirect('dashboard/Emailuser', 'refresh');
      }else {
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();
        $mail->Host     = SMTPHOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTPUSER;
        $mail->Password = SMTPPASS;
        $mail->SMTPSecure = SMTPCRYPTO;
        $mail->Port     = SMTPPORT;
        $mail->SMTPKeepAlive = true;
        $mail->setFrom(SMTPUSER, SITE_NAME);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $this->load->view('email/EmailInfoUser',$data,TRUE);
        $mail->send();
        $this->session->set_flashdata('message', 'Email berhasil dikirim.');
        redirect('dashboard/Emailuser', 'refresh');
      }
    }

}
