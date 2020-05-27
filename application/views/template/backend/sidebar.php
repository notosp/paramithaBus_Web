<?php
    $id_admin=$this->session->userdata('idadmin');
    $q=$this->db->query("SELECT * FROM karyawan WHERE nik='$id_admin'");
	$c=$q->row_array();
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
?>
<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
        <img src="<?php echo base_url().'assets/images/'.$c['photo'];?>"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p><?php echo $c['nama'];?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu">
    <li class="header">Menu Utama</li>
    <li class="active">
        <a href="<?php echo base_url().'admin/dashboard'?>">
        <i class="fa fa-home"></i> <span>Dashboard</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url().'admin/about'?>">
        <i class="fa fa-bus"></i> <span>About Paramitha</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>
	<li>
        <a href="<?php echo base_url().'admin/banner'?>">
        <i class="fa fa-newspaper-o"></i> <span>Banner</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>
	<li>
        <a href="<?php echo base_url().'admin/bus'?>">
        <i class="fa fa-car"></i> <span>Data Bus</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>
	<li>
        <a href="<?php echo base_url().'admin/cabang'?>">
        <i class="fa fa-recycle"></i> <span>Data Cabang</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-newspaper-o"></i>
        <span>Post Berita</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url().'admin/berita/add_berita'?>"><i class=" fa fa-pencil-square-o"></i> Tambah Berita</a></li>
        <li><a href="<?php echo base_url().'admin/berita'?>"><i class="fa fa-list-alt"></i> List Berita</a></li>
        <li><a href="<?php echo base_url().'admin/kategori'?>"><i class="fa fa-building-o"></i> Kategori</a></li>
        </ul>
    </li>

    <li class="">
        <a href="<?php echo base_url().'admin/karyawan'?>">
        <i class="fa  fa-user"></i> <span>Data Karyawan</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>
    
    <li class="treeview">
        <a href="#">
        <i class="fa fa-camera"></i>
        <span>Gallery</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url().'admin/album'?>"><i class="fa fa-clone"></i> Album</a></li>
        <li><a href="<?php echo base_url().'admin/galeri'?>"><i class="fa fa-picture-o"></i> Photos</a></li>
        </ul>
    </li>

	<li>
		<a href="<?php echo base_url().'admin/inbox'?>">
		<i class="fa fa-envelope"></i> <span>Inbox</span>
		<span class="pull-right-container">
			<small class="label pull-right bg-green"><?php echo $jum_pesan;?></small>
		</span>
		</a>
    </li>
    
    <li class="treeview">
        <a href="#">
        <i class="fa fa-clone"></i>
        <span>Order</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url().'admin/order'?>"><i class="fa fa-clone"></i> Order</a></li>
        <li><a href="<?php echo base_url().'admin/history'?>"><i class="fa fa-clone"></i> History</a></li>
        <li><a href="<?php echo base_url().'admin/report'?>"><i class="fa fa-newspaper-o"></i> Laporan</a></li>
        </ul>
    </li>

    <li>
        <a href="<?php echo base_url().'administrator/logout'?>">
        <i class="fa fa-sign-out"></i> <span>Sign Out</span>
        <span class="pull-right-container">
            <small class="label pull-right"></small>
        </span>
        </a>
    </li>   
    </ul>
</section>
