<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          //Do your magic here
          if ($this->session->userdata('status') !== 'telah_login') {
               redirect(site_url('keluar'));
          }
          date_default_timezone_set('Asia/Makassar');
     }

     public function index()
     {
          $data['awb'] = $this->m_home->getawb();
          $data['tagihan'] = $this->m_home->getnominal();
          $data['title'] = 'Home';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_dashboard');
          $this->load->view('admin/v_footer');
     }

     function ajax()
     {
          $this->load->model('m_home', 'm_home');
          $list = $this->m_home->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $m_home) {
               $no++;
               $row = array();
               $row[] = $no;
               $row[] = $m_home->waybill;
               $row[] = $m_home->karyawan_nik;
               $row[] = $m_home->karyawan_nama;
               $row[] = $m_home->th;
               $row[] = $m_home->type;
               $row[] = number_format($m_home->fee, 2);
               $row[] = $m_home->pod_time;
               $row[] = $m_home->timedown;
               $row[] = '<a href="' . base_url('setor/') . $m_home->id . '" class="btn btn-sm btn-primary text-white">Terima</a>';
               $data[] = $row;
          }
          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->m_home->count_all(),
               "recordsFiltered" => $this->m_home->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }
}

     /* End of file AdminController.php */;
