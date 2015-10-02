<?php if (count($productos_listado) > 0) { ?>
    <script type="text/javascript">
    <?php $json = $this->input->post("json") ?>
        $(function() {     
            $("#paginador<?php echo $json["div"]; ?> a").bind({
                click: function(evt) {
                    if ($(this).attr('href') !== 'javascript:void(0);') {
                        evt.preventDefault();
                        var url = $(this).attr("href");   
                        qryProductos(<?php echo $json["id_categoria"]; ?>,<?php echo "'" . $json["id_subcategoria"] . "'"; ?>,url);      
                        jQuery("html, body").animate({
                            scrollTop: 140
                        }, 1200);
                        return false;
                    }
                }
            })
        });
    </script>

    <div class="row">
        <div class="portfolio">
            <?php foreach ($productos_listado as $productos) { ?>
                <?php
                $nombre_producto_url = replace_caracteres_raros($productos["nombre_producto"]);
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 css jquery wp item">
                    <div class="portfolio-item">
                        <div class="image-container">
                            <?php if ($productos["foto_producto"] != "nofoto.jpg") { ?>
                                <img class="foto_producto ver_deta" data-ruta="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-info'); ?>/<?php echo $nombre_producto_url . "_" . $productos["nProdID"] . "_" . $productos["nCatID"] . "_" . $productos["nSubCatID"]; ?>" alt="" src="<?php echo URL_UPLOADS; ?>uploads_productos/<?php echo $productos["foto_producto"] ?>">  
                            <?php } else { ?>
                                <img class="foto_producto ver_deta" data-ruta="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-info'); ?>/<?php echo $nombre_producto_url . "_" . $productos["nProdID"] . "_" . $productos["nCatID"] . "_" . $productos["nSubCatID"]; ?>" alt="" src="<?php echo URL_IMG; ?><?php echo $productos["foto_producto"]; ?>">
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

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 seccion_paginacion">
            <div id="paginador<?php echo $json["div"]; ?>">
                <?php echo $links; ?>
                <span class="pag_results">
                    <?php echo lang('idioma.productos-totalrecords'); ?>: <?php echo $total_filas; ?> 
                </span>
            </div>
        </div>
    </div>
<?php } ?>