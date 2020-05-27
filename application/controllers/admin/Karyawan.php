<?php
class Karyawan extends CI_Controller{
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
		$x['data']=$this->M_model->get_all_karyawan();
		$x['cab']=$this->M_model->get_all_cabang();
		$x['lev']=$this->M_model->get_all_level();
		$this->load->view('admin/v_karyawan',$x);
	}


	function simpan_karyawan(){
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
						$config['quality']= '60%';
						$config['width']= 300;
						$config['height']= 300;
						$config['new_image']= './assets/images/'.$gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$gambar=$gbr['file_name'];
						$nik=$this->input->post('xnik');
						$nama=$this->input->post('xnama');
						$jenkel=$this->input->post('xjenkel');
						$alamat=$this->input->post('xalamat');
						$username=$this->input->post('xusername');
						$password=$this->input->post('xpassword');
						$konfirm_password=$this->input->post('xpassword2');
						$email=$this->input->post('xemail');
						$nohp=$this->input->post('xkontak');
						$level=strip_tags($this->input->post('xlevel'));
						$id_cabang=strip_tags($this->input->post('xcabang'));
						if ($password <> $konfirm_password) {
							echo $this->session->set_flashdata('msg','error');
							redirect('admin/karyawan');
						}else{
							$this->M_model->simpan_karyawan($nik,$nama,$jenkel,$alamat,$username,$password,$email,$nohp,$level,$id_cabang,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/karyawan');
							
						}          
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/karyawan');
					}
					}else{
					redirect('admin/karyawan');
				}
	}

	function update_karyawan(){
				
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
					$config['quality']= '60%';
					$config['width']= 300;
					$config['height']= 300;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$kode=$this->input->post('kode');
					// $nik=$this->input->post('xnik');
					$nama=$this->input->post('xnama');
					$jenkel=$this->input->post('xjenkel');
					$alamat=$this->input->post('xalamat');
					$username=$this->input->post('xusername');
					$password=$this->input->post('xpassword');
					$konfirm_password=$this->input->post('xpassword2');
					$email=$this->input->post('xemail');
					$nohp=$this->input->post('xkontak');
					$level=strip_tags($this->input->post('xlevel'));
					$id_cabang=strip_tags($this->input->post('xcabang'));


					if (empty($password) && empty($konfirm_password)) {
						$this->M_model->update_karyawan_tanpa_pass($kode,$nama,$jenkel,$alamat,$username,$email,$nohp,$level,$id_cabang,$gambar);
						echo $this->session->set_flashdata('msg','info');
						   redirect('admin/karyawan');

					 }elseif ($password <> $konfirm_password) {
						 echo $this->session->set_flashdata('msg','error');
						   redirect('admin/karyawan');

					 }else{
						   $this->M_model->update_karyawan($kode,$nama,$jenkel,$alamat,$username,$password,$email,$nohp,$level,$id_cabang,$gambar);
						echo $this->session->set_flashdata('msg','info');
						   redirect('admin/karyawan');
					   }
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/karyawan');
			}
			
		}else{
			$kode=$this->input->post('kode');
			// $nik=$this->input->post('xnik');
			$nama=$this->input->post('xnama');
			$jenkel=$this->input->post('xjenkel');
			$alamat=$this->input->post('xalamat');
			$username=$this->input->post('xusername');
			$password=$this->input->post('xpassword');
			$konfirm_password=$this->input->post('xpassword2');
			$email=$this->input->post('xemail');
			$nohp=$this->input->post('xkontak');
			$level=strip_tags($this->input->post('xlevel'));
			$id_cabang=strip_tags($this->input->post('xcabang'));

			if (empty($password) && empty($konfirm_password)) {
				   $this->M_model->update_karyawan_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$alamat,$username,$email,$nohp,$level,$id_cabang);
				echo $this->session->set_flashdata('msg','info');
				   redirect('admin/karyawan');

			 }elseif ($password <> $konfirm_password) {
				 echo $this->session->set_flashdata('msg','error');
				   redirect('admin/karyawan');
			 }else{
				   $this->M_model->update_karyawan_tanpa_gambar($kode,$nama,$jenkel,$alamat,$username,$password,$email,$nohp,$level,$id_cabang);
				echo $this->session->set_flashdata('msg','warning');
				   redirect('admin/karyawan');
			   }
		} 
	}

	function hapus_karyawan(){
		$kode=$this->input->post('kode');
		$data=$this->M_model->get_karyawan_login($kode);
		$q=$data->row_array();
		$p=$q['karyawan_photo'];
		$path=base_url().'assets/images/'.$p;
		delete_files($path);
		$this->M_model->hapus_karyawan($kode);
	    echo $this->session->set_flashdata('msg','success-hapus');
	    redirect('admin/karyawan');
	}

	function reset_password(){
   
        $id=$this->uri->segment(4);
        $get=$this->M_model->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['username'];
        }
        $pass=rand(123456,999999);
        $this->M_model->resetpass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
	    redirect('admin/karyawan');
   
    }


}
