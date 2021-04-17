<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TagihanController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          //Do your magic here
          if ($this->session->userdata('status') !== 'telah_login') {
               if ($this->session->userdata('pengguna_th') == "") {
                    redirect(site_url('keluar'));
               } elseif ($this->session->userdata('pengguna_level') == "") {
                    redirect(site_url('keluar'));
               }
          }
          date_default_timezone_set('Asia/Makassar');
     }

     public function index()
     {
          $bulan = $this->input->get('bulan');
          if ($bulan == '') {
               $data['tagihan'] = $this->m_tagihan->tagihan();
          } else {
               $data['tagihan'] = $this->m_tagihan->filter($bulan);
          }
          $data['title'] = 'Tagihan';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_tagihan');
          $this->load->view('admin/v_footer');
     }
     // function filter()
     // {
     //      $bulan = $this->input->get('bulan');
     //      $data['tagihan'] = $this->m_tagihan->filter($bulan);
     //      $data['title'] = 'Tagihan Filter';
     //      $this->load->view('admin/v_header', $data);
     //      $this->load->view('admin/v_tagihan_filter');
     //      $this->load->view('admin/v_footer');
     // }
     function th()
     {
          $bulan = $this->input->post('bulan');
          if ($bulan) {
               $data['tagihan'] = $this->m_tagihan->tagihan_th($bulan);
          } else {
               $date = date('Ym');
               $data['tagihan'] = $this->m_tagihan->tagihan_th($date);
          }
          $data['title'] = 'Tagihan Th';
          $this->load->view('admin_th/v_header', $data);
          $this->load->view('admin_th/v_tagihan_th');
          $this->load->view('admin_th/v_footer');
     }
}

     /* End of file TagihanController.php */;
