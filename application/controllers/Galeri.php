<?php
class Galeri extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_model');
        $this->M_model->count_visitor();
	}

	function index(){
		$jum=$this->M_model->galeri();
        //konfigurasi pagination
		$config['base_url'] = site_url('Galeri/index'); //site url
        $config['total_rows'] = $this->db->count_all('galeri'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		// ===========

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
        $x['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$x['pagination'] = $this->pagination->create_links();
		
		$x['data'] = $this->M_model->galeri_perpage($config["per_page"], $x['page']);

        $x['page'] =$this->pagination->create_links();
		$x['alb']=$this->M_model->get_all_album();
		// $x['data']=$this->M_model->get_all_galeri();
		$x['data1']=$this->M_model->get_about();
		$this->load->view('v_galeri',$x);
	}
}
