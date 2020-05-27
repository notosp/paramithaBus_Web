
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

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
								<li class="active"><a href="<?php echo base_url().'Galeri'?>">Galeri</a></li>
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
                        <h2>Gallery</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Galeri Photo Paramitha</p>
                    </div>
                </div>
                <!-- Page Title End -->
    			</div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Gallery Page Content Start ==-->
    <section id="gallery-page-content" class="section-padding">
        <div class="container">
        	<div class="row">
        		<div class="col-lg-12">
					<div class="popular-cars-wrap">
						<!-- Filtering Menu -->
						<!-- Filtering Menu -->
       			
						<div class="row popular-car-gird">
							<?php foreach ($data->result() as $row) : ?>
							<!-- Single Popular Car Start -->
							<div class="col-lg-4 col-md-6 con suv mpv">
								<div class="single-popular-car">

									<div class="p-car-thumbnails">
										<a class="car-hover" href="<?php echo base_url().'assets/images/'.$row->gambar;?>">
										  <img src="<?php echo base_url().'assets/images/'.$row->gambar;?>">
									   </a>
									</div>

									<div class="p-car-content" style="height:20px">
										<h3 style="color:green">
											<?php echo $row->judul;?>
										</h3>
									</div>

									<div class="p-car-content" style="height:80px">
										<span class="price"><i class="fa fa-clock-o"></i> <?php echo $row->tanggal;?>
										</span>

										<p><span class="price"><i class="fa fa-pencil"></i> <?php echo $row->author;?>
										</span></p>
									</div>
								</div>
							</div>
							<?php endforeach;?>
							<!-- Single Popular Car End -->
						</div>
        			</div>
				</div>
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
    </section>
	<!--== Gallery Page Content End ==-->


    <?php $this->load->view('template/footerup')?>
    <?php $this->load->view('template/footer')?>

</body>

</html>
