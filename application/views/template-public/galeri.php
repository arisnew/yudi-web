<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Interior-Design-Responsive-Website-Templates-Edge">
    <meta name="author" content="webThemez.com">
    <title>E-SA | E-Learning SMK AL-FATHIMIYAH</title>
    <link rel="favicon" href="<?php echo base_url();?>asset/template-public/assets/images/favicon.png">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/template-public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/template-public/assets/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>asset/template-public/assets/css/bootstrap-theme.css" media="screen"> 
    <link rel="stylesheet" href="<?php echo base_url();?>asset/template-public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/template-public/assets/css/style.css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <link href="asset/template-public/assets/css/content.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" id='camera-css'  href="<?php echo base_url();?>asset/template-public/assets/css/camera.css" type="text/css" media='all'> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>asset/template-public/assets/js/html5shiv.js"></script>
<script src="<?php echo base_url();?>asset/template-public/assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="<?php echo base_url( 'welcome/index');?>"> SMK AL-FATHIMIYAH</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right mainNav">
                    <li><a href="<?php echo base_url('welcome/galeri');?>">GALERI</a></li>
                    <li><a href="<?php echo base_url('welcome/about');?>">TENTANG</a></li>
                    <li><a href="<?php echo base_url('view/home');?>">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </div>
        <header id="head">
        <div class="container">
            <div class="fluid_container">
                <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                    <div data-thumb="<?php echo base_url();?>asset/template-public/assets/images/slides/thumbs/smk1.jpg" data-src="<?php echo base_url();?>asset/template-public/assets/images/slides/smk1.jpg">
                    </div> 
                    <div data-thumb="<?php echo base_url();?>asset/template-public/assets/images/slides/thumbs/gedung.jpg" data-src="<?php echo base_url();?>asset/template-public/assets/images/slides/smk2.jpg">
                    </div>
                    <div data-thumb="<?php echo base_url();?>asset/template-public/assets/images/slides/thumbs/smk3.jpg" data-src="<?php echo base_url();?>asset/template-public/assets/images/slides/smk3.jpg">
                    </div> 
                </div>
            </div>
        </div>
    </header>
    <footer id="footer">
        <div class="container">
            <div class="social text-center">
                <a href="https://twitter.com/Yaspiyah/"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/Yaspiyah/"><i class="fa fa-facebook"></i></a>
                <a href="//banggaheriyanto@gmail.com/"><i class="fa fa-envelope-o"></i></a>
                <a href="https://www.youtube.com/Yaspiyah/"><i class="fa fa-youtube"></i></a>
                <a href="http://www.alfathimiyah.com/"><i class="fa fa-desktop"></i></a>
                <a href="http://mobile.alfathimiyah.com/"><i class="fa fa-mobile"></i></a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="footer2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 panel">
                        <div class="panel-body">
                            <p class="simplenav">

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 panel">
                        <div class="panel-body">
                            <p class="text-right">
                                Copyright &copy; 2017. yudi_srilaksono <a href="" rel="develop">Fasilkom Unsika</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>asset/template-public/assets/js/modernizr-latest.js"></script> 
<script type='text/javascript' src='<?php echo base_url();?>asset/template-public/assets/js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>asset/template-public/assets/js/fancybox/jquery.fancybox.pack.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>asset/template-public/assets/js/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>asset/template-public/assets/js/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='<?php echo base_url();?>asset/template-public/assets/js/camera.min.js'></script> 
<script src="<?php echo base_url();?>asset/template-public/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>asset/template-public/assets/js/custom.js"></script>
<script>
   jQuery(function(){

    jQuery('#camera_wrap_4').camera({
        height: '600',
        loader: 'bar',
        pagination: false,
        thumbnails: false,
        hover: false,
        opacityOnGrid: false,
        imagePath: '<?php echo base_url();?>asset/template-public/assets/images/'
    });

});
</script>

</body>
</html>
