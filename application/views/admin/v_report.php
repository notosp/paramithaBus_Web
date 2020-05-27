
<!DOCTYPE html>
<html>
<?php $this->load->view('template/backend/head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('admin/v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
  <?php $this->load->view('template/backend/sidebar')?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <br>
          <form class="form-vertical" action="<?php echo base_url().'admin/report/index'?>" method="post">
          <div class="form-group">
            <label>Cabang</label>
            <select class="form-control select2" name="xcabang" style="width: 200px;" required>
                           <option value="">-Pilih-</option>
														<?php
														$no=0;
														foreach ($cab->result_array() as $a) :
														$no++;
															$cab_id=$a['id'];
															$cab_nama=$a['cabang'];					
														?>
														<option value="<?php echo $cab_id;?>"><?php echo $cab_nama;?>
														</option>
														<?php endforeach;?>
            </select>
            <br>
            <label>Bulan :</label>
            <input class="form-control" type="month" name="xmonth" style="width: 200px;">
            <br>
            <button type="submit" class="btn btn-primary">Tampilkan</button> 
          </div>
          </div>
            <!-- /.box-header -->
          <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
					<th>#</th>
					<th>No. Pesan</th>
					<th>Tgl. Pelaksanaan</th>
					<th>Penyewa</th>
					<th>Tujuan</th>  
					<th>Acara</th>  
					<th>Besar Sewa</th>  
					<th>Jumlah Bus</th>  
					<th>Total Sewa</th>  
					<th>Operasional</th>  
					<th>Margin</th>  
                </tr>
                </thead>
                <tbody>
				<?php
          $no=0;
          $totalMargin=0;
          $totalSewa=0;
          $totalOps=0;
					foreach ($data->result_array() as $i) :
						$no++;
						$no_pesan=$i['no_pesan'];
						$tgl_berangkat=date_format(date_create($i['tgl_berangkat']),"d-m-Y");
						$nama=$i['nama'];
						$lokasi_tujuan=$i['lokasi_tujuan'];
						$acara=$i['acara'];
						$tarif_sewa=$i['tarif_sewa'];
						$jumlah_bus=$i['jumlah_bus'];
						$total_sewa=$i['total_sewa'];
						$total_ops=$i['total_ops'];
						$margin=$i['margin'];
            $totalMargin=$totalMargin+$margin;
            $totalSewa=$totalSewa+$total_sewa;
            $totalOps=$totalOps+$total_ops;
						?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $no_pesan;?></td>
						<td><?php echo $tgl_berangkat;?></td>
						<td><?php echo $nama;?></td>
						<td><?php echo $lokasi_tujuan;?></td>
						<td><?php echo $acara;?></td>
            <td align="right"><?php echo number_format($tarif_sewa,0,',','.');?></td>
						<td align="center"><?php echo $jumlah_bus;?></td>
						<td align="right"><?php echo number_format($total_sewa,0,',','.');?></td>
						<td align="right"><?php echo number_format($total_ops,0,',','.');?></td>
						<td align="right"><?php echo number_format($margin,0,',','.');?></td>
					</tr>
				<?php endforeach;?>
                </tbody>
                <tfoot>
          <tr>
            <th colspan="8">Total </th>
            <td align="right"><?php echo number_format($totalSewa,0,',','.');?></td>
            <td align="right"><?php echo number_format($totalOps,0,',','.');?></td>
            <td align="right"><?php echo number_format($totalMargin,0,',','.');?></td>
          </tr>
   </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('template/backend/footer')?>

  
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
