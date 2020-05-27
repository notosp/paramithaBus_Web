<?php
class M_model extends CI_Model{

    //cek login model
    function cekadmin($username,$password){
		$hasil=$this->db->query("SELECT * FROM karyawan WHERE username='$username' AND pass=md5('$password')");
		return $hasil;
	}

    //cek pengunjung model website paramitha
    function set_pengunjung($user_ip){
		$hsl=$this->db->query("INSERT INTO pengunjung (pengunjung_ip) VALUES ('$user_ip')");
		return $hsl;
	}

	function statistik_pengujung(){
        $query = $this->db->query("SELECT DATE_FORMAT(pengunjung_tanggal,'%d') AS tgl,COUNT(pengunjung_ip) AS jumlah FROM pengunjung WHERE MONTH(pengunjung_tanggal)=MONTH(CURDATE()) GROUP BY DATE(pengunjung_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function simpan_user_agent($user_ip,$agent){
    	$hsl=$this->db->query("INSERT INTO pengunjung (pengunjung_ip,pengunjung_perangkat) VALUES('$user_ip','$agent')");
    	return $hsl;
    }

    function cek_ip($user_ip){
    	$hsl=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal)=CURDATE()");
    	return $hsl;
    }

    function count_visitor(){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser();
        }elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot(); 
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent='Other';
        }
        $cek_ip=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $hsl=$this->db->query("INSERT INTO pengunjung (pengunjung_ip,pengunjung_perangkat) VALUES('$user_ip','$agent')");
            return $hsl;
        }
    }


	function get_all_karyawan(){
		$hsl=$this->db->query("SELECT karyawan.*,IF(jk='L','Laki-Laki','Perempuan') AS jenkel,levell FROM karyawan join levell on karyawan_level=id ORDER BY nik DESC");
		return $hsl;
	}
	

	function simpan_karyawan($nik,$nama,$jenkel,$alamat,$username,$password,$email,$nohp,$level,$id_cabang,$gambar){
		$this->db->trans_start();
		$this->db->query("INSERT INTO karyawan (nik,nama,jk,alamat,username,pass,email,nohp,karyawan_level,id_cabang,photo) VALUES ('$nik','$nama','$jenkel','$alamat','$username',md5('$password'),'$email','$nohp','$level','$id_cabang','$gambar')");
		$this->db->trans_complete();
		if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//update Karyawan //
	function update_karyawan_tanpa_pass($kode,$nama,$jenkel,$alamat,$username,$email,$nohp,$level,$id_cabang,$gambar){
		$hsl=$this->db->query("UPDATE karyawan set nama='$nama',jk='$jenkel',alamat='$alamat',username='$username',email='$email',nohp='$nohp',karyawan_level='$level',id_cabang='$id_cabang',photo='$gambar' where nik='$kode'");
		return $hsl;
	}

    
	function update_karyawan($kode,$nama,$jenkel,$alamat,$username,$password,$email,$nohp,$level,$id_cabang,$gambar){
		$hsl=$this->db->query("UPDATE karyawan set nama='$nama',jk='$jenkel',alamat='$alamat',username='$username',pass=md5('$password'),email='$email',nohp='$nohp',karyawan_level='$level', id_cabang='$id_cabang',photo='$gambar' where nik='$kode'");
		return $hsl;
	}


	function update_karyawan_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$alamat,$username,$email,$nohp,$level,$id_cabang){
		$hsl=$this->db->query("UPDATE karyawan set nama='$nama',jk='$jenkel',alamat='$alamat',username='$username',email='$email',nohp='$nohp',karyawan_level='$level', id_cabang='$id_cabang' where nik='$kode'");
		return $hsl;
	}
    
	function update_karyawan_tanpa_gambar($kode,$nama,$jenkel,$alamat,$username,$password,$email,$nohp,$level,$id_cabang){
		$hsl=$this->db->query("UPDATE karyawan set nama='$nama',jk='$jenkel',alamat='$alamat',username='$username',pass=md5('$password'),email='$email',nohp='$nohp',karyawan_level='$level', id_cabang='$id_cabang' where nik='$kode'");
		return $hsl;
	}

	//end Karyawan//

	function hapus_karyawan($kode){
		$hsl=$this->db->query("DELETE FROM karyawan where nik='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM karyawan where nik='$id'");
		return $hsl;
	}
	function resetpass($id,$pass){
		$hsl=$this->db->query("UPDATE karyawan set pass=md5('$pass') where nik='$id'");
		return $hsl;
	}

	function get_karyawan_login($kode){
		$hsl=$this->db->query("SELECT * FROM karyawan where nik='$kode'");
		return $hsl;
	}

	// ==============

	function get_all_level(){
		$hsl=$this->db->query("SELECT * FROM levell ORDER BY id ASC");
		return $hsl;
	}

	// =======model kategori===========

	function get_all_kategori(){
		$hsl=$this->db->query("select * from kategori");
		return $hsl;
	}
	function simpan_kategori($kategori){
		$hsl=$this->db->query("insert into kategori(kategori_nama) values('$kategori')");
		return $hsl;
	}
	function update_kategori($kode,$kategori){
		$hsl=$this->db->query("update kategori set kategori_nama='$kategori' where kategori_id='$kode'");
		return $hsl;
	}
	function hapus_kategori($kode){
		$hsl=$this->db->query("delete from kategori where kategori_id='$kode'");
		return $hsl;
	}
	
	function get_kategori_byid($kategori_id){
		$hsl=$this->db->query("select * from kategori where kategori_id='$kategori_id'");
		return $hsl;
	}

	// =============model berita============
	function get_all_berita(){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita ORDER BY id_berita DESC");
		return $hsl;
	}
	function simpan_berita($judul,$isi,$kategori_id,$kategori_nama,$nik,$nama,$gambar,$slug){
		$hsl=$this->db->query("insert into berita(judul_berita,isi_berita,kategori_id_berita,kategori_nama_berita,nik,author_berita,gambar_berita,slug_berita) values ('$judul','$isi','$kategori_id','$kategori_nama','$nik','$nama','$gambar','$slug')");
		return $hsl;
	}
	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita where id_berita='$kode'");
		return $hsl;
	}
	function update_berita($id_berita,$judul,$isi,$kategori_id,$kategori_nama,$nik,$nama,$gambar,$slug){
		$hsl=$this->db->query("update berita set judul_berita='$judul',isi_berita='$isi',kategori_id_berita='$kategori_id',kategori_nama_berita='$kategori_nama',nik='$nik',author_berita='$nama',gambar_berita='$gambar',slug_berita='$slug' where id_berita='$id_berita'");
		return $hsl;
	}
	function update_berita_tanpa_img($id_berita,$judul,$isi,$kategori_id,$kategori_nama,$nik,$nama,$slug){
		$hsl=$this->db->query("update berita set judul_berita='$judul',isi_berita='$isi',kategori_id_berita='$kategori_id',kategori_nama_berita='$kategori_nama',nik='$nik',author_berita='$nama',slug_berita='$slug' where id_berita='$id_berita'");
		return $hsl;
	}
	function hapus_berita($kode){
		$hsl=$this->db->query("delete from berita where id_berita='$kode'");
		return $hsl;
	}

	//Front-End

	function get_post_home(){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d %M %Y') AS tanggal FROM berita ORDER BY id_berita DESC limit 4");
		return $hsl;
	}

	function get_berita_slider(){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita where img_slider_berita='1' ORDER BY id_berita DESC");
		return $hsl;
	}

	// function berita_perpage($offset,$limit){
	// 	$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita ORDER BY id_berita DESC limit $offset,$limit");
	// 	return $hsl;
	// }

	
	// function berita_perpage($limit, $start){
	// 	$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita ORDER BY id_berita DESC limit $limit, $start");
	// 	return $hsl;
	// }

	function berita_perpage($limit, $start){
        $query = $this->db->get('berita', $limit, $start);
        return $query;
    }

	function berita(){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita ORDER BY id_berita DESC");
		return $hsl;
	} 
	function get_berita_by_slug($slug){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita where slug_berita='$slug'");
		return $hsl;
	}

	function get_berita_by_kategori($kategori_id){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita where kategori_id_berita='$kategori_id'");
		return $hsl;
	}

	function get_berita_by_kategori_perpage($kategori_id,$offset,$limit){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita where kategori_id_berita='$kategori_id' limit $offset,$limit");
		return $hsl;
	}

	function search_berita($keyword){
		$hsl=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d/%m/%Y') AS tanggal FROM berita WHERE judul_berita LIKE '%$keyword%'");
		return $hsl;
	}


	function count_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_views WHERE views_ip='$user_ip' AND views_id_berita='$kode' AND DATE(views_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_views (views_ip,views_id_berita) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE berita SET views_berita=views_berita+1 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Good
    function count_good($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_id_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_id_berita) VALUES('$user_ip','1','$kode')");
				$this->db->query("UPDATE berita SET rating_berita=rating_berita+1 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_like($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_id_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_id_berita) VALUES('$user_ip','2','$kode')");
				$this->db->query("UPDATE berita SET rating_berita=rating_berita+2 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_love($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_id_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_id_berita) VALUES('$user_ip','3','$kode')");
				$this->db->query("UPDATE berita SET rating_berita=rating_berita+3 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    //Count rating Like
    function count_genius($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_id_berita='$kode'");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO tbl_post_rating (rate_ip,rate_point,rate_id_berita) VALUES('$user_ip','4','$kode')");
				$this->db->query("UPDATE berita SET rating_berita=rating_berita+4 where id_berita='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
    }

    function cek_ip_rate($kode){
    	$user_ip=$_SERVER['REMOTE_ADDR'];
        $hsl=$this->db->query("SELECT * FROM tbl_post_rating WHERE rate_ip='$user_ip' AND rate_id_berita='$kode'");
        return $hsl;
    }


    function get_berita_populer(){
		$hasil=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d %M %Y') AS tanggal FROM berita ORDER BY views_berita DESC limit 5");
		return $hasil;
	}

	function get_berita_terbaru(){
		$hasil=$this->db->query("SELECT berita.*,DATE_FORMAT(tanggal_berita,'%d %M %Y') AS tanggal FROM berita ORDER BY id_berita DESC limit 5");
		return $hasil;
	}

	function get_kategori_for_blog(){
		$hasil=$this->db->query("SELECT COUNT(kategori_id_berita) AS jml,kategori_id,kategori_nama FROM berita JOIN kategori ON kategori_id_berita=kategori_id GROUP BY kategori_id_berita");
		return $hasil;
	}

	// ================model untuk galeri==========

	function get_all_galeri(){
		$hsl=$this->db->query("SELECT galeri.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal,nama_album FROM galeri join album_photos on id_album_galeri=id_album ORDER BY id_galeri DESC");
		return $hsl;
	}
	
	function galeri(){
		$hsl=$this->db->query("SELECT galeri.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM galeri ORDER BY id_galeri DESC");
		return $hsl;
	} 

	function galeri_perpage($limit, $start){
        $query = $this->db->get('galeri', $limit, $start);
        return $query;
    }
	// function galeri_perpage($offset,$limit){
	// 	$hsl=$this->db->query("SELECT galeri.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal FROM galeri ORDER BY id_galeri DESC limit $offset,$limit");
	// 	return $hsl;
	// }
	function simpan_galeri($judul,$album,$nik,$nama,$gambar){
		$this->db->trans_start();
            $this->db->query("insert into galeri(judul,id_album_galeri,nik,author,gambar) values ('$judul','$album','$nik','$nama','$gambar')");
            $this->db->query("update album_photos set count=count+1 where id_album='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_galeri($id_galeri,$judul,$album,$nik,$nama,$gambar){
		$hsl=$this->db->query("update galeri set judul='$judul',id_album_galeri='$album',nik='$nik',author='$nama',gambar='$gambar' where id_galeri='$id_galeri'");
		return $hsl;
	}
	function update_galeri_tanpa_img($id_galeri,$judul,$album,$nik,$nama){
		$hsl=$this->db->query("update galeri set judul='$judul',id_album_galeri='$album',nik='$nik',author='$nama' where id_galeri='$id_galeri'");
		return $hsl;
	}
	function hapus_galeri($kode,$album){
		$this->db->trans_start();
            $this->db->query("delete from galeri where id_galeri='$kode'");
            $this->db->query("update album_photos set count=count-1 where id_album='$album'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	//Front-End
	function get_galeri_home(){
		$hsl=$this->db->query("SELECT galeri.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal,nama_album FROM galeri join album_photos on id_album_galeri=id_album ORDER BY id_galeri DESC limit 4");
		return $hsl;
	}

	function get_galeri_by_id_album($idalbum){
		$hsl=$this->db->query("SELECT galeri.*,DATE_FORMAT(tanggal,'%d/%m/%Y') AS tanggal,nama_album FROM galeri join album_photos on id_album_galeri=id_album where id_album_galeri='$idalbum' ORDER BY id_galeri DESC");
		return $hsl;
	}

	// =============model album photo============

	function get_all_album(){
		$hsl=$this->db->query("SELECT album_photos.*,DATE_FORMAT(tanggal_album,'%d/%m/%Y') AS tanggal FROM album_photos ORDER BY id_album DESC");
		return $hsl;
	}
	function simpan_album($album,$user_id,$user_nama,$gambar){
		$hsl=$this->db->query("insert into album_photos(nama_album,nik,author,cover_album) values ('$album','$user_id','$user_nama','$gambar')");
		return $hsl;
	}
	function update_album($id_album,$nama_album,$user_id,$user_nama,$gambar){
		$hsl=$this->db->query("update album_photos set nama_album='$nama_album',nik='$user_id',author='$user_nama',cover_album='$gambar' where id_album='$id_album'");
		return $hsl;
	}
	function update_album_tanpa_img($id_album,$nama_album,$user_id,$user_nama){
		$hsl=$this->db->query("update album_photos set nama_album='$nama_album',nik='$user_id',author='$user_nama' where id_album='$id_album'");
		return $hsl;
	}
	function hapus_album($kode){
		$hsl=$this->db->query("delete from album_photos where id_album='$kode'");
		return $hsl;
	}

	// ====================model about================
	function get_about(){
		$hsl=$this->db->query("SELECT * FROM about LIMIT 10");
		return $hsl;	
	}

	function simpan_about($nama_po,$tentang,$alamat,$phone,$fb,$ig,$twitter,$layanan,$gambar){
		$hsl=$this->db->query("INSERT INTO about (nama_po,about,alamat,phone,fb,ig,twitter,layanan,gambar) VALUES ('$nama_po','$tentang','$alamat','$phone','$fb','$ig','$twitter','$layanan','$gambar')");
		return $hsl;
	}

	function update_about($id_about,$nama_po,$tentang,$alamat,$phone,$fb,$ig,$twitter,$layanan,$gambar){
		$hsl=$this->db->query("update about set nama_po='$nama_po',about='$tentang',alamat='$alamat', phone='$phone', fb='$fb', ig='$ig', twitter='$twitter', layanan='$layanan', gambar='$gambar'where id_about='$id_about'");
		return $hsl;
	}

	function update_about_tanpa_img($id_about,$nama_po,$tentang,$alamat,$phone,$fb,$ig,$twitter,$layanan){
		$hsl=$this->db->query("update about set nama_po='$nama_po',about='$tentang',alamat='$alamat', phone='$phone', fb='$fb', ig='$ig', twitter='$twitter',layanan='$layanan' where id_about='$id_about'");
		return $hsl;
	}

	function hapus_about($kode,$album){
		$hsl=$this->db->query("DELETE FROM about where id_about='$kode'");
		return $hsl;
	}

	// ==========data bus========
	function get_all_bus(){
		$hsl=$this->db->query("SELECT * FROM bus ORDER BY kode_bus ASC");
		return $hsl;
	}

	function simpan_bus($kodebus, $nopolisi, $jumkursi, $jenisbus, $nouji, $tglakhiruji, $nokps, $tglakhirkps, $nomesin, $noangka, $merkbus, $pemilik,$gambar){
		$hsl=$this->db->query("INSERT INTO bus (kode_bus,no_polisi,jumlah_kursi,jenis_bus,no_uji,tgl_akhir_uji,no_kps,tgl_akhir_kps,no_mesin,no_angka,merk_type,pemilik,photo_bus) VALUES ('$kodebus','$nopolisi','$jumkursi','$jenisbus','$nouji','$tglakhiruji','$nokps','$tglakhirkps','$nomesin','$noangka','$merkbus','$pemilik','$gambar')");
		return $hsl;
	}

	function update_bus($kodebus, $nopolisi, $jumkursi, $jenisbus, $nouji, $tglakhiruji, $nokps, $tglakhirkps, $nomesin, $noangka, $merkbus, $pemilik,$gambar){
		$hsl=$this->db->query("update bus set kode_bus='$kodebus',no_polisi='$nopolisi', jumlah_kursi='$jumkursi', jenis_bus='$jenisbus', no_uji='$nouji', tgl_akhir_uji='$tglakhiruji', no_kps='$nokps', tgl_akhir_kps='$tglakhirkps', no_mesin ='$nomesin', no_angka='$noangka', merk_type='$merkbus', pemilik='$pemilik', photo_bus='$gambar'where kode_bus='$kodebus'");
		return $hsl;
	}

	function hapus_bus($kode){
		$hsl=$this->db->query("DELETE FROM bus where kode_bus='$kode'");
		return $hsl;
	}

	// ===============data pesan pengunjung=====

	function kirim_pesan($nama,$email,$pesan){
		$hsl=$this->db->query("INSERT INTO tbl_inbox(inbox_nama,inbox_email,inbox_pesan) VALUES ('$nama','$email','$pesan')");
		return $hsl;
	}

	function get_all_inbox(){
		$hsl=$this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox ORDER BY inbox_id DESC");
		return $hsl;
	}

	function hapus_kontak($kode){
		$hsl=$this->db->query("DELETE FROM tbl_inbox WHERE inbox_id='$kode'");
		return $hsl;
	}

	function update_status_kontak(){
		$hsl=$this->db->query("UPDATE tbl_inbox SET inbox_status='0'");
		return $hsl;
	}

	// =======model cabang===========

	function get_all_cabang(){
		$hsl=$this->db->query("SELECT * FROM cabang ORDER BY id ASC");
		return $hsl;
	}
	function simpan_Cabang($Cabang, $Alamat, $Kontak){
		$hsl=$this->db->query("INSERT INTO cabang(cabang, alamat, kontak) values('$Cabang','$Alamat','$Kontak')");
		return $hsl;
	}
	function update_cabang($kode,$Cabang, $Alamat, $Kontak){
		$hsl=$this->db->query("UPDATE cabang set cabang='$Cabang', alamat='$Alamat', kontak='$Kontak' where id='$kode'");
		return $hsl;
	}
	
	function hapus_cabang($kode){
		$hsl=$this->db->query("DELETE from cabang where id='$kode'");
		return $hsl;
	}

	// =========model banner=========
	function banner(){
		$hsl=$this->db->query("SELECT * FROM banner ORDER BY id asc");
		return $hsl;

	}

	function simpan_banner($judul,$gambar){
		$this->db->trans_start();
        $this->db->query("insert into banner_web(judul,gambar) values ('$judul','$gambar')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
	function update_banner($id_banner,$judul,$gambar){
		$hsl=$this->db->query("update banner_web set judul='$judul',gambar='$gambar' where id_banner='$id_banner'");
		return $hsl;
	}
	
	function hapus_banner($kode){
		$this->db->trans_start();
        $this->db->query("delete from banner_web where id_banner='$kode'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function get_report($year, $month, $idCabang){
		$hsl=$this->db->query("SELECT DISTINCT 
		a.id_pesan, a.no_pesan, a.acara, a.lokasi_tujuan, 
		a.tgl_berangkat, a.tgl_pulang, a.jumlah_bus, a.tarif_sewa, (a.jumlah_bus*a.tarif_sewa) as total_sewa,
		 b.nama, b.phone, (SELECT COALESCE(sum(total_ops),0) FROM operasional 
		 WHERE id_pesan=a.id_pesan) as total_ops, (SELECT COALESCE(sum(margin),0) FROM operasional 
		 WHERE id_pesan=a.id_pesan) as margin, a.nik_user FROM pesanan a, pelanggan b, operasional c 
		 WHERE a.id_pelanggan=b.nik AND a.id_pesan=c.id_pesan AND a.tgl_berangkat<=CURRENT_DATE() 
		 and a.jumlah_bus*a.tarif_sewa=(select COALESCE(sum(jumlah_bayar),0) 
		 FROM pembayaran where id_pesan = a.id_pesan ) AND YEAR(a.tgl_berangkat)='$year' 
		 AND MONTH(a.tgl_berangkat)='$month' AND a.id_cabang=$idCabang ORDER BY `a`.`tgl_berangkat` DESC");
		return $hsl;
	}

	// function get_order(){
	// 	$hsl=$this->db->query("SELECT a.id_pesan, a.no_pesan, a.id_pelanggan, b.nama, b.phone, 
	// 	b.email, b.alamat, a.acara, a.penjemputan, a.lokasi_tujuan, a.order_dari, a.tgl_pesan, 
	// 	a.tgl_berangkat, a.jam_penjemputan, a.tgl_pulang, a.jumlah_bus, a.lama_sewa, 
	// 	a.tarif_sewa, a.biaya_tambahan, a.fee_marketing, a.opr, a.nik_user, 
	// 	(select COALESCE(sum(jumlah_bayar),0) as jumlah_bayar FROM pembayaran 
	// 	where id_pesan = a.id_pesan ) FROM pesanan a, pelanggan b 
	// 	where a.id_pelanggan = b.nik and a.tgl_berangkat>=CURRENT_DATE() 
	// 	ORDER BY a.tgl_berangkat  DESC");
	// 	return $hsl;
	// }

	function get_history(){
		$hsl=$this->db->query("SELECT a.id_pesan, a.no_pesan, a.id_pelanggan, b.nama, b.phone, a.acara, 
		a.penjemputan, a.lokasi_tujuan, a.order_dari, a.tgl_pesan, a.tgl_berangkat, 
		a.jam_penjemputan, a.tgl_pulang, a.jumlah_bus, a.lama_sewa, a.tarif_sewa, 
		a.biaya_tambahan, a.fee_marketing, a.opr, a.nik_user, 
		(select COALESCE(sum(jumlah_bayar),0) as jumlah_bayar FROM pembayaran 
		where id_pesan = a.id_pesan ) FROM pesanan a, pelanggan b where a.id_pelanggan = b.nik and a.tgl_berangkat<=CURRENT_DATE() 
		and a.tarif_sewa*a.jumlah_bus=(select COALESCE(sum(jumlah_bayar),0) FROM pembayaran 
		where id_pesan = a.id_pesan ) ORDER BY `a`.`tgl_berangkat`  DESC LIMIT 100");
		return $hsl;
	}


	function get_detail_payment($id_pesan) {
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan','pelanggan.nik=pesanan.id_pelanggan');
		$this->db->join('pembayaran','pembayaran.id_pesan=pesanan.id_pesan', 'left');
		$this->db->order_by("tgl_berangkat", "DESC");
		$query = $this->db->get();
		return $query;
   }

   function get_order() {
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan','pelanggan.nik=pesanan.id_pelanggan');
		$this->db->order_by("tgl_berangkat", "DESC");
		$query = $this->db->get();
		return $query;
   }

   function cetak($id_pesan, $total, $sisatagihan)
   	{
      	$this->db->select('*' );
		$this->db->from('pesanan');
		$this->db->join('pelanggan','pelanggan.nik=pesanan.id_pelanggan');
		$this->db->join('pembayaran','pembayaran.id_pesan=pesanan.id_pesan');
		$this->db->group_by('pembayaran.id_pesan'); 
		$this->db->where('pembayaran.id_pesan',$id_pesan);
		$query = $this->db->get();
       	if($query->num_rows() != 0) {
			return $query;
		} else {
			return false;
		}
	}
}
