<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('Info_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session','pagination'));
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library('ciqrcode');
		$session_login=$this->session->userdata('logged_in');
		if($session_login==true){
			// redirect('welcome/index');
		}else {
			redirect('login');
		}
		// $session_jabatan=$this->session->userdata('nama_jabatan');
		
	}
	
	public function index()
	{
		///load pagination
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/pkkmb/camaba/welcome/index';
		$config['total_rows'] =$this->Info_model->countInfo();
		$config['per_page'] = 3;

		//styling
		$config['full_tag_open']='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		$config['full_tag_close']='</ul></nav>';

		$config['first_link']='First';
		$config['first_tag_open']='<li class="page-item">';
		$config['first_tag_close']='</li>';
		
		$config['last_link']='Last';
		$config['last_tag_open']='<li class="page-item">';
		$config['last_tag_close']='</li>';
		
		$config['next_link']='&raquo ';
		$config['next_tag_open']='<li class="page-item">';
		$config['next_tag_close']='</li>';
		
		$config['prev_link']='&laquo ';
		$config['prev_tag_open']='<li class="page-item">';
		$config['prev_tag_close']='</li>';

		$config['cur_tag_open']='<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']='</a></li>';
		
		$config['num_tag_open']='<li class="page-item">';
		$config['num_tag_close']='</li>';

		$config['attributes'] = array('class' => 'page-link');
		////initialize
		$this->pagination->initialize($config);


		$data['start']=$this->uri->segment(4);
		$listInfo= $this->Info_model->readLimit($config['per_page'],$data['start']);

		$data = array(
			'action' 	=> site_url('absensi/finish_action'),
			'title'    	=> 'Info Terbaru',
			'listInfo'		=> $listInfo,
		);
		$this->template->display('user/beranda_camaba',$data);
	
	}

	public function detail($id_info){
		


		$dataInfo= $this->Info_model->read_ById($id_info);
		$data = array(
			'action' 	=> site_url('absensi/finish_action'),
			'title'    	=> 'Info Terbaru',
			'dataInfo'		=> $dataInfo,
			'qrcode'	=> $this->ciqrcode->generate($params),
		);
		$this->template->display('camaba/info/detail_info',$data);
	}

	function downloadQr(){
		header("Content-Type: image/png");
		$params['data'] = 'This is a text to encode become QR Code';
		$params['level'] = 'L';
		$params['size'] = 5;
		$this->ciqrcode->generate($params);
	}
	
}