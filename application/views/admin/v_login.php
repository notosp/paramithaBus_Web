<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Paramitha Bus | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?= base_url('assets')?>/bus.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/square/blue.css'?>">
</head>

<body class="hold-transition login-page">
<div class="login-box">
	<div>
   <p><?php echo $this->session->flashdata('msg');?></p>
  </div>
	<div class="login-logo">
    <a href="../../index2.html"><b>PO.</b> PARAMITHA</a>
  </div>
  <div class="login-box-body">
	<p class="login-box-msg">Sign in to start your session</p>
    <form action="<?php echo base_url().'administrator/auth'?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>

    <hr/>
    <p><center>Copyright <?php echo '2019'?> Paramitha Bus <br/> All Right Reserved</center></p>
  </div>
</div>
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
