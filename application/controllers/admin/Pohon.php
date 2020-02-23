<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pohon extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'm_admin');
    }	
    
    public function index()
    {
        $email = $this->session->userdata('email');
        if($email == NULL) {
            $data['heading'] = 'Website tidak terakses';
            $data['message'] = 'Silahkan login terlebih dahulu. '+'<a href="#">Login</a>';

            $this->load->view('errors/html/error_404', $data);
        } else {

        $data['title_page'] = 'Pohon - Data';
        $data['human'] = $this->m_admin->humanById($email)->row();
        $data['menu'] = array(
            'dashboard' => '',
            'pohon' => 'active',
            'user_mgmnt' => ''
        );

        $this->load->view('templates/admin/va_header', $data);
        $this->load->view('templates/admin/va_sidebar');
        $this->load->view('templates/admin/va_topbar');
        $this->load->view('admin/va_pohon');
        $this->load->view('templates/admin/va_footer');
        }
    }
    
    public function tambahPohon(){
        
        $email = $this->session->userdata('email');
        if($email == NULL) {
            $data['heading'] = 'Website tidak terakses';
            $data['message'] = 'Silahkan login terlebih dahulu.';

            $this->load->view('errors/html/error_404', $data);
        } else {

        $data['human'] = $this->m_admin->humanById($email)->row();
        $data['menu'] = array(
            'dashboard' => '',
            'pohon' => 'active',
            'user_mgmnt' => ''
        );
        $this->load->view('templates/admin/va_header', $data);
        $this->load->view('templates/admin/va_sidebar');
        $this->load->view('templates/admin/va_topbar');
        $this->load->view('admin/va_tambahphn.php');
        $this->load->view('templates/admin/va_footer');
        }
    }
}