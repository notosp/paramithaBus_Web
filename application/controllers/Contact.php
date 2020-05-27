<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_model');
	}
	function index(){
		$x['post']=$this->M_model->get_post_home();
		$x['visitor'] = $this->M_model->statistik_pengujung();
		$x['data1']=$this->M_model->get_about();
		$this->load->view('v_contact',$x);
	}


	function kirim_pesan(){
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pesan=htmlspecialchars(trim($this->input->post('pesan',TRUE)),ENT_QUOTES);
		$this->M_model->kirim_pesan($nama,$email,$pesan);
		echo $this->session->set_flashdata('msg',"<div class='alert alert-info'>Terima kasih telah menghubungi kami.</div>");
		redirect('contact');
	}
}
