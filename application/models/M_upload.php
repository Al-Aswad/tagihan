<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_upload extends CI_Model
{

     function inserttagihan($data)
     {
          $this->db->insert('belum_setor', $data);
     }
     function insertimport($data)
     {
          $this->db->insert('import', $data);
     }
     function getwhere($wb)
     {
          $this->db->where('waybill', $wb);
          return $this->db->get('belum_setor');
     }
}

     /* End of file M_upload.php */;
