<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
	}	

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array(
			'required' => 'Email belum diisi!',
			'valid_email' => 'Email tidak valid!'
		));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', array(
			'required' => 'Password belum diisi!',
			'min_length' => 'Password minimal 6 karakter!'
		));
		if($this->form_validation->run() == FALSE) {
			$data = [
				'title_page' => 'Login Page',
				'navHomeStatus' => '', 
				'navLogStatus' => 'active',
				'navDownloadStatus' => ''
			];
			$this->load->view('templates/v_header', $data);
			$this->load->view('v_login');
			$this->load->view('templates/v_footer');
		} else {
			$this->_login();
		}

	}

	private function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$email_checking = $this->auth_model->email_checker($email);

		if($email_checking == TRUE) {

			$password_checking = $this->auth_model->password_checker($email, $password);

			if($password_checking == TRUE) {
				$role_id_checking = $this->auth_model->role_id_checker($email);
				$data = array(
                    'email' => $email,
                    'role_id' => $role_id_checking
				);
				
				$this->session->set_userdata($data);
				
				if($role_id_checking == $data['role_id']) {
					redirect('admin/dashboard');
				}
			} else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password anda salah!
					</div>');
				redirect('auth');
				}
		} else {
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email anda salah!
			</div>');
		redirect('auth');
		}
	}
	
	public function register()
	{	
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required', array(
			'required' => 'Nama belum diisi!'
		));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[t_human.email]', array(
			'required' => 'Email belum diisi!',
			'valid_email' => 'Email tidak valid!',
			'is_unique' => 'Email sudah terdaftar!'
		));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]', array(
			'required' => 'Password belum diisi!',
			'min_length' => 'Password minimal 6 karakter!'
		));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', array(
			'required' => 'Password belum ditulis ulang!',
			'matches' => 'Password tidak cocok!'
		));
			
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title_page' => 'Register Page',
				'navHomeStatus' => '', 
				'navLogStatus' => 'active',
				'navDownloadStatus' => ''
			];
			
			$this->load->view('templates/v_header', $data);
			$this->load->view('v_register');
			$this->load->view('templates/v_footer');
		}
		
		else {
			$password_inputed = $this->input->post('password1');
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'password' => password_hash($password_inputed, PASSWORD_BCRYPT),
				'avatar' => 'default.jpg',
				'role_id' => 1,
				'is_verified' => 1,
                'is_active' => 1,
                'is_created' => now('Asia/Jakarta')
			);

			$this->auth_model->insert_registration($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! Your account has benn registered. Please Login!
            </div>');
            redirect('auth');
		}
	}

	public function logout() {
        $this->session->unset_userdata('email', 'role_id');
        redirect('auth');
    }
}