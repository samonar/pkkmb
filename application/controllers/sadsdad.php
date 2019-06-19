<?php 
class Data_kelengkapan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model','Presensi_model','Kelengkapan_model'));
		$this->load->library(array('form_validation','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
		$this->load->library('upload');

    }

    function index()
	{	
		$result=$this->Camaba_model->read();
		$prodi=$this->Prodi_model->read();
        $data=array(
			'tittle'     => 'Daftar Camaba',
			'list_camaba'	=> $result,
			'list_prodi'	=>$prodi,
		);
		$this->template->display('admin/data_presensi/list_camaba',$data);
	}
	
	function create($id){
		$prodi=$this->Prodi_model->read();
		$data_maba=$this->Camaba_model->readById($id);
		$data=array(
            'id'        		=>$id,
            'action'            =>'data_camaba/create_action',
            'tittle'	        => 'Tambah Camaba',
			'nama' 				=> set_value('nama'),
			'nim'      			=> set_value('nim'),
			'no_hp'		    	=> set_value('no_hp'),
			'id_prodi'			=> set_value('id_prodi'),
			'list_prodi'		=> $prodi,
			'id_pleton'		    => set_value('id_pleton'),
			'foto'				=>set_value(''),
			
		);
		// print_r($prodi);
		$this->template->display('admin/data_presensi/form_camaba',$data);
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
			'foto'				=> $data['upload_data']['file_name'],
		);
		/////insert database///////////
        $this->Camaba_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah Camaba Sukses');
        redirect(site_url('data_camaba/read_mabaProdi/'.$data['id_prodi']));
    }
    public function detail_presensiMaba($id){
		$datamaba=$this->Camaba_model->searchById($id);
		$listpresensi=$this->Presensi_model->searchByIdCamaba($id);
		$data=array(
            'action'            =>'data_camaba/update',
			'tittle'		    =>'Presesnsi Maba',
			'id_camaba'			=>$datamaba->id_camaba,
			'nama'				=> $datamaba->nama_camaba,
            'nim'		 		=> $datamaba->nim,
			'prodi'		    	=> $datamaba->prodi,
			'pleton'		    => $datamaba->nama_pleton,
			'foto'				=> $datamaba->foto,
			'list_presensi'		=> $listpresensi,
		);
		$this->template->display('admin/data_presensi/form_camaba',$data);
    }
    function update($id)
	{
        $data=array(
            'nama_camaba' 		=> $this->input->post('nama'),
			'nim'      			=> $this->input->post('nim'),
            'no_hp'		    	=> $this->input->post('no_hp'),
			'id_prodi'		    => $this->input->post('id_prodi'),
			'id_pleton'		    => $this->input->post('id_pleton'),
        );
        $this->Camaba_model->update($data,$id);	

		$this->session->set_flashdata('message', 'Update User Sukses');
        redirect(site_url('data_camaba/read_mabaProdi/'.$data['id_prodi']));
    }

    function delete($data,$id){
		
		if (!null==$data) {
			$row=$this->Kelengkapan_model->delete($data);
            $this->session->set_flashdata('message', 'Delete Kelengkapan Success');
            redirect(site_url('data_kelengkapan'));
        } else {
            $this->session->set_flashdata('message', 'Record Kelengkapan Not Found');
            redirect(site_url('data_kelengkapan'));
        }
	}
}
?>