<div id="layerslider" style="width: 100%; height: 540px; margin: 0px auto;">
    <?php $i = 1; ?>
    <?php foreach ($publicidad_slider as $publicidad_slider) { ?>
        <!-- First slide -->
        <?php
        if ($i == 1 || $i == 4) {
            if ($publicidad_slider['cMLink'] != '') {
                $estilo_span = 'background:#FFF;opacity:0.8;padding:2px 10px 2px 10px; text-transform: uppercase; line-height: 45px; font-size:35px; color:#777; top:130px; left: 390px; slidedirection : top; slideoutdirection : bottom; durationin : 3500; durationout : 3500; delayin : 1000;';
                $estilo_boton1 = 'padding: 9px 20px; font-size:25px; top:340px; left: 390px; slidedirection : bottom; slideoutdirection : top; durationin : 3500; durationout : 2500; delayin : 1000;';
                $estilo_boton2 = 'padding: 9px 20px; font-size:25px; top:340px; left: 590px; slidedirection : right; slideoutdirection : top; durationin : 3500; durationout : 2500; delayin : 1000;';
            } else {
                $estilo_span = 'background:#FFF;opacity:0.8;padding:2px 10px 2px 10px; text-transform: uppercase; line-height: 45px; font-size:35px; color:#777; top:130px; left: 590px; slidedirection : top; slideoutdirection : bottom; durationin : 3500; durationout : 3500; delayin : 1000;';
                $estilo_boton2 = 'padding: 9px 20px; font-size:25px; top:340px; left: 590px; slidedirection : right; slideoutdirection : top; durationin : 3500; durationout : 2500; delayin : 1000;';
            }
        } else if ($i == 2 || $i == 5) {
            if ($publicidad_slider['cMLink'] != '') {
                $estilo_span = 'background:#FFF;opacity:0.8;padding:2px 10px 2px 10px; color: #777; line-height:45px; font-weight: 200; font-size: 35px; top:100px; left: 50px; slidedirection : top; slideoutdirection : bottom; durationin : 1000; durationout : 1000;';
                $estilo_boton1 = 'padding: 9px 20px; font-size:25px; top:220px; left: 50px; slidedirection : bottom; slideoutdirection : bottom; durationin : 2000; durationout : 2000;';
                $estilo_boton2 = 'padding: 9px 20px; font-size:25px; top:220px; left: 250px; slidedirection : bottom; slideoutdirection : bottom; durationin : 2800; durationout : 2000;';
            } else {
                $estilo_span = 'background:#FFF;opacity:0.8;padding:2px 10px 2px 10px; color: #777; line-height:45px; font-weight: 200; font-size: 35px; top:100px; left: 150px; slidedirection : top; slideoutdirection : bottom; durationin : 1000; durationout : 1000;';
                $estilo_boton2 = 'padding: 9px 20px; font-size:25px; top:220px; left: 150px; slidedirection : bottom; slideoutdirection : bottom; durationin : 2800; durationout : 2000;';
            }
        } else if ($i == 3 || $i == 6) {
            if ($publicidad_slider['cMLink'] != '') {
                $estilo_span = 'background:#FFF;opacity:0.8;padding:2px 10px 2px 10px; color: #777; line-height:45px; font-weight: 200; font-size: 35px; top:100px; left: 50px; slidedirection : top; slideoutdirection : bottom; durationin : 1000; durationout : 1000;';
                $estilo_boton1 = 'padding: 9px 20px; font-size:25px; top:220px; left: 50px; slidedirection : top; slideoutdirection : bottom; durationin : 2000; durationout : 2000;';
                $estilo_boton2 = 'padding: 9px 20px; font-size:25px; top:220px; left: 250px; slidedirection : bottom; slideoutdirection : bottom; durationin : 2300; durationout : 2000;';
            } else {
                $estilo_span = 'background:#FFF;opacity:0.8;padding:2px 10px 2px 10px; color: #777; line-height:45px; font-weight: 200; font-size: 35px; top:100px; left: 50px; slidedirection : top; slideoutdirection : bottom; durationin : 1000; durationout : 1000;';
                $estilo_boton2 = 'padding: 9px 20px; font-size:25px; top:220px; left: 50px; slidedirection : top; slideoutdirection : bottom; durationin : 2000; durationout : 2000;';
            }
        }
        ?>
        <?php
        $titulo_oferta_url = replace_caracteres_raros($publicidad_slider["cTbIdDescripcion"]);
        ?>
        <div class="ls-slide cursor_pointer" data-ls="slidedelay:4500;transition2d:92,93,105;" enlace-ruta = "<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales-detalle'); ?>/<?php echo $titulo_oferta_url; ?>_<?php echo $publicidad_slider["nMultID"]; ?>">
            <img src="<?php echo URL_UPLOADS; ?>uploads_publicidad/<?php echo $publicidad_slider['cMLinkMiniatura'] ?>" class="ls-bg" alt="<?php echo $publicidad_slider["cTbIdDescripcion"]; ?>"/>
        </div>
        <?php $i++; ?>
    <?php } ?>
</div><!--/layer_slider-->
