<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

     function get_awb()
     {
          $bulanini = date('Ym');
          $th = $this->session->userdata('pengguna_th');
          return $this->db->Query("SELECT 
          SUM( CASE WHEN TYPE = 'PAD' AND status=0 THEN 1 ELSE 0 END ) AS pad, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=0 THEN 1 ELSE 0 END ) AS cod, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=0 THEN 1 ELSE 0 END ) AS cash, 
          SUM( CASE WHEN status=0 THEN 1 ELSE 0 END) AS semua, 
          SUM( CASE WHEN TYPE = 'PAD' AND status=1 THEN 1 ELSE 0 END ) AS s_pad, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=1 THEN 1 ELSE 0 END ) AS s_cod, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=1 THEN 1 ELSE 0 END ) AS s_cash, 
          SUM( CASE WHEN status=1 THEN 1 ELSE 0 END) AS s_semua FROM `belum_setor` WHERE th='$th' AND EXTRACT(YEAR_MONTH FROM pod_time)='$bulanini'")->row();
     }
     function get_nominal()
     {
          $th = $this->session->userdata('pengguna_th');
          $this->db->where('th', $th);
          $this->db->where('status', 0);
          return $this->db->get('belum_setor')->row();
     }
}

     /* End of file M_admin.php */;
