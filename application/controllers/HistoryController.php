<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HistoryController extends CI_Controller
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
          if ($bulan == '') { //jika tidak memilih bulan
               $data['historyawb'] = $this->m_history->historyawb();
               $data['historynominal'] = $this->m_history->historynominal();
          } else {
               $data['historyawb'] = $this->m_history->historyawb_filter($bulan);
               $data['historynominal'] = $this->m_history->historynominal_filter($bulan);
          }
          $data['title'] = 'History Tagihan';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_history');
          $this->load->view('admin/v_footer');
     }
     function histori_cek($id) // menampilkan detail data tagihan tiap th tanggal yang dipilih
     {
          $bulan = $this->input->get('bulan');
          if ($bulan == '') { //jika tidak memilih bulan
               $data['historyawb'] = $this->m_history->historyawb_tgl($id);
               $data['historynominal'] = $this->m_history->historynominal_tgl($id);
          } else {
               $data['historyawb'] = $this->m_history->historyawb_filter_tgl($bulan, $id);
               $data['historynominal'] = $this->m_history->historynominal_filter_tgl($bulan, $id);
          }
          $data['title'] = 'History Tagihan Cek';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_history_cek');
          $this->load->view('admin/v_footer');
     }
}

     /* End of file TagihanController.php */;
