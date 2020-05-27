
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
        Cabang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cabang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Cabang</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
					<th style="width:100px;">#</th>
					<th>Cabang</th>
					<th>Alamat</th>
					<th>Kontak</th>  
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
					foreach ($data->result_array() as $i) :
						$no++;
						$id=$i['id'];
						$cabang=$i['cabang'];
						$alamat=$i['alamat'];
						$kontak=$i['kontak'];
											
						?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $cabang;?></td>
						<td><?php echo $alamat;?></td>
						<td><?php echo $kontak;?></td>
						<td style="text-align:right;">
						<a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span style="color:blue" class="fa fa-pencil"></span></a>
						<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span style="color:red" class="fa fa-trash"></span></a>
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
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Add Cabang</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url().'admin/Cabang/simpan_Cabang'?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
						
				<div class="form-group">
					<label for="inputUserName" class="col-sm-4 control-label">Cabang</label>
					<div class="col-sm-7">
						<input type="text" name="xCabang" class="form-control" id="inputUserName" placeholder="Cabang" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
					<div class="col-sm-7">
						<textarea type="text" name="xAlamat" class="form-control" id="inputUserName" placeholder="Alamat Cabang" required> </textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputUserName" class="col-sm-4 control-label">Kontak</label>
					<div class="col-sm-7">
						<textarea type="number" name="xKontak" class="form-control" id="inputUserName" required> </textarea>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> <i class="fa fa-remove"> Close</i></button>
				<button type="submit" class="btn btn-success btn-flat" id="simpan" ><i class="fa fa-check"> Simpan</i></button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php foreach ($data->result_array() as $i) :
	$id=$i['id'];
	$cabang=$i['cabang'];
	$alamat=$i['alamat'];
	$kontak=$i['kontak'];
?>
<!--Modal Edit Pengguna-->
<div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Cabang</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url().'admin/Cabang/update_Cabang'?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">
						<input type="hidden" name="kode" value="<?php echo $id;?>"/>
						<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Cabang</label>
								<div class="col-sm-7">
										<input type="text" name="xCabang" class="form-control" id="inputUserName" value="<?php echo $cabang;?>"required>
								</div>
						</div>

						<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
								<div class="col-sm-7">
									<textarea name="xAlamat" class="form-control" require> <?= $i['alamat'];?>
					  			</textarea>
								</div>
						</div>

						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Kontak</label>
							<div class="col-sm-7">
								<textarea name="xKontak" class="form-control" require> <?= $i['kontak'];?>
					  		</textarea>
							</div>
						</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> <i class="fa fa-remove"> Close</i></button>
				<button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>
	
<?php foreach ($data->result_array() as $i) :
	$id=$i['id'];
	$cabang=$i['cabang'];
	$alamat=$i['alamat'];
	$kontak=$i['kontak'];
?>
<!--Modal Hapus Pengguna-->
<div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Cabang</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url().'admin/Cabang/hapus_Cabang'?>" method="post" enctype="multipart/form-data">
			<div class="modal-body">       
					<input type="hidden" name="kode" value="<?php echo $id;?>"/> 
					<p>Apakah Anda yakin mau menghapus Data cabang <b><?php echo $cabang;?></b> ?</p>
						
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"> <i class="fa fa-remove"> Close</i></button>
				<button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
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
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Cabang Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Cabang berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Cabang Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
