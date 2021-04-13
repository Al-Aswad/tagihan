<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_setor extends CI_Model
{

     function belum_setor()
     {
          return $this->db->query("SELECT
          id,th,
          pod_time,
          SUM(CASE WHEN TYPE = 'PAD' THEN fee ELSE 0
          END) AS pad,
          SUM(CASE WHEN TYPE = 'Cash' THEN fee ELSE 0
          END) AS cash,
          SUM(CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0
          END) AS cod, SUM(fee) AS semua
          FROM belum_setor WHERE status=0 
          GROUP BY th,pod_time")->result();
     }
     function belum_setor_admin()
     {
          $th = $this->session->userdata('pengguna_th');
          return $this->db->query("SELECT
          id,th,
          pod_time,
          SUM(CASE WHEN TYPE = 'PAD' THEN fee ELSE 0
          END) AS pad,
          SUM(CASE WHEN TYPE = 'Cash' THEN fee ELSE 0
          END) AS cash,
          SUM(CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0
          END) AS cod, SUM(fee) AS semua
          FROM belum_setor WHERE status=0 AND th='$th'
          GROUP BY th,pod_time")->result();
     }



     function belum_setor_th($th, $tgl)
     {
          $this->db->where('th', $th);
          $this->db->where('pod_time', $tgl);
          $this->db->where('status =', 0);
          return $this->db->get('belum_setor')->result();
     }

     function setor($id)
     {
          $this->db->set('status', 1);
          $this->db->set('last_update', date('Y-m-d H:i:s'));
          $this->db->where('id', $id);
          $this->db->update('belum_setor');
     }
     function batal_setor($id)
     {
          $this->db->set('status', 0);
          $this->db->set('last_update', date('Y-m-d H:i:s'));
          $this->db->where('id', $id);
          $this->db->update('belum_setor');
     }

     //cek id
     function get_id($th, $pod_time)
     {
          $this->db->where('th', $th);
          $this->db->where('status =', 0);
          $this->db->where('pod_time', $pod_time);
          return $this->db->get('belum_setor')->row();
     }

     function sudah_setor()
     {
          return $this->db->query("SELECT
          id,th,
          pod_time,
          SUM(CASE WHEN TYPE = 'PAD' THEN fee ELSE 0
          END) AS pad,
          SUM(CASE WHEN TYPE = 'Cash' THEN fee ELSE 0
          END) AS cash,
          SUM(CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0
          END) AS cod, SUM(fee) AS total
          FROM belum_setor WHERE status=1
          GROUP BY th,pod_time")->result();
     }
     function sudah_setor_admin()
     {
          $th = $this->session->userdata('pengguna_th');
          return $this->db->query("SELECT
          id,th,
          pod_time,
          SUM(CASE WHEN TYPE = 'PAD' THEN fee ELSE 0
          END) AS pad,
          SUM(CASE WHEN TYPE = 'Cash' THEN fee ELSE 0
          END) AS cash,
          SUM(CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0
          END) AS cod, SUM(fee) AS total
          FROM belum_setor WHERE status=1 and th='$th'
          GROUP BY th,pod_time")->result();
     }
     function sudah_setor_th($th, $tgl)
     {
          $this->db->where('th', $th);
          $this->db->where('pod_time', $tgl);
          $this->db->where('status =', 1);
          return $this->db->get('belum_setor')->result();
     }


     function get_th_tgl($id)
     {
          $this->db->where('md5(id)', $id);
          return $this->db->get('belum_setor')->row();
     }
}

     /* End of file M_setor.php */;
