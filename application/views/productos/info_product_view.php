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
                            <?php foreach ($fotos_adicionales as $fotos_adicionales) { ?>
                                <li><a href="#" data-image="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $fotos_adicionales["cMLinkMiniatura"]; ?>" data-zoom-image="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $fotos_adicionales["cMLinkMiniatura"]; ?>"><img  src="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $fotos_adicionales["cMLinkMiniatura"]; ?>" alt=""></a></li>
                            <?php } ?>
                        </ul>
                        <a class="control-up" id="upthum" href="javascript:void(0);"><i class="fa icon-chevron-up"></i></a> <a class="control-down" id="downthum" href="javascript:void(0);"><i class="fa icon-chevron-down"></i></a> 
                    </div>
                    <div class="product-view2">
                        <div class="product-img-box"><img id="big_image" src="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $foto_one; ?>" alt="" ><a title="" href="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $foto_one; ?>" data-gal="prettyPhoto" data-fancybox-group="gallery" class="fancybox box-zoom"><i class="fa icon-search"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- Left Section End -->
            <div class="col-lg-5 col-md-5 col-xs-12 col-sm-6">
                <div class="widget project_details">
                    <?php
                    if ($this->uri->segment(1) == "es") {
                        $nombre = $cProdNombreEs;
                        $descripcion = $cProdDescripcionEs;
                    } else {
                        $nombre = $cProdNombreEn;
                        $descripcion = $cProdDescripcionEn;
                    }
                    ?>
                    <div class="side-segment"><h3><?php echo $nombre; ?></h3></div>
                    <p class="parrafo_justificado">
                        <?php echo $descripcion; ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <!-- Project Details Start -->
                <div class="widget project_details">
                    <?php
                    if ($subcategoria == "") {
                        $descripcion_categoria = $categoria;
                    } else {
                        $descripcion_categoria = $categoria . " - " . $subcategoria;
                    }
                    ?>
                    <div class="side-segment"><h3><?php echo lang('idioma.productos-info-titulo1'); ?></h3></div>
                    <div class="details-content">
                        <span><strong><?php echo lang('idioma.productos-info-texto1'); ?></strong><em><?php echo $descripcion_categoria; ?></em></span>
                        <?php
                        if ($marca == "Variadas - Assorted") {
                            if ($this->uri->segment(1) == "es") {
                                $nombre_marca = "Variadas";
                            } else {
                                $nombre_marca = "Assorted";
                            }
                        } else {
                            $nombre_marca = $marca;
                        }

                        if ($this->uri->segment(1) == "es") {
                            $tallas = $cProdTallasEs;
                        } else {
                            $tallas = $cProdTallasEn;
                        }
                        ?>
                        <span><strong><?php echo lang('idioma.productos-info-texto2'); ?></strong><em><?php echo $nombre_marca; ?></em></span>
                        <?php if (strtolower($categoria) == lang('idioma.productos-texto-comparar')) { ?>
                            <span><strong><?php echo lang('idioma.productos-info-texto3'); ?></strong><em><?php echo $tallas; ?></em></span>
                        <?php } ?>
                        <span><strong><?php echo lang('idioma.productos-info-texto4'); ?></strong><em><?php echo $cProdPrecio; ?> </em></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <?php if (count($otros_productos) > 0) { ?>
            <div class="row">
                <!-- Recent works start-->
                <div class="portfolio">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="side-segment"><h3><?php echo lang('idioma.productos-info-titulo2') ?></h3></div>
                    </div>

                    <?php foreach ($otros_productos as $productos) { ?>
                        <?php
                        $nombre_producto_url = replace_caracteres_raros($productos["nombre_producto"]);
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 css jquery wp item">
                            <div class="portfolio-item">
                                <div class="image-container">
                                    <?php if ($productos["foto_producto"] != "nofoto.jpg") { ?>
                                        <img class="foto_producto_d ver_deta" data-ruta="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-info'); ?>/<?php echo $nombre_producto_url . "_" . $productos["nProdID"] . "_" . $productos["nCatID"] . "_" . $productos["nSubCatID"]; ?>" alt="" src="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $productos["foto_producto"] ?>">  
                                    <?php } else { ?>
                                        <img class="foto_producto_d ver_deta" data-ruta="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-info'); ?>/<?php echo $nombre_producto_url . "_" . $productos["nProdID"] . "_" . $productos["nCatID"] . "_" . $productos["nSubCatID"]; ?>" alt="" src="<?php echo URL_IMG; ?><?php echo $productos["foto_producto"]; ?>">
                                    <?php } ?>
                                </div>
                                <div class="portfolio-item-title">
                                    <a class="color_enlace" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-info'); ?>/<?php echo $nombre_producto_url . "_" . $productos["nProdID"] . "_" . $productos["nCatID"] . "_" . $productos["nSubCatID"]; ?>">
                                        <?php echo $productos["nombre_producto"]; ?>
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

