<?php 
class Data_pleton extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Pleton_model','User_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	

    }

    function index()
    {	$hasilPleton=$this->Pleton_model->read();
        
        $data=array(
            'title'        => 'Pleton',
            'action'        => 'data_pleton/create',
            'list_pleton'	=> $hasilPleton,
            
            
		);
        $this->template->display('admin/data_pleton/list_pleton',$data);
    }

    function create(){
        $hasilPanitia=$this->User_model->readPanitia();
        $data=array(
            'id'                =>set_value(' '),
            'action'            =>'data_pleton/create_action',
            'tittle'	        => 'Tambah Prodi',
            'nama_pleton'             => set_value(''),
            'list_panitia'  => $hasilPanitia,
            'id_panitia'    => set_value(''),
		);
		$this->template->display('admin/data_pleton/form_dataPleton',$data);
    }

    function create_action()
	{
        $data=array(
            'nama_pleton'          => $this->input->post('nama_pleton'),
            'id_panitia'            => $this->input->post('panitia'),
        );
        $this->Pleton_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah Pleton Sukses');
        redirect(site_url('data_pleton'));
    }

    public function detail_dataPleton($data){
        $result=$this->Pleton_model->searchById($data);
        $hasilPanitia=$this->User_model->readPanitia();
		$data=array(
            'action'            =>'data_pleton/update',
            'title'		    =>'Detail Pleton',
            'id'                => $result->id_pleton,
            'nama_pleton'       => $result->nama_pleton,
            'id_panitia'        => $result->id_panitia,
            'list_panitia'      => $hasilPanitia,
		);
		$this->template->display('admin/data_pleton/form_dataPleton',$data);
    }

    function update($id)
	{
        $data=array(
            'prodi'          => $this->input->post('prodi'),
        );
        $this->Prodi_model->update($data,$id);	

		$this->session->set_flashdata('message', 'Update Prodi Sukses');
        redirect(site_url('data_prodi'));
    }

    function delete($data){
		
		if (!null==$data) {
			$row=$this->Prodi_model->delete($data);
            $this->session->set_flashdata('message', 'Delete Prodi Success');
            redirect(site_url('data_prodi'));
        } else {
            $this->session->set_flashdata('message', 'Record Prodi Found');
            redirect(site_url('data_prodi'));
        }
	}
}
?>