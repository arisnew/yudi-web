<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login E-LEARNING</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/login.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">
	<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div id="content">
        <div class="col-md-12" style="background-color:rgba(200,200,200,0.6); color: gray">
            <div class="container">
                <h1>SELAMAT DATANG ... </h1>
                <p>Selamat datang di website E-Learning SMK AL-FATHIMIYAH</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 pull-right" style="padding-top: 50px ">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">E-SA | E-Learning SMK AL-FATHIMIYAH </h3>
                        </div>
                        <div class="panel-body">
                            <dir id="loading"></dir>
                            <form role="form" metode="post" id="login-form">
                                <fieldset>                            
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" id="username-input" name="username-input" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" id="password-input" name="password-input" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="type-input" name="type-input">
                                            <option value="Siswa">Siswa</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Admin" selected="">Admin</option>
                                        </select>
                                    </div>
                                    <input type="submit" value="Login" class="btn btn-lg btn-success btn-block" onclick="proses_login(); return false;">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo base_url();?>asset/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>asset/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>asset/dist/js/app.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url();?>asset/js/function.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
       <?php echo (isset($_EXTRA_JS))? $_EXTRA_JS : '';?>
   });

      function proses_login() {
        loading('loading',true);
        setTimeout(function() {
            $.ajax({
                url: base_url + 'login',
                data: $("#login-form").serialize(),
                dataType: 'json',
                type: 'POST',
                cache: false,
                success: function(json) {
                    loading('loading',false);
                    if (json['data'].code === 1) {
                       alert('Login Berhasil');
                       window.location = '<?php echo base_url('view/home');?>'
                   } else if(json['data'].code === 2){
                    alert("Username tidak dikenal atau tidak aktif");
                    $("#username-input").focus();
                } else if(json['data'].code === 3){
                    alert('Password salah!!! Periksa Password Anda');
                } else{
                    alert(json['data'].message);
                }
            },
            error: function () {
                loading('loading',false);
                alert('Terjadi kesalahan');
            }
        });
        }, 1000);
    }
    </script>
</body>
</html>
