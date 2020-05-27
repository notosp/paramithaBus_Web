<header id="header-area" class="fixed-top">
	<div id="header-top" class="d-none d-xl-block">
		<div class="container">
			<div class="row">
				<?php
				foreach ($data->result_array() as $j) :
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
					<!-- <a href="index2.html" class="logo">
						<img src="assets/img/logo.png" alt="JSOFT">
					</a> -->
				</div>
				<div class="col-lg-8 d-none d-xl-block">
					<nav class="mainmenu alignright">
						<ul>
							<li class="active"><a href="<?php echo base_url().''?>">Home</a></li>
							<li><a href="<?php echo base_url().'About'?>">About</a></li>
							<li><a href="<?php echo base_url().'Transportation'?>">Transportation</a></li>
							<li><a href="<?php echo base_url().'blog'?>">Blog</a></li>
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
