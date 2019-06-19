<?php 
class Penilaian_keaktifan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model','Presensi_model','Atribut_model','Keaktifan_model'));
		$this->load->library(array('form_validation','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
		$this->load->library('upload');

    }

    function index()
	{	
		$result=$this->Camaba_model->read();
		// $prodi=$this->Prodi_model->read();
        $data=array(
			'title'     => 'Daftar Kelengkapan Camaba',
			'list_camaba'	=> $result,
			// 'list_prodi'	=>$prodi,
		);
		$this->template->display('admin/penilaian_keaktifan/list_camaba',$data);
	}
	
	
    public function detail_penilaianKeaktifan($id){
		$datamaba=$this->Camaba_model->searchById($id);
		$listKeaktifan=$this->Keaktifan_model->search_keaktifanByIdCamaba($id);
		// print_r($listpresensi);
		$data=array(
            'action'            =>'data_camaba/update',
			'title'		    	=>'Keaktifan Camaba',
			'id_camaba'			=>$datamaba->id_camaba,
			'nama'				=> $datamaba->nama_camaba,
            'nim'		 		=> $datamaba->nim,
			'prodi'		    	=> $datamaba->prodi,
			'pleton'		    => $datamaba->nama_pleton,
			'foto'				=> $datamaba->foto,
			'list_keaktifan'	=> $listKeaktifan,
		);
		$this->template->display('admin/penilaian_keaktifan/form_camaba',$data);
    }
    function update($idKeaktifan,$idCamaba){
		$datamaba=$this->Camaba_model->searchById($idCamaba);
		$dataKeaktifan=$this->Keaktifan_model->search_ByIdKeaktifan($idKeaktifan);
		$listKeaktifan=$this->Keaktifan_model->read();
		print_r($dataKeaktifan);
		$data=array(
            'action'            =>'penilaian_keaktifan/update_action',
			'title'		    	=>'Kelengkapan Maba',
			'id_camaba'			=>$datamaba->id_camaba,
			'nama'				=> $datamaba->nama_camaba,
            'nim'		 		=> $datamaba->nim,
			'prodi'		    	=> $datamaba->prodi,
			'pleton'		    => $datamaba->nama_pleton,
			'foto'				=> $datamaba->foto,
			'dataKeaktifan'		=> $dataKeaktifan,
			'listKeaktifan'		=> $listKeaktifan,
			
			
		);
		$this->template->display('admin/penilaian_keaktifan/form_update',$data);
	}

    function update_action($id_penilaian_keaktifan,$id_camaba)
	{
        $data=array(
            'waktu' => date("Y-m-d H:i", strtotime($this->input->post('datetime'))),
			'id_kategori_keaktifan'	=> $this->input->post('id_kategori_keaktifan'),
			
           
		);
		print_r($data);
		$this->Keaktifan_model->update_penilaianKeaktifan($data,$id_penilaian_keaktifan);	
		$this->session->set_flashdata('message', 'Update Presensi Sukses');
        redirect(site_url('penilaian_keaktifan/detail_penilaianKeaktifan/'.$id_camaba));
    }

    function delete($data,$id){
		
		if (!null==$data) {
			$row=$this->Keaktifan_model->delete_penilaian($data);
            $this->session->set_flashdata('message', 'Delete Penilaian Success');
            redirect(site_url('penilaian_keaktifan/detail_penilaianKeaktifan/'.$id));
        } else {
            $this->session->set_flashdata('message', 'Record Data Camaba Found');
            redirect(site_url('penilaian_keaktifan/detail_penilaianKeaktifan/'.$id));
        }
	}
}
?>