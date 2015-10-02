<?php foreach ($publicidad as $publicidad_ventas) { ?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="content-box">
            <div class="content-box-icon">
                <img src="<?php echo URL_UPLOADS . "uploads_publicidad/" . $publicidad_ventas["cMLinkMiniatura"]; ?>" alt=" "/>
            </div>
            <div class="content-box-info">
                <h4 class="color_resaltante"><?php echo $publicidad_ventas["cTbIdDescripcion"]; ?></h4>
                <p>
                    <?php echo $publicidad_ventas["cTbIdDescripcionLarga"]; ?>
                </p>
            </div>
        </div>
    </div>
<?php } ?>