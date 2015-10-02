<?php $this->load->view("inicio/slider_view"); ?>

<div class="slogan bottom-pad-small">
    <div class="container">
        <div class="row">
            <div class="slogan-content">
                <div class="col-lg-9 col-md-9">
                    <h2 class="color_resaltante text-main"><?php echo lang('idioma.debajo-slider-texto1'); ?></h2>
                    <p class="parrafo_justificado">
                        <?php echo lang('idioma.debajo-slider-texto2'); ?>
                    </p>
                    <?php $this->load->view("inicio/social_buttons_view"); ?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="get-started">
                        <div class="contact-box-2 widget">
                            <div class="div_cont_text color_resaltante"><?php echo lang('idioma.debajo-slider-texto3'); ?></div>
                            <p> <i class="icon-phone"> </i> (305) 971-0079 </p>
                            <p> <i class="icon-phone"> </i> (305) 388-2921 </p>
                            
                            <center>
                                <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>" class="btn-small btn-color submit" style="margin-bottom: 20px;">
                                    <i class="icon-envelope"></i> &nbsp;&nbsp; <?php echo lang('idioma.btn-contactanos'); ?>
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="services-big">
                <!-- SECCION TIPOS DE VENTA - PUBLICIDAD -->
                <?php $this->load->view("publicidad/publicidad_seccion_ventas"); ?>
                <!-- END -->
            </div>
        </div>
    </div>
</div>
<!-- Main Content end--> 

<!-- Recent works start-->
<div class="recentworks">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="portfolio-desc">
                    <div class="side-segment"><h3><?php echo lang('idioma.seccion-testimonios-titulo1'); ?></h3></div>
                    <p><?php echo lang('idioma.seccion-testimonios-texto'); ?></p>
                    <div class="carousel-controls pull-right">
                        <a class="prev" href="#portfolio-carousel" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="next" href="#portfolio-carousel" data-slide="next"><i class="icon-angle-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-xs-12">
                <div class="row">
                    <div id="portfolio-carousel" class="portfolio-carousel slide">
                        <div class="carousel-inner">
                            <!-- SECCION DE TESTIMONIOS -->
                            <?php $this->load->view("testimonios/testimonios_view"); ?>
                            <!-- END -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent work end-->

    <!-- Latest Posts start --> 
    <!--<div class="latest-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12">
                    <div class="side-segment"><h3>Latest Posts</h3></div>
                </div>
                <div class="clearfix"></div>
                <div class="blog-showcase col-lg-12 col-md-12 col-sm-12 col-xs-12 animate_afb">
                    <ul>
                        <li class="">
                            <div class="blog-showcase-thumb col-lg-4">
                                <div class="post-body">
                                    <a class="post-item-link" href="<?php echo URL_IMG; ?>portfolio/portfolio-5.jpg" data-rel="prettyPhoto"><span class="post-item-hover"></span><span class="fullscreen"><i class="icon-search"></i></span><img alt="" src="<?php echo URL_IMG; ?>portfolio/portfolio-5.jpg"></a>
                                </div>
                            </div>
                            <div class="blog-showcase-extra-info col-lg-4">
                                <span><a href="#">Sep 11th, 2013</a></span>
                                <h4><a href="#" class="title">Blog post title</a></h4>
                                <p>Mauris sed mauris bibendum est imperdiet porttitor tincidunt at lorem. Proin augue massa</p>
                                <a href="<?php echo URL_MAIN ?>products/product_info">Read more <i class="icon-double-angle-right"></i></a>
                            </div>
                        </li>
                        <li>
                            <div class="blog-showcase-thumb col-lg-4">
                                <div class="post-body">
                                    <a class="post-item-link" href="<?php echo URL_IMG; ?>portfolio/portfolio-6.jpg" data-rel="prettyPhoto"><span class="post-item-hover"></span><span class="fullscreen"><i class="icon-search"></i></span><img alt="" src="<?php echo URL_IMG; ?>portfolio/portfolio-6.jpg"></a>
                                </div>
                            </div>
                            <div class="blog-showcase-extra-info col-lg-4">
                                <span><a href="#">Sep 11th, 2013</a></span>
                                <h4><a href="#" class="title">Blog post title</a></h4>
                                <p>Mauris sed mauris bibendum est imperdiet porttitor tincidunt at lorem. Proin augue massa</p>
                                <a href="<?php echo URL_MAIN ?>products/product_info">Read more <i class="icon-double-angle-right"></i></a>
                            </div>
                        </li>
                        <li class="blog-first-el">
                            <div class="blog-showcase-thumb col-lg-4">
                                <div class="post-body">
                                    <a class="post-item-link" href="<?php echo URL_IMG; ?>portfolio/portfolio-7.jpg" data-rel="prettyPhoto"><span class="post-item-hover"></span><span class="fullscreen"><i class="icon-search"></i></span><img alt="" src="<?php echo URL_IMG; ?>portfolio/portfolio-7.jpg"></a>
                                </div>
                            </div>
                            <div class="blog-showcase-extra-info col-lg-4">
                                <span><a href="#">Sep 11th, 2013</a></span>
                                <h4><a href="#" class="title">Blog post title</a></h4>
                                <p>Mauris sed mauris bibendum est imperdiet porttitor tincidunt at lorem. Proin augue massa</p>
                                <a href="<?php echo URL_MAIN ?>products/product_info">Read more <i class="icon-double-angle-right"></i></a>
                            </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>-->
    <!-- Latest Posts End -->
    <!-- Our Clients Start-->
    <!--<div class="recentworks">
        <div class="container">
            <div class="row">
                <div class="client">
                    <div class="client-logo">
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                            <div class="clients-title">
                                <div class="side-segment"><h3>Our Clients</h3></div>
                                <div class="carousel-controls pull-right">
                                    <a class="prev" href="#client-carousel" data-slide="prev"><i class="icon-angle-left"></i></a>
                                    <a class="next" href="#client-carousel" data-slide="next"><i class="icon-angle-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div id="client-carousel" class="client-carousel slide">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item animate_afc d1">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-1.png"></a></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item animate_afc d2">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-2.png"></a></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item animate_afc d3">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-3.png"></a></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item animate_afc d4">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-4.png"></a></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-5.png"></a></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-4.png"></a></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-3.png"></a></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 item">
                                                <div class="item-inner"><a href="#"><img alt="Upportdash" src="<?php echo URL_IMG; ?>clientslogo/logo-2.png"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                             Testimonials Widget Start 
                            <div class="row ">
                                <div class="testimonials widget">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="testimonials-title">
                                            <div class="side-segment"><h3>Testimonials</h3></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="testimonials-carousel" class="testimonials-carousel slide animate_afr d5">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="testimonial item">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                                                        </p>
                                                        <div class="testimonials-arrow">
                                                        </div>
                                                        <div class="author">
                                                            <div class="testimonial-image "><img alt="" src="<?php echo URL_IMG; ?>testimonial/team-member-1.jpg"></div>
                                                            <div class="testimonial-author-info">
                                                                <a href="#"><span class="color">Monica Sing</span></a> FIFO Themes
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="testimonial item">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                                                        </p>
                                                        <div class="testimonials-arrow">
                                                        </div>
                                                        <div class="author">
                                                            <div class="testimonial-image "><img alt="" src="<?php echo URL_IMG; ?>testimonial/team-member-2.jpg"></div>
                                                            <div class="testimonial-author-info">
                                                                <a href="#"><span class="color">Monzurul Haque</span></a> FIFO Themes
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="testimonial item">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                                                        </p>
                                                        <div class="testimonials-arrow">
                                                        </div>
                                                        <div class="author">
                                                            <div class="testimonial-image "><img alt="" src="<?php echo URL_IMG; ?>testimonial/team-member-3.jpg"></div>
                                                        <div class="testimonial-author-info">
                                                            <a href="#"><span class="color">Carol Johansen</span></a> FIFO Themes
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
    <!-- Our Clients End -->  