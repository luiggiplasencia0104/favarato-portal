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
            <div class="sidebar col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="side-segment"><h3><?php echo lang('idioma.pag-productos-categoria'); ?></h3></div>
                <!-- Left nav Widget Start -->
                <?php $this->load->view("productos/navigation_products"); ?>
                <!-- Left nav Widget End -->
            </div>
            <!-- Sidebar End -->

            <div class="posts-block col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="side-segment">
                    <?php
                    if ($name_subcategoria == "sin_sc") {
                        $subca = "";
                    } else {
                        $subca = " → " . $name_subcategoria;
                    }
                    ?>
                    <h3><?php echo $name_categoria; ?>&nbsp;<?php echo $subca; ?></h3>
                </div>

                <?php
                if ($this->uri->segment(1) == "es") {
                    $cadena_compara = explode("-", $this->uri->segment(4));
                    $texto_compara = $cadena_compara[0];
                } else {
                    $cadena_compara = explode("-", $this->uri->segment(4));
                    $texto_compara = $cadena_compara[1];
                }
                ?>

                <?php if ($texto_compara == lang('idioma.productos-texto-comparar') && $code_subcat == "sin_sc") { ?>
                    <?php $this->load->view("productos/ropa_image_view"); ?>
                <?php } ?>

                <?php if ($texto_compara != lang('idioma.productos-texto-comparar') || $code_subcat != "sin_sc") { ?>
                    <!-- Listado de Productos segun categoria seleccionada -->
                    <input type="hidden" id="hid_id_cat" name="hid_id_cat" value="<?php echo $code_cat ?>" />
                    <input type="hidden" id="hid_id_subcat" name="hid_id_subcat" value="<?php echo $code_subcat ?>" />

                    <?php if ($this->uri->segment(5) == lang('idioma.productos-texto-comparar-ninos')) { ?>
                        <p class="parrafo_justificado"> 
                            <?php echo lang('idioma.productos-seccion-ropa-ninos'); ?> 
                            <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang('idioma.contactanos-ahora-mismo'); ?> </a>
                        </p> <br />
                    <?php } else if ($this->uri->segment(5) == lang('idioma.productos-texto-comparar-mujer')) { ?>
                        <p class="parrafo_justificado"> 
                            <?php echo lang('idioma.productos-seccion-ropa-mujer'); ?> 
                            <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang('idioma.contactanos-ahora-mismo'); ?> </a>
                        </p> <br />
                    <?php } else if ($this->uri->segment(5) == lang('idioma.productos-texto-comparar-hombre')) { ?>
                        <p class="parrafo_justificado"> 
                            <?php echo lang('idioma.productos-seccion-ropa-hombre'); ?> 
                            <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang('idioma.contactanos-ahora-mismo'); ?> </a>
                        </p> <br />
                    <?php } else if ($this->uri->segment(4) == lang('idioma.productos-texto-comparar-joyeria')) { ?>
                        <p class="parrafo_justificado"> 
                            <?php echo lang('idioma.productos-seccion-joyeria'); ?> 
                            <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang('idioma.contactanos-ahora-mismo'); ?> </a>
                        </p> <br />
                    <?php } ?>

                    <div id="cont_div_qry_productos"></div>
                <?php } ?>
            </div>
            <!-- Left Section End -->
        </div>
    </div>
</div>

