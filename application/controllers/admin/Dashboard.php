<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'm_admin');
    }	
    
    public function index()
    {
        $email = $this->session->userdata('email');
        
        $data['title_page'] = 'Admin - Dashboard';
        $data['human'] = $this->m_admin->humanById($email)->row();
        $data['menu'] = array(
            'dashboard' => 'active',
            'pohon' => '',
            'user_mgmnt' => ''
        );
        
        $this->load->view('templates/admin/va_header', $data);
        $this->load->view('templates/admin/va_sidebar');
        $this->load->view('templates/admin/va_topbar');
        $this->load->view('admin/va_dashboard');
        $this->load->view('templates/admin/va_footer');
    }
    
}