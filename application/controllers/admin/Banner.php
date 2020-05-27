<?php
class Banner extends CI_Controller{
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
		$x['data']=$this->M_model->banner();
		$this->load->view('admin/v_banner',$x);
	}
	
	function simpan_banner(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '100%';
				$config['width']= 900;
				$config['height']= 600;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$judul=strip_tags($this->input->post('xjudul'));
				$kode=$this->session->userdata('idadmin');
				$user=$this->M_model->get_karyawan_login($kode);
				$p=$user->row_array();
				$this->M_model->simpan_banner($judul,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('admin/banner');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/banner');
			}
				
		}else{
			redirect('admin/banner');
		}
				
	}
	
	function update_banner(){
	$config['upload_path'] = './assets/images/'; //path folder
	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	$this->upload->initialize($config);
	if(!empty($_FILES['filefoto']['name']))
	{
		if ($this->upload->do_upload('filefoto'))
		{
			$gbr = $this->upload->data();
			//Compress Image
			$config['image_library']='gd2';
			$config['source_image']='./assets/images/'.$gbr['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 900;
			$config['height']= 600;
			$config['new_image']= './assets/images/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
			$id_banner=$this->input->post('kode');
			$judul=strip_tags($this->input->post('xjudul'));
			$images=$this->input->post('gambar');
			$path='./assets/images/'.$images;
			unlink($path);
			$kode=$this->session->userdata('idadmin');
			$user=$this->M_model->get_karyawan_login($kode);
			$p=$user->row_array();
			$this->M_model->update_banner($id_banner,$judul,$gambar);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/banner');
		
	}else{
		echo $this->session->set_flashdata('msg','warning');
		redirect('admin/banner');
	}
		
	}else{
		redirect('admin/banner');
	} 

	}

	function hapus_banner(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->M_model->hapus_banner($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/banner');
	}

}
