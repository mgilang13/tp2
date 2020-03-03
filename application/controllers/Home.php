<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Pohon_model', 'm_pohon');
	}	
	
	public function index()
	{
		$data = [
			'title_page' => 'Home Page',
			'navHomeStatus' => 'active', 
			'navLogStatus' => '',
			'navDownloadStatus' => ''
		];
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_home');
		$this->load->view('templates/v_footer');
	}
	
	public function downloadPage()
	{
		$data = [
			'title_page' => 'Download Page',
			'navHomeStatus' => '', 
			'navLogStatus' => '',
			'navDownloadStatus' => 'active'
		];
		
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_download');
		$this->load->view('templates/v_footer');
	}

	public function showJSON() {
		$data['dataJSON'] = $this->m_pohon->dataJSON();
		$this->load->view('data_json', $data);
	}
}