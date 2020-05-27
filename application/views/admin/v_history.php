
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
        History List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
          <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
					<th>#</th>
                    <th>No. Pesan</th>
                    <th>Penyewa</th>
                    <th>Phone</th>
                    <th>Tgl. Pelaksanaan</th>
                    <th>Tgl. Pulang</th>
                    <th>Lokasi Tujuan</th>
                    <th>Acara</th>
                    <th>Tempat Penjemputan</th>
                    <th>Jam Penjemputan</th>
					<th>Besar Sewa</th>  
					<th>Jumlah Bus</th>  
					<th>Total Sewa</th>  
                </tr>
                </thead>
                <tbody>
				<?php
          $no=0;
					foreach ($data->result_array() as $i) :
						$no++;
						$no_pesan=$i['no_pesan'];
						$nama=$i['nama'];
						$phone=$i['phone'];
						$tgl_berangkat=date_format(date_create($i['tgl_berangkat']),"d-m-Y");
						$tgl_pulang=date_format(date_create($i['tgl_pulang']),"d-m-Y");
						$lokasi_tujuan=$i['lokasi_tujuan'];
						$acara=$i['acara'];
						$tempat_penjemputan=$i['penjemputan'];
						$jam_penjemputan=$i['jam_penjemputan'];
						$tarif_sewa=$i['tarif_sewa'];
						$jumlah_bus=$i['jumlah_bus'];
						$total_sewa=$i['tarif_sewa']*$i['jumlah_bus'];
						?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $no_pesan;?></td>
						<td><?php echo $nama;?></td>
						<td><?php echo $phone;?></td>
						<td><?php echo $tgl_berangkat;?></td>
						<td><?php echo $tgl_pulang;?></td>
						<td><?php echo $lokasi_tujuan;?></td>
						<td><?php echo $acara;?></td>
						<td><?php echo $tempat_penjemputan;?></td>
						<td><?php echo $jam_penjemputan;?></td>
						<td align="right"><?php echo number_format($tarif_sewa,0,',','.');?></td>
						<td align="center"><?php echo $jumlah_bus;?></td>
						<td align="right"><?php echo number_format($total_sewa,0,',','.');?></td>
					</tr>
				<?php endforeach;?>
                </tbody>
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
