<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{

     function historyawb()
     {
          $bulan = date('Ym');
          return $this->db->Query("SELECT 
          SUM( CASE WHEN TYPE = 'PAD'  THEN 1 ELSE 0 END ) AS pad, 
          SUM( CASE WHEN TYPE = 'Monthly'  THEN 1 ELSE 0 END ) AS cod, 
          SUM( CASE WHEN TYPE = 'Cash'  THEN 1 ELSE 0 END ) AS cash, 
          SUM( CASE WHEN waybill!='' THEN 1 ELSE 0 END) AS semua, 
          SUM( CASE WHEN TYPE = 'PAD' AND status!=4 THEN 1 ELSE 0 END ) AS b_pad, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status!=4 THEN 1 ELSE 0 END ) AS b_cod, 
          SUM( CASE WHEN TYPE = 'Cash' AND status!=4 THEN 1 ELSE 0 END ) AS b_cash, 
          SUM( CASE WHEN status!=4 THEN 1 ELSE 0 END) AS b_semua FROM `belum_setor` 
          WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'")->row();
     }
     function historyawb_filter($bulan)
     {
          return $this->db->Query("SELECT 
          SUM( CASE WHEN TYPE = 'PAD'  THEN 1 ELSE 0 END ) AS pad, 
          SUM( CASE WHEN TYPE = 'Monthly'  THEN 1 ELSE 0 END ) AS cod, 
          SUM( CASE WHEN TYPE = 'Cash'  THEN 1 ELSE 0 END ) AS cash, 
          SUM( CASE WHEN waybill!='' THEN 1 ELSE 0 END) AS semua, 
          SUM( CASE WHEN TYPE = 'PAD' AND status=4 THEN 1 ELSE 0 END ) AS s_pad, 
          SUM( CASE WHEN TYPE = 'Monthly' AND status=4 THEN 1 ELSE 0 END ) AS s_cod, 
          SUM( CASE WHEN TYPE = 'Cash' AND status=4 THEN 1 ELSE 0 END ) AS s_cash, 
          SUM( CASE WHEN status=4 THEN 1 ELSE 0 END) AS s_semua FROM `belum_setor` 
          WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan'")->row();
     }
     function historynominal()
     {
          $bulan = date('Ym');
          return $this->db->Query("SELECT pod_time,
          SUM( CASE WHEN TYPE = 'PAD' THEN fee ELSE 0 END) AS pad,
          SUM( CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0 END) AS cod,
          SUM( CASE WHEN TYPE = 'Cash' THEN fee ELSE 0 END) AS cash,
          SUM( fee) AS semua,
          SUM( CASE WHEN status = 4 THEN fee ELSE 0 END) AS sudah_setor,
          SUM( CASE WHEN status !=4  THEN fee ELSE 0 END) AS belum_setor
          FROM `belum_setor` WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' GROUP BY pod_time")->result();
     }
     function historynominal_filter($bulan)
     {
          return $this->db->Query("SELECT pod_time,
          SUM( CASE WHEN TYPE = 'PAD' THEN fee ELSE 0 END) AS pad,
          SUM( CASE WHEN TYPE = 'Monthly' THEN fee ELSE 0 END) AS cod,
          SUM( CASE WHEN TYPE = 'Cash' THEN fee ELSE 0 END) AS cash,
          SUM( fee) AS semua,
          SUM( CASE WHEN status = 4 THEN fee ELSE 0 END) AS sudah_setor,
          SUM( CASE WHEN status !=4  THEN fee ELSE 0 END) AS belum_setor
          FROM `belum_setor` WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' GROUP BY pod_time")->result();
     }
}

     /* End of file M_history.php */;
