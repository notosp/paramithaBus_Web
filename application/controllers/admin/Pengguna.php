<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['masuk'])){
            $url=base_url('');
            redirect($url);
        };
		$this->load->model('M_model');
		$this->load->library('upload');

	}

	public function index()
	{
		$kode=$this->session->userdata('masuk');
		$x['user']=$this->M_model->get_pengguna_login($kode);
		$x['data']=$this->M_model->get_all_pengguna();
		$this->load->view('admin/v_pengguna',$x);
	}

	function simpan_pengguna(){
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
					$tempat=$this->input->post('xTempat');
					$tanggal=$this->input->post('xTanggal');
					$username=$this->input->post('xusername');
					$password=$this->input->post('xpassword');
					$konfirm_password=$this->input->post('xpassword2');
					$phone=$this->input->post('xkontak');
					$level=$this->input->post('xlevel');
					 if ($password <> $konfirm_password) {
						 echo $this->session->set_flashdata('msg','error');
						   redirect('admin/pengguna');
					 }else{
						   $this->M_model->simpan_pengguna($nik,$nama,$jenkel,$alamat,$tempatLahir,$tanggalLahir,$username,$password,$phone,$level,$gambar);
						echo $this->session->set_flashdata('msg','success');
						   redirect('admin/pengguna');
						   
					   }
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/pengguna');
			}
			 
		}else{
			$nik=$this->input->post('xnik');
			$nama=$this->input->post('xnama');
			$jenkel=$this->input->post('xjenkel');
			$alamat=$this->input->post('xalamat');
			$tempat=$this->input->post('xTempat');
			$tanggal=$this->input->post('xTanggal');
			$username=$this->input->post('xusername');
			$password=$this->input->post('xpassword');
			$konfirm_password=$this->input->post('xpassword2');
			$phone=$this->input->post('xkontak');
			$level=$this->input->post('xlevel');
			if ($password <> $konfirm_password) {
				 echo $this->session->set_flashdata('msg','error');
				   redirect('admin/pengguna');
			 }else{
				   $this->M_model->simpan_pengguna_tanpa_gambar($nik,$nama,$jenkel,$alamat,$tempatLahir,$tanggalLahir,$username,$password,$phone,$level);
				echo $this->session->set_flashdata('msg','success');
				   redirect('admin/pengguna');
			   }
		} 
	}

	function hapus_pengguna(){
		$kode=$this->input->post('kode');
		$data=$this->M_model->get_pengguna_login($kode);
		$q=$data->row_array();
		$p=$q['pengguna_photo'];
		$path=base_url().'assets/images/'.$p;
		delete_files($path);
		$this->M_model->hapus_pengguna($kode);
	    echo $this->session->set_flashdata('msg','success-hapus');
	    redirect('admin/pengguna');
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
	    redirect('admin/pengguna');
	}
	
}
