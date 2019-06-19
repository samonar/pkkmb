<?php 
class Rating_maba extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('Camaba_model','Prodi_model','Presensi_model','Kelengkapan_model','Atribut_model','Rating_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	

    }

    function index()
	{
        $result=$this->Camaba_model->readSortAsc();
        $hasilatribut=$this->Rating_model->ratingAtribut();
        $hasilaktif=$this->Rating_model->ratingAktif();
        $hasilAbsensi=$this->Rating_model->ratingAbsensi();
        
        $con=json_decode(json_encode($hasilatribut));
        
        $i=0;
		foreach ($hasilatribut as $key) {
            $jumlah[]=$key->atribut + $hasilaktif[$i]->aktif + $hasilAbsensi[$i]->keterangan;
            $i++;
        }
        arsort($jumlah);

        $data=array(
            'id'                =>set_value(' '),
            'title'     => 'Daftar Camaba',
            'list_camaba'   => $result,
			'list_absensi'	=> $hasilAbsensi,
            'list_atribut'	=> $hasilatribut,
            'list_aktif'       => $hasilaktif,
            'total' => $jumlah,
        );

		$this->template->display('admin/data_rating/list_camaba',$data);
    }

    
}
?>
