
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
        Order List
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
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
            $id_pesan=$i['id_pesan'];
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
						<td style="text-align:right;">
						<a class="btn" data-toggle="modal" data-target="#detailModal<?php echo $id_pesan;?>"><span style="color:blue">Detail</span></a>
						</td>
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

<!--Modal Detail Order-->

	<?php foreach ($payment->result_array() as $i) :
    $id_pesan=$i['id_pesan'];
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
		$jmlh_byr=$i['jumlah_bayar'];
	?>

<div class="modal fade" id="detailModal<?php echo $id_pesan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Detail Order</h4>
        </div>
				
        <form class="form-horizontal" action="<?php echo base_url().'admin/laporanA5/'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No. Order</label>
                  <div class="col-sm-7">
											<input type="hidden" name="id_pesan" value="<?php echo $id_pesan;?>"/>
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $no_pesan;?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Pelanggan</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $nama;?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Acara</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $acara;?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Lokasi Tujuan</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $lokasi_tujuan;?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tgl. Berangkat</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $tgl_berangkat;?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Besar Sewa</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo number_format($tarif_sewa,0,',','.');?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jumlah Bus</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $jumlah_bus;?>" disabled>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Total Sewa</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo number_format($total_sewa,0,',','.');?>" disabled>
                  </div>
              </div>

							<?php
								$query = $this->db->query("select id_pesan, sum(jumlah_bayar) as total from pembayaran where id_pesan='$id_pesan' group by id_pesan");
								foreach ($query->result() as $row)
								$total = $row->total;
								$sisatagihan = $total_sewa - $row->total;
							?>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Sudah Dibayar</label>
                  <div class="col-sm-7">
										<input type="text" name="total" class="form-control" id="total"value="<?php echo number_format($total,0,',','.');?>" disabled>
											<input type="hidden" name="total" value="<?php echo $total;?>"/>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Sisa Tagihan</label>
                  <div class="col-sm-7">
                      <input type="text" name="sisatagihan" class="form-control" id="inputUserName"value="<?php echo number_format($sisatagihan,0,',','.');?>" disabled>
												<input type="hidden" name="sisatagihan" value="<?php echo $sisatagihan;?>"/>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> <i class="fa fa-remove"> Close</i></button>
              <button type="submit" class="btn btn-success btn-flat" id="simpan" ><i class="fa fa-check"> Cetak Invoice</i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php endforeach;?>

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
