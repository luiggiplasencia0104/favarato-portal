<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="author" content="Luiggi Chirinos Plasencia">
        <meta content=INDEX,FOLLOW name="robots">
        <meta name="revisit-after" content="7 days">
        <meta name="google-site-verification" content="QNyLWUIZ6g5z_HC0-Jm4-57FpKBDay3DMmFvjarzv-o" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="<?php echo $url_social ?>" />
        
        <!-- Library CSS -->
        <link rel="stylesheet" href="<?php echo URL_CSS ?>bootstrap.css">
        <link rel="stylesheet" href="<?php echo URL_CSS ?>fonts/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo URL_CSS ?>css_pretyfoto/prettyPhoto.css" media="screen">

        <?php foreach ($css_styles as $css_styles) { ?>
            <link rel="stylesheet" href="<?php echo $css_styles; ?>.css">
        <?php } ?>

        <link rel="stylesheet" href="<?php echo URL_CSS ?>sweet-alert.css">

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo URL_IMG ?>ico/ico_fava.png">
        <link rel="apple-touch-icon" href="<?php echo URL_IMG ?>ico/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL_IMG ?>ico/apple-touch-icon-72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL_IMG ?>ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL_IMG ?>ico/apple-touch-icon-144.png">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo URL_CSS ?>main.css">
        <link rel="stylesheet" href="<?php echo URL_CSS ?>loader.css">
        <!-- Skin -->
        <link rel="stylesheet" href="<?php echo URL_CSS ?>colors/blue.css" id="colors">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?php echo URL_CSS ?>theme-responsive.css">

    </head>
    <body class="home boxed">
        <script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-23807600-1', 'auto'); 
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
        </script>
        <div id="sky"></div>
        <div id="clouds"></div>
        <div class="wrap">
            <!-- Header Start -->
            <header id="header">
                <!-- Header Top Bar Start -->
                <div class="top-bar">
                    <div class="slidedown collapse">
                        <div class="container">
                            <div class="phone-email pull-left">
                                <a><i class="icon-phone"></i> <?php echo lang("idioma.cabecera-pri-fono"); ?> : (305) 388-2921 </a>
                            </div>
                            <div class="pull-right">
                                <!-- begin language switcher -->
                                <div id="polyglotLanguageSwitcher" class="pull-left">
                                    <form action="javascript:void(0);">
                                        <select id="polyglot-language-options">
                                            <?php if ($this->uri->segment(1) == "es") { ?>
                                                <option id="en" value="en"><?php echo lang("idioma.idioma-opt1"); ?></option>
                                                <option id="es" value="es" selected><?php echo lang("idioma.idioma-opt2"); ?></option>
                                            <?php } else { ?>
                                                <option id="en" value="en" selected><?php echo lang("idioma.idioma-opt1"); ?></option>
                                                <option id="es" value="es" ><?php echo lang("idioma.idioma-opt2"); ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </div>
                                <input type="hidden" id="ruta_es" value="<?php echo $ruta_es ?>">
                                <input type="hidden" id="ruta_en" value="<?php echo $ruta_en ?>">
                                <input type="hidden" id="hid_segmento_idioma" value="<?php echo $this->uri->segment(1) ?>">
                                <!-- end language switcher -->

                                <ul class="social pull-left">
                                    <li class="facebook"><a href="https://www.facebook.com/FavaratoExpress" data-toggle="tooltip" title="Facebook"><i class="icon-facebook"></i></a></li>
                                    <li class="twitter"><a href="https://twitter.com/FavaratoExpress" target="_blank" data-toggle="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Top Bar End -->
                <!-- Main Header Start -->
                <div class="main-header">
                    <div class="container">
                        <!-- TopNav Start -->
                        <div class="topnav navbar-header">
                            <a class="navbar-toggle down-button" data-toggle="collapse" data-target=".slidedown">
                                <i class="icon-angle-down icon-current"></i>
                            </a> 
                        </div>
                        <!-- TopNav End -->
                        <!-- Logo Start -->
                        <div class="logo pull-left">
                            <h1>
                                <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>">
                                    <img alt="Favarato Express Inc." src="<?php echo URL_IMG; ?>LOGO_ROJO.jpg" id="logo">
                                </a>
                            </h1>
                        </div>
                        <!-- Logo End -->
                        <!-- Mobile Menu Start -->
                        <div class="mobile navbar-header">
                            <a class="navbar-toggle menu_mobile menu_cerrado" data-toggle="collapse" href=".html">
                                <i class="icon-reorder icon-2x"></i>
                            </a> 
                        </div>
                        <!-- Mobile Menu End -->
                        <!-- Menu Start -->
                        <?php $this->load->view("inicio/menu_view") ?>
                        <!-- Menu End --> 
                    </div>
                </div>
                <!-- Main Header End -->
            </header>
            <!-- Header End --> 

            <!-- Content Start -->
            <div id="main">