<?php
class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('User_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
    }

    function index()
	{	$result=$this->User_model->read();
        $data=array(
			'title'     => 'Nasabah',
			'list_nasabah'	=> $result,
		);
        $this->template->display('admin/data_user/list_user',$data);
	
    }
    
    ///tambah user(form)/////
    function create(){
		$data=array(
            'id'        =>set_value(' '),
            'action'            =>'user/create_action',
            'title'	        => 'Tambah User',
            'nama_panitia'      => set_value('nama_panitia'),
            'jabatan_panitia' 	=> set_value('jabatan_panitia'),
            'username'		    => set_value('username'),
            'password'		    => set_value('password'),
            
		);
		$this->template->display('admin/data_user/form_user',$data);
    }

    ///action buat user
    function create_action()
	{
        $data=array(
            'nama_panitia'      => $this->input->post('nama'),
            'jabatan_panitia' 	=> $this->input->post('jabatan'),
            'username'		    => $this->input->post('username'),
            'password'		    => $this->input->post('password'),
            'foto'              => 'foto_dfl.png',
        );
        $this->User_model->insert($data);	

		$this->session->set_flashdata('message', 'Tambah User Sukses');
        redirect(site_url('user'));
    }
    public function detailUser($data){
		$result=$this->User_model->searchById($data);
		$data=array(
            'action'            =>'user/update',
			'data'		        => $result,
            'title'		    =>'Detail User',
            'id'                => $result->id_panitia,
            'nama_panitia'      => $result->nama_panitia,
            'jabatan_panitia' 	=> $result->jabatan_panitia,
            'username'		    => $result->username,
            'password'		    => $result->password,
		);
		$this->template->display('admin/data_user/form_user',$data);
    }
    function update($id)
	{
        $data=array(
            'nama_panitia'          => $this->input->post('nama'),
            'jabatan_panitia' 	    => $this->input->post('jabatan'),
            'username'		=> $this->input->post('username'),
            'password'		=> $this->input->post('password'),
        );
        $this->User_model->update($data,$id);	

		$this->session->set_flashdata('message', 'Update User Sukses');
        redirect(site_url('user'));
    }

    function delete($data){
		
		if (!null==$data) {
			$row=$this->User_model->delete($data);
            $this->session->set_flashdata('message', 'Delete User Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record User Found');
            redirect(site_url('user'));
        }
	}
}
?>