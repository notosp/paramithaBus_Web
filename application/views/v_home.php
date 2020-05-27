
<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
function limit_words($string, $word_limit){
$words = explode(" ",$string);
return implode(" ",array_splice($words,0,$word_limit));
}
?>

<?php $this->load->view('template/head')?>
<body class="loader-active">
<style>
/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 10px;
  text-align: left;
  background-color: #f1f1f1;
}
</style>

   <?php $this->load->view('template/preloader')?>

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
				$layanan=$j['layanan'];
				?>  
				<div class="col-lg-3 text-left">
					<i class="fa fa-map-marker"></i> <?= $alamat ?>
				</div>
				<div class="col-lg-3 text-center">
					<i class="fa fa-mobile"></i> <?= $phone?>
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
							<li class="active"><a href="<?php echo base_url().''?>">Home</a></li>
							<li><a href="<?php echo base_url().'About'?>">About</a></li>
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

    <!-- <section id="slideslow-bg"> -->
	
	<section>
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
            $i = 1;
            foreach ($data3->result() as $row): 
            $item_class = ($i == 1) ? 'item active' : 'item';                    
          ?>
          <div class="carousel-item <?php echo $item_class ?>">
            <img class="first-slide" src="<?php echo base_url().'assets/images/'.$row->gambar;?>" style= "width:100%; height:100%">
			
          </div>

		  <?php  
			$i++;
			endforeach;
		  ?>
			</div>
		</div>
	  </div>		
    </section>

	<?php
		foreach ($data1->result_array() as $j) :
		$nama=$j['nama_po'];
		$tentang=$j['about'];
		$gambar=$j['gambar'];
	?>  


	 <!--== About Us Area Start ==-->
	<section id="about-area" class="section-padding">
	<div class="container">
		<div class="row">
			<!-- Section Title Start -->
			<div class="col-lg-12">
				<div class="section-title  text-center">
					<h2><?= $nama?></h2>
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
							<p style="text-align:justify"><?= $tentang?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about-image">
					<img src="<?php echo base_url().'assets/images/'.$gambar;?>">
				</div>
			</div>
			<?php endforeach;?>
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
	<!-- ===== -->
    <section id="service-area" class="overlay section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Layanan <?= $nama?></h2>
                        <span class="title-line"><i class="fa fa-bus"></i></span>
                    </div>

					<div class="single-faq-sub-content">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<span>Kami Melayani</span>
								<i class="fa fa-angle-down"></i>
								<i class="fa fa-angle-up"></i>
							</button></h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								<p>
								<?php echo nl2br(str_replace(‘‘,‘‘,htmlspecialchars($layanan)));?>
								</p>
							</div>
						</div>
					</div>
					</div>
                </div>
            </div>
	</section>

    <section id="tips-article-area" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Artikel dan Berita</h2>
                    </div>
                </div>
            </div>
            <!-- Articles Content Wrap Start -->
            <div class="row">
				<!-- Single Articles Start -->
				<?php
				foreach ($post->result_array() as $i) :
				$id_berita=$i['id_berita'];
				$judul_berita=$i['judul_berita'];
				$isi_berita=$i['isi_berita'];
				$tanggal_berita=$i['tanggal'];
				$author_berita=$i['author_berita'];
				$gambar_berita=$i['gambar_berita'];
				$views_berita=$i['views_berita'];
				$post_slug=$i['slug_berita'];
				?>  
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <!-- Articles Thumbnail Start -->
                            <div class="col-lg-5">
                                <div class="article">
								<img src="<?php echo base_url().'assets/images/'.$gambar_berita;?>">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
										<h3><a href="<?php echo base_url().'blog/'.$post_slug;?>"><?= $judul_berita?></a></h3>
                                            <div class="article-meta">
                                                <a href="#" class="author">By :: <span><?= $author_berita?></span></a>
                                                <a href="#" class="commnet">view :: <span><?= $views_berita?></span></a>
                                            </div>

                                            <div>Date: <?= $tanggal_berita?></span></div>

                                            <p><?php echo limit_words($isi_berita,30).'...';?></p>

                                            <a href="<?php echo base_url().'blog/'.$post_slug;?>" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
				<?php endforeach;?>
            </div>
        </div>
    </section>
	<?php $this->load->view('template/footerup')?>
	<?php $this->load->view('template/footer')?>

	<script>
	$('#myCarousel').carousel({
  	interval: 7000,
})
	</script>
</body>
</html>
