
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<?php $this->load->view('template/head')?>

<body class="loader-active">

	<header id="header-area" class="fixed-top">
		<div id="header-top" class="d-none d-xl-block">
			<div class="container">
				<div class="row">
					<?php
					foreach ($data1->result_array() as $j) :
					$id_about=$j['id_about'];
					$nama=$j['nama_po'];
					$gambar=$j['gambar'];
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
								<li><a href="<?php echo base_url().'Blog'?>">Blog</a></li>
								<li><a href="<?php echo base_url().'Galeri'?>">Galeri</a></li>
								<li class="active"><a href="<?php echo base_url().'Contact'?>">Contact</a></li>
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
                        <h2>Hubungi Kami</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <h2><?php echo $nama?></h2>
						<p><?php echo $alamat?></p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>

    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
						<div class="col-lg-5">
							<div class="article">
								<img src="<?php echo base_url().'assets/images/'.$gambar;?>">
							</div>
						</div>

						<div class="col-lg-7">
							<div class="display-table">
								<div class="article-body">
									<center><h3>Kontak Kami</h3></center>
									</br>
									<ul class="get-touch">
									<li>
										<i class="fa fa-home"></i>
										<?= $alamat?>
									</li>
									<li>
										<i class="fa fa-mobile"></i>
										<?= $phone?>
									</li>
									<li>
										<i class="fa fa-instagram"></i>
										<?= $ig?>
									</li>
									<li>
										<i class="fa fa-facebook"></i>
										<?= $fb?>
									</li>
									<li>
										<i class="fa fa-twitter"></i>
										<?= $twit?>
									</li>
									</ul>
								</div>
							</div>
                        </div>
                    </article>
                </div>               
            </div>
		</div>
	</div>
	
    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="contact-form">
                        <form method="POST" action="<?php echo base_url().'contact/kirim_pesan'?>">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="name-input">
										<input name="nama" placeholder="Nama Lengkap" type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="email-input">
                                       <input name="email" placeholder="Email" type="email" required>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="subject-input">
                                        <input type="text" placeholder="Subject">
                                    </div>
                                </div>
                            </div> -->

                            <div class="message-input">
                               <textarea name="pesan" id="" cols="30" rows="10" placeholder="Message" required></textarea>
                            </div>

                            <div class="input-submit">
                                <button type="submit" value="Kirim Pesan">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->


    <?php $this->load->view('template/footerup')?>
    <?php $this->load->view('template/footer')?>

</body>

</html>
