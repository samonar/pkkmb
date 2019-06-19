<?php 
class Data_atribut extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model','Presensi_model','Kelengkapan_model','Atribut_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	

    }

    function index()
	{	$result=$this->Atribut_model->read();
        $data=array(
            'action'        => 'data_atribut/create',
			'title'        => 'Atribut Kelengkapan',
			'list_atribut'	=> $result,
		);
        $this->template->display('admin/data_atribut/list_atribut',$data);
    }

    function create(){
        $data=array(
            'title'            => 'Tambah Atribut',
            'id'                =>set_value(' '),
            'action'            =>'data_atribut/create_action',
            'nama_atribut'	    => set_value(''),
            'poin'             => set_value(''),
		);
		$this->template->display('admin/data_atribut/form_atribut',$data);
    }

    function create_action()
	{
        $data=array(
            'nama_atribut'  => $this->input->post('nama'),
            'poin'          => $this->input->post('poin'),
        );
        $this->Atribut_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah Atribut Sukses');
        redirect(site_url('data_atribut'));
    }

    public function detail_atribut($data){
		$result=$this->Atribut_model->searchById($data);
		$data=array(
            'action'            =>'data_atribut/update',
            'title'		    =>'Detail Atribut',
            'id'                => $result->id_atribut_kelengkapan,
            'nama_atribut'              => $result->nama_atribut,
            'poin'              => $result->poin,
		);
		$this->template->display('admin/data_atribut/form_atribut',$data);
    }

    function update($id)
	{
        $data=array(
            'nama_atribut'      => $this->input->post('nama'),
            'poin'              =>$this->input->post('poin'),
        );
        $this->Atribut_model->update($data,$id);	

		$this->session->set_flashdata('message', 'Update Atribut Sukses');
        redirect(site_url('data_atribut'));
    }

    function delete($data){
		
		if (!null==$data) {
			$row=$this->Atribut_model->delete($data);
            $this->session->set_flashdata('message', 'Delete Kelengkapan Success');
            redirect(site_url('data_atribut'));
        } else {
            $this->session->set_flashdata('message', 'Record Prodi Found');
            redirect(site_url('data_atribut'));
        }
	}
}
?>