<?php
	error_reporting(0);
	$b=$data->row_array();
	$url=base_url().'blog/'.$b['slug_berita'];
	$img=base_url().'assets/images/'.$b['gambar_berita'];
	$title=$b['judul_berita'];
	$author=$b['author_berita'];
	$date=$b['tanggal_berita'];
	$kategori=$b['kategori_nama_berita'];
	$isi=$b['isi_berita'];
	$views=$b['views_berita'];
	$rating=$b['rating_berita'];
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('assets')?>/bus.png" type="image/x-icon" />

	<title><?php echo $title;?></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="<?= $author?>" />
    <meta property="og:locale" content="id_id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="<?php echo $deskripsi;?>" />
	<meta property="og:url" content="<?php echo $url?>" />
	<meta property="article:section" content="<?php echo $author;?>" />
    <meta property="og:image" content="<?php echo $img?>" />
    <meta property="og:image:width" content="460" />
    <meta property="og:image:height" content="440" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?= base_url('assets/css')?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/plugins/vegas.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/plugins/slicknav.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/plugins/magnific-popup.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/plugins/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/plugins/gijgo.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/reset.css" rel="stylesheet">
    <link href="<?= base_url('assets')?>/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/css')?>/responsive.css" rel="stylesheet">

</head>


<body class="loader-active">
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
	<header id="header-area" class="fixed-top">
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <?php
                    foreach ($data1->result_array() as $j) :
                    $id_about=$j['id_about'];
                    $nama=$j['nama_po'];
                    $alamat=$j['alamat'];
                    $phone=$j['phone'];
                    $fb=$j['fb'];
                    $ig=$j['ig'];
                    $twit=$j['twitter'];
                    ?>  
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> <?= $alamat ?>
                    </div>
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> <?= $phone ?>
                    </div>
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Senin-Sabtu 08.00 - 17.00 WIB
                    </div>
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="<?= $fb?>" target="new_blank"><i class="fa fa-facebook"></i></a>
                            <a href="<?= $twit?>" target="new_blank"><i class="fa fa-twitter"></i></a>
                            <a href="<?= $ig?>"target="new_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="<?php echo base_url().''?>">Home</a></li>
                                <li><a href="<?php echo base_url().'About'?>">About</a></li>
                                <!-- <li><a href="<?php echo base_url().'Transportation'?>">Transportation</a></li> -->
                                <li class="active"><a href="<?php echo base_url().'Blog'?>">Blog</a></li>
								<li><a href="<?php echo base_url().'Galeri'?>">Galeri</a></li>
                                <li><a href="<?php echo base_url().'Contact'?>">Contact</a></li>
                                <li><a href="<?php echo base_url().'Administrator'?>"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--== Page Title Area Start ==-->
	
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2><?= $title?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p><?= $kategori?></p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
     <!--== Car List Area Start ==-->
	 <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
			<div class="col-md-8">
				<h2><a href="<?php echo $url;?>"><?php echo $title;?></a></h2>		
				<small><em>Posted by: <?php echo $author;?> | <?php echo $date;?> | Kategori: <?php echo $kategori;?> | <?php echo $views;?> kali dibaca | Rating: <?php echo $rating;?></em></small>
					<figure>
						<img src="<?php echo $img;?>" alt="" class="img-responsive">
					</figure>

					<div style="text-align:justify"><?php echo $isi;?></div>
					<?php if($rate->num_rows()>0):?>

					<?php else:?>
					<div class="alert alert-success">
						<strong>Pendapat Anda Tentang Artikel ini?</strong><br/><br/>
						<a class="btn btn-sm" href="<?php echo base_url().'blog/good/'.$b['slug_berita'];?>" title="Good"><i class="fa fa-smile-o fa-2x"></i></a>
						<a class="btn btn-sm" href="<?php echo base_url().'blog/like/'.$b['slug_berita'];?>" title="Like"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
						<a class="btn btn-sm" href="<?php echo base_url().'blog/love/'.$b['slug_berita'];?>" title="Love"><i class="fa fa-heart-o fa-2x"></i></a>
						<a class="btn btn-sm" href="<?php echo base_url().'blog/genius/'.$b['slug_berita'];?>" title="Genius"><i class="fa fa-lightbulb-o fa-2x"></i></a>
					</div>
					<?php endif;?>

					<h4>Share:</h4>
					<div>
						<a class="popup2 btn btn-info btn-sm" href="https://plus.google.com/share?url=<?php echo $url; ?>" title="Bagikan ke Google+"><i class="fa fa-google-plus"></i> Google+</a>
						<a class="popup2 btn btn-info btn-sm" target="_parent" href="https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=<?php echo $url;?>" title="Bagikan ke Facebook"><i class="fa fa-facebook"></i> Facebook</a>
						<a class="popup2 btn btn-info btn-sm" href="http://twitter.com/share?source=sharethiscom&text=<?php echo $b['judul_berita'];?>&url=<?php echo $url; ?>&via=badoey" title="Bagikan ke Twitter"><i class="fa fa-twitter"></i> Twitter</a>
						<a class="popup2 btn btn-info btn-sm" href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="Bagikan ke Pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
					</div>
				</div>

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
				<div class="sidebar-content-wrap m-t-50">
					<!-- Single Sidebar Start -->
					<div class="single-sidebar">
						<h3>POST TERPOPULER</h3>
						<div class="sidebar-body">
							<?php foreach ($populer->result() as $row) : ?>
								<ul class="recent-tips">
                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
											<a href="#"><img src="<?php echo base_url().'assets/images/'.$row->gambar_berita;?>" width="90"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="<?php echo base_url().'blog/'.$row->slug_berita;?>"><?php echo $row->judul_berita;?></a></a></h4>
                                            <span class="date"><?php echo $row->tanggal_berita;?></span>
											<span class="fa fa-eye"><?php echo $row->views_berita;?></span>
                                        </div>
                                    </li>
                                </ul>
							<?php endforeach;?>
                        </div>
					</div>
					<!-- Single Sidebar End -->
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>POST TERBARU</h3>
                            <div class="sidebar-body">
							<?php foreach ($terbaru->result() as $row) : ?>
								<ul class="recent-tips">
                                    <li class="single-recent-tips">
                                        <div class="recent-tip-thum">
											<a href="#"><img src="<?php echo base_url().'assets/images/'.$row->gambar_berita;?>" width="90"></a>
                                        </div>
                                        <div class="recent-tip-body">
                                            <h4><a href="<?php echo base_url().'blog/'.$row->slug_berita;?>"><?php echo $row->judul_berita;?></a></a></h4>
                                            <span class="date"><?php echo $row->tanggal_berita;?></span>
                                        </div>
                                    </li>
                                </ul>
							<?php endforeach;?>
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->
	<?php $this->load->view('template/footerup')?>

    <?php $this->load->view('template/footer')?>

</body>

</html>
