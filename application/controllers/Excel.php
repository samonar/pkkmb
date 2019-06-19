<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require FCPATH . '/vendor/autoload.php';
class Excel extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
            $this->load->model(array('Camaba_model','Prodi_model','Presensi_model','Kelengkapan_model','Atribut_model','Rating_model'));
            $this->load->library(array('form_validation','upload','image_lib','template','session'));
            $this->load->helper(array('form', 'url', 'html'));	
    }
    
    // Main page
public function index_1()
{
$provinsi = $this->Prodi_model->read();
$data = array( 'title' => 'Laporan Exel - Java Media',
'prodi' => $provinsi
);
// $this->load->view('laporan', $data, FALSE);
$this->template->display('admin/data_rating/laporan',$data);
}

// Export ke excel
function export()
{
    // Create new Spreadsheet object
  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
// Set document properties
    $spreadsheet->getProperties()->setCreator('PKKMB Poliwangi')
      ->setLastModifiedBy('PKKMB Poliwangi')
      ->setTitle('data nilai pkkmb camaba Poliwangi')
      ->setDescription('Export to Excel');
// add style to the header
    $styleArray = array(
      'font' => array(
        'bold' => true,
        ),
        'alignment' => array(
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ),
        'borders' => array(
            'allBorders' =>array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => array('argb' => '00000000'),
            )
            
        ),
    );
    $styleBody = array(
        'borders' => array(
            'allBorders' =>array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => array('argb' => '00000000'),
            )
        ),
        );
    $spreadsheet->getActiveSheet()->getStyle('A2:G2')->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);
    $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
    $sheet->setCellValue('A1', 'DAFTAR NILAI CAMABA');
    // auto fit column to content
foreach(range('A', 'G') as $columnID) {
      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    }
// set the names of header cells
      $sheet->setCellValue('A2', 'NO');
      $sheet->setCellValue('B2', 'NIM');
      $sheet->setCellValue('C2', 'NAMA CAMABA');
      $sheet->setCellValue('D2', 'POIN ABSENSI');
      $sheet->setCellValue('E2', 'POIN ATRIBUT');
      $sheet->setCellValue('F2', 'POIN KEAKTIFAN');
      $sheet->setCellValue('G2', 'TOTAL');

// load model rating camaba
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

        
            
            $list_camaba   = $result;
			$list_absensi	= $hasilAbsensi;
            $list_atribut	= $hasilatribut;
            $list_aktif      = $hasilaktif;
            $total = $jumlah;
        
            $no=1;
            $i=0;
            $x = 3; //mulai pada colom ke
            foreach ($total as $key => $value) {
                $sheet->setCellValue('A'.$x, $no++);
                $sheet->setCellValue('B'.$x, $list_camaba[$key]->nim);
                $sheet->setCellValue('C'.$x, $list_camaba[$key]->nama_camaba);
                if (isset($list_absensi[$key]->keterangan)) {
                    $sheet->setCellValue('D'.$x, $list_absensi[$key]->keterangan);
                }else{
                    $sheet->setCellValue('D'.$x, '0');
                }

                if (isset( $list_atribut[$key]->atribut)) {
                    ;
                    $sheet->setCellValue('E'.$x, $list_atribut[$key]->atribut);
                }else{
                    $sheet->setCellValue('E'.$x, '0');
                }
                if (isset($list_aktif[$key]->aktif)) {
                    $sheet->setCellValue('F'.$x, $list_aktif[$key]->aktif);
                }else{
                    $sheet->setCellValue('F'.$x, '0');
                }
                $sheet->setCellValue('G'.$x, $value);
                
                $spreadsheet->getActiveSheet()->getStyle('A'.$x.':G'.$x)->applyFromArray($styleBody);
                $i++;
                $x++;
            }
            
//Create file excel.xlsx
  $writer = new Xlsx($spreadsheet);
  $filename = 'Data Nilai Camaba';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //   $writer->save('recruitment_form.xlsx'); //save file to
        $writer->save('php://output'); // download file 
}



    // index
	public function import()
	{
		$data = array();
		$data['title'] = 'Import Excel Sheet | TechArise';
		$data['breadcrumbs'] = array('Home' => '#');
		$this->load->view('spreadsheet/index', $data);
	}
 
	// file upload functionality
    public function upload($id_kelas) {
    	$data = array();
        $data['title'] = 'Import Data';
        $data['breadcrumbs'] = array('Home' => '#');
    	 // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
            // $this->load->view('admin/data_rating/index', $data);
            $this->template->display('admin/data_rating/index',$data);
         } else {
        // If file uploaded
        if(!empty($_FILES['fileURL']['name'])) { 
            // get file extension
            $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

            if($extension == 'csv'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        
            // array Count
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('nama', 'nim', 'no_hp', 'prodi', 'pleton');
            $makeArray = array('nama' => 'nama', 'nim' => 'nim', 'no_hp' => 'no_hp', 'prodi' => 'prodi', 'pleton' => 'pleton');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } 
                }
            }
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if (empty($dataDiff)) {
                $flag = 1;
            }
            	// match excel sheet column
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) { // $i untuk menentukan mulai row ke berapa
                    $addresses = array();
                    $nama_camaba = $SheetDataKey['nama'];
                    $nim = $SheetDataKey['nim'];
                    $no_hp = $SheetDataKey['no_hp'];
                    $prodi = $SheetDataKey['prodi'];
                    $pleton = $SheetDataKey['pleton'];

                    $nama_camaba = filter_var(trim($allDataInSheet[$i][$nama_camaba]), FILTER_SANITIZE_STRING);
                    $nim = filter_var(trim($allDataInSheet[$i][$nim]), FILTER_SANITIZE_STRING);
                    $no_hp = filter_var(trim($allDataInSheet[$i][$no_hp]), FILTER_SANITIZE_STRING);
                    $id_prodi = strtolower(filter_var(trim($allDataInSheet[$i][$prodi]), FILTER_SANITIZE_STRING));
                        $konversiProdi=$this->Prodi_model->searchLike($id_prodi)->result();
                    $id_pleton = filter_var(trim($allDataInSheet[$i][$pleton]), FILTER_SANITIZE_STRING);
                    $username=$nim;
                    $password=$nim;
                    $foto  = 'foto_dfl.png';

                    if (!NULL==$konversiProdi) {
                        $fetchData[] = array('nama_camaba' => $nama_camaba, 'nim' => $nim, 'no_hp' => $no_hp,
                        'id_prodi' => $konversiProdi[0]->id_prodi , 'id_pleton' => $id_pleton, 'username' => $username,
                        'password' => $password, 'foto' => $foto);
                    } else {
                        $fetchData[] = array('nama_camaba' => $nama_camaba, 'nim' => $nim, 'no_hp' => $no_hp,
                        'id_prodi' => NULL , 'id_pleton' => $id_pleton, 'username' => $username,
                        'password' => $password, 'foto' => $foto);
                    }
                    
                    
                }   
                $data['dataInfo'] = $fetchData;
                // print_r($fetchData);
                // $this->Camaba_model->insert($data);
                $this->Camaba_model->setBatchImport($fetchData);
                $this->Camaba_model->importData();
                $this->session->set_flashdata('message', 'Update User Sukses');
                redirect(site_url('data_camaba/read_mabaProdi/'.$id_kelas));
            } else {
                $this->session->set_flashdata('message', 'Import Gagal');
                redirect(site_url('data_camaba/read_mabaProdi/'.$id_kelas));
            }
            
            
        }              
    }
	}

	// checkFileValidation
    public function checkFileValidation($string) 
    {
    $file_mimes = array('text/x-comma-separated-values', 
    'text/comma-separated-values', 
    'application/octet-stream', 
    'application/vnd.ms-excel', 
    'application/x-csv', 
    'text/x-csv', 
    'text/csv', 
    'application/csv', 
    'application/excel', 
    'application/vnd.msexcel', 
    'text/plain', 
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );
    if(isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }

    }


}