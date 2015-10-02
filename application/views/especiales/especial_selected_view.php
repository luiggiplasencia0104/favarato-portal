<!-- Title, Breadcrumb Start-->
<?php $this->load->view("inicio/breadcrumbs_view"); ?>
<!-- Title, Breadcrumb End-->

<!-- Main Content start-->
<div class="content">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php $this->load->view("inicio/social_buttons_pages_view"); ?>
            </div>                
        </div>

        <br /><br />

        <div class="row">
            <div class="posts-block col-lg-7 col-md-7 col-xs-12 col-sm-12">
                <div class="row row_imagen_i_pro">
                    <div class="preview-thum">
                        <ul id="upscroll" class="prev-thum">
                            <?php foreach ($fotos_productos as $fotos_productos) { ?>
                                <li>
                                    <a href="#" 
                                       data-image="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $fotos_productos['foto_producto']; ?>" 
                                       data-zoom-image="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $fotos_productos['foto_producto']; ?>">
                                        <img  src="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $fotos_productos["foto_producto"]; ?>" alt="" />

                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <a class="control-up" id="upthum" href="javascript:void(0);"><i class="fa icon-chevron-up"></i></a> <a class="control-down" id="downthum" href="javascript:void(0);"><i class="fa icon-chevron-down"></i></a> 
                    </div>
                    <div class="product-view2">
                        <div class="product-img-box"><img id="big_image" src="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $foto_principal; ?>" alt="" ><a title="" href="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $foto_principal; ?>" data-gal="prettyPhoto" data-fancybox-group="gallery" class="fancybox box-zoom"><i class="fa icon-search"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- Left Section End -->
            <div class="col-lg-5 col-md-5 col-xs-12 col-sm-5">
                <div class="widget project_details">
                    <?php
                    if ($this->uri->segment(1) == "es") {
                        $nombre_oferta = $MultTituloEs;
                        $descripcion_oferta = $MultDescripcionEs;
                    } else {
                        $nombre_oferta = $MultTituloEn;
                        $descripcion_oferta = $MultDescripcionEn;
                    }
                    ?>
                    <div class="side-segment"><h3><?php echo $nombre_oferta; ?></h3></div>
                    <p class="parrafo_justificado">
                        <?php echo $descripcion_oferta; ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <!-- Project Details Start -->
                <div class="widget project_details">
                    <?php
                    if ($subcategoria_oferta == "") {
                        $descripcion_categoria = $categoria_oferta;
                    } else {
                        $descripcion_categoria = $categoria_oferta . " - " . $subcategoria_oferta;
                    }
                    ?>
                    <div class="side-segment"><h3><?php echo lang('idioma.especiales-info-titulo1'); ?></h3></div>
                    <div class="details-content">
                        <span><strong><?php echo lang('idioma.especiales-info-texto1'); ?></strong><em><?php echo $descripcion_categoria; ?></em></span>
                        <?php
                        if ($marca_oferta == "Variadas(español) - Assorted(english)") {
                            if ($this->uri->segment(1) == "es") {
                                $nombre_marca = "Variadas";
                            } else {
                                $nombre_marca = "Assorted";
                            }
                        } else {
                            $nombre_marca = $marca_oferta;
                        }

                        if ($this->uri->segment(1) == "es") {
                            $tallas = $tallaes_oferta;
                        } else {
                            $tallas = $tallaen_oferta;
                        }
                        ?>

                        <span><strong><?php echo lang('idioma.especiales-info-texto2'); ?></strong><em><?php echo $nombre_marca; ?></em></span>
                        <?php if (strtolower($categoria_oferta) == lang('idioma.productos-texto-comparar')) { ?>
                            <?php if ($tallas != '') { ?>
                                <span><strong><?php echo lang('idioma.especiales-info-texto3'); ?></strong><em><?php echo $tallas; ?></em></span>
                            <?php } ?>
                        <?php } ?>
                        <span><strong><?php echo lang('idioma.especiales-info-texto4'); ?></strong><em><?php echo $precio_oferta; ?> </em></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="widget">
                    <?php if ($MultLink != '' || $MultLink != null) { ?>
                        <a class="btn-normal btn-color" href="<?php echo $MultLink; ?>" target="_blank">
                            <i class="icon-hand-right icon-large"></i>  <?php echo lang('idioma.ver-enlace-web'); ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php if (count($otras_ofertas) > 0) { ?>
            <div class="row">
                <!-- Recent works start-->
                <div class="portfolio">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="side-segment"><h3><?php echo lang('idioma.especiales-info-titulo2') ?></h3></div>
                    </div>

                    <?php foreach ($otras_ofertas as $otras_ofertas) { ?>
                        <?php
                        $titulo_oferta_url = replace_caracteres_raros($otras_ofertas["cTbIdDescripcion"]);
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 css jquery wp item">
                            <div class="portfolio-item">
                                <div class="image-container">
                                    <?php if ($otras_ofertas["cMLinkMiniatura"] != "nofoto.jpg") { ?>
                                        <img class="foto_producto ver_deta" data-ruta="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales-detalle'); ?>/<?php echo $titulo_oferta_url; ?>_<?php echo $otras_ofertas["nMultID"]; ?>" alt="" src="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $otras_ofertas["cMLinkMiniatura"] ?>">  
                                    <?php } else { ?>
                                        <img class="foto_producto ver_deta" data-ruta="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales-detalle'); ?>/<?php echo $titulo_oferta_url; ?>_<?php echo $otras_ofertas["nMultID"]; ?>" alt="" src="<?php echo URL_IMG; ?><?php echo $otras_ofertas["cMLinkMiniatura"]; ?>">
                                    <?php } ?>
                                </div>
                                <div class="portfolio-item-title">
                                    <a class="color_enlace" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales-detalle'); ?>/<?php echo $titulo_oferta_url; ?>_<?php echo $otras_ofertas["nMultID"]; ?>">
                                        <?php echo $otras_ofertas["cTbIdDescripcion"]; ?>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    <?php } ?>

    <!-- Recent work end-->
</div>
<!-- Main Content end-->