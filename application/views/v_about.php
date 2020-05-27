
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<?php $this->load->view('template/head')?>

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
					$gambar=$j['gambar'];
					$about=$j['about'];
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
                        <i class="fa fa-mobile"></i><?= $phone?>
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
                                <li class="active"><a href="<?php echo base_url().'About'?>">About</a></li>
                                <!-- <li><a href="<?php echo base_url().'Transportation'?>">Transportation</a></li> -->
                                <li><a href="<?php echo base_url().'Blog'?>">Blog</a></li>
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

    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>About US</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== About Us Area Start ==-->
	<section id="about-area" class="section-padding">
	<div class="container">
		<div class="row">
			<!-- Section Title Start -->
			<div class="col-lg-12">
				<div class="section-title  text-center">
					<h2>PARAMITHA BUS</h2>
					<span class="title-line"><i class="fa fa-car"></i></span>
					<h3>Sekilas Tentang <?= $nama?></h3>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- About Content Start -->
			<div class="col-lg-6">
				<div class="display-table">
					<div class="display-table-cell">
						<div class="about-content">
							<p style="text-align:justify"><?= $about?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-image">
					<img src="<?php echo base_url().'assets/images/'.$gambar;?>">
				</div>
			</div>
			<!-- About Video End -->
		</div>
		<!-- About Fretutes Start -->
		<div class="about-feature-area">
			<div class="row">
				<?php
				foreach ($data2->result_array() as $j) :
				$cabang=$j['cabang'];
				$alamat_cab=$j['alamat'];
				$kontak_cab=$j['kontak'];
				?>  
				<div class="col-lg-4">
					<div class="about-feature-item active">
						<i class="fa fa-car"></i>
						<h3><?= $cabang?></h3>
						<p>Alamat :<?= nl2br(htmlspecialchars($alamat_cab));?></p>
						<p>Kontak :<?= nl2br(htmlspecialchars($kontak_cab));?></p>
					</div>
				</div>
				<?php endforeach;?>
				<!-- Single Fretutes End -->
			</div>
		</div>
		<!-- About Fretutes End -->
	</div>
    </section>
   

    <?php $this->load->view('template/footerup')?>
	<?php $this->load->view('template/footer')?>

</body>

</html>
