<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GESTIONER| LOGIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/square/blue.css'?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#" target="_blank"><b>GESTIONER</b></a>
  </div>
  <?php
  $username = array('name' => 'username', 'placeholder' => 'Nombre de usuario', 'class' => 'form-control', 'value'=>set_value('username'));
  
  $password = array('name' => 'password', 'placeholder' => 'introduce tu password', 'class' => 'form-control');
  $submit = array('name' => 'submit', 'value' => 'INGRESAR', 'title' => 'Iniciar sesión', 'class' => 'btn btn-primary btn-block btn-flat');
  ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">LOGIN</p>
                  <? if(validation_errors()) { ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    Por favor, verifique los campos requeridos o con error e intente nuevamente.
                  </div>
                  <? } ?>

          <?=form_open(base_url().'admin/login/ingreso')?>
            <div class="form-group has-feedback">
              <?=form_input($username)?><p><?=form_error('username')?></p>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <?=form_password($password)?><p><?=form_error('password')?></p>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

              <!-- /.col -->
              <div class="col-xs-12">
                <?=form_hidden('token',$token)?>
                <?=form_submit($submit)?>
              </div>
              <!-- /.col -->
            </div>
          <?=form_close()?>
          <?php 
          if($this->session->flashdata('usuario_incorrecto'))
          {
          ?>
          <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
          <?php
          }
          ?>




  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jQuery-2.2.0.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- iCheck -->
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
