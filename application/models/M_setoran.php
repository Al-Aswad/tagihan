<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_setoran extends CI_Model
{

     function setoran()
     {
          $bulan = date('Ym');
          return $this->db->query("SELECT *,
          Sum(jumlah) as total,
          SUM(status) as jumlah,
          SUM(case WHEN status=0 THEN 1 ELSE 0 END) as belum_dikonfirmasi FROM `setoran_admin` 
          where EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' GROUP BY th, pod_time ORDER BY `belum_dikonfirmasi` DESC")->result();
     }
     function filter($bulan)
     {
          return $this->db->query("SELECT *, 
          SUM(jumlah) as total, 
          SUM(status) as jumlah,
          SUM(case WHEN status=0 THEN 1 ELSE 0 END) as belum_dikonfirmasi FROM `setoran_admin` 
          where EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' GROUP BY th,pod_time ORDER BY `belum_dikonfirmasi` DESC")->result();
     }

     function setoran_kurir()
     {
          $bulan = date('Ym');
          $th = $this->session->userdata('pengguna_th');

          return $this->db->query("SELECT id, th, type,pod_time, 
          SUM(fee) AS total, 
          SUM( CASE WHEN status=0 THEN fee ELSE 0 END ) AS blm_setor, 
          SUM( CASE WHEN STATUS = 1 THEN fee ELSE 0 END ) AS sdh_setor,
          SUM( CASE WHEN TYPE = 'PAD' AND status=1 THEN fee ELSE 0 END ) AS s_pad, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=1 THEN fee ELSE 0 END ) AS s_cash, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=1 THEN fee ELSE 0 END ) AS s_cod
          FROM belum_setor WHERE th='$th' and EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' GROUP BY pod_time ORDER BY sdh_setor DESC")->result();
     }

     function filter_th($bulan)
     {
          $th = $this->session->userdata('pengguna_th');
          return $this->db->query("SELECT id, th, type,pod_time, 
          SUM(fee) AS total, 
          SUM( CASE WHEN status=0 THEN fee ELSE 0 END ) AS blm_setor, 
          SUM( CASE WHEN STATUS = 1 THEN fee ELSE 0 END ) AS sdh_setor,
          SUM( CASE WHEN TYPE = 'PAD' AND status=1 THEN fee ELSE 0 END ) AS s_pad, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=1 THEN fee ELSE 0 END ) AS s_cash, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=1 THEN fee ELSE 0 END ) AS s_cod
          FROM belum_setor WHERE th='$th' and EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' GROUP BY pod_time ORDER BY sdh_setor DESC")->result();
     }

     function setor_to_finance($id)
     {
          $th = $this->session->userdata('pengguna_th');
          return $this->db->query("SELECT id, th, pod_time, 
          SUM( CASE WHEN STATUS = 1 THEN fee ELSE 0 END ) AS sdh_setor
          FROM belum_setor WHERE th='$th' AND pod_time='$id' GROUP BY pod_time")->row();
     }

     function get_kode($pod_time)
     {
          $th = $this->session->userdata('pengguna_th');
          $this->db->where("th", $th);
          $this->db->where("pod_time", $pod_time);
          $this->db->where("status", 1);
          return $this->db->get('belum_setor')->first_row();
     }
     function get_awb($pod_time)
     {
          $th = $this->session->userdata('pengguna_th');
          $this->db->select('waybill');
          $this->db->where("th", $th);
          $this->db->where("pod_time", $pod_time);
          $this->db->where("status", 1);
          return $this->db->get('belum_setor')->result();
     }
     function update_to_finance($data)
     {
          $th = $this->session->userdata('pengguna_th');
          $this->db->where('th', $th);
          $this->db->where('status', 1);
          $this->db->update('belum_setor', $data);
     }
     function insert($data)
     {
          $this->db->insert('setoran_admin', $data);
     }

     function admin_finance($bulan)
     {
          $th = $this->session->userdata('pengguna_th');
          $this->db->where('th', $th);
          $this->db->where('EXTRACT(YEAR_MONTH FROM pod_time)=', $bulan);
          $this->db->order_by('status', 'ASC');
          $this->db->order_by('create_at', 'DESC');
          return $this->db->get('setoran_admin')->result();
     }

     function cek_tgl_th($kode_setor)
     {
          $this->db->select('pod_time, th');
          $this->db->where("kode_setor", $kode_setor);
          return $this->db->get('setoran_admin')->first_row();
     }


     //mengubah status setoran admin 
     function table_setoran($kode_setor)
     {
          $data = array(
               'status' => 1
          );
          $this->db->where('kode_stor', $kode_setor);
          $this->db->update('setoran_admin', $data);
     }
     function table_belum($kode_setor)
     {
          $data = array(
               'status' => 3,
               'last_update' => date('Y-m-d H:i:s')
          );
          $this->db->where('kode_stor', $kode_setor);
          $this->db->update('setoran_admin', $data);
     }

     function setoran_cek($tgl, $th)
     {
          return $this->db->query("SELECT *
          FROM setoran_admin WHERE th='$th' and  pod_time='$tgl' ORDER BY status ASC")->result();
     }
     function konfirmasi_admin($kode_setor)
     {
          $data = array(
               'status' => 1,
          );
          $this->db->where('kode_setor', $kode_setor);
          $this->db->update('setoran_admin', $data);
     }
     function konfirmasi_belum($kode_setor)
     {
          $data = array(
               'status' => 3,
               'last_update' => date('Y-m-d H:i:s')
          );
          $this->db->where('kode_setor', $kode_setor);
          $this->db->update('belum_setor', $data);
     }
     function batal_konfirmasi_admin($kode_setor)
     {
          $data = array(
               'status' => 0,
          );
          $this->db->where('kode_setor', $kode_setor);
          $this->db->update('setoran_admin', $data);
     }
     function batal_konfirmasi_belum($kode_setor)
     {
          $data = array(
               'status' => 2,
               'last_update' => date('Y-m-d H:i:s')
          );
          $this->db->where('kode_setor', $kode_setor);
          $this->db->update('belum_setor', $data);
     }
}

     /* End of file M_setoran.php */;
