<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
     function login($username)
     {
          $this->db->where('pengguna_nik', $username);
          return $this->db->get('pengguna');
     }

     public function get($id = null)
     {
          $this->db->from('pengguna');
          if ($id != null) {
               $this->db->where('pengguna_nik', $id);
          }
          $query = $this->db->get()->row();
          return $query;
     }
}

     /* End of file M_login`.php */;
