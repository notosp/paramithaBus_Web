<?php 
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html>
<?php $this->load->view('template/backend/head')?>
	<!-- <?php
			foreach($visitor as $result){
					$bulan[] = $result->tgl;
					$value[] = (float) $result->jumlah;
			}
	?> -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php 
	$this->load->view('admin/v_header');
?>

  <aside class="main-sidebar">
    <?php $this->load->view('template/backend/sidebar')?>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-chrome"></i></span>
              <?php 
                  $query=$this->db->query("SELECT * FROM pengunjung WHERE pengunjung_id != '0'");
                  $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Pengunjung</span>
              <span class="info-box-number"><?php echo $jml;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-newspaper-o"></i></span>
            <?php 
                  $query=$this->db->query("SELECT * FROM berita WHERE id_berita !='0'");
                  $jml=$query->num_rows();
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Berita</span>
              <span class="info-box-number"><?php echo $jml;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
              <?php 
                $query=$this->db->query("SELECT * FROM karyawan WHERE status='1'");
                $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah karyawan</span>
              <span class="info-box-number"><?php echo $jml;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-photo"></i></span>
            <?php 
              $query=$this->db->query("SELECT * FROM galeri WHERE id_galeri!='0'");
              $jml=$query->num_rows();
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Galeri</span>
              <span class="info-box-number"><?php echo $jml;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- canvas======= -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-7">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Posting Populer</h3>

              <table class="table">
              <?php 
                  $query=$this->db->query("SELECT * FROM berita ORDER BY views_berita DESC");
                  foreach ($query->result_array() as $i) :
                      $id_berita=$i['id_berita'];
                      $judul_berita=$i['judul_berita'];
                      $views_berita=$i['views_berita'];
              ?>
                  <tr>
                    <td><?php echo $judul_berita;?></td>
                    <td><?php echo $views_berita.' Views';?></td>
                  </tr>
              <?php endforeach;?>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-5">
				<div class="box box-success">
            <div class="box-header with-border">
							<h3 class="box-title">Posting Terbaru</h3>
							<table class="table">

              <?php 
                  $query=$this->db->query("SELECT * FROM berita ORDER BY tanggal_berita DESC LIMIT 5");
                  foreach ($query->result_array() as $i) :
                      $id_berita=$i['id_berita'];
											$judul_berita=$i['judul_berita'];
											$gambar= $i['gambar_berita'];
											$tanggal_berita=$i['tanggal_berita'];
							?>
									<tr>
                    <td><a href="#"><img src="<?php echo base_url().'assets/images/'.$gambar;?>" width="90"></a></td>
										<td><?php echo $judul_berita;?>
										</td>
                  </tr>
              <?php endforeach;?>
              </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('template/backend/footer')?>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>

<script>

var lineChartData = {
			labels : <?php echo json_encode($bulan);?>,
			datasets : [
					
					{
							fillColor: "rgba(60,141,188,0.9)",
							strokeColor: "rgba(60,141,188,0.8)",
							pointColor: "#3b8bba",
							pointStrokeColor: "#fff",
							pointHighlightFill: "#fff",
							pointHighlightStroke: "rgba(152,235,239,1)",
							data : <?php echo json_encode($value);?>
					}

			]
			
	}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

	var canvas = new Chart(myLine).Line(lineChartData, {
			scaleShowGridLines : true,
			scaleGridLineColor : "rgba(0,0,0,.005)",
			scaleGridLineWidth : 0,
			scaleShowHorizontalLines: true,
			scaleShowVerticalLines: true,
			bezierCurve : true,
			bezierCurveTension : 0.4,
			pointDot : true,
			pointDotRadius : 4,
			pointDotStrokeWidth : 1,
			pointHitDetectionRadius : 2,
			datasetStroke : true,
			tooltipCornerRadius: 2,
			datasetStrokeWidth : 2,
			datasetFill : true,
			legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
			responsive: true
	});
	
	</script>

</body>
</html>
