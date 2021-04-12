<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SetorController extends CI_Controller
{

     public function index()
     {
     }

     function belum_setor()
     {
          $level = $this->session->userdata('pengguna_level');
          if ($level == 1) { //su
               $data['belum_setor'] = $this->m_setor->belum_setor();
               $data['title'] = 'Belum Setor';
               $this->load->view('admin/v_header', $data);
               $this->load->view('admin/v_belum_setor');
               $this->load->view('admin/v_footer');
          } elseif ($level == 2) { //admin
               $data['belum_setor'] = $this->m_setor->belum_setor_admin();
               $data['title'] = 'Belum Setor';
               $this->load->view('admin_th/v_header', $data);
               $this->load->view('admin_th/v_belum_setor');
               $this->load->view('admin_th/v_footer');
          } else {
          }
     }

     function belum_setor_th($id) //controller untuk menambpilkan yang belum di setor berdasarkan th dan tanggal yang di pilih
     {
          $th_tgl = $this->m_setor->get_th_tgl($id); //mengambil th dan tgl pod
          if ($th_tgl) {
               $data['belum_setor'] = $this->m_setor->belum_setor_th($th_tgl->th, $th_tgl->pod_time);
          } else {
               redirect(base_url('') . 'home/belum-setor');
          }

          $level = $this->session->userdata('pengguna_level');
          if ($level == 1) { //su
               $data['title'] = 'Belum Setor';
               $this->load->view('admin/v_header', $data);
               $this->load->view('admin/v_belum_setor_th');
               $this->load->view('admin/v_footer');
          } elseif ($level == 2) { //admin    
               $data['title'] = 'Belum Setor';
               $this->load->view('admin_th/v_header', $data);
               $this->load->view('admin_th/v_belum_setor_th');
               $this->load->view('admin_th/v_footer');
          } else {
          }
     }

     function setor_bulk()
     {
          $id = $this->input->post('id');
          $th = $this->input->post('th');
          $pod_time = $this->input->post('pod_time');
          $setor = 1;
          foreach ($id as $i) {

               $this->m_setor->setor($i);
               $setor++;
          }
          // mengambil id untuk kembali ke 
          $get_id = $this->m_setor->get_id($th, $pod_time);
          redirect(base_url('') . 'home/belum-setor-th/' . md5($get_id->id));
     }


     function sudah_setor()
     {
          $level = $this->session->userdata('pengguna_level');
          if ($level == 1) { //su
               $data['sudah_setor'] = $this->m_setor->sudah_setor();
               $data['title'] = 'Sudah Setor';
               $this->load->view('admin/v_header', $data);
               $this->load->view('admin/v_sudah_setor');
               $this->load->view('admin/v_footer');
          } elseif ($level == 2) { //admin
               $data['sudah_setor'] = $this->m_setor->sudah_setor_admin();
               $data['title'] = 'Belum Setor';
               $this->load->view('admin_th/v_header', $data);
               $this->load->view('admin_th/sudah_setor');
               $this->load->view('admin_th/v_footer');
          } else {
          }
     }
     function sudah_setor_th($id)
     {
          $th_tgl = $this->m_setor->get_th_tgl($id); //mengambil th dan tgl pod

          if ($th_tgl) {
               $data['belum_setor'] = $this->m_setor->belum_setor_th($th_tgl->th, $th_tgl->pod_time);
          } else {
               redirect(base_url('') . 'home/belum-setor');
          }
          $level = $this->session->userdata('pengguna_level');
          if ($level == 1) { //su
               $data['sudah_setor'] = $this->m_setor->sudah_setor_th($th_tgl->th, $th_tgl->pod_time);
               $data['title'] = 'Sudah Setor';
               $this->load->view('admin/v_header', $data);
               $this->load->view('admin/v_sudah_setor_th');
               $this->load->view('admin/v_footer');
          } elseif ($level == 2) { //admin
               $data['sudah_setor'] = $this->m_setor->sudah_setor_th($th_tgl->th, $th_tgl->pod_time);
               $data['title'] = 'Sudah Setor';
               $this->load->view('admin_th/v_header', $data);
               $this->load->view('admin_th/v_sudah_setor_th');
               $this->load->view('admin_th/v_footer');
          } else {
          }
     }
}

     /* End of file SudahController.php */;
