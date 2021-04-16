<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class UploadController extends CI_Controller
{
     public function index()
     {
          $data['title'] = 'Upload Data';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_upload');
          $this->load->view('admin/v_footer');
     }

     public function cod()
     {
          $this->load->model('m_upload');
          $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if (isset($_FILES['cod']['name']) && in_array($_FILES['cod']['type'], $file_mimes)) {
               $arr_file = explode('.', $_FILES['cod']['name']);
               $extension = end($arr_file);
               if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
               } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
               }
               $spreadsheet = $reader->load($_FILES['cod']['tmp_name']);
               $sheetData = $spreadsheet->getActiveSheet()->toArray();

               $num = $this->db->query("SELECT *, CAST(SUBSTRING_INDEX(import,'-',-1) AS int)AS cek FROM import WHERE CAST(SUBSTRING_INDEX(import,'-',1) AS char)='cod'")->num_rows();

               if ($num > 0) {
                    $data = $this->db->query("SELECT *, CAST(SUBSTRING_INDEX(import,'-',-1) AS int)AS cek FROM import WHERE CAST(SUBSTRING_INDEX(import,'-',1) AS char)='cod' ORDER BY `cek` DESC")->row();
                    $nomor = $data->cek + 1;
               } else {
                    $nomor = 1;
               }


               $this->db->trans_start(); # Starting Transaction
               $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

               $jumlah = 0;
               foreach ($sheetData as $x  => $excel) {
                    //skip judul table
                    $p = $excel['12'];
                    $id_import = 'cod-' . date('Ymd') . '-' . $nomor;
                    $pod = date("Y-m-d", strtotime($p));
                    if ($x <= 0) {
                         continue;
                    }
                    if ($excel['9'] == "Cash") {
                         continue;
                    }
                    if ($excel['9'] == "Monthly") {
                         // $excel['8'] = 0; //jika moutly makan PAD di kosongkan
                         if ($excel['10'] == 0) { //jika Cod kosong tdk di upload
                              continue;
                         }
                    }
                    if ($excel['9'] == "PAD") {
                         // $excel['8'] = 0; //jika moutly makan PAD di kosongkan
                         $excel['10'] = $excel['8'];
                    } else {
                         $excel['10'] = $excel['10'];
                    }
                    $data = array(
                         'waybill'                 => $excel['0'],
                         'th'                      => $excel['4'],
                         'kurir'                   => $excel['6'],
                         'type'                    => $excel['9'], //Mountly, POD, Cash
                         'fee'                     => $excel['10'],
                         'pod_time'                => $pod,
                         'id_import'               => $id_import,
                    );
                    //cek jika waybill sudah ada maka di next
                    $cek = $this->m_upload->getwhere($excel['0'])->num_rows();
                    if ($cek > 0) {
                         continue;
                    }
                    //insert data
                    $this->m_upload->inserttagihan($data);

                    $jumlah++;
               }
               //insert to table import
               $dataimport = array(
                    'import' => $id_import,
                    'jumlah' => $jumlah,
               );
               $this->m_upload->insertimport($dataimport);
               $this->db->trans_complete(); # Completing transaction

               /*Optional*/
               if ($this->db->trans_status() === FALSE) {
                    # Something went wrong.
                    $this->db->trans_rollback();
                    redirect(base_url() . "upload?error='$jumlah'");
               } else {
                    # Everything is Perfect. 
                    # Committing data to the database.
                    $this->db->trans_commit();
                    // return TRUE;
                    redirect(base_url() . "upload?jumlah='$jumlah'");
               }
          }
     }
     function cash()
     {
          $this->load->model('m_upload');
          $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if (isset($_FILES['cash']['name']) && in_array($_FILES['cash']['type'], $file_mimes)) {
               $arr_file = explode('.', $_FILES['cash']['name']);
               $extension = end($arr_file);
               if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
               } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
               }
               $spreadsheet = $reader->load($_FILES['cash']['tmp_name']);
               $sheetData = $spreadsheet->getActiveSheet()->toArray();
               //   $highestRow = $spreadsheet->getSheet(1)->getHighestRow();
               //   $sheetData = $spreadsheet->getSheet(1)->toArray(); //mengambil sheet 2 pada Excel

               $num = $this->db->query("SELECT *, CAST(SUBSTRING_INDEX(import,'-',-1) AS int)AS cek FROM import WHERE CAST(SUBSTRING_INDEX(import,'-',1) AS char)='cash'")->num_rows();

               if ($num > 0) {
                    $data = $this->db->query("SELECT *, CAST(SUBSTRING_INDEX(import,'-',-1) AS int)AS cek FROM import WHERE CAST(SUBSTRING_INDEX(import,'-',1) AS char)='cash' ORDER BY `cek` DESC")->row();
                    $nomor = $data->cek + 1;
               } else {
                    $nomor = 1;
               }

               $this->db->trans_start(); # Starting Transaction
               $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well 

               $jumlah = 0;
               foreach ($sheetData as $x  => $excel) {
                    //skip judul table
                    $p = $excel['1']; //shipping date
                    $id_import = 'cash-' . date('Ymd') . '-' . $nomor;
                    $pod = date("Y-m-d", strtotime($p));
                    if ($x <= 0) {
                         continue;
                    }
                    if ($excel['22'] == "Monthly" or $excel['22'] == "PAD") {
                         continue; // Jika monthly atau PAD maka tdk di simpan
                    }
                    $data = array(
                         'waybill'                 => $excel['0'], //kolom 1  no waybill
                         'th'                      => $excel['2'], //kolom 2     Shipping date
                         'kurir'                   => $excel['3'], //kolom 3    origin branch
                         'type'                    => $excel['22'], //Mountly, POD, Cash 
                         'fee'                     => $excel['14'], //total shipping fee
                         'pod_time'                => $pod, // 
                         'id_import'               => $id_import,
                    );
                    //cek jika waybill sudah ada maka di next                  
                    $cek = $this->m_upload->getwhere($excel['0'])->num_rows();
                    if ($cek > 0) {
                         continue;
                    }
                    $this->db->trans_begin(); // memulai Transaction
                    $this->m_upload->inserttagihan($data);
                    if ($this->db->trans_status() === FALSE) {
                         //Ada masalah
                         $this->db->trans_rollback(); //rollback insrt karna ada error           
                    } else {
                         $this->db->trans_commit();
                    }
                    $jumlah++;
               }
               //insert to table import
               $dataimport = array(
                    'import' => $id_import,
                    'jumlah' => $jumlah,
               );
               $this->m_upload->insertimport($dataimport);

               /*Optional*/
               if ($this->db->trans_status() === FALSE) {
                    # Something went wrong.
                    $this->db->trans_rollback();
                    redirect(base_url() . "upload?error='$jumlah'");
               } else {
                    # Everything is Perfect. 
                    # Committing data to the database.
                    $this->db->trans_commit();
                    // return TRUE;
                    redirect(base_url() . "upload?jumlah='$jumlah'");
               }
          }
     }
}
