<!-- Title, Breadcrumb Start-->
<?php $this->load->view("inicio/breadcrumbs_view"); ?>
<!-- Title, Breadcrumb End-->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php $this->load->view("inicio/social_buttons_pages_view"); ?>
            </div>                
        </div>

        <br /><br />

        <div class="row">
            <div class="blog-small col-lg-12 col-md-12 col-xs-12">
                <?php $i = 1; ?>
                <?php $total = count($list_especiales); ?>
                <?php foreach ($list_especiales as $list_especiales) { ?>
                    <article class="post hentry">
                        <div class="post-image">
                            <img src="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $list_especiales["cMLinkMiniatura"]; ?>" alt="">
                        </div>
                        <div class="post-content-wrap">
                            <header class="post-header">
                                <div class="side-segment"><h3><?php echo $list_especiales["cTbIdDescripcion"]; ?></h3></div>
                            </header>
                            <div class="post-content">
                                <p class="parrafo_justificado">
                                    <?php echo $list_especiales["cTbIdDescripcionLarga"]; ?>
                                </p>
                            </div>
                            <footer class="post-footer">
                                <?php
                                $titulo_oferta_url = replace_caracteres_raros($list_especiales["cTbIdDescripcion"]);
                                ?>
                                <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales-detalle'); ?>/<?php echo $titulo_oferta_url; ?>_<?php echo $list_especiales["nMultID"]; ?>" class="btn-small btn-color">
                                    <?php echo lang('idioma.ver-oferta'); ?>
                                </a>
                            </footer>
                        </div>
                        <div class="clearfix"></div>
                    </article>

                    <?php if ($i < $total) { ?>
                        <div class="blog-divider"></div>
                        <br />
                    <?php }else{ ?>
                        <br /><br />
                    <?php } ?>
                    <?php $i++; ?>
                <?php } ?>
            </div>
            <!-- Left Section End -->
        </div>
    </div>
</div>