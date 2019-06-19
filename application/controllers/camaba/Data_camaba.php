<?php 
class Data_camaba extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model','Pleton_model'));
		$this->load->library(array('form_validation','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
		$this->load->library('upload');
		$this->load->helper('download');
    }

    function index()
	{	
		$result=$this->Camaba_model->read();
		$prodi=$this->Prodi_model->read();
        $data=array(
			'title'     => 'Daftar Camaba',
			'list_nasabah'	=> $result,
			'list_prodi'	=>$prodi,
		);
		$this->template->display('admin/data_camaba/list_camaba',$data);
	}
	
	function read_mabaProdi($id)
	{	
		$result=$this->Camaba_model->readById($id);
		$prodi=$this->Prodi_model->read();
        $data=array(
			'title'     => 'Daftar Camaba coy',
			'list_camaba'	=> $result,
			'list_prodi'	=>$prodi,
			'id'			=>$id,
		);
		
		$this->template->display('admin/data_camaba/list_camaba',$data);
	}
	
	function create($id){
		$prodi=$this->Prodi_model->read();
		$data=array(
            'id_kelas'        		=>$id,
            'action'            =>'data_camaba/create_action',
            'title'	        => 'Tambah Camaba',
			'nama' 				=> set_value('nama'),
			'nim'      			=> set_value('nim'),
			'no_hp'		    	=> set_value('no_hp'),
			'id_prodi'			=> set_value('id_prodi'),
			'list_prodi'		=> $prodi,
			'id_pleton'		    => set_value('id_pleton'),
			'foto'				=>set_value(''),
			
		);
		// print_r($prodi);
		$this->template->display('admin/data_camaba/form_camaba',$data);
	}
	
	function create_action()
	{
		$config['upload_path']          = './assets/foto_camaba/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		echo $this->upload->data('file_name');      

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
		}

        $data=array(
			'nama_camaba' 		=> $this->input->post('nama'),
			'nim'      			=> $this->input->post('nim'),
            'no_hp'		    	=> $this->input->post('no_hp'),
			'id_prodi'		    => $this->input->post('id_prodi'),
			'id_pleton'		    => $this->input->post('id_pleton'),
			// 'foto'				=> $data['upload_data']['file_name'], backup kalo di view maba
			'foto'				=> 'foto_dfl.png'
		);
		/////insert database///////////
        $this->Camaba_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah Camaba Sukses');
        redirect(site_url('data_camaba/read_mabaProdi/'.$data['id_prodi']));
    }
    public function detailCamaba($id){
		$datamaba=$this->Camaba_model->searchById($id);
		$listprodi=$this->Prodi_model->read();
		$listPleton=$this->Pleton_model->read();
		$data=array(
            'action'            =>'camaba/data_camaba/update',
			'title'		   	 =>'Detail User',
			'prodi'		    	=> $datamaba->prodi,
			'pleton'		    => $datamaba->nama_pleton,
			'id_camaba'			=> $datamaba->id_camaba,
            'nama'		 		=> $datamaba->nama_camaba,
			'nim'      			=> $datamaba->nim,
			'no_hp'		    	=> $datamaba->no_hp,
			'list_prodi'		=> $listprodi,
			'listPleton'		=> $listPleton,
			'id_prodi'		    => $datamaba->id_prodi,
			'id_pleton'		    => $datamaba->id_pleton,
			'foto'				=> $datamaba->foto,
		);
		$this->template->display('camaba/data_camaba/form_updateCamaba',$data);

		//generated qr code
		$this->load->library('ciqrcode');

		$config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);
		
        $params['data'] = $datamaba->nim;
        $params['level'] = 'L';
        $params['size'] = 5;
        $params['savename'] = FCPATH.$config['imagedir'].$datamaba->nim.'.png';
        $this->ciqrcode->generate($params);
	}
	
    function update($id,$prodi)
	{
		$config['upload_path']          = './assets/foto_camaba/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 150;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		echo $this->upload->data('file_name');      

		if ( ! $this->upload->do_upload('foto')){
			$data = array('upload_data' => $this->upload->data());
			$data=array(
				'no_hp'		    	=> $this->input->post('no_hp'),
			);
			
			$this->Camaba_model->update($data,$id);	
			$this->session->set_flashdata('message', 'Update User Sukses');
			redirect(site_url('camaba/data_camaba/detailCamaba/'.$id));
		}else{
			$data = array('upload_data' => $this->upload->data());
			$data=array(
				'no_hp'		    	=> $this->input->post('no_hp'),
				'foto'				=> $data['upload_data']['file_name'],
			);
			$data_session=$data['foto'];
			$this->Camaba_model->update($data,$id);
			$this->session->set_userdata('foto',$data_session);
	
			$this->session->set_flashdata('message', 'Update User Sukses');
			redirect(site_url('camaba/data_camaba/detailCamaba/'.$id));
		}
    }

    function delete($data,$id){
		
		if (!null==$data) {
			$row=$this->Camaba_model->delete($data);
            $this->session->set_flashdata('message', 'Delete Data Camaba Success');
            redirect(site_url('data_camaba/read_mabaProdi/'.$id));
        } else {
            $this->session->set_flashdata('message', 'Record Data Camaba Found');
            redirect(site_url('data_camaba/read_mabaProdi/'.$id));
        }
	}

	public function downloadQr($nim){				
		force_download('assets/qrcode/'.$nim.'.png',NULL);
	}	
}
?>