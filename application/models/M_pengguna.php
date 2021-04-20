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
     function get_id($id)
     {
          $this->db->where('pengguna_id', $id);
          return $this->db->get('pengguna')->row();
     }
     function cek_nik($nik)
     {
          $this->db->where('pengguna_nik', $nik);
          return $this->db->get('pengguna')->num_rows();
     }
     function get_th()
     {
          $this->db->distinct();
          $this->db->select('th');
          $this->db->order_by('th', 'ASC');
          return $this->db->get('belum_setor')->result();
     }

     function update($id, $data)
     {
          $this->db->where('pengguna_id', $id);
          $this->db->update('pengguna', $data);
     }

     function tambah($data)
     {
          $this->db->insert('pengguna', $data);
     }
     function hapus($id)
     {
          $this->db->where('pengguna_id', $id);
          $this->db->delete('pengguna');
     }
}

     /* End of file M_pengguna.php */;
