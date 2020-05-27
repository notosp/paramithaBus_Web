<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportation extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_model');
	}
	function index(){
		$x['post']=$this->M_model->get_post_home();
		$x['visitor'] = $this->M_model->statistik_pengujung();
		$x['data1']=$this->M_model->get_about();
		$this->load->view('v_transportation',$x);
	}
}
