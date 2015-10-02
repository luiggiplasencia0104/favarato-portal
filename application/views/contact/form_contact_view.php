<form method="post" class="reply" id="contact" action="<?php echo lang('idioma.controlador-contactos'); ?>/mensajeContactoIns">
    <fieldset>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label1'); ?>:</label>
                <input class="form-control" id="name" name="name" type="text" required="required" autocomplete="off" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label2'); ?>:</label>
                <input class="form-control" type="text" id="empresa" name="empresa" required="required" autocomplete="off" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label3'); ?>:</label>
                <input type="hidden" name="pais" id="pais" class="form-control" required="required" autocomplete="off" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label4'); ?>:</label>
                <input class="form-control" type="text" id="ciudad" name="ciudad" required="required" autocomplete="off" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label5'); ?>:</label>
                <input class="form-control" id="codigo" name="codigo" type="text" autocomplete="off" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label6'); ?>:</label>
                <input class="form-control" type="text" id="telefono" name="telefono" required="required" autocomplete="off" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label7'); ?>:</label>
                <input class="form-control" id="celular" name="celular" type="text" autocomplete="off" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label8'); ?>:</label>
                <input class="form-control" type="text" id="email" name="email" required="required" autocomplete="off" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label9'); ?>:</label>
                <input class="form-control" id="subject" name="subject" type="text" required="required" autocomplete="off" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-control-input">
                <label><?php echo lang('idioma.pag-contact-texto1-label10'); ?>:</label>
                <textarea class="form-control" id="text" name="text" rows="3" cols="40" required="required" autocomplete="off" ></textarea>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="btn-normal btn-color submit btn_envia_email bottom-pad" value="<?php echo lang('idioma.pag-contact-texto1-button'); ?>" />
    <span id="sms_ins_enviar_email"></span>
    <div class="clearfix"></div>
</form>