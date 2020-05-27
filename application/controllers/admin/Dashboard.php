<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_model');
	}

	function index(){
			$x['visitor'] = $this->M_model->statistik_pengujung();
			$x['terbaru']=$this->M_model->get_berita_terbaru();
			$this->load->view('admin/v_dashboard',$x);
	}	
}
