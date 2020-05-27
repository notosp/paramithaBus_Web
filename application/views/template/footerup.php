
<section id="footer-area">
<div class="footer-widget-area">
	<div class="container">
		<div class="row">
			<?php
			foreach ($data1->result_array() as $j) :
			$id_about=$j['id_about'];
			$nama=$j['nama_po'];
			$about=$j['about'];
			$alamat=$j['alamat'];
			$phone=$j['phone'];
			$fb=$j['fb'];
			$ig=$j['ig'];
			$twit=$j['twitter'];
			?>  
			<div class="col-lg-4 col-md-6">
				<div class="single-footer-widget">
					<h2 style="text-align:center">About Us</h2>
					<div class="widget-body">
						<p style="text-align:justify"><?= $about?></p>
					</div>
				</div>
			</div>

			<div class="col-lg-5 col-md-6">
				<div class="single-footer-widget">
					<h2 style="text-align:center">Contact</h2>
					<div class="widget-body">
						<p> Paramitha BUS Pariwisata beralamat di <?= $alamat?></p>
						<ul class="get-touch">
						<li><i class="fa fa-mobile"></i><?= $phone?></li>
						<li><i class="fa fa-instagram"></i><?= $ig?></li>
						<li><i class="fa fa-facebook"></i><?= $fb?></li>
						<li><i class="fa fa-twitter"></i><?= $twit?></li>
						</ul>
					</div>
				</div>
			</div>
			<?php endforeach?>
		    
			
			<div class="col-lg-3 col-md-6">
				<div class="single-footer-widget">
					<div class="widget-body">
					<h2 style="text-align:center">Popular Post</h2>
					<?php 
					$query=$this->db->query("SELECT * FROM berita ORDER BY views_berita DESC LIMIT 3");
					?>
						<?php 
						foreach ($query->result_array() as $i) :
						$id_berita=$i['id_berita'];
						$judul_berita=$i['judul_berita'];
						$views_berita=$i['views_berita'];
						$post_slug=$i['slug_berita'];
						?>
						<ul class="recent-post">
						<li>
							<a href="#">
								<?= $judul_berita?> 
								<p style="color:white">Jumlah Viewer: <?= $views_berita?></p>
								<a href="<?php echo base_url().'blog/'.$post_slug;?>">
								<i class="fa fa-long-arrow-right"></i></a>
							</a>
						</li>
						<?php endforeach?>
						</ul>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
