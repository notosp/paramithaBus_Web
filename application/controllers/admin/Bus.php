<?php
class Bus extends CI_Controller{
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
		$x['data']=$this->M_model->get_all_bus();
		$this->load->view('admin/v_bus',$x);
	}


	function simpan_bus(){
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
				$kodebus=$this->input->post('xkodebus');
				$nopolisi=$this->input->post('xnopolisi');
				$jumkursi=$this->input->post('xjumkursi');
				$jenisbus=$this->input->post('xjenisbus');
				$nouji=$this->input->post('xnouji');				
				$tglakhiruji=$this->input->post('xtglakhiruji');
				$nokps=$this->input->post('xnokps');
				$tglakhirkps=$this->input->post('xtglakhirkps');
				$nomesin=$this->input->post('xnomesin');
				$noangka=$this->input->post('xnoangka');
				$merkbus=$this->input->post('xmerkbus');
				$pemilik=$this->input->post('xpemilik');

				$this->M_model->simpan_bus($kodebus, $nopolisi, $jumkursi, $jenisbus, $nouji, $tglakhiruji, $nokps, $tglakhirkps, $nomesin, $noangka, $merkbus, $pemilik,$gambar);

				echo $this->session->set_flashdata('msg','success');
				redirect('admin/bus'); 

				}else{
					echo $this->session->set_flashdata('msg','warning');
					redirect('admin/bus');
				}
					
				}else{
					redirect('admin/bus');
				}
	}


	function update_bus(){
				
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
			$config['width']= 500;
			$config['height']= 400;
			$config['new_image']= './assets/images/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$gambar=$gbr['file_name'];
			$kodebus=$this->input->post('xkodebus');
			$nopolisi=$this->input->post('xnopolisi');
			$jumkursi=$this->input->post('xjumkursi');
			$jenisbus=$this->input->post('xjenisbus');
			$nouji=$this->input->post('xnouji');				
			$tglakhiruji=$this->input->post('xtglakhiruji');
			$nokps=$this->input->post('xnokps');
			$tglakhirkps=$this->input->post('xtglakhirkps');
			$nomesin=$this->input->post('xnomesin');
			$noangka=$this->input->post('xnoangka');
			$merkbus=$this->input->post('xmerkbus');
			$pemilik=$this->input->post('xpemilik');
			$this->M_model->update_bus($kodebus,$nopolisi, $jumkursi, $jenisbus, $nouji, $tglakhiruji, $nokps, $tglakhirkps, $nomesin, $noangka, $merkbus, $pemilik,$gambar);
			echo $this->session->set_flashdata('msg','info');
			redirect('admin/bus');
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/bus');
			}
			}else{
			redirect('admin/about');
		} 
}



	function hapus_bus(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->M_model->hapus_bus($kode,$gambar);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/bus');
	}

}
