<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TagihanController extends CI_Controller
{

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
     function filter()
     {
          $bulan = $this->input->get('bulan');
          $data['tagihan'] = $this->m_tagihan->filter($bulan);
          $data['title'] = 'Tagihan Filter';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_tagihan_filter');
          $this->load->view('admin/v_footer');
     }
}

     /* End of file TagihanController.php */;
