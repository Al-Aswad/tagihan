<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

     function getawb()
     {
          $bulan = date('Ym');
          return $this->db->query("SELECT 
          SUM( CASE WHEN TYPE = 'PAD' AND status=0 THEN 1 ELSE 0 END ) AS pad, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=0 THEN 1 ELSE 0 END ) AS cod, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=0 THEN 1 ELSE 0 END ) AS cash, 
          SUM( CASE WHEN waybill!='' THEN 1 ELSE 0 END) AS semua_awb, 
          SUM( CASE WHEN TYPE = 'PAD' AND status=1 THEN 1 ELSE 0 END ) AS s_pad, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=1 THEN 1 ELSE 0 END ) AS s_cod, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=1 THEN 1 ELSE 0 END ) AS s_cash, 
          SUM( CASE WHEN status=1 THEN 1 ELSE 0 END) AS s_semua FROM `belum_setor` 
          WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'")->row();
     }
     function getnominal()
     {
          $bulan = date('Ym');
          return $this->db->query("SELECT
          SUM( CASE WHEN TYPE = 'PAD' AND waybill != '' THEN fee ELSE 0 END) AS pad,
          SUM( CASE WHEN TYPE = 'Monthly' AND waybill != '' THEN fee ELSE 0 END) AS cod,
          SUM( CASE WHEN TYPE = 'Cash' AND waybill != '' THEN fee ELSE 0 END) AS cash,
          SUM( CASE WHEN waybill != '' THEN fee ELSE 0 END) AS semua_tagihan,
          SUM( CASE WHEN TYPE = 'PAD' AND STATUS= 1 THEN fee ELSE 0 END) AS s_pad,
          SUM( CASE WHEN TYPE = 'Monthly' AND STATUS = 1 THEN fee ELSE 0 END) AS s_cod,
          SUM( CASE WHEN TYPE = 'Cash' AND STATUS = 1 THEN fee ELSE 0 END) AS s_cash,
          SUM( CASE WHEN STATUS = 1 THEN fee ELSE 0 END) AS s_semua,
          SUM( CASE WHEN TYPE = 'PAD' AND STATUS= 0 THEN fee ELSE 0 END) AS ss_pad,
          SUM( CASE WHEN TYPE = 'Monthly' AND STATUS = 0 THEN fee ELSE 0 END) AS ss_cod,
          SUM( CASE WHEN TYPE = 'Cash' AND STATUS = 0 THEN fee ELSE 0 END) AS ss_cash,
          SUM( CASE WHEN status = 0 THEN fee ELSE 0 END) AS ss_semua
          FROM `belum_setor` WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'")->row();
     }
}

     /* End of file M_admin.php */;
