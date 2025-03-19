<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- SITE META -->
    <title><?php wp_title( '|', true, 'right' ) ?> <?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="author" content="Al-Fateem Academy">
    <meta name="keywords" content="DELL, HP, LENOVO, TOSHIBA, ACER, ASUS, APPLE, IBM">
    <!-- FAVICONS -->
    <link rel="shortcut icon" href="<?php echo ot_get_option('fav_icon'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo ot_get_option('fav_icon'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo ot_get_option('fav_icon'); ?>">

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body>
    <!-- START SITE -->

    <div id="wrapper">
        <div class="logo-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <a class="navbar-brand" href="index.html"><img src="<?php echo ot_get_option('logo'); ?>" alt=""></a>
                    </div>
                    <!-- end col -->
                    <div class="col-md-9 col-sm-12">
                        <div class="ads-widget clearfix">
                            <a href="#"><img src="<?php echo ot_get_option('top_banner'); ?>" alt="" class="img-responsive"></a>
                        </div>
                        <!-- end ads-widget -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end logo-wrapper -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="container-full">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
						<!-- START TOP NAV  -->
                        <div id="navbar" class="navbar-collapse collapse">
                            <?php
                                $args = [
                                    'theme_location' => 'top-menu',
                                    'container' => 'ul',
                                    'menu_class' => 'nav navbar-nav',
                                ]; 
                                wp_nav_menu( $args );        
                            ?>                            
                            <ul class="nav navbar-nav navbar-right searchandbag">
                                <li class="dropdown searchdropdown hasmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
                                    <ul class="dropdown-menu show-right">
                                        <li>
                                            <div id="custom-search-input">
                                                <div class="input-group col-md-12">
                                                    <input type="text" class="form-control input-lg" placeholder="Search here..." />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-lg" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                    <!--/.container-fluid -->
                </nav>
            </div>
            <!-- end container -->
        </header>
        <!-- end header -->