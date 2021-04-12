<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{
     function get()
     {
          return $this->db->get('pengguna')->result();
     }
     function get_admin($nik)
     {
          $this->db->where('pengguna_nik', $nik);
          return $this->db->get('pengguna')->result();
     }
}

     /* End of file M_pengguna.php */;
