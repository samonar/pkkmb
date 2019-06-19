<?php 
class Data_camaba extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model'));
		$this->load->library(array('form_validation','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
		$this->load->library('upload');

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
			'title'     => 'Daftar Camaba',
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
    public function detailCamaba($nim){
		$datamaba=$this->Camaba_model->searchByNim($nim);
		$listprodi=$this->Prodi_model->read();
		$data=array(
            'action'            =>'data_camaba/update',
			'title'		    =>'Detail User',
			'id_camaba'				=> $datamaba->id_camaba,
            'nama'		 		=> $datamaba->nama_camaba,
			'nim'      			=> $datamaba->nim,
			'no_hp'		    	=> $datamaba->no_hp,
			'list_prodi'		=> $listprodi,
			'id_prodi'		    => $datamaba->id_prodi,
			'id_pleton'		    => $datamaba->id_pleton,
			'foto'				=>set_value(''),
		);
		$this->template->display('admin/data_camaba/form_updateCamaba',$data);
    }
    function update($id)
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
			$error = $this->upload->display_errors();
			
			$this->session->set_flashdata('message_error', $error);
			redirect(site_url('data_camaba/read_mabaProdi/'.$this->input->post('id_prodi')));
		}else{
			$data = array('upload_data' => $this->upload->data());
			$data=array(
				'nama_camaba' 		=> $this->input->post('nama'),
				'nim'      			=> $this->input->post('nim'),
				'no_hp'		    	=> $this->input->post('no_hp'),
				'id_prodi'		    => $this->input->post('id_prodi'),
				'id_pleton'		    => $this->input->post('id_pleton'),
				'foto'				=> $data['upload_data']['file_name'],
			);
			$this->Camaba_model->update($data,$id);	
	
			$this->session->set_flashdata('message', 'Update User Sukses');
			redirect(site_url('data_camaba/read_mabaProdi/'.$data['id_prodi']));
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
}
?>