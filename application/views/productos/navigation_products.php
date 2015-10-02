<aside class="subnav_cont sidebar_menu_left">
    <div class="subnav">
        <ul class="ul_menu_bonito opciones-categoria-productos">
            <?php $i = 1; ?>
            <?php foreach ($categorias as $categorias) { ?>
                <?php
                if (count($categorias["subcategorias"]) > 0) {
                    $css = "has_subnav";
                    $indicador = "→";
                } else {
                    $css = "";
                    $indicador = "";
                }

                if ($this->uri->segment(1) == "es") {
                    $cadenita = explode("-", $this->uri->segment(4));
                    $texto_cadenita = $cadenita[0];
                    $texto_categoria = $categorias["desc_categoria"] . "-al-por-mayor";
                } else {
                    $cadenita = explode("-", $this->uri->segment(4));
                    $texto_cadenita = $cadenita[1];
                    $texto_categoria = "wholesale-" . $categorias["desc_categoria"];
                }

                // SELECCIONAR EL ENLACE EN COLOR AZUL
                if ($this->uri->segment(4) == strtolower(replace_caracteres_raros($texto_categoria))) {
                    $seleccionado = "current_subpage";
                } else {
                    $seleccionado = "";
                }

                // Verificar la disponibilidad de las categorías
                if ($categorias["estado"] == 'I') {
                    $available = '<label class="label_boot label-danger">No disponible</label>';
                    $ruta_available = 'javascript:void(0);';
                    $clase_fn = 'class="enlace-no-disponible"';
                } else {
                    $available = '';
                    $ruta_available = URL_MAIN . $this->uri->segment(1) . "/" . lang('idioma.controlador-productos') . "/" . strtolower(replace_caracteres_raros($texto_categoria)) . "/";
                    $clase_fn = '';
                }
                ?>
                <li class="<?php echo $css; ?> <?php echo $seleccionado; ?>">
                    <a href="<?php echo $ruta_available; ?>" <?php echo $clase_fn; ?>>
                        <span>
                            <?php echo $categorias["desc_categoria"] ?> <?php echo $indicador; ?>
                        </span>
                        <?php echo $available; ?>
                    </a>
                    <?php if (count($categorias["subcategorias"]) > 0) { ?>
                        <ul class="ul_sub_men">
                            <?php foreach ($categorias["subcategorias"] as $subcategorias) { ?>
                                <?php
                                
                                // Verificar la disponibilidad de las categorías
                                if ($subcategorias["estado"] == 'I') {
                                    $available = '<label class="label_boot label-danger">No disponible</label>';
                                    $ruta_available = 'javascript:void(0);';
                                    $clase_fn = 'class="subenlace-no-disponible"';
                                } else {
                                    $available = '';
                                    $ruta_available = URL_MAIN . $this->uri->segment(1) . "/" . lang('idioma.controlador-productos') . "/" . strtolower(replace_caracteres_raros($texto_categoria)) . "/" . strtolower(replace_caracteres_raros($subcategorias["desc_subcategoria"]));
                                    $clase_fn = '';
                                }
                                ?>
                                <li>
                                    <a href="<?php echo $ruta_available  ?>" <?php echo $clase_fn; ?>>
                                        <span>
                                            <?php echo $subcategorias["desc_subcategoria"] ?>
                                        </span>
                                        <?php echo $available; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
                <?php $i++; ?>
            <?php } ?>
        </ul>
    </div>
</aside>
