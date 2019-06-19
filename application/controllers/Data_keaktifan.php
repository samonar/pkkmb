<?php 
class Data_keaktifan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model','Presensi_model','Kelengkapan_model','Atribut_model','Keaktifan_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	

    }

    function index()
	{	$result=$this->Keaktifan_model->read();
        $data=array(
            'action'        => 'data_keaktifan/create',
			'title'        => 'Kategori Keaktifan',
			'list_keaktifan'	=> $result,
		);
        $this->template->display('admin/data_keaktifan/list_keaktifan',$data);
    }

    function create(){
        $data=array(
            'title'            => 'Tambah Keaktifan',
            'id'                =>set_value(' '),
            'action'            =>'data_keaktifan/create_action',
            'jenis_keaktifan'   => set_value(''),
            'poin'              => set_value(''),
		);
		$this->template->display('admin/data_keaktifan/form_keaktifan',$data);
    }

    function create_action()
	{
        $data=array(
            'jenis_keaktifan'  => $this->input->post('jenis_keaktifan'),
            'poin'             => $this->input->post('poin'),
        );
        $this->Keaktifan_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah Kategori Keaktifan Sukses');
        redirect(site_url('data_keaktifan'));
    }

    public function detail_keaktifan($data){
		$result=$this->Keaktifan_model->searchById($data);
		$data=array(
            'action'            =>'data_keaktifan/update',
            'title'		    =>'Detail Keaktifan',
            'id'                => $result->id_kategori_keaktifan,
            'jenis_keaktifan'   => $result->jenis_keaktifan,
            'poin'              => $result->poin,
		);
		$this->template->display('admin/data_keaktifan/form_keaktifan',$data);
    }

    function update($id)
	{
        $data=array(
            'jenis_keaktifan'   => $this->input->post('jenis_keaktifan'),
            'poin'              =>$this->input->post('poin'),
        );
        $this->Keaktifan_model->update($data,$id);	

		$this->session->set_flashdata('message', 'Update Kategori Keaktifan Sukses');
        redirect(site_url('data_keaktifan'));
    }

    function delete($data){
		
		if (!null==$data) {
			$row=$this->Keaktifan_model->delete($data);
            $this->session->set_flashdata('message', 'Delete Prodi Success');
            redirect(site_url('data_keaktifan'));
        } else {
            $this->session->set_flashdata('message', 'Record Prodi Found');
            redirect(site_url('data_keaktifan'));
        }
	}
}
?>