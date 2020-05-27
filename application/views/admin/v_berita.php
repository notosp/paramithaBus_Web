<!--Counter Inbox-->
<!DOCTYPE html>
<html>
<?php $this->load->view('template/backend/head')?>
  
	<?php 
		function limit_words($string, $word_limit){
				$words = explode(" ",$string);
				return implode(" ",array_splice($words,0,$word_limit));
		}			
	?>
	
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
        Post Lists
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Post</a></li>
        <li class="active">Lists</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" href="<?php echo base_url().'admin/berita/add_berita'?>"><span class="fa fa-plus"></span> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
									<th>Gambar</th>
									<th>Judul</th>
									<th>Tanggal</th>
									<th>Author</th>
									<th>Baca</th>
									<th>Kategori</th>  
									<th style="text-align:right;">Aksi</th>
                </tr>
                </thead>

                <tbody>
          				<?php
									$no=0;
									foreach ($data->result_array() as $i) :
										$no++;
										$id_berita=$i['id_berita'];
										$judul_berita=$i['judul_berita'];
										$isi_berita=$i['isi_berita'];
										$tanggal_berita=$i['tanggal'];
										$author_berita=$i['author_berita'];
										$gambar_berita=$i['gambar_berita'];
										$views_berita=$i['views_berita'];
										$kategori_id=$i['kategori_id_berita'];
										$kategori_nama=$i['kategori_nama_berita'];
									?>
                <tr>
                  <td><img src="<?php echo base_url().'assets/images/'.$gambar_berita;?>" style="width:90px;"></td>
                  <td><?php echo $judul_berita;?></td>
                  
        				  <td><?php echo $tanggal_berita;?></td>
        				  <td><?php echo $author_berita;?></td>
        				  <td><?php echo $views_berita;?></td>
        				  <td><?php echo $kategori_nama;?></td>
                  <td style="text-align:right;">
									<a class="btn" href="<?php echo base_url().'admin/berita/get_edit/'.$id_berita;?>"><span style="color:blue" class="fa fa-pencil"></span></a>
									<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_berita;?>"><span style="color:red" class="fa fa-trash"></span></a>
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


	
	<?php foreach ($data->result_array() as $i) :
              $id_berita=$i['id_berita'];
              $judul_berita=$i['judul_berita'];
              $gambar_berita=$i['gambar_berita'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id_berita;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/berita/hapus_berita'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id_berita;?>"/> 
                     <input type="hidden" value="<?php echo $gambar_berita;?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $judul_berita;?></b> ?</p>
                               
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
                    text: "Berita Berhasil disimpan ke database.",
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
                    text: "Berita berhasil di update",
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
                    text: "Berita Berhasil dihapus.",
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
