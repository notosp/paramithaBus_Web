
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<?php $this->load->view('template/head')?>

<?php
    error_reporting(0);
    function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
    }
?>
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
                        <h2>Our Latest Articles</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Artikel dan Berita</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <div id="blog-page-content" class="section-padding">
        <div class="container">
            <div class="row">
			<?php
				foreach ($data->result_array() as $i) :
				$id_berita=$i['id_berita'];
				$judul_berita=$i['judul_berita'];
				$isi_berita=$i['isi_berita'];
				$tanggal_berita=$i['tanggal'];
				$author_berita=$i['author_berita'];
				$gambar_berita=$i['gambar_berita'];
				$post_slug=$i['slug_berita'];
			?>  
                <!-- Single Articles Start -->
                <div class="col-lg-12">
                    <article class="single-article">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="article">
                                    <img src="<?php echo base_url().'assets/images/'.$gambar_berita;?>" alt="JSOFT">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="article-body">
                                            <h3><a href="<?php echo base_url().'blog/'.$post_slug;?>"><?= $judul_berita?></a></h3>
                                            <div class="article-meta">
                                                <a href="#" class="author">By :: <span><?= $author_berita?></span></a>
                                                <a href="#" class="commnet">Comments :: <span>10</span></a>
                                            </div>

											<div>Date: <?= $tanggal_berita?></span></div>

                                            <p><?php echo limit_words($isi_berita,30).'...';?></p>

                                            <a href="<?php echo base_url().'blog/'.$post_slug;?>" class="readmore-btn">Read More <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Articles Content End -->
                        </div>
                    </article>
                </div>
				<?php endforeach;?>
			</div>
			<div class="row">
                <!-- Page Pagination Start -->
                <div class="col-lg-12">
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
								<li class="page-item"><?php echo $pagination; ?></li>
								
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Page Pagination End -->
            </div>
			
        </div>
    </div>

    <?php $this->load->view('template/footerup')?>

    <?php $this->load->view('template/footer')?>

</body>

</html>
