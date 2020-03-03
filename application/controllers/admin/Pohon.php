<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pohon extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'm_admin');
        $this->load->model('Pohon_model', 'm_pohon');
    }	
    
    public function index()
    {
        $data['read_data'] = $this->m_pohon->read_data_pohon();

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
        $this->load->view('admin/va_pohon', $data);
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
        
        $data['title_page'] ="Tambah Pohon";
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

    public function add_process() {
        $id = $this->session->userdata('id');

        $this->form_validation->set_rules('nama', 'Nama Pohon', 'required', array(
            'required' => 'Nama belum diisi'
        ));
        $this->form_validation->set_rules('nm_latin', 'Nama Latin', 'required', array(
            'required' => 'Nama Latin belum diisi'
        ));
        $this->form_validation->set_rules('description', 'Deskripsi Pohon', 'required', array(
            'required' => 'Deskripsi pohon belum diisi'
        ));
        
        if ($this->form_validation->run() == FALSE) {
			$this->tambahPohon();
		} else {
            // Pengaturan gambar
            $filename = time();
            

            $config = array(
                'upload_path' => "./uploads",
                'allowed_types' => "jpg|png|jpeg",
                'max_height' => "1080",
                'max_width' => "1080",
                'file_name' => $filename,
                'overwrite' => true
            );
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('gambar_pohon'))
            {
                //generate qr code
                $this->load->library('ciqrcode');

                $config['cacheable']    = true; //boolean, the default is true
                $config['cachedir']     = './qrpohon/'; //string, the default is application/cache/
                $config['errorlog']     = './qrpohon/'; //string, the default is application/logs/
                $config['imagedir']     = './qrpohon/image/'; //direktori penyimpanan qr code
                $config['quality']      = true; //boolean, the default is true
                $config['size']         = '1024'; //interger, the default is 1024
                $config['black']        = array(224,255,255); // array, default is array(255,255,255)
                $config['white']        = array(70,130,180); // array, default is array(0,0,0)
                $this->ciqrcode->initialize($config);

                $qr_name = $filename.'qr'.'.png';
        
                $params['data'] = $qr_name; //data yang akan di jadikan QR CODE
                $params['level'] = 'H'; //H=High
                $params['size'] = 10;
                $params['savename'] = FCPATH.$config['imagedir'].$qr_name; //simpan image QR CODE ke folder assets/images/
                $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

                $this->upload->data();
                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nm_latin' => $this->input->post('nm_latin'),
                    'status_kons' => $this->input->post('status'),
                    'description' => $this->input->post('description'),
                    'pict' => $this->upload->data()["file_name"],
                    'qr_code' => $qr_name,
                    'id_inputer' => $id
                );
                $this->m_pohon->insert_data_pohon($data);
                redirect('admin/Pohon/tambahPohon');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/va_tambahphn', $error);
            }

            
        }
    }

    public function viewPohon($id = null) {
        $data['title_page'] = 'View - Pohon';
        $data['satuPohon'] = $this->m_pohon->getById($id);

        $email = $this->session->userdata('email');
        if($email == NULL) {
            $data['heading'] = 'Website tidak terakses';
            $data['message'] = 'Silahkan login terlebih dahulu. '+'<a href="#">Login</a>';

            $this->load->view('errors/html/error_404', $data);
        } else {

        $data['human'] = $this->m_admin->humanById($email)->row();
        $data['menu'] = array(
            'dashboard' => '',
            'pohon' => 'active',
            'user_mgmnt' => ''
        );

        $this->load->view('templates/admin/va_header', $data);
        $this->load->view('admin/va_viewphn', $data);
        $this->load->view('templates/admin/va_footer');
        }
    }

    public function editPohon($id = null) {
        $data['title_page'] = 'View - Pohon';
        $data['satuPohon'] = $this->m_pohon->getById($id);

        $email = $this->session->userdata('email');
        if($email == NULL) {
            $data['heading'] = 'Website tidak terakses';
            $data['message'] = 'Silahkan login terlebih dahulu. '+'<a href="#">Login</a>';

            $this->load->view('errors/html/error_404', $data);
        } else {

            $this->load->view('templates/admin/va_header', $data);
            $this->load->view('admin/va_editphn', $data);
            $this->load->view('templates/admin/va_footer');
        }
    }

    public function editProcess($id = null) {

        $idUser     = $this->session->userdata('id');
        $idPohon    = $this->input->post('id');
        
        $this->form_validation->set_rules('nama', 'Nama Pohon', 'required', array(
            'required' => 'Nama belum diisi'
        ));

        $this->form_validation->set_rules('nm_latin', 'Nama Latin', 'required', array(
            'required' => 'Nama Latin belum diisi'
        ));

        $this->form_validation->set_rules('description', 'Deskripsi Pohon', 'required', array(
            'required' => 'Deskripsi pohon belum diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
			$this->editPohon();
		} else {
            // Pengaturan gambar
            $filename = time();
            $pictureName = $this->m_pohon->getGambar($idPohon);
            unlink("uploads/".$pictureName);

            $config = array(
                'upload_path' => "./uploads",
                'allowed_types' => "jpg|png|jpeg",
                'max_height' => "1080",
                'max_width' => "1080",
                'file_name' => $filename,
                'overwrite' => true
            );
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('update_gambar'))
            {

                $data = array(
                    'nama' => $this->input->post('nama'),
                    'nm_latin' => $this->input->post('nm_latin'),
                    'status_kons' => $this->input->post('status'),
                    'description' => $this->input->post('description'),
                     'pict' => $this->upload->data()["file_name"],
                    'id_inputer' => $idUser
                );
                
                $this->m_pohon->update_data_pohon($data);

                redirect('admin/Pohon/editPohon/'.$idPohon);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/va_tambahphn', $error);
            }  
        }
    }

    public function deleteProcess($id = null) {
        $this->m_pohon->deletePohon($id);
        redirect('admin/Pohon/');
    }

    public function downloadQR($id = null) {
        $this->load->helper('download');

        $qr_name = $this->m_pohon->getQR($id);
        force_download('./qrpohon/image/'.$qr_name,NULL);
    }
}