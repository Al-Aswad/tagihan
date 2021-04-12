<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaController extends CI_Controller
{

     public function index()
     {
          $level = $this->session->userdata('pengguna_level');
          if ($level == 1) { //su
               $data['akun'] = $this->m_pengguna->get();
               $data['title'] = 'Manajemen Akun';
               $this->load->view('admin/v_header', $data);
               $this->load->view('admin/v_pengguna');
               $this->load->view('admin/v_footer');
          } elseif ($level == 2) { //admin
               $nik = $this->session->userdata('pengguna_nik');
               $data['akun'] = $this->m_pengguna->get_admin($nik);
               $data['title'] = 'Manajemen Akun';
               $this->load->view('admin_th/v_header', $data);
               $this->load->view('admin/v_pengguna');
               $this->load->view('admin_th/v_footer');
          } else { //kurir

          }
     }
     function tambah()
     {
          $data['title'] = 'Tambah Pengguna';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_pengguna_tambah');
          $this->load->view('admin/v_footer');
     }
     function edit()
     {
          $data['title'] = 'Manajemen Akun';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_pengguna_edit');
          $this->load->view('admin/v_footer');
     }
     function hapus()
     {
     }
}
