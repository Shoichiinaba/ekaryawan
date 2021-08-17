<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tentukan_bantuan extends AUTH_Controller {
	private $filename = "import_data";
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_array');
		$this->load->model('M_bantuan');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['content'] 		= 'admin/bantuan';
		// $data['Tperpanjang']	=$this->M_HAdmin->Tperpanjang();
		// $data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}


	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			
			$upload = $this->M_bantuan->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->model('M_array');
		$latih = $this->M_array;
		$latih->parameter(
		'absensi',
		'skill',
		'pelayanan',
		'kerjasama',
		'loyalitaas',
		'komunikasi',
		'kerajinan',
		'setatus');
		$latih->Get();

		$this->load->library('naive_bayes');
		$bayes = $this->naive_bayes;
		$bayes->data = $latih->tampil_data();
		$bayes->data_kategori = $latih->tampil_data_kategori();
		$bayes->set_class('setatus');
		
		
		$data['userdata'] 		= $this->userdata;
		$data['content']  		= 'admin/bantuan';
		// $data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['naive'] 			= $bayes;
		$this->load->view($this->template, $data);
	}

	
    function simpan(){
    	$NIK=$_POST['NIK'];
    	$nama =$_POST['nama'];
    	$absensi =$_POST['absensi'];
    	$skill =$_POST['skill'];
    	$pelayanan =$_POST['pelayanan'];
    	$kerjasama =$_POST['kerjasama'];
		$loyalitas =$_POST['loyalitas'];
		$komunikasi =$_POST['komunikasi'];
		$kerajinan =$_POST['kerajinan'];
    	$nilai_lolos =$_POST['nilai_lolos'];
		$nilai_t_lolos =$_POST['nilai_t_lolos'];
    	$setatus =$_POST['setatus'];
		$status_acc ='1';
		$tgl_kontrak =date('d/m/Y');

    	$data = array();
    	for($i = 0; $i<count($NIK); $i++){
    		array_push($data, array(
    			'NIK'=>$NIK[$i],
				'nama'=>$nama[$i],
				'absensi'=>$absensi[$i],
				'skill'=>$skill[$i],
				'pelayanan'=>$pelayanan[$i],
				'kerjasama'=>$kerjasama[$i],
				'loyalitas'=>$loyalitas[$i],
				'komunikasi'=>$komunikasi[$i],
				'kerajinan'=>$kerajinan[$i],
				'nilai_lolos'=>$nilai_lolos[$i],
				'nilai_t_lolos'=>$nilai_t_lolos[$i],
				'setatus'=>$setatus[$i],
				'status_acc'=>$status_acc[$i],
				'tgl_kontrak'=>$tgl_kontrak,
    		));
    	}
    	$this->M_bantuan->insert_multiple($data);
		redirect('tentukan_bantuan');
	
	}
	
}
