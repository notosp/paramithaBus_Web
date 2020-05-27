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
        Data karyawan
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">karyawan</a></li>
        <li class="active">Data karyawan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Add karyawan</a>
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
				          	<th>Foto</th>
				          	<th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Level</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				        <?php foreach ($data->result_array() as $i) :
                    $nik=$i['nik'];
                    $nama=$i['nama'];
                    $jenkel=$i['jk'];
										$email=$i['email'];
										$alamat=$i['alamat'];
                    $username=$i['username'];
                    $password=$i['pass'];
                    $nohp=$i['nohp'];
										$karyawan_level=$i['karyawan_level'];
										$levell=$i['levell'];
                    $id_cabang=$i['id_cabang'];
                    $photo=$i['photo'];
                  ?>
                <tr>
                  <td>
                  <img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/'.$photo;?>"></td>
                  <td><?php echo $nik;?></td>
                  <td><?php echo $nama;?></td>
                  <?php if($jenkel=='L'):?>
                  <td>Laki-Laki</td>
                  <?php else:?>
                  <td>Perempuan</td>
                  <?php endif;?>
                  <td><?php echo $alamat;?></td>
                  <td><?php echo $nohp;?></td>
									<td><?php echo $levell?></td>

                  <td style="text-align:right;">
                    <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $nik;?>"><span style="color:blue" class="fa fa-pencil"></span></a>

                    <!-- <a class="btn" href="<?php echo base_url().'admin/karyawan/reset_password/'.$nik;?>"><span class="fa fa-refresh"></span></a> -->

                    <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $nik;?>"><span style="color:red" class="fa fa-trash"></span></a>
                  </td>
                </tr>
				        <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('template/backend/footer')?>
  <div class="control-sidebar-bg"></div>
  </div>

<!--Modal Add karyawan-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Add karyawan</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'admin/karyawan/simpan_karyawan'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">NIK</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnik" class="form-control" id="inputNik" placeholder="NIK Karyawan" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-7">
                      <input type="email" name="xemail" class="form-control" id="inputEmail3" placeholder="Email" required>
                  </div>
              </div>

							<div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-7">
                      <input type="text" name="xalamat" class="form-control" id="inputUserName" placeholder="Alamat" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                      <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                          <label for="inlineRadio1"> Laki-Laki </label>
                      </div>
                      <div class="radio radio-info radio-inline">
                          <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                          <label for="inlineRadio2"> Perempuan </label>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-7">
                      <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-7">
                      <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                  <div class="col-sm-7">
                      <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                  <div class="col-sm-7">
                      <input type="text" name="xkontak" class="form-control" id="inputUserName" placeholder="Kontak Person" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-7">
                      <select class="form-control" name="xlevel" required>
                         <option value="">-Pilih-</option>
														<?php
														$no=0;
														foreach ($lev->result_array() as $a) :
														$no++;
															$lev_id=$a['id'];
															$lev_nama=$a['levell'];					
														?>
														<option value="<?php echo $lev_id;?>"><?php echo $lev_nama;?>
														</option>
														<?php endforeach;?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Cabang</label>
                  <div class="col-sm-7">
                      <select class="form-control" name="xcabang" required>
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
  $nik=$i['nik'];
  $nama=$i['nama'];
  $jenkel=$i['jk'];
  $alamat=$i['alamat'];
  $username=$i['username'];
  $password=$i['pass'];
  $email=$i['email'];
  $nohp=$i['nohp'];
  $karyawan_level=$i['karyawan_level'];
  $id_cabang=$i['id_cabang'];
  $photo=$i['photo'];
?>
<!--Modal Edit karyawan-->
<div class="modal fade" id="ModalEdit<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit karyawan</h4>
            </div>

          <form class="form-horizontal" action="<?php echo base_url().'admin/karyawan/update_karyawan'?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                  <input type="hidden" name="kode" value="<?php echo $nik;?>"/> 
                  <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $nama;?>" placeholder="Nama Lengkap" required>
                  </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-7">
                  <input type="email" name="xemail" class="form-control" value="<?php echo $email;?>" id="inputEmail3" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                  <?php if($jenkel=='L'):?>
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                        <label for="inlineRadio1"> Laki-Laki </label>
                    </div>

                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                        <label for="inlineRadio2"> Perempuan </label>
                    </div>

                  <?php else:?>
                  <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                    <label for="inlineRadio1"> Laki-Laki </label>
                  </div>
                    <div class="radio radio-info radio-inline">
                        <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                        <label for="inlineRadio2"> Perempuan </label>
                    </div>
                  <?php endif;?>
                  </div>
              </div>

							<div class="form-group">
                <label for="inputAlamat" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-7">
                    <input type="text" name="xalamat" class="form-control" value="<?php echo $alamat;?>" id="inputAlamat" placeholder="alamat" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-7">
                    <input type="text" name="xusername" class="form-control" value="<?php echo $username;?>" id="inputUserName" placeholder="Username" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" name="xpassword" class="form-control" id="inputPassword5" placeholder="Password">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                <div class="col-sm-7">
                    <input type="password" name="xpassword2" class="form-control" id="inputPassword6" placeholder="Ulangi Password">
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
                <div class="col-sm-7">
                  <input type="text" name="xkontak" class="form-control" value="<?php echo $nohp;?>" id="inputUserName" placeholder="Kontak Person" required>
                </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="xlevel" required>
                     <option value="">-Pilih-</option>
                     <?php
											foreach ($lev->result_array() as $a) {
												$lev_id=$a['id'];
												$lev_nama=$a['levell'];
												if($id_level==$lev_id)
													echo "<option value='$lev_id' selected>$lev_nama</option>";
												else
													echo "<option value='$lev_id'>$lev_nama</option>";
											}?>
                    </select>
                </div>
              </div>

              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Id Cabang</label>
                  <div class="col-sm-7">
                    <select class="form-control" name="xcabang" required>
                    <option value="">-Pilih-</option>
                     <?php
											foreach ($cab->result_array() as $a) {
												$cab_id=$a['id'];
												$cab_nama=$a['cabang'];
												if($id_cabang==$cab_id)
													echo "<option value='$cab_id' selected>$cab_nama</option>";
												else
													echo "<option value='$cab_id'>$cab_nama</option>";
											}?>
                    </select>
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
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>
          </form>
        </div>
    </div>
</div>
<?php endforeach;?>

<?php foreach ($data->result_array() as $i) :
  $nik=$i['nik'];
  $nama=$i['nama'];
  $jenkel=$i['jk'];
  $jenkel=$i['alamat'];
  $email=$i['email'];
  $username=$i['username'];
  $password=$i['pass'];
  $nohp=$i['nohp'];
  $karyawan_level=$i['karyawan_level'];
  $id_cabang=['id_cabang'];
  $photo=$i['photo'];
?>

<!--Modal Hapus karyawan-->
<div class="modal fade" id="ModalHapus<?php echo $nik;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus karyawan</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'admin/karyawan/hapus_karyawan'?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">       
        <input type="hidden" name="kode" value="<?php echo $nik;?>"/> 
        <p>Yakin menghapus data karyawan <b><?php echo $nama;?></b> ?</p>              
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
	
<!--Modal Reset Password-->
<!-- <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
      </div>
        
      <div class="modal-body"> 
        <table>
          <tr>
            <th style="width:120px;">Username</th>
            <th>:</th>
            <th><?php echo $this->session->flashdata('uname');?></th>
          </tr>
          <tr>
            <th style="width:120px;">Password Baru</th>
            <th>:</th>
            <th><?php echo $this->session->flashdata('upass');?></th>
          </tr>
        </table>                                       
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->


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
	var inputPassword3 = document.getElementById("inputPassword3"),
	inputPassword4 = document.getElementById("inputPassword4");

function validatePassword(){
  if(inputPassword3.value != inputPassword4.value) {
    inputPassword4.setCustomValidity("Passwords Tidak Sama");
  } else {
    inputPassword4.setCustomValidity('');
  }
}

inputPassword3.onchange = validatePassword;
inputPassword4.onkeyup = validatePassword;
</script>
<!-- ============== -->
<script>
	var inputPassword5 = document.getElementById("inputPassword5"),
	inputPassword6 = document.getElementById("inputPassword6");

function validatePassword(){
  if(inputPassword5.value != inputPassword6.value) {
    inputPassword6.setCustomValidity("Passwords Tidak Sama");
  } else {
    inputPassword6.setCustomValidity('');
  }
}

inputPassword5.onchange = validatePassword;
inputPassword6.onkeyup = validatePassword;
</script>

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
          text: "karyawan Berhasil disimpan ke database.",
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
          text: "karyawan berhasil di update",
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
          text: "karyawan Berhasil dihapus.",
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
