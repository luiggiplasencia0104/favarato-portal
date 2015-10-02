jQuery(function(){  
    $("#upscroll").carouFredSel({
        direction:"up",
        mousewheel:false,
        align:"top",
        height:"150%",
        items:{
            visible:{
                min:2,
                max:4
            },
            width:25+"%",
            height:"variable"
        },
        scroll:{
            items:1,
            mousewheel:true,
            easing:"swing",
            duration:500
        },
        auto:false,
        prev:{
            button:"#upthum"
        },
        next:{
            button:"#downthum"
        }
    });    
    jQuery(".prev-thum li a").click(function(){
        var e=jQuery(this).data("image");
        var t=jQuery(this).data("zoomImage");
        jQuery("#big_image").fadeOut(function(){
            $(this).attr("src",e).fadeIn()
        });
        jQuery(this).get(0).href="javascript:void(0);";
        jQuery(".box-zoom:last").attr("href",t)
    });
});

jQuery(function(){    
    // CLICK IMAGEN Y MOSTRAR DETALLE DEL PRODUCTO SELECCIONADO
    $(".image-container").on('click','.ver_deta', function(event){ 
        var url = $(this).attr('data-ruta');
        location.href = url;
    });
});