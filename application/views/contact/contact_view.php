<!-- Title, Breadcrumb Start-->
<?php $this->load->view("inicio/breadcrumbs_view"); ?>
<!-- Title, Breadcrumb End-->
<!-- Main Content start-->
<div class="content heigth-page">
    <div class="container content-page-change hide">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php $this->load->view("inicio/social_buttons_pages_view"); ?>
            </div>                
        </div>
        <br /><br />
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12" id="contact-form">
                <div class="side-segment"><h3><?php echo lang('idioma.pag-contact-texto1'); ?></h3></div>
                <p>
                    <?php echo lang('idioma.pag-contact-texto1-subtext1'); ?>
                </p>
                <p>
                    <?php echo lang('idioma.pag-contact-texto1-subtext2'); ?>
                </p>
                <div class="divider"></div>

                <!-- FORMULARIO DE CONTACTOS -->
                <?php $this->load->view("contact/form_contact_view"); ?>
                <!-- END -->
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-6">
                <div class="address widget">
                    <div class="side-segment"><h3><?php echo lang('idioma.pag-contact-texto2'); ?></h3></div>
                    <ul class="contact-us">
                        <li>
                            <i class="icon-map-marker"></i>
                            <p>
                                <strong><?php echo lang('idioma.pag-contact-texto2-subtext1'); ?>:</strong> 13222 SW 131 St. - Miami, FL 33186
                            </p>
                        </li>
                        <li>
                            <i class="icon-phone"></i>
                            <p>
                                <strong><?php echo lang('idioma.pag-contact-texto2-subtext2'); ?>:</strong> (305) 388-2921 / (305) 971-0079
                            </p>
                        </li>
                        <li>
                            <i class="icon-share"></i>
                            <p>
                                <strong><?php echo lang('idioma.pag-contact-texto4'); ?>:</strong>
                                <span class="member-social dark">
                                    <a data-toggle="tooltip" data-original-title="Facebook" target="_blank" class="facebook" href="http://www.facebook.com/FavaratoExpress"><i style="padding-left: 14px;" class="icon-facebook"></i></a>
                                    <a data-toggle="tooltip" data-original-title="Twitter" target="_blank" class="twitter" href="https://twitter.com/FavaratoExpress"><i style="padding-left: 10px;" class="icon-twitter"></i></a>
                                </span><br /><br />
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="contact-info widget">
                    <div class="side-segment"><h3><?php echo lang('idioma.pag-contact-texto3'); ?></h3></div>
                    <ul>
                        <li><i class="icon-time"> </i><?php echo lang('idioma.pag-contact-texto3-subt1') ?> </li>
                    </ul>
                </div>
                <div class="follow widget">
                    <div class="side-segment"><h3><?php echo lang('idioma.pag-contact-texto5'); ?></h3></div>
                    <div class="post-image">
                        <div id="maps" class="google-maps"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="side-segment"><h3><?php echo lang('idioma.pag-contact-texto6'); ?></h3></div>
                <div class="carousel-controls pull-right" style="margin-top: -55px">
                    <a data-slide="prev" href="#portfolio-carousel" class="prev"><i class="icon-angle-left"></i></a>
                    <a data-slide="next" href="#portfolio-carousel" class="next"><i class="icon-angle-right"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="portfolio-carousel slide" id="portfolio-carousel">
                <div class="carousel-inner">
                    <?php $j = 1; ?>
                    <?php foreach ($publicidad as $publicidad_local) { ?>
                        <?php $item_active = $j === 1 ? 'active' : ''; ?>
                        <?php if ($j === 1 || $j === 5) { ?>
                            <div class="item <?php echo $item_active; ?>">
                            <?php } ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 item">
                                <div class="portfolio-item">
                                    <a href="<?php echo URL_UPLOADS . "uploads_publicidad/" . $publicidad_local["cMLinkMiniatura"]; ?>" title="<?php echo $publicidad_local["cTbIdDescripcion"]; ?>" class="portfolio-item-link" data-gal="prettyPhoto[app_gallery]" >
                                        <span class="portfolio-item-hover"></span>
                                        <span class="fullscreen"><i class="icon-search"></i></span><img src="<?php echo URL_UPLOADS . "uploads_publicidad/thumbs_800x600/" . $publicidad_local["cMLinkMiniatura"]; ?>" alt=" "/>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php if ($j === 4 || $j === 8) { ?>
                            </div>
                        <?php } ?>
                        <?php $j++; ?>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="divider"></div>
    </div>
</div>
