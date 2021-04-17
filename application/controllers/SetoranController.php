<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SetoranController extends CI_Controller
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

          $bulan = $this->input->get('bulan');
          if ($bulan == '') {
               $data['setoran'] = $this->m_setoran->setoran();
          } else {
               $data['setoran'] = $this->m_setoran->filter($bulan);
          }
          $data['title'] = 'Setoran Admin';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_setoran');
          $this->load->view('admin/v_footer');
     }

     function setoran_kurir()
     {
          $bulan = $this->input->get('bulan');

          $bulan = $this->input->get('bulan');
          if ($bulan == '') {
               $data['setoran'] = $this->m_setoran->setoran_kurir();
          } else {
               $data['setoran'] = $this->m_setoran->filter_th($bulan);
          }
          $data['title'] = 'Setoran dari admin ke Kurir';
          $this->load->view('admin_th/v_header', $data);
          $this->load->view('admin_th/v_setoran_kurir');
          $this->load->view('admin_th/v_footer');
     }

     function setor_to_finance($id)
     {
          $data['setor'] = $this->m_setoran->setor_to_finance($id);
          // echo $data->setor;
          if ($data['setor'] == null) {
               echo "Data kosong";
               // redirect(site_url('setoran-kurir?datakosong'));
          } else {
               $data['title'] = 'Setor';
               $this->load->view('admin_th/v_header', $data);
               $this->load->view('admin_th/v_setor');
               $this->load->view('admin_th/v_footer');
          }
     }
     function aksi()
     {
          // $this->m_setoran->admin_to_finance();
          $this->form_validation->set_rules('th', 'TH', 'trim|required');
          $this->form_validation->set_rules('nik', 'NIK Karyawan', 'trim|required');
          $this->form_validation->set_rules('pod_time', 'Pod Time', 'trim|required');
          $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
          $this->form_validation->set_rules('ket', 'Keterangan', 'trim');
          //membuat gambar wajib isi
          if (empty($_FILES['bukti_tf']['name'])) {
               $this->form_validation->set_rules('bukti_tf', 'Bukti Transfer', 'required');
          }
          if ($this->form_validation->run() == TRUE) {
               # code...
               $th = $this->input->post('th');
               $nik = $this->input->post('nik');
               $pod_time = $this->input->post('pod_time');
               $jumlah = $this->input->post('jumlah');
               $ket = $this->input->post('ket');

               //mengambil salah satu awb untuk jadi kode setor dan nama gambar
               $kode_setor = $this->m_setoran->get_kode($pod_time);
               //pengaturan gambar yang akan di upload
               $config['upload_path'] = 'gambar/bukti_transfer';
               $config['allowed_types'] = 'jpeg|jpg|png';
               $config['max_size'] = 1024; //max ukuran gambar
               $config['file_name'] = $kode_setor->waybill;

               $this->load->library('upload', $config);

               if ($this->upload->do_upload('bukti_tf')) {
                    $bukti_setoran = $this->upload->data();
                    $nama_bukti_tf = $bukti_setoran['file_name'];
                    //menyimpan data yang akan di simpan
                    $data = array(
                         'nik' => $nik,
                         'th' => $th,
                         'pod_time' => $pod_time,
                         'jumlah' => $jumlah,
                         'bukti_setoran' => $nama_bukti_tf,
                         'kode_setor' => $kode_setor->waybill,
                         'keterangan' => $ket,
                    );
                    //data untuk update tabel belum_setor
                    $data_update = array(
                         'status' => 2,
                         'kode_setor' => $kode_setor->waybill,
                         'last_update' => date('Y-m-d H:i:s'),
                    );
                    // proses update status setiap wybill
                    $awb = $this->m_setoran->get_awb($pod_time);
                    foreach ($awb as $a) {
                         $this->m_setoran->update_to_finance($data_update, $pod_time); //update tabel blum_setor ubha  status dari 1 ke 2 
                    }
                    //insert ke tabel setoran admin
                    $this->m_setoran->insert($data);
                    redirect(base_url('setoran-kurir?proses?berhasil'));
               } else {
                    // jika gambart gagal upload
                    $tgl = $this->input->post('pod_time');
                    $this->setor_to_finance($tgl);
               }
          } else {
               # code...
               $tgl = $this->input->post('pod_time');
               $this->setor_to_finance($tgl);
          }
     }


     function setoran_finance()
     {
          $pod_time = $this->input->get('bulan');
          if ($pod_time) {
               $data['setoran'] = $this->m_setoran->admin_finance($pod_time);
          } else {
               $bulan = date('Ym');
               $data['setoran'] = $this->m_setoran->admin_finance($bulan);
          }
          $data['title'] = 'Setoran to Finance';
          $this->load->view('admin_th/v_header', $data);
          $this->load->view('admin_th/v_setoran_to_finance');
          $this->load->view('admin_th/v_footer');
     }

     function setoran_cek($kode_setor)
     {
          $cek_tgl_th = $this->m_setoran->cek_tgl_th($kode_setor);
          // var_dump($cek_tgl_th->th);
          if ($cek_tgl_th == null) {
               echo 'Kosong';
               redirect(site_url('setoran?data=kosong'));
          } else {
               $data['setoran_cek'] = $this->m_setoran->setoran_cek($cek_tgl_th->pod_time, $cek_tgl_th->th);
               $data['title'] = 'Konfirmasi Storan';
               $this->load->view('admin/v_header', $data);
               $this->load->view('admin/v_konfirmasi');
               $this->load->view('admin/v_footer');
          }
     }

     function konfirmasi($kode_setor)
     {
          $this->m_setoran->konfirmasi_admin($kode_setor);
          $this->m_setoran->konfirmasi_belum($kode_setor);
          $this->setoran_cek($kode_setor);
     }
     function batal_konfirmasi($kode_setor)
     {
          $this->m_setoran->batal_konfirmasi_admin($kode_setor);
          $this->m_setoran->batal_konfirmasi_belum($kode_setor);
          $this->setoran_cek($kode_setor);
     }
     // function setoran_cek($kode_setor)
     // {
     // }
}

     /* End of file SetoranController.php */;
