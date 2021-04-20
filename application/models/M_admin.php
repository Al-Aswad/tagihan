<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
     var $table = 'belum_setor';
     var $column_order = array(null, 'waybill', 'karyawan_nik', 'karyawan_nama', 'th', 'type', 'fee', 'pod_time', 'timedown'); //set column field database for datatable orderable
     var $column_search = array('waybill', 'karyawan_nik', 'karyawan_nama', 'th', 'type', 'fee', 'pod_time'); //set column field database for datatable searchable 
     var $order = array('id' => 'asc'); // default order 

     private function _get_datatables_query()
     {
          // $tahun_ini = '2021';
          $tahun_ini = date('Y');
          // $bulan_ini = '02';
          $bulan_ini = date('n');
          // $bulan_ini = '02';
          $th = $this->session->userdata('pengguna_th');

          $this->db->select("id,waybill, karyawan_nik, karyawan_nama, th, type, fee,  pod_time,datediff(CURRENT_DATE,pod_time)  as timedown ");
          $this->db->from('belum_setor as c');
          $this->db->join('karyawan k', 'LEFT(c.kurir,3)=k.kurir', 'LEFT');
          $this->db->where('c.th', $th);
          // $this->db->where("YEAR(c.pod_time)", $tahun_ini);
          // $this->db->where("MONTH(c.pod_time)", $bulan_ini);
          $this->db->where('c.status', 0);

          $i = 0;

          foreach ($this->column_search as $item) // loop column 
          {
               if ($_POST['search']['value']) // if datatable send POST for search
               {
                    if ($i === 0) // first loop
                    {
                         $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                         $this->db->like($item, $_POST['search']['value']);
                    } else {
                         $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($this->column_search) - 1 == $i) //last loop
                         $this->db->group_end(); //close bracket
               }
               $i++;
          }

          if (isset($_POST['order'])) // here order processing
          {
               $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else if (isset($this->order)) {
               $order = $this->order;
               $this->db->order_by(key($order), $order[key($order)]);
          }
     }

     function get_datatables()
     {
          $this->_get_datatables_query();
          if ($_POST['length'] != -1)
               $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get();
          return $query->result();
     }

     function count_filtered()
     {
          $tahun_ini = date('Y');
          $bulan_ini = date('n');
          $th = $this->session->userdata('pengguna_th');

          $this->_get_datatables_query();
          $query = $this->db->get();
          $this->db->where('c.th', $th);
          $this->db->where('status', 0);
          // $this->db->where("YEAR(pod_time)", $tahun_ini);
          // $this->db->where("MONTH(pod_time)", $bulan_ini);
          return $query->num_rows();
     }

     public function count_all()
     {
          $tahun_ini = date('Y');
          $bulan_ini = date('n');
          $th = $this->session->userdata('pengguna_th');

          $this->db->from('belum_setor as c');
          $this->db->where('c.th', $th);
          $this->db->where('c.status', 0);
          // $this->db->where("YEAR(c.pod_time)", $tahun_ini);
          // $this->db->where("MONTH(c.pod_time)", $bulan_ini);
          return $this->db->count_all_results();
     }


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
          SUM( CASE WHEN TYPE = 'PAD' AND STATUS= 0 THEN fee ELSE 0 END) AS b_pad,
          SUM( CASE WHEN TYPE = 'Monthly' AND STATUS = 0 THEN fee ELSE 0 END) AS b_cod,
          SUM( CASE WHEN TYPE = 'Cash' AND STATUS = 0 THEN fee ELSE 0 END) AS b_cash,
          SUM( CASE WHEN status != 3 THEN fee ELSE 0 END) AS b_semua
          FROM `belum_setor` WHERE EXTRACT(YEAR_MONTH FROM pod_time)='$bulan' and th='$th'")->row();
     }
}

     /* End of file M_admin.php */;
