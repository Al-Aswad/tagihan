<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tagihan extends CI_Model
{
     function tagihan()
     {
          $bulan = date('Ym');
          return $this->db->query("SELECT s.id,s.th,s.pod_time,
          SUM(fee) AS total,
          SUM(CASE WHEN s.status= 3 THEN fee ELSE 0 END) as terkonfirmasi FROM belum_setor as s WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'
          GROUP BY th,pod_time ORDER BY SUM(fee)-SUM(CASE WHEN s.status= 3 THEN fee ELSE 0 END) DESC")->result();
     }
     function filter($bulan)
     {
          return $this->db->query("SELECT s.id,s.th,s.pod_time,
          SUM(fee) AS total,
          SUM(CASE WHEN s.status= 3 THEN fee ELSE 0 END) as terkonfirmasi FROM belum_setor as s WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'
          GROUP BY th,pod_time ORDER BY SUM(fee)-SUM(CASE WHEN s.status= 3 THEN fee ELSE 0 END) DESC")->result();
     }
     function tagihan_th($bulan)
     {
          $th = $this->session->userdata('pengguna_th');
          return $this->db->query("SELECT s.id,s.th,s.pod_time,
          SUM( CASE WHEN TYPE = 'PAD' THEN fee ELSE 0 END) AS pad,
          SUM( CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0 END) AS cod,
          SUM( CASE WHEN TYPE = 'Cash' THEN fee ELSE 0 END) AS cash,
          SUM(fee) AS total,
          SUM(CASE WHEN s.status= 3 THEN fee ELSE 0 END) as terkonfirmasi 
          FROM belum_setor as s WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'
          AND th='$th' 
          GROUP BY th,pod_time ORDER BY pod_time")->result();
     }
}

     /* End of file M_tagihan.php */;
