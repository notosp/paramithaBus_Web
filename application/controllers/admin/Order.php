<?php
class Order extends CI_Controller{
    function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_model');
    }
    
    function index(){
		$kode=$this->session->userdata('idadmin');
		$id_pesan=$this->input->post('id_pesan');
		$x['user']=$this->M_model->get_karyawan_login($kode);
		$x['data']=$this->M_model->get_order();
		$x['payment']=$this->M_model->get_detail_payment($id_pesan);
		$this->load->view('admin/v_order',$x);
	}

	// function get_detail_payment(){
	// 	$id_pesan=$this->input->post('id_pesan');
	// 	$x['payment']=$this->M_model->get_detail_payment($id_pesan);
	// }
}
