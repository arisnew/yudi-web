<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo (isset($_TITLE))? $_TITLE : '';?></title>
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
<!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/fileinput.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/jquery.countdown.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/datepicker.css">
	<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="<?php echo base_url();?>" class="logo">
				<span class="logo-mini"><b>E-</b>SA</span>
				<span class="logo-lg"><b>E-</b>SMK Al-Fathimiyah</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url('asset/img/upload/' . $this->session->userdata('_IMG'));?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $this->session->userdata('_NAME');?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url('asset/img/upload/' . $this->session->userdata('_IMG'));?>" class="img-circle" alt="User Image">
									<p>
										<?php echo $this->session->userdata('_NAME');?>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat" onclick="loadContent(base_url + 'view/_profile')">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url('logout');?>" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url('asset/img/upload/' . $this->session->userdata('_IMG'));?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo $this->session->userdata('_NAME');?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<?php $this->load->view('template/_menu_' . strtolower($this->session->userdata('_LEVEL')));?>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<div id="dinamic-content">
				<?php echo (isset($_CONTENT))? $_CONTENT : '';?>
			</div>
		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1
			</div>
			<strong>Copyright &copy; 2017.</strong> 
		</footer>
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>asset/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url();?>asset/js/function.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>asset/js/fileinput.min.js"></script>
<script src="<?php echo base_url();?>asset/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.countdown.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.plugin.js"></script>
<script src="<?php echo base_url();?>asset/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		<?php echo (isset($_EXTRA_JS))? $_EXTRA_JS : '';?>
	});

</script>
</body>
</html>
