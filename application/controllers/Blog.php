<?php 
class Blog extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');

		$this->load->model('M_model');
        $this->M_model->count_visitor();
	}

	function index(){
		$jum=$this->M_model->berita();
		//konfigurasi pagination
		$config['base_url'] = site_url('Blog/index'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
        $config['per_page'] = 5;  //show record per halaman
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
		
		$x['data'] = $this->M_model->berita_perpage($config["per_page"], $x['page']);
		// $x['post']=$this->M_model->get_post_home();
		$x['visitor'] = $this->M_model->statistik_pengujung();
		$x['data1']=$this->M_model->get_about();
		$this->load->view('v_blog',$x);
	}

	function detail($slug){
		$data=$this->M_model->get_berita_by_slug($slug);
		$q=$data->row_array();
		$kode=$q['id_berita'];
		$this->M_model->count_views($kode);
		$x['rate']=$this->M_model->cek_ip_rate($kode);
		$x['data']=$this->M_model->get_berita_by_slug($slug);
		$x['populer']=$this->M_model->get_berita_populer();
		$x['terbaru']=$this->M_model->get_berita_terbaru();
		$x['kat']=$this->M_model->get_kategori_for_blog();
		$x['post']=$this->M_model->get_post_home();
		$x['visitor'] = $this->M_model->statistik_pengujung();
		$x['data1']=$this->M_model->get_about();
		$this->load->view('v_blog_detail',$x);
	}

	// function kategori(){
	// 	$kategori_id=$this->uri->segment(3);
	// 	$jum=$this->M_model->get_berita_by_kategori($kategori_id);
    //     $page=$this->uri->segment(4);
    //     if(!$page):
    //         $offset = 0;
    //     else:
    //         $offset = $page;
    //     endif;
    //     $limit=5;
    //     $config['base_url'] = base_url() . 'blog/kategori/'.$kategori_id.'/';
    //     $config['total_rows'] = $jum->num_rows();
    //     $config['per_page'] = $limit;
    //     $config['uri_segment'] = 4;
    //     $config['first_link'] = 'Awal';
    //     $config['last_link'] = 'Akhir';
    //     $config['next_link'] = 'Next >>';
    //     $config['prev_link'] = '<< Prev';
    //     $this->pagination->initialize($config);
    //     $x['page'] =$this->pagination->create_links();
	// 	$x['data']=$this->M_model->get_berita_by_kategori_perpage($kategori_id,$offset,$limit);
	// 	$this->load->view('v_blog',$x);
	// }

	function search(){
		$keyword=str_replace("'", "", $this->input->post('xfilter',TRUE));
		$x['data']=$this->M_model->search_berita($keyword);
		$this->load->view('v_blog',$x);
	}

	function komentar(){
		$id_berita=$this->input->post('kode');
		$nama=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('nama',TRUE))));
		$email=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('email',TRUE))));
		$web=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('web',TRUE))));
		$msg=strip_tags(trim(htmlspecialchars(str_replace("'", "", $this->input->post('message',TRUE)))));
		$this->M_model->post_komentar($nama,$email,$web,$msg,$id_berita);
		echo $this->session->set_flashdata("msg","<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Informasi!</strong> Komentar Anda akan tampil setelah di moderasi oleh admin!</div>");
		redirect('blog/detail/'.$id_berita);
	}

	function good($slug){
		$data=$this->M_model->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->M_model->count_good($kode);
			redirect('blog/'.$slug);
		}else{
			redirect('blog/'.$slug);
		}
	}

	function like($slug){
		$data=$this->M_model->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->M_model->count_like($kode);
			redirect('blog/'.$slug);
		}else{
			redirect('blog/'.$slug);
		}
	}

	function love($slug){
		$data=$this->M_model->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->M_model->count_love($kode);
			redirect('blog/'.$slug);
		}else{
			redirect('blog/'.$slug);
		}
	}

	function genius($slug){
		$data=$this->M_model->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['id_berita'];
			$this->M_model->count_genius($kode);
			redirect('blog/'.$slug);
		}else{
			redirect('blog/'.$slug);
		}
	}

}
