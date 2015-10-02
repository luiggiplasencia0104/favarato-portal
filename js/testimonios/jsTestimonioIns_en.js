jQuery(document).ready(function() {

    $(".chzn-select").chosen();
    $(".chzn-container-single .chzn-search input").css("height","18px");
    $(".chzn-single span").css("text-align","justify");
    $(".chzn-results li").css("text-align","justify");          

    $.backstretch([
        "../img/backgrounds_fotos/4.jpg"
        ,"../img/backgrounds_fotos/3.jpg"
        , "../img/backgrounds_fotos/1.jpg"
        , "../img/backgrounds_fotos/2.jpg"
        ], {
            duration: 5000, 
            fade: 750
        });
        
    $('.links a.home').tooltip();
    $('.links a.blog').tooltip();
        
    $("#frm_ins_testimonios").validate({
        invalidHandler: function(event, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $(".register form input").css("margin-bottom","0");
                $(".register form textarea").css("margin-bottom","0");
                $("#txt_ins_test_email").css("margin-top","8px");
                
                // ACCIÓN CHANGE -> COMBO DE PAISES
                $("#cbo_ins_test_paises").bind('change', function(event){    
                    if(!$("#cbo_ins_test_paises").valid()){
                        $("form label.error[for='cbo_ins_test_paises']").css({
                            "margin":"29px 0 0 8px"
                        });
                        $("#txt_ins_test_email").css("margin-top","8px");
                    }else{
                        $("form label.error[for='cbo_ins_test_paises']").css({
                            "margin":"29px 0 0 8px"
                        });
                        $("#txt_ins_test_email").css("margin-top","0");
                    }
                });
                
                // ACCIÓN KEY UP -> CONTROL NOMBRES
                $("#txt_ins_test_nombres").bind('keyup', function(event){   
                    if(!$("#txt_ins_test_nombres").valid()){
                        $("#txt_ins_test_nombres").css("margin-bottom","0");
                        
                    }else{
                        $("#txt_ins_test_nombres").css("margin-bottom","10px");
                        $("#txt_ins_test_email").css("margin-top","8px");
                    }
                });
    
                // ACCIÓN KEY UP -> CONTROL EMAIL
                $("#txt_ins_test_email").bind('keyup', function(event){   
                    if(!$("#txt_ins_test_email").valid()){
                        $("#txt_ins_test_email").css("margin-bottom","0");
                    }else{
                        $("#txt_ins_test_email").css("margin-bottom","10px");
                    }
                });
                
                // ACCIÓN KEY UP -> CONTROL TESTIMONIOS
                $("#txt_ins_test_testimonio").bind('keyup', function(event){   
                    if(!$("#txt_ins_test_testimonio").valid()){
                        $("#txt_ins_test_testimonio").css("margin-bottom","0");
                    }
                    else{
                        $("#txt_ins_test_testimonio").css("margin-bottom","10px");
                    }
                });
            } else {
                $(".register form input").css("margin-bottom","10px");
                $("#txt_ins_test_email").css("margin-top","0");
            }
        },
        rules: {
            txt_ins_test_nombres: {
                required: true
            },
            cbo_ins_test_paises: {
                required: true
            },
            txt_ins_test_email: {
                required: true,
                email:true
            },
            txt_ins_test_testimonio: {
                required: true
            }
        },
        submitHandler: function(form){
            msgLoadSave("#sms_ins_testimonio","#btn_ins_testimonio");
            var persona=$("#txt_ins_test_nombres").val();
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function(msg){
                    if(msg.trim()=="email_repetido"){             
                        msgLoadSaveRemove("#btn_ins_testimonio");
                        $("#c_div_popup_valid_email").modal({
                            show:true,
                            backdrop: "static",
                            keyboard: false
                        });
                        
                        $(".cerrar_popup2").bind('click', function(event){   
                            $("#txt_ins_test_email").val("");
                            $("#txt_ins_test_email").focus();
                        });
                    }
                    else if(msg.trim()==1){   
                        msgLoadSaveRemove("#btn_ins_testimonio");
                        $("#persona_test").html("<b>"+persona+"</b>");
                        $("#c_div_popup_reg_testimonios").modal({
                            show:true,
                            backdrop: "static",
                            keyboard: false
                        });     
                        limpiarForm("#frm_ins_testimonios");
                        
                        $(".cerrar_valid").bind('click', function(event){   
                            location.reload();
                        });
                        
                    }else{
                        msgLoadSaveRemove("#btn_ins_testimonio");
                        mensaje("Unexpected Error, can not register the testimony !, try again ","r");                        
                    }                    
                },
                error: function(msg){                
                    msgLoadSaveRemove("#btn_ins_testimonio");
                    mensaje("Unexpected Error, can not register the testimony !, try again ","r");                        
                }
            });
        }                    
    });
});


