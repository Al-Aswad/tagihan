<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

     public function index()
     {
          $this->load->view('v_login');
     }

     public function aksi()
     {
          $this->form_validation->set_rules('username', 'Username', 'trim|required');
          $this->form_validation->set_rules('password', 'Password', 'trim|required');

          if ($this->form_validation->run() == TRUE) {
               # code...
               $username = $this->input->post('username');
               $password = $this->input->post('password');

               $cek = $this->m_login->login($username)->row();

               if ($cek != null) {
                    $verifikasi = password_verify($password, $cek->pengguna_password);
                    if ($verifikasi == 1) {
                         // User ada password benar
                         $data = array(
                              'pengguna_nik' => $cek->pengguna_nik,
                              'pengguna_nama' => $cek->pengguna_nama,
                              'pengguna_level' => $cek->pengguna_akses,
                              'pengguna_th' => $cek->pengguna_th,
                              'status' => 'telah_login'
                         );

                         $level = $cek->pengguna_akses;
                         if ($level == 1) { //admin
                              $this->session->set_userdata($data);
                              $this->session->set_tempdata('pesan', 'Berhasil Login', 5); # 10 means secods
                              redirect(base_url('') . 'home');
                         } elseif ($level == 2) {
                              $this->session->set_userdata($data);
                              $this->session->set_tempdata('pesan', 'Berhasil Login', 5); # 10 means secods
                              redirect(base_url('') . 'admin');
                         } else {
                              $this->session->set_userdata($data);
                              $this->session->set_tempdata('pesan', 'Berhasil Login', 5); # 10 means secods
                              redirect(base_url('') . 'user');
                         }
                    } else {
                         // Jika user salah password
                         $this->session->set_tempdata('pesan', 'Password Salah', 5); # 10 means secods
                         redirect(base_url('') . 'login?pass=salah');
                    }
               } else {
                    // Jika user tidak ditemukan
                    $this->session->set_tempdata('pesan', 'Username tidak ditemukan', 5); # 10 means secods
                    redirect(base_url('') . '');
               }
          } else {
               # code...
               $this->index();
          }
     }
     public function keluar()
     {
          session_destroy();
          $data = array(
               'user_id' => '',
               'level' => ''
          );
          $this->session->unset_userdata($data);

          $this->index();
     }
}
