
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
        About Paramitha Bus 
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Paramitha Bus</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add About</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover">
                <thead>
                <tr>
					<th>Gambar</th>
					<th>Nama PO</th>
					<th>Tentang</th>
					<th>Alamat</th>
					<th>Phone</th>
					<!-- <th>Facebook</th>
					<th>Instagram</th>
					<th>Twitter</th> -->
                	<th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
				<tbody>
				<?php
					$no=0;
					foreach ($data1->result_array() as $i) :
					$no++;
					$gambar=$i['gambar'];
					$id_about=$i['id_about'];
					$nama_po=$i['nama_po'];
					$about=$i['about'];
					$alamat=$i['alamat'];
					$phone=$i['phone'];
					$fb=$i['fb'];
					$ig=$i['ig'];
					$twitter=$i['twitter'];
					$layanan=$i['layanan']
				?>
                <tr>
					<td><img src="<?php echo base_url().'assets/images/'.$gambar;?>" style="width:80px;"></td>
					<td><?php echo $nama_po;?></td>
					<td><?php echo $about;?></td>
					<td><?php echo $alamat;?></td>
					<td><?php echo $phone;?></td>
					<td style="text-align:center;">
					<a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id_about;?>"><span style="color:blue" class="fa fa-pencil"></span></a>
					<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_about;?>"><span style="color:red" class="fa fa-trash"></span></a>
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
  <!-- /.content-wrapper -->

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">About Paramitha Bus</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/about/simpan_about'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">     
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama PO</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama PO" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tentang</label>
                  <div class="col-sm-7">
                      <textarea type="text" name="xtentang" class="form-control" id="inputUserName" required>
                      </textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-7">
                      <input type="text" name="xalamat" class="form-control" id="inputUserName" placeholder="Alamat" required>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Telp</label>
                  <div class="col-sm-7">
                      <textarea type="text" name="xnotlp" class="form-control" id="inputUserName" placeholder="No Telp" required>
					  </textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Facebook</label>
                  <div class="col-sm-7">
                      <input type="text" name="xfb" class="form-control" id="inputUserName" placeholder="Facebook" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Instagram</label>
                  <div class="col-sm-7">
                      <input type="text" name="xig" class="form-control" id="inputUserName" placeholder="Instagram" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Twitter</label>
                  <div class="col-sm-7">
                      <input type="text" name="xtwit" class="form-control" id="inputUserName" placeholder="Twitter" required>
                  </div>
              </div>
			  <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Layanan</label>
                  <div class="col-sm-7">
                      <textarea type="text" name="xlayanan" class="form-control" id="inputUserName" required>
                      </textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
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

 <!--Modal Edit Album-->
 <?php foreach ($data1->result_array() as $i) :
     $gambar=$i['gambar'];
     $id_about=$i['id_about'];
     $nama_po=$i['nama_po'];
     $tentang=$i['about'];
     $alamat=$i['alamat'];
     $phone=$i['phone'];
     $fb=$i['fb'];
     $ig=$i['ig'];
	 $twitter=$i['twitter'];
	 $layanan=$i['layanan'];
  ?>

<div class="modal fade" id="ModalEdit<?php echo $id_about;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                  <h4 class="modal-title" id="myModalLabel">Edit About</h4>
              </div>

          <form class="form-horizontal" action="<?php echo base_url().'admin/about/update_about'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

          <input type="hidden" name="kode" value="<?php echo $id_about;?>"/> 

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama PO</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName"value="<?php echo $nama_po;?>" placeholder="Nama PO" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Tentang</label>
                  <div class="col-sm-7">
					  <textarea name="xtentang" class="form-control" require> <?= $i['about'];?>
					  </textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-7">
                      <input type="text" name="xalamat"value="<?php echo $alamat;?>" class="form-control" id="inputUserName" placeholder="Alamat" required>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">No Telp</label>
                  <div class="col-sm-7">
					  <textarea name="xnotlp" class="form-control" require> <?= $i['phone'];?>
					  </textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Facebook</label>
                  <div class="col-sm-7">
                      <input type="text" name="xfb" class="form-control" id="inputUserName"value="<?php echo $fb;?>" placeholder="Facebook" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Instagram</label>
                  <div class="col-sm-7">
                      <input type="text" name="xig" class="form-control" id="inputUserName"value="<?php echo $ig;?>" placeholder="Instagram" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Twitter</label>
                  <div class="col-sm-7">
                      <input type="text" name="xtwit" class="form-control" id="inputUserName"value="<?php echo $twitter;?>" placeholder="Twitter" required>
                  </div>
              </div>

			  <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Layanan</label>
                  <div class="col-sm-7">
                      <textarea name="xlayanan" class="form-control" require> <?= $i['layanan'];?>
					  </textarea>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                      <input type="file" name="filefoto"/>
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


	<?php foreach ($data1->result_array() as $i) :
    $id_about=$i['id_about'];
    $nama_po=$i['nama_po'];
    $about=$i['about'];
    $alamat=$i['alamat'];
    $phone=$i['phone'];
    $fb=$i['fb'];
    $ig=$i['ig'];
    $twitter=$i['twitter'];
  ?>
	<!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $id_about;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url().'admin/about/hapus_about'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">       
              <input type="hidden" name="kode" value="<?php echo $id_about;?>"/> 
              <input type="hidden" value="<?php echo $gambar;?>" name="gambar">
              <p>Apakah Anda yakin mau menghapus Data<b><?php echo $nama_po;?></b> ?</p>
                        
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
                    text: "Data Berhasil disimpan ke database.",
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
                    text: "Data berhasil di update",
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
                    text: "Data Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php else:?>
    <?php endif;?>
</body>
</html>
