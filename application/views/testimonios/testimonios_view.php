<?php $j = 1; ?>
<?php foreach ($testimonios as $testimonios) { ?>
    <?php $item_active = $j === 1 ? 'active' : ''; ?>
    <?php if (fmod($j, 2) != 0) { ?>
        <div class="item <?php echo $item_active; ?>">
        <?php } ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item">
            <div class="testimonial item">
                <p>
                    <?php if (strlen($testimonios["cTestDescripcion"]) > 280) { ?>
                        <?php $desc_testimonio = substr($testimonios["cTestDescripcion"], 0, 280); ?>
                        "<?php echo $desc_testimonio; ?>... <a href="<?php echo URL_MAIN ?><?php echo lang('idioma.controlador-inicio-testimonio'); ?>/<?php echo $testimonios["nTestID"]; ?>?iframe=true&width=600" data-gal="prettyPhoto" title=""><span class="color">[<?php echo lang('idioma.seccion-testimonios-read-more'); ?>]</span></a>
                    <?php } else { ?>
                        "<?php echo $testimonios["cTestDescripcion"]; ?>"
                    <?php } ?>
                </p>
                <div class="testimonials-arrow"></div>
                <div class="author">
                    <div class="testimonial-author-info">
                        <a class="cursor_pointer" href="javascript:void(0);">
                            <span class="color"><?php echo $testimonios["cTestAlias"] ?></span>
                        </a> 
                        <img src="<?php echo URL_IMG ?>country-flags/<?php echo $testimonios["cPaisIso2"] ?>.png" /> <?php echo $testimonios["Pais"] ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (fmod($j, 2) == 0) { ?>
        </div>
    <?php } ?>
    <?php $j++; ?>
<?php } ?>