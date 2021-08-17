<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_selkaryawan extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_seleksi');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		// $data['jml_pengajuan'] 	= $this->M_admin->get_jml_pengajuan();
		// $data['jml_dapat'] 		= $this->M_admin->hasil_dapat();
		// $data['jml_tdapat'] 	= $this->M_admin->hasil_tdapat();
		$data['list']			=$this->M_seleksi->get_seleksi();
		// $data['data2']			=$this->M_admin->get_tdapat();
		$data['content'] 		= 'admin/List_seleksiKar';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function delete($params = '') {
        $this->M_seleksi->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Data_selkaryawan');
    }

}