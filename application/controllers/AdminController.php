<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
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
          //memunculkan semua data tagihan yang belum di setor
          $data['jumlahawb'] = $this->m_admin->get_awb();
          // var_dump($data);
          // die();
          $data['title'] = 'Home';
          $this->load->view('admin_th/v_header', $data);
          $this->load->view('admin_th/v_dashboard');
          $this->load->view('admin_th/v_footer');
     }
     function ajax_admin_th()
     {
          $this->load->model('m_admin', 'm_admin');
          $list = $this->m_admin->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $m_admin) {
               $no++;
               $row = array();
               $row[] = $no;
               $row[] = $m_admin->waybill;
               $row[] = $m_admin->karyawan_nik;
               $row[] = $m_admin->karyawan_nama;
               $row[] = $m_admin->th;
               $row[] = $m_admin->type;
               $row[] = number_format($m_admin->fee, 2);
               $row[] = $m_admin->pod_time;
               $row[] = $m_admin->timedown;
               $row[] = '<a href="' . base_url('setor/') . $m_admin->id . '" class="btn btn-sm btn-primary text-white">Terima</a>';
               $data[] = $row;
          }
          $output = array(
               "draw" => $_POST['draw'],
               "recordsTotal" => $this->m_admin->count_all(),
               "recordsFiltered" => $this->m_admin->count_filtered(),
               "data" => $data,
          );
          //output to json format
          echo json_encode($output);
     }
}

     /* End of file AdminController.php */;
