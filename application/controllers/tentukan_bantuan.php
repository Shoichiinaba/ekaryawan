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

	
    function simpan_perhitungan(){
    	$this->load->model('M_HAdmin');
    	$nip = $_GET['nip'];
    	$nama = $_GET['nama'];
    	$data_form = $_GET['data_form'];
    	$hasil = $_GET['hasil'];
    	$perpanjang = $_GET['perpanjang'];
    	$tidak_diperpanjang = $_GET['tidak_diperpanjang'];
    	$kirim = $_GET['kirim'];
		$tgl_kontrak = date('d/m/Y');
		
    	$r = $this->M_HAdmin->simpan_hasil_perhitungan($data_form, $hasil, $nama, $nip, $kirim, $perpanjang, $tidak_diperpanjang, $tgl_kontrak);
    	echo json_encode(array( 
    		'respon' => $r,
    		'status' => ($r) ? 200 : 404
    	 ));
    }
	
}
