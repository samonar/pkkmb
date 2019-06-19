<?php 
class Data_prodi extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Prodi_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	

    }

    function index()
	{	$result=$this->Prodi_model->read();
        $data=array(
			'title'     => 'Prodi',
			'list_prodi'	=> $result,
		);
        $this->template->display('admin/data_prodi/list_prodi',$data);
    }

    function create(){
        $data=array(
            'id'                =>set_value(' '),
            'action'            =>'data_prodi/create_action',
            'title'	        => 'Tambah Prodi',
            'prodi'             => set_value('prodi'),
		);
		$this->template->display('admin/data_prodi/form_dataProdi',$data);
    }

    function create_action()
	{
        $data=array(
            'prodi'          => $this->input->post('prodi'),
        );
        $this->Prodi_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah Prodi Sukses');
        redirect(site_url('data_prodi'));
    }

    public function detail_dataProdi($data){
		$result=$this->Prodi_model->searchById($data);
		$data=array(
            'action'            =>'data_prodi/update',
            'title'		    =>'Detail Prodi',
            'id'                => $result->id_prodi,
            'prodi'             => $result->prodi,
		);
		$this->template->display('admin/data_prodi/form_dataProdi',$data);
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