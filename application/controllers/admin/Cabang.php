<?php
class Cabang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_model');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->M_model->get_all_Cabang();
		$this->load->view('admin/v_cabang',$x);
	}

	function simpan_Cabang(){
		$Cabang=strip_tags($this->input->post('xCabang'));
		$Alamat=strip_tags($this->input->post('xAlamat'));
		$Kontak=strip_tags($this->input->post('xKontak'));
		$this->M_model->simpan_Cabang($Cabang, $Alamat, $Kontak);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/Cabang');
	}

	function update_Cabang(){
		$kode=strip_tags($this->input->post('kode'));
		$Cabang=strip_tags($this->input->post('xCabang'));
		$Alamat=strip_tags($this->input->post('xAlamat'));
		$Kontak=strip_tags($this->input->post('xKontak'));
		$this->M_model->update_Cabang($kode,$Cabang, $Alamat, $Kontak);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/Cabang');
	}
	function hapus_Cabang(){
		$kode=strip_tags($this->input->post('kode'));
		$this->M_model->hapus_Cabang($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/Cabang');
	}
}
