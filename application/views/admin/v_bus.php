<!--Counter Inbox-->
<!DOCTYPE html>
<html>
<?php $this->load->view('template/backend/head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('admin/v_header')?>
  <aside class="main-sidebar">
    <?php $this->load->view('template/backend/sidebar')?>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data bus
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">bus</a></li>
        <li class="active">Data bus</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Bus</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
									<tr>
									<th>Photo</th>
									<!-- <th>Kode Bus</th> -->
									<th>No Polisi</th>
									<th>Jumlah Kursi</th>
									<th>Jenis Bus</th>
									<th>No Uji</th>
									<th>No KPS</th>
									<th>No Mesin</th>
									<th>No Angka</th>
									<th>Merek</th>
									<th>Pemilik</th>
									<th style="text-align:center;">Aksi</th>
									</tr>
                </thead>
								<tbody>
									<?php foreach ($data->result_array() as $i) :
									$kodebus=$i['kode_bus'];
									$nouji=$i['no_uji'];
									$nokps=$i['no_kps'];
									$nopolisi=$i['no_polisi'];
									$jumkursi=$i['jumlah_kursi'];
									$jenisbus=$i['jenis_bus'];
									$nomesin=$i['no_mesin'];
									$noangka=$i['no_angka'];
									$merek=$i['merk_type'];
									$pemilik=$i['pemilik'];
									$photo=$i['photo_bus'];
									?>
									<tr>
										<td>
										<img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/'.$photo;?>"></td>
										<!-- <td><?php echo $kodebus;?></td> -->
										<td><?php echo $nopolisi;?></td>
										<td><?php echo $jumkursi;?></td>
										<td><?php echo $jenisbus;?></td>
										<td><?php echo $nouji;?></td>
										<td><?php echo $nokps;?></td>
										<td><?php echo $nomesin;?></td>
										<td><?php echo $noangka;?></td>
										<td><?php echo $merek?></td>
										<td><?php echo $pemilik?></td>
										<td style="text-align:right;">
										<a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $kodebus;?>"><span style="color:blue" class="fa fa-pencil"></span></a>
										<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $kodebus;?>"><span style="color:red" class="fa fa-trash"></span></a>
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
      </div>
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('template/backend/footer')?>
  <div class="control-sidebar-bg"></div>
  </div>

<!--Modal Add bus-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Add bus</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'admin/bus/simpan_bus'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Kode Bus</label>
                  <div class="col-sm-7">
                      <input type="text" name="xkodebus" class="form-control" id="inputNik" placeholder="Kode bus" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Polisi</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnopolisi" class="form-control" id="inputUserName" placeholder="No Polisi" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jumlah Kursi</label>
                  <div class="col-sm-7">
                      <input type="number" name="xjumkursi" class="form-control" id="inputUserName" placeholder="Jumlah Kursi" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Bus</label>
                  <div class="col-sm-7">
                      <input type="text" name="xjenisbus" class="form-control" id="inputUserName" placeholder="Jenis Bus" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Uji</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnouji" class="form-control" id="inputUserName" placeholder="No Uji" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tgl Akhir Uji</label>
                  <div class="col-sm-7">
                      <input type="date" name="xtglakhiruji" class="form-control" id="inputUserName" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No KPS</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnokps" class="form-control" id="inputUserName" placeholder="No KPS" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tgl Akhir KPS</label>
                  <div class="col-sm-7">
                      <input type="date" name="xtglakhirkps" class="form-control" id="inputUserName" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Mesin</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnomesin" class="form-control" id="inputUserName" placeholder="No Mesin" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Angka</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnoangka" class="form-control" id="inputUserName" placeholder="No Angka" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Merk Bus</label>
                  <div class="col-sm-7">
                      <input type="text" name="xmerkbus" class="form-control" id="inputUserName" placeholder="Merk Bus" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Pemilik</label>
                  <div class="col-sm-7">
                      <input type="text" name="xpemilik" class="form-control" id="inputUserName" placeholder="Pemilik" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                      <input type="file" name="filefoto" required/>
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
$kodebus=$i['kode_bus'];
$nouji=$i['no_uji'];
$tglakhiruji=$i['tgl_akhir_uji'];
$nokps=$i['no_kps'];
$tglakhirkps=$i['tgl_akhir_kps'];
$nopolisi=$i['no_polisi'];
$jumkursi=$i['jumlah_kursi'];
$jenisbus=$i['jenis_bus'];
$nomesin=$i['no_mesin'];
$noangka=$i['no_angka'];
$merek=$i['merk_type'];
$pemilik=$i['pemilik'];
$photo=$i['photo_bus'];
?>
<!--Modal Edit bus-->
<div class="modal fade" id="ModalEdit<?php echo $kodebus;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Data BUS</h4>
            </div>

          <form class="form-horizontal" action="<?php echo base_url().'admin/bus/update_bus'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

						<input type="hidden" name="xkodebus" value="<?php echo $kodebus;?>"/>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Polisi</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnopolisi" class="form-control" id="inputUserName"value="<?php echo $nopolisi;?>" placeholder="No Polisi" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jumlah Kursi</label>
                  <div class="col-sm-7">
                      <input type="number" name="xjumkursi" value="<?php echo $jumkursi;?>" class="form-control" id="inputUserName" placeholder="Jumlah Kursi" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Bus</label>
                  <div class="col-sm-7">
                      <input type="text" name="xjenisbus" value="<?php echo $jenisbus;?>" class="form-control" id="inputUserName" placeholder="Jenis Bus" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Uji</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnouji" value="<?php echo $nouji;?>" class="form-control" id="inputUserName" placeholder="No Uji" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tgl Akhir Uji</label>
                  <div class="col-sm-7">
                      <input type="date" name="xtglakhiruji" value="<?php echo $tglakhiruji;?>" class="form-control" id="inputUserName" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No KPS</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnokps" value="<?php echo $nokps;?>" class="form-control" id="inputUserName" placeholder="No KPS" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tgl Akhir KPS</label>
                  <div class="col-sm-7">
                      <input type="date" name="xtglakhirkps" value="<?php echo $tglakhirkps;?>" class="form-control" id="inputUserName" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Mesin</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnomesin" value="<?php echo $nomesin;?>" class="form-control" id="inputUserName" placeholder="No Mesin" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Angka</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnoangka" value="<?php echo $noangka;?>" class="form-control" id="inputUserName" placeholder="No Angka" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Merk Bus</label>
                  <div class="col-sm-7">
                      <input type="text" name="xmerkbus" value="<?php echo $merek;?>" class="form-control" id="inputUserName" placeholder="Merk Bus" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Pemilik</label>
                  <div class="col-sm-7">
                      <input type="text" name="xpemilik" value="<?php echo $pemilik;?>" class="form-control" id="inputUserName" placeholder="Pemilik" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                      <input type="file" name="filefoto" required/>
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
<?php endforeach;?>

<?php foreach ($data->result_array() as $i) :
  $kodebus=$i['kode_bus'];
	$nouji=$i['no_uji'];
	$nokps=$i['no_kps'];
	$nopolisi=$i['no_polisi'];
	$jumkursi=$i['jumlah_kursi'];
	$jenisbus=$i['jenis_bus'];
	$nomesin=$i['no_mesin'];
	$noangka=$i['no_angka'];
	$merek=$i['merk_type'];
	$pemilik=$i['pemilik'];
	$photo=$i['photo_bus'];
?>

<!--Modal Hapus bus-->
<div class="modal fade" id="ModalHapus<?php echo $kodebus;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Data BUS</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'admin/bus/hapus_bus'?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">       
        <input type="hidden" name="kode" value="<?php echo $kodebus;?>"/> 
        <p>Yakin menghapus data BUS dengan No Polisi <b><?php echo $nopolisi;?></b> ?</p>              
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

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
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
	
  <?php elseif($this->session->flashdata('msg')=='warning'):?>
    <script type="text/javascript">
            $.toast({
                heading: 'Warning',
                text: "Gambar yang Anda masukan terlalu besar.",
                showHideTransition: 'slide',
                icon: 'warning',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#FFC017'
            });
    </script>
  <?php elseif($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
      $.toast({
          heading: 'Success',
          text: "bus Berhasil disimpan ke database.",
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
          text: "bus berhasil di update",
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
          text: "bus Berhasil dihapus.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#7EC857'
      });
    </script>
  <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
    <script type="text/javascript">
            $('#ModalResetPassword').modal('show');
    </script>
  <?php else:?>
  <?php endif;?>
</body>
</html>
