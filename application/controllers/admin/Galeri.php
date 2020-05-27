<?php
class Galeri extends CI_Controller{
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
		
		$x['data']=$this->M_model->get_all_galeri();
		$x['alb']=$this->M_model->get_all_album();
		$this->load->view('admin/v_galeri',$x);
	}
	
	function simpan_galeri(){
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
						$config['width']= 900;
						$config['height']= 600;
						$config['new_image']= './assets/images/'.$gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$gambar=$gbr['file_name'];
						$judul=strip_tags($this->input->post('xjudul'));
						$album=strip_tags($this->input->post('xalbum'));
						$kode=$this->session->userdata('idadmin');
						$user=$this->M_model->get_karyawan_login($kode);
						$p=$user->row_array();
						$nik=$p['nik'];
						$nama=$p['nama'];
						$this->M_model->simpan_galeri($judul,$album,$nik,$nama,$gambar);
						echo $this->session->set_flashdata('msg','success');
						redirect('admin/galeri');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/galeri');
	                }
	                 
	            }else{
					redirect('admin/galeri');
				}
				
	}
	
	function update_galeri(){
				
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
							$config['width']= 900;
							$config['height']= 600;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $galeri_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$images=$this->input->post('gambar');
							$path='./assets/images/'.$images;
							unlink($path);
							$kode=$this->session->userdata('idadmin');
							$user=$this->M_model->get_karyawan_login($kode);
							$p=$user->row_array();
							$nik=$p['nik'];
							$nama=$p['nama'];
							$this->M_model->update_galeri($galeri_id,$judul,$album,$nik,$nama,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/galeri');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/galeri');
	                }
	                
	            }else{
							$galeri_id=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$album=strip_tags($this->input->post('xalbum'));
							$kode=$this->session->userdata('idadmin');
							$user=$this->M_model->get_karyawan_login($kode);
							$p=$user->row_array();
							$nik=$p['nik'];
							$nama=$p['nama'];
							$this->M_model->update_galeri_tanpa_img($galeri_id,$judul,$album,$nik,$nama);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/galeri');
	            } 

	}

	function hapus_galeri(){
		$kode=$this->input->post('kode');
		$album=$this->input->post('album');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->M_model->hapus_galeri($kode,$album);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/galeri');
	}

}
