<link rel="stylesheet" href="<?php echo URL_CSS ?>style.css">
<link rel="stylesheet" href="<?php echo URL_CSS ?>colors/blue.css" id="colors">
<div class="testimonial2 item">
    <p>
        "<?php echo $cTestDescripcion; ?>"
    </p>
    <div class="testimonials2-arrow">
    </div>
    <div class="author">
        <div class="testimonial2-author-info">
            <a class="cursor_pointer" href="javascript:void(0);">
                <span class="color"><?php echo $cTestAlias; ?></span>
            </a> 
            <img src="<?php echo URL_IMG ?>country-flags/<?php echo $cTestPaisIso2; ?>.png" /> <?php echo $cTestPais ?> 
        </div>
    </div>
</div>