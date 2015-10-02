<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" type="text/css"  href="<?php echo URL_CSS; ?>css_testimonios/bootstrap_test.css">
        <link rel="stylesheet" type="text/css"  href="<?php echo URL_CSS; ?>css_testimonios/chosen.css">
        <link rel="stylesheet" href="<?php echo URL_CSS ?>css_testimonios/style.css">
        <link rel="stylesheet" type="text/css"  href="<?php echo URL_CSS; ?>jquery.jgrowl.css">
        <link href="<?php echo URL_CSS ?>validate/validation.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo URL_CSS ?>paises.css" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo URL_IMG ?>ico/ico_fava.png">
        <link rel="apple-touch-icon" href="<?php echo URL_IMG ?>ico/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL_IMG ?>ico/apple-touch-icon-72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL_IMG ?>ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL_IMG ?>ico/apple-touch-icon-144.png">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Javascript -->
        <script src="<?php echo URL_JS ?>testimonios/jquery-1.8.2.min.js"></script>
        <script src="<?php echo URL_JS ?>testimonios/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL_JS; ?>jquery.jgrowl_minimized.js"></script>
        <script src="<?php echo URL_JS ?>testimonios/jquery.backstretch.min.js"></script>
        <script src="<?php echo URL_JS ?>validacion/jqueryvalidate_<?php echo $this->uri->segment(1); ?>.js"></script>
        <script src="<?php echo URL_JS ?>jsValidacionGeneral.js"></script>
        <script src="<?php echo URL_JS ?>jsGeneral.js"></script>
        <script src="<?php echo URL_JS ?>testimonios/jsTestimonioIns_<?php echo $this->uri->segment(1); ?>.js"></script>

    </head>

    <body>
        <div class="header">
            <div class="container clase_container_test">
                <div class="row">
                    <div class="logo span4">
                        <img src="<?php echo URL_IMG; ?>LOGO_ROJO.png" class="logo_fava"/>
                    </div>
                    <div class="links span9 text-important">
                        <h1><?php echo lang('idioma.testimonios-form-cabecera'); ?> <span class="red"></span></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <!--<div class="iphone span5">
                    <div style="background: rgba(0,0,0,.5);width: 100%;height: 300px;">
                   </div>
               </div> -->
                <div class="register span5">
                    <?php $this->load->view("testimonios/ins_view"); ?>
                </div>
            </div>
        </div>


        <!--POPUP VALIDACIÓN DEL EMAIL YA EXISTENTE -->
        <div id="c_div_popup_valid_email" class="modal fade in" style="display: none;">
            <div class="modal-header">
                <button data-dismiss="modal" class="close cerrar_popup2" type="button">×</button>
                <h3 class="titulo_modal"><?php echo lang('idioma.testimonios-popupemail-titulo') ?></h3>
            </div>
            <div class="modal-body">
                <p class="contenido_body">
                    <?php echo lang('idioma.testimonios-popupemail-texto') ?>
                </p>
            </div>
            <div class="modal-footer">                      
                <a data-dismiss="modal" class="btn btn-primary cerrar_popup2"><?php echo lang('idioma.testimonios-popupemail-button'); ?></a>
            </div>
        </div>
        
        <!--POPUP REGISTRO EXITOSO DE TESTIMONIOS -->
        <div id="c_div_popup_reg_testimonios" class="modal fade in" style="display: none;">
            <div class="modal-header">
                <button data-dismiss="modal" class="close cerrar_valid" type="button">×</button>
                <h3 class="titulo_modal"><?php echo lang('idioma.testimonios-popup-titulo'); ?></h3>
            </div>
            <div class="modal-body">
                <p class="contenido_body">
                    <?php echo lang('idioma.testimonios-popup-text1'); ?>  
                    <?php echo lang('idioma.testimonios-popup-text2'); ?>  
                </p>
            </div>
            <div class="modal-footer">                      
                <a data-dismiss="modal" class="btn btn-primary cerrar_valid"><?php echo lang('idioma.testimonios-popup-button'); ?></a>
            </div>
        </div>

    </body>
</html>

