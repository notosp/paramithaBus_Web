<?php
class Report extends CI_Controller{
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
		$timestamp = strtotime($this->input->post('xmonth')); 
		$month = date('m',$timestamp);
		$year = date("Y",$timestamp);
		$cabang = strip_tags($this->input->post('xcabang'));
		if($cabang == ""){
			$cabang=0;
		}
		$x['data']=$this->M_model->get_report($year,$month,$cabang);
		$x['cab']=$this->M_model->get_all_cabang();
		$this->load->view('admin/v_report',$x);
	}

	function printReport(){
		
	}
}
