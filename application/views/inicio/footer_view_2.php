</div>
<!-- Content End -->
<!-- Footer Start -->
<footer id="footer">
    <!-- Footer Top Start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-one">
                    <div class="side-segment"><h3><?php echo lang('idioma.footer-texto-one'); ?></h3></div>
                    <p> 
                        <?php echo lang('idioma.footer-texto-grande'); ?> 
                    </p>
                </section>
                <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-two">
                    <div class="side-segment"><h3><?php echo lang('idioma.footer-texto-four') ?></h3></div>
                    <ul class="ul_enlaces">
                        <li><i class="icon-caret-right"></i> <a class="enlacesmenus" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><?php echo lang("idioma.menu-opcion1"); ?></a></li>
                        <li><i class="icon-caret-right"></i> <a class="enlacesmenus" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-acerca'); ?>"><?php echo lang("idioma.menu-opcion2"); ?></a></li>
                        <li><i class="icon-caret-right"></i> <a class="enlacesmenus" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-ropa'); ?>"><?php echo lang("idioma.menu-opcion3"); ?></a></li>
                        <li><i class="icon-caret-right"></i> <a class="enlacesmenus" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-formas_compra'); ?>"><?php echo lang("idioma.menu-opcion4"); ?></a></li>
                        <li><i class="icon-caret-right"></i> <a class="enlacesmenus" href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales'); ?>"><?php echo lang("idioma.menu-opcion5"); ?></a></li>
                        <li><i class="icon-caret-right"></i> <a class="enlacesmenus" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang("idioma.menu-opcion6"); ?></a></li>
                    </ul>
                </section>
                <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-three footer-payment">
                    <div class="side-segment"><h3><?php echo lang('idioma.footer-texto-two'); ?></h3></div>
                    <a title="Visa"><img alt="" src="<?php echo URL_IMG ?>cards/visa-curved.png" class="payment"></a>
                    <a title="MasterCard"><img alt="" src="<?php echo URL_IMG ?>cards/mastercard-curved.png" class="payment"></a>
                    <a title="American Express"><img alt="" src="<?php echo URL_IMG ?>cards/americanexp.png" class="payment"></a>
                    <a title="Paypal"><img alt="" src="<?php echo URL_IMG ?>cards/paypal-curved.png" class="payment"></a>
                    <a title="Transferencia Bancaria"><img alt="" src="<?php echo URL_IMG ?>cards/transferencia_bancaria.png" class="payment"></a>
                </section>
                <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-four">
                    <div class="side-segment"><h3><?php echo lang('idioma.footer-texto-three'); ?></h3></div>
                    <ul class="contact-us">
                        <li>
                            <i class="icon-map-marker"></i>
                            <p> 
                                <b><?php echo lang('idioma.pag-contact-texto2-subtext1'); ?>:</b>13222 SW 131 St.- Miami, FL 33186  
                            </p>
                        </li>
                        <li>
                            <i class="icon-phone"></i>
                            <p><strong><?php echo lang('idioma.pag-contact-texto2-subtext2'); ?>:</strong>(305) 388-2921</p>
                        </li>
                    </ul>

                    <center>
                        <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>" class="btn-grey btn-small btn-pad" style="width: 100%;">
                            <i class="icon-envelope"></i> &nbsp;&nbsp; <?php echo lang('idioma.btn-contactanos'); ?>
                        </a>
                    </center>
                </section>
            </div>
        </div>
    </div>
    <!-- Footer Top End --> 
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 "> &copy; <?php echo lang('idioma.footer-copyright-1'); ?> <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>">Favarato Express Inc.</a>. <?php echo lang('idioma.footer-copyright-2'); ?> </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 ">
                    <ul class="social social-icons-footer-bottom">
                        <li class="facebook"><a href="https://www.facebook.com/FavaratoExpress" target="_blank" data-toggle="tooltip" title="Facebook"><i class="icon-facebook"></i></a></li>
                        <li class="twitter"><a href="https://twitter.com/FavaratoExpress" target="_blank" data-toggle="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Loading page --> 
    <div id="mensajecarga" class="message_loading"> </div>
    <!-- End Loading page --> 
</footer>
<!-- Scroll To Top --> 
<a href="javascript:void(0);" class="scrollup"><i class="icon-angle-up"></i></a>
</div>
<!-- Wrap End -->
<?php $this->load->view("inicio/redes_sociales_view"); ?>

<!-- SCRIPTS -->
<script type="text/javascript">
    var ENVIRONMENT = '<?php echo ENVIRONMENT ?>';
    var current_language = '<?php echo $this->uri->segment(1); ?>';
</script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery-migrate-1.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jsUriGlobales.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.jgrowl_minimized.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>modernizr-2.6.2.min.js"></script> 
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>portfolio_pretty.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery_portofolio_hover.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>superfish.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.sticky.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>spectrum.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>switcher.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>sweet-alert.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>nubes.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jquery.polyglot.language.switcher.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>jsGeneral.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>custom.js"></script>
<?php foreach ($js_scripts as $js_scripts) { ?>
    <script type="text/javascript" src="<?php echo $js_scripts; ?>.js"></script>
<?php } ?>
</body>
</html>