$(function(){    
    soloCodigoCiudad("#codigo","keypress");
    
    jQuery(".chzn-select").chosen();
    cbo_paises();
        
    // ACCIÓN CHANGE -> COMBO DE PAISES
    jQuery("#pais").on('change',function(e){
        e.preventDefault();    
        if(!jQuery(this).valid()){
            jQuery("form label.error[for='pais']").css({
                "margin":"29px 0 0 10px"
            });
        }else{
            jQuery("form label.error[for='pais']").css({
                "margin":"26px 0 0 10px"
            });
        }
            
        jQuery( ".chzn-single span" ).removeClass(function() {
            return jQuery( this ).prev().attr( "class" );
        });
        var obj = jQuery(".chzn-results").find('.result-selected')[0].id;
            
        jQuery(".chzn-single span").addClass(jQuery('#'+obj).attr('code-pais'));
    })
    
    $(".cerrar_valid").on('click', function(event){
        $("#c_div_popup_valid_user").modal("hide");
    });
    
    // FUNCION PARA REGISTRAR LOS DATOS DE CONTACTO
    $("#contact").validate({
        rules: {
            name: {
                required: true
            },
            empresa: {
                required: true
            },
            pais: {
                required: true
            },
            ciudad: {
                required: true
            },
            telefono: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            subject: {
                required: true
            },
            text: {
                required: true
            }
        },
        submitHandler: function(form){
            msgLoadSave("#sms_ins_enviar_email",".btn_envia_email");
            var email=$("#email").val();

            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()==1){        
                        enviar_email(email);
                    }else{
                        msgLoadSaveRemove(".btn_envia_email");
                        mensaje("Unexpected Error register the message !, try again","r");                        
                    }                    
                },
                error: function(msg){  
                    msgLoadSaveRemove(".btn_envia_email");
                    mensaje("Unexpected Error register the message !, try again","r");                        
                }
            });
        }
    });
});

function cbo_paises(){
    $.ajax({
        type: "POST",
        url: 'contactanos/getCboPaises',
        success: function(data) {
            var a_paises = $.parseJSON(data);
            $.each(a_paises.paises, function(id, value){
                $('#pais').append('<option code-pais="'+value.cPaisIso2+'" value="'+value.cPaisNombre_es+'">'+value.cPaisNombre_en+'</option>');
            });
            $(".chzn-select").val('').trigger("liszt:updated");
                
            var j=1;
            jQuery(".chzn-results li:eq(0)").addClass("luiggi_0");
            $.each(a_paises.paises, function(id, value){
                jQuery(".chzn-results li:eq("+j+")").attr("code-pais","pais_"+value.cPaisIso2+"");
                jQuery(".chzn-results li:eq("+j+")").addClass("luiggi"+j+"");
                jQuery(".luiggi"+j+"").addClass("pais_"+value.cPaisIso2+"");
                j++;
            });
                
            jQuery(".chzn-results > li").on('click',function(e){
                e.preventDefault();    
                jQuery( ".chzn-single span" ).removeClass(function() {
                    return $( this ).prev().attr( "class" );
                });
                jQuery(".chzn-single span").addClass($(this).attr('code-pais'));
            })
        },
        error: function() {
            alert("error");
        }
    });
}

function enviar_email(email){
    var cliente=$("#name").val();
    $.ajax({
        type: "POST",
        url: 'contact_us/enviar_email',
        data: {
            email:email,
            cliente:cliente
        },
        success: function(msg){
            if(msg.trim()==1){        
                msgLoadSaveRemove(".btn_envia_email");
                window.location.href = 'http://'+ruta+'/portal/'+$("#hid_segmento_idioma").val()+'/contact_us/success_message';
            }else{
                mensaje("Unexpected Error has not been sent the email !, try again","r");                 
            }                    
        },
        error: function(msg){                
            mensaje("Unexpected Error has not been sent the email !, try again","r");                      
        }
    });
}