<?php
class About extends CI_Controller{
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
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->M_model->get_karyawan_login($kode);
		$x['data1']=$this->M_model->get_about();
		$this->load->view('admin/v_about',$x);
	}

	function simpan_about(){
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
				$config['maintain_ratio']= TRUE;
				$config['quality']= '100%';
				$config['width']= 500;
				$config['height']= 400;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$nama_po=strip_tags($this->input->post('xnama'));
				$tentang=strip_tags($this->input->post('xtentang'));
				$alamat=strip_tags($this->input->post('xalamat'));
				$phone=strip_tags($this->input->post('xnotlp'));
				$fb=strip_tags($this->input->post('xfb'));
				$ig=strip_tags($this->input->post('xig'));
				$twitter=strip_tags($this->input->post('xtwit'));
				$layanan=strip_tags($this->input->post('xlayanan'));
				$kode=$this->session->userdata('idadmin');
				$user=$this->M_model->get_karyawan_login($kode);
				$p=$user->row_array();
				$nik=$p['nik'];
				$this->M_model->simpan_about($nama_po,$tentang,$alamat,$phone,$fb,$ig,$twitter,$layanan,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('admin/about');
		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('admin/about');
		}
			
		}else{
			redirect('admin/about');
		}
	}

	function update_about(){
				
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
			$config['maintain_ratio']= TRUE;
			$config['quality']= '100%';
			$config['width']= 500;
			$config['height']= 400;
			$config['new_image']= './assets/images/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
			$id_about=$this->input->post('kode');
			$nama_po=strip_tags($this->input->post('xnama'));
			$tentang=strip_tags($this->input->post('xtentang'));
			$alamat=strip_tags($this->input->post('xalamat'));
			$phone=strip_tags($this->input->post('xnotlp'));
			$fb=strip_tags($this->input->post('xfb'));
			$ig=strip_tags($this->input->post('xig'));
			$twitter=strip_tags($this->input->post('xtwit'));
			$layanan=strip_tags($this->input->post('xlayanan'));
			$kode=$this->session->userdata('idadmin');
			$user=$this->M_model->get_karyawan_login($kode);
			$this->M_model->update_about($id_about,$nama_po,$tentang,$alamat,$phone,$fb,$ig,$twitter,$layanan,$gambar);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/about');
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/about');
			}
			
			}else{
			$id_about=$this->input->post('kode');
			$nama_po=strip_tags($this->input->post('xnama'));
			$tentang=strip_tags($this->input->post('xtentang'));
			$alamat=strip_tags($this->input->post('xalamat'));
			$phone=strip_tags($this->input->post('xnotlp'));
			$fb=strip_tags($this->input->post('xfb'));
			$ig=strip_tags($this->input->post('xig'));
			$twitter=strip_tags($this->input->post('xtwit'));
			$layanan=strip_tags($this->input->post('xlayanan'));
			$kode=$this->session->userdata('idadmin');
			$user=$this->M_model->get_karyawan_login($kode);
			// $p=$user->row_array();
			// $nik=$p['nik'];
			// $nama=$p['nama'];
			$this->M_model->update_about_tanpa_img($id_about,$nama_po,$tentang,$alamat,$phone,$fb,$ig,$twitter,$layanan);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/about');
		} 
}

	function hapus_about(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->M_model->hapus_about($kode,$gambar);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/about');
	}
}
