<?php
class Kategori extends CI_Controller{
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
		$x['data']=$this->M_model->get_all_kategori();
		$this->load->view('admin/v_kategori',$x);
	}

	function simpan_kategori(){
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->M_model->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg','success');
		redirect('admin/kategori');
	}

	function update_kategori(){
		$kode=strip_tags($this->input->post('kode'));
		$kategori=strip_tags($this->input->post('xkategori'));
		$this->M_model->update_kategori($kode,$kategori);
		echo $this->session->set_flashdata('msg','info');
		redirect('admin/kategori');
	}
	function hapus_kategori(){
		$kode=strip_tags($this->input->post('kode'));
		$this->M_model->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/kategori');
	}
}
