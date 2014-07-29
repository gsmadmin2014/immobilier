<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aviators - byaviators.com">

    
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/LogoGSM.png" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/realia-blue.css" type="text/css" id="color-variant-default">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" type="text/css" id="color-variant-default">
    <link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="#" type="text/css" id="color-variant">


    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.ezmark.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.currency.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/retina.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/carousel.js"></script>
<!--    <script type="text/javascript" src="<?php echo base_url();?>assets/js/gmap3.min.js"></script>-->
<!--    <script type="text/javascript" src="<?php echo base_url();?>assets/js/gmap3.infobox.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/libraries/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/realia.js"></script>
    <title>Immobilier</title>
</head>
<body>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li><a href="<?php echo site_url('');?>">Home</a></li>
                            </ul><!-- /.breadcrumb -->

                            
                            <?php if (!is_connected()) { ?>
                            <div class="account pull-right">
                                <ul class="nav nav-pills">
                                    <li><a href="<?php echo site_url('user/login');?>">Login</a></li>
                                    <li><a href="<?php echo site_url('user/register');?>">Registration</a></li>
                                </ul>
                            </div>
                            <?php } else {?>
                            <div class="account pull-right">
                                <ul class="nav navbar-nav nav-pills">
	                            	<li class="dropdown">
	                            		<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo display_name(); ?> <i class="caret"></i></a>
	                            		<ul class="dropdown-menu">	                               
		                                    <li>
		                                        <a tabindex="-1" href="<?php echo site_url('user/profile') ?>"><i class="fa fa-user"></i> Profile</a>
		                                    </li>
		                                    <li>
		                                        <a tabindex="-1" href="<?php echo site_url('admin'); ?>"><i class="fa fa-gear"></i> Admin</a>
		                                    </li>
		                                    <li class="divider"></li>
		                                    <li>
		                                        <a tabindex="-1" href="<?php echo site_url('user/logout'); ?>"><i class="fa fa-power-off"></i> Sign out</a>
		                                    </li>
		                                 </ul>
		                        	</li>
	                            </ul>
	                        </div>
                            <?php } ?>
                            
                        </div><!-- /.span12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb-wrapper -->

            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="<?php echo site_url('');?>" title="Home">
                                                    <img src="<?php echo base_url();?>assets/img/LogoGSM.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

                                            <div class="site-name">
                                                <a href="<?php echo site_url('');?>" title="Home" class="brand">Scientist</a>
                                            </div><!-- /.site-name -->

                                            <div class="site-slogan">
                                                <span>Votre solution <br>immobilier</span>
                                            </div><!-- /.site-slogan -->
                                        </div><!-- /.logo-wrapper -->

                                        <div class="info">
                                            <div class="site-email">
                                                <a href="mailto:njaraef@gmail.com">Immo</a>
                                            </div><!-- /.site-email -->

                                            <div class="site-phone">
                                                <span>033-11-932-45</span>
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->

                                       
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                            <li><a href="<?php echo site_url('');?>">Homepage</a></li>
                                <!--<li class="menuparent">
                                    <span class="menuparent nolink">Homepage</span>
                                    <ul>
                                        <li><a href="<?php echo site_url('');?>">Homepage with slider</a></li>
                                        <li><a href="<?php echo site_url('page/index');?>">Homepage with map</a></li>
                                        <li><a href="<?php echo site_url('page/index-simple');?>">Simple homepage</a></li>
                                        <li><a href="<?php echo site_url('page/index-carousel');?>">Homepage with carousel</a></li>
                                    </ul>
                                </li>-->
                             <li><a href="<?php echo site_url('page/maps');?>">Maps</a></li>   
                             <li><a href="<?php echo site_url('page/listing-grid-filter');?>">Listing</a></li>   
                                <!--<li class="menuparent">
                                    <span class="menuparent nolink">Listing</span>
                                    <ul>
                                        <li><a href="<?php echo site_url('page/listing-grid');?> ">Listing grid</a></li>
                                        <li><a href="<?php echo site_url('page/listing-grid-filter');?>">Listing grid with filter</a></li>
                                        <li><a href="<?php echo site_url('page/listing-rows');?>">Listing rows</a></li>
                                        <li><a href="<?php echo site_url('page/listing-rows-filter');?>" >Listing rows with filter</a></li>
                                    </ul>
                                </li>-->
                                
                                <li><a href="<?php echo site_url('page/pricing-boxed');?>">Pricing</a></li> 
                                <!--<li class="menuparent">
                                    <span class="menuparent nolink">Pricing</span>
                                    <ul>
                                        <li><a href="<?php echo site_url('page/pricing-boxed');?>">Boxed pricing</a></li>
                                        <li><a href="<?php echo site_url('page/pricing-multiple');?>">Multiple pricing</a></li>
                                        <li><a href="<?php echo site_url('page/pricing-simple');?>">Simple Pricing</a></li>
                                    </ul>
                                </li>-->
                                <li><a href="<?php echo site_url('page/contact-us');?>">Contact Us</a></li>
                                
                                <li class="menuparent">
                                    <span class="menuparent nolink">Pages</span>
                                    <ul>
                                        <li><a href="<?php echo site_url('page/about-us');?>">About us</a></li>
                                        <li><a href="<?php echo site_url('list-agent');?>">Our agents</a></li>
                                        <li><a href="<?php echo site_url('page/faq');?>">FAQ</a></li>
                                        <!--<li><a href="<?php echo site_url('page/shortcodes');?>">Shortcodes</a></li>
                                        <li class="menuparent">
                                            <span class="menuparent nolink">Another level</span>
                                            <ul>
                                                <li><a href="<?php echo site_url('page/contact-us');?>">Contact us</a></li>
                                                <li><a href="<?php echo site_url('page/grid-system');?>">Grid system</a></li>
                                                <li><a href="<?php echo site_url('page/typography');?>">Typography</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="404.html">404 page</a></li>-->
                                    </ul>
                                </li>
                            </ul><!-- /.nav -->

                            <div class="language-switcher">
                            <?php 
                            global $URI;
                            $theSegment = "/".$URI->segment(1)."/";
                            
                            $currentUrl=current_url();
                            $currentUrlFr=str_replace($theSegment,'/fr/',$currentUrl);
                            $currentUrlEn=str_replace($theSegment,'/en/',$currentUrl);
                            $currentUrlAl=str_replace($theSegment,'/al/',$currentUrl);
                             ?>
                                <div class="current en"><a href="<?php echo $currentUrlEn; ?>" lang="en">English</a></div><!-- /.current -->
                                <div class="options">
                                    <ul>
                                        <li class="fr"><a href="<?php echo $currentUrlFr; ?>" lang="fr">Français</a></li>
                                        <li class="de"><a href="<?php echo $currentUrlAl; ?>">Deutsch</a></li>
                                    </ul>
                                </div><!-- /.options -->
                            </div><!-- /.language-switcher -->

                            <form method="get" class="site-search" action="?">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Search" type="text" name="">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append -->
                            </form><!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->

            <!-- CONTENT -->
            <div id="content">