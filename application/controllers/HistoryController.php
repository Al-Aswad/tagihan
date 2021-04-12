<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HistoryController extends CI_Controller
{

     public function index()
     {
          $bulan = $this->input->get('bulan');
          if ($bulan == '') { //jika tidak memilih bulan
               $data['historyawb'] = $this->m_history->historyawb();
               $data['historynominal'] = $this->m_history->historynominal();
          } else {
               $data['historyawb'] = $this->m_history->historyawb($bulan);
               $data['historynominal'] = $this->m_history->historynominal_filter($bulan);
          }
          $data['title'] = 'History Tagihan';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_history');
          $this->load->view('admin/v_footer');
     }
}

     /* End of file TagihanController.php */;
