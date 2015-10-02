<?php
$atributosForm = array('id ' => 'frm_ins_testimonios', 'name ' => 'frm_ins_testimonios');
echo form_open('testimonios/testimoniosIns', $atributosForm);

$txt_ins_test_nombres = array('name' => 'txt_ins_test_nombres', 'id' => 'txt_ins_test_nombres', 'maxlength' => '150', 'placeholder' => lang('idioma.testimonios-form-label1'), 'required' => 'required', 'tabindex' => '1');
$txt_ins_test_email = array('name' => 'txt_ins_test_email', 'id' => 'txt_ins_test_email', 'maxlength' => '150', 'placeholder' => lang('idioma.testimonios-form-label3'), 'required' => 'required', 'class' => 'cajasemail_test', 'tabindex' => '2');
$txt_ins_test_testimonio = array('name' => 'txt_ins_test_testimonio', 'id' => 'txt_ins_test_testimonio', 'placeholder' => lang('idioma.testimonios-form-label4'), 'rows' => 5, 'required' => 'required', 'tabindex' => '4');

$btn_ins_testimonio = form_submit('btn_ins_testimonio', lang('idioma.testimonios-form-button'), 'id="btn_ins_testimonio" class="button_ins" tabindex="5"');
?>
<h2><img src="<?php echo URL_IMG ?>pencil.png" /> <?php echo lang('idioma.testimonios-form-titulo'); ?></h2>
<?php echo form_input($txt_ins_test_nombres); ?>
<select name="cbo_ins_test_paises" id="cbo_ins_test_paises" class="chzn-select" tabindex="2">
    <option value=""><?php echo lang('idioma.testimonios-form-label2') ?></option>
    <?php $i = 1; ?>
    <?php foreach ($paises as $paises) { ?>
        <script type="text/javascript">
            $(document).ready(function() { 
                $(".chzn-results li:eq(0)").addClass("luiggi_0");
                $(".chzn-results li:eq(<?php echo $i; ?>)").addClass("luiggi<?php echo $i; ?>");
                $(".luiggi<?php echo $i; ?>").addClass("pais_<?php echo $paises->cPaisIso2 ?>");
                                                
                $(".luiggi<?php echo $i; ?>").click(function(e){
                    e.preventDefault();    
                    $( ".chzn-single span" ).removeClass(function() {
                        return $( this ).prev().attr( "class" );
                    });
                    $(".chzn-single span").addClass("pais_<?php echo $paises->cPaisIso2 ?>");
                })
            });    
        </script>
        <?php if ($this->uri->segment(1) == "en") { ?>
            <option value="<?php echo mb_convert_encoding($paises->nPaisID, "UTF-8"); ?>"><?php echo mb_convert_encoding($paises->cPaisNombre_en, "UTF-8"); ?></option>
        <?php } else { ?>
            <option value="<?php echo mb_convert_encoding($paises->nPaisID, "UTF-8"); ?>"><?php echo mb_convert_encoding($paises->cPaisNombre_es, "UTF-8"); ?></option>
        <?php } ?>
        <?php $i++; ?>
    <?php } ?>

</select>
<script type="text/javascript">
    $(document).ready(function() { 
        // PRIMERA OPCIÓN DEL COMBO DE PAISES
        $('.luiggi_0').click(function(e){
            e.preventDefault();    
            $( ".chzn-single span" ).removeClass(function() {
                return $( this ).prev().attr( "class" );
            });
        
            $( ".chzn-single span" ).html("<?php echo lang('idioma.testimonios-form-label2') ?>");
            $('.luiggi_0').addClass('result-selected');
            $(".chzn-select").val('');
        });
    });
</script>
<?php echo form_input($txt_ins_test_email); ?>
<?php echo form_textarea($txt_ins_test_testimonio); ?>
<?php echo $btn_ins_testimonio; ?> <span id="sms_ins_testimonio"></span>
<?php echo form_close(); ?>
<?php echo validation_errors(); ?>
