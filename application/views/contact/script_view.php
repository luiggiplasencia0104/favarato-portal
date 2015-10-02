<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>

        <link rel="stylesheet" href="<?php echo URL_CSS; ?>css_codeigniter.css" type="text/css" />
        <script type="text/javascript" src="<?php echo URL_JS ?>jquery.min.js"></script>
    </head>
    <body>
        <!-- Google Code for Inscripcion Conversion Page --> 
        <script type="text/javascript"> /* <![CDATA[ */ 
            var google_conversion_id = 1038749298; 
            var google_conversion_language = "en"; 
            var google_conversion_format = "3"; 
            var google_conversion_color = "ffffff"; 
            var google_conversion_label = "NmxyCNS-7wkQ8pyo7wM"; 
            var google_remarketing_only = false; /* ]]> */ 
        </script> 
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script> 
        <noscript> 
        <div style="display:inline;"> 
            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1038749298/?label=NmxyCNS-7wkQ8pyo7wM&amp;guid=ON&amp;script=0"/> 
        </div> 
        </noscript>

        <input type="text" name="correo_electronico" id="correo_electronico" value="<?php echo $this->session->userdata('correo_electronico'); ?>" style="display: none;">
        <input type="text" name="cliente" id="cliente" value="<?php echo $this->session->userdata('cliente'); ?>" style="display: none;">
        <div id="container">
            <h1><?php echo lang('idioma.pag-contact-email-titulo'); ?></h1>
            <div id="body">
                <p>
                    <?php echo lang('idioma.pag-contact-email-text1'); ?>  
                    <?php echo lang('idioma.pag-contact-email-text2'); ?> <?php echo lang('idioma.pag-contact-email-text3'); ?>
                </p>
                <center>
                    <a target="_blank" href="http://www.hotmail.com"><img class="loco" src="<?php echo URL_IMG ?>icon-hotmail.png" /></a> 
                    <a target="_blank" href="http://www.outlook.com"><img class="loco" src="<?php echo URL_IMG ?>icon-outlook.png" /></a> 
                </center>
                <code style="text-align: center;">
                    <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>">
                        <?php echo lang('idioma.pag-contact-return'); ?>
                    </a>
                </code>
            </div>
            <p class="footer">Favarato Express Inc.</p>
        </div>
        <script type="text/javascript">
            $(function(){    
                var email = $('#correo_electronico').val();
                var cliente = $('#cliente').val();
                
                $("#cliente").html(cliente);
                $("#email_usuario").html(email);
            });
        </script>
    </body>
</html>