
<!DOCTYPE html>
<html class="no-js" lang="en">
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
                                <!-- <li class="active"><a href="<?php echo base_url().'Transportation'?>">Transportation</a></li> -->
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
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>ARMADA BUS</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <h3 style="color:white">Armada BUS yang Tersedia Pada PO. Paramitha BUS </h3>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                            <!-- Single Car Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb car-thumb-1"></div>
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#">Aston Martin One-77</a></h2>
                                        <h5>39$ Rent /per a day</h5>
                                        <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                        <ul class="car-info-list">
                                            <li>AC</li>
                                            <li>Diesel</li>
                                            <li>Auto</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Car End -->

                            <!-- Single Car Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb car-thumb-2"></div>
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#">Aston Martin One-77</a></h2>
                                        <h5>39$ Rent /per a day</h5>
                                        <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                        <ul class="car-info-list">
                                            <li>AC</li>
                                            <li>Diesel</li>
                                            <li>Auto</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Car End -->
                        </div>
                    </div>

                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

    <?php $this->load->view('template/footerup')?>

       <?php $this->load->view('template/footer')?>

</body>

</html>
