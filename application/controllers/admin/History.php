<?php
class History extends CI_Controller{
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
		$x['user']=$this->M_model->get_karyawan_login($kode);
		$x['data']=$this->M_model->get_history();
		$this->load->view('admin/v_history',$x);
	}
}