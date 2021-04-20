<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaController extends CI_Controller
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
          $data['th'] = $this->m_pengguna->get_th();
          $data['title'] = 'Tambah Pengguna';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_pengguna_tambah');
          $this->load->view('admin/v_footer');
     }
     function tambah_aksi()
     {
          $this->form_validation->set_rules('nik', 'Nik', 'trim|required|min_length[8]|is_unique[pengguna.pengguna_nik]');
          $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
          $this->form_validation->set_rules('akses', 'Akses', 'trim|required');
          if ($this->input->post('akses') == 2) {
               $this->form_validation->set_rules('th', 'TH', 'trim|required');
          }

          if ($this->form_validation->run() == TRUE) {
               # code...
               $nik = $this->input->post('nik');
               $nama = $this->input->post('nama');
               $akses = $this->input->post('akses');
               $th = $this->input->post('th');

               $data = array(
                    'pengguna_nik' => $nik,
                    'pengguna_nama' => $nama,
                    'pengguna_th' => $th,
                    'pengguna_akses' => $akses,
               );
               $this->m_pengguna->tambah($data);
               redirect(base_url('pengguna?tambah=berhasil'));
          } else {
               # code...
               $this->tambah();
          }
     }

     function edit($id)
     {
          $data['pengguna'] = $this->m_pengguna->get_id($id);
          $data['th'] = $this->m_pengguna->get_th();
          $data['title'] = 'Manajemen Akun';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_pengguna_edit');
          $this->load->view('admin/v_footer');
     }
     function edit_aksi()
     {
          $this->form_validation->set_rules('nik', 'Nik', 'trim|required|min_length[8]');
          $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
          $this->form_validation->set_rules('akses', 'Akses', 'trim|required');
          if ($this->input->post('akses') == 2) {
               $this->form_validation->set_rules('th', 'TH', 'trim|required');
          }

          if ($this->form_validation->run() == TRUE) {
               # code...
               $id = $this->input->post('id');
               $nik = $this->input->post('nik');
               $nama = $this->input->post('nama');
               $akses = $this->input->post('akses');
               $th = $this->input->post('th');

               $cek = $this->m_pengguna->cek_nik($nik); //cek nik karyawan untuk menghindari duplikat NIK
               if ($cek > 1) {
                    redirect(base_url('pengguna-edit/' . $id . '?nik=sudahada'));
               } else {
                    $data = array(
                         'pengguna_nik' => $nik,
                         'pengguna_nama' => $nama,
                         'pengguna_akses' => $akses,
                         'pengguna_th' => $th,
                    );
                    $this->m_pengguna->update($id, $data);
                    redirect(base_url('pengguna?edit=sukse'));
               }
          } else {
               # code...
               $id = $this->input->post('id');

               $this->edit($id);
          }
     }
     function hapus($id)
     {
          $this->m_pengguna->hapus($id);
          $this->session->flashdata('pesan');
          redirect(base_url('pengguna?delete=sukses'));
     }
}
