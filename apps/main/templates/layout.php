<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

        <!-- Title -->
        <title>DKRTH Surabaya</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="../assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">

</head>
<body>

            <div id="body-bg">
            <!-- Phone/Email -->
            <div id="pre-header" class="background-gray-lighter">
                <div class="container no-padding">
                    <div class="row hidden-xs">
                        <div class="col-sm-6 padding-vert-5">
                            <strong>Telp:</strong>&nbsp;(031-1234567)
                        </div>
                        <div class="col-sm-6 text-right padding-vert-5">
                            <strong>Email:</strong>&nbsp;dkrth@gmail.com (?)
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Phone/Email -->
            <!-- Header -->
            <div id="header" style="height: 200px">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <?php echo link_to(image_tag('/images/logo_header_fix.png', array('alt'=>'Logo', 'style'=>'height: 160px')), 'home')?>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <div class="container no-padding border-bottom">
                    <div class="row">
                        <div class="col-md-8 no-padding">
                            <div class="visible-lg">
                                <ul id="hornavmenu" class="nav navbar-nav">
                                    <li>
                                        <?php echo link_to('<i class="fa fa-fw fa-home active"></i> Home', 'home')?>
                                    </li>
                                    <li class="parent">
                                        <span class="fa-gears">Kompetisi</span>
                                        <ul>
                                            <li>
                                                <?php echo link_to('<i class="fa fa-fw fa-trash-o"></i> Lomba', 'lomba')?>
                                            </li>
                                            <li>
                                                <?php echo link_to('<i class="fa fa-fw fa-smile-o"></i> Peserta', 'pesertaLomba')?>
                                            </li>
                                            <li>
                                                <?php echo link_to('<i class="fa fa-fw fa-users"></i> Prestasi', 'prestasi')?>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="parent">
                                        <span class="fa-user">Peserta</span>
                                        <ul>
                                            <li>
                                                <?php echo link_to('<i class="fa fa-fw fa-users"></i> Tim (RT/RW)', 'peserta')?>
                                            </li>                                    
                                            <li>
                                                <?php echo link_to('<i class="fa fa-fw fa-home"></i> Anggota Tim', 'anggotaLomba')?>
                                            </li>
                                            <li>
                                                <?php echo link_to('<i class="fa fa-fw fa-bank"></i> Galeri Tim (Foto)', 'dataLomba')?>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
					<?php echo link_to('<i class="fa fa-fw fa-users"></i> Pengguna', 'pengguna')?>
                                    </li>
                                    <li>
					<?php echo link_to('<i class="fa fa-fw fa-smile-o"></i> Wilayah', 'wilayah')?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 no-padding">
                            <ul class="social-icons pull-right">
                                <li class="social-rss">
                                    <a href="#" target="_blank" title="RSS"></a>
                                </li>
                                <li class="social-twitter">
                                    <a href="#" target="_blank" title="Twitter"></a>
                                </li>
                                <li class="social-facebook">
                                    <a href="#" target="_blank" title="Facebook"></a>
                                </li>
                                <li class="social-googleplus">
                                    <a href="#" target="_blank" title="Google+"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->

            
<?php echo $sf_data->getRaw('sf_content') ?>

</body>
            <!-- JS -->
            <script type="text/javascript" src="../assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="../assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="../assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="../assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="../assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="../assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="../assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="../assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
    
</html>
