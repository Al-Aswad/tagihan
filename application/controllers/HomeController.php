<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

     public function index()
     {
          $data['awb'] = $this->m_home->getawb();
          $data['tagihan'] = $this->m_home->getnominal();
          $data['title'] = 'Home';
          $this->load->view('admin/v_header', $data);
          $this->load->view('admin/v_dashboard');
          $this->load->view('admin/v_footer');
     }
}

     /* End of file AdminController.php */;
