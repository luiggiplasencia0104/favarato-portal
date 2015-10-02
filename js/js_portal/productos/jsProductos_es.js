$(function(){   
    msgLoading("#cont_div_qry_productos","Buscando...");
    qryProductos($("#hid_id_cat").val(),$("#hid_id_subcat").val(),"http://"+ruta+"/portal/"+$("#hid_segmento_idioma").val()+"/products/qryProductos/0");
});

function qryProductos(id_categoria,id_subcategoria,ruta){
    var accion;
    if(id_subcategoria == "sin_sc"){
        accion = "L-PRODUCTOS-PORTAL-CRITERIO-1";
    }else{
        accion = "L-PRODUCTOS-PORTAL-CRITERIO-2";
    }
    
    $.ajax({
        type: "POST",
        url: ruta,
        data: {
            json:{
                accion : accion,
                id_categoria : id_categoria,
                id_subcategoria : id_subcategoria,
                Mostrar:6,
                div:"cont_div_qry_productos"
            }
        },
        cache: false,
        success: function(data) {
            $("#cont_div_qry_productos").hide().fadeIn(250);
            $("#cont_div_qry_productos").html(data);  
               
            $(function(){                
                // CLICK IMAGEN Y MOSTRAR DETALLE DEL PRODUCTO SELECCIONADO
                $(".image-container").on('click','.ver_deta', function(event){ 
                    var url = $(this).attr('data-ruta');
                    location.href = url;
                });
            });
        },
        error: function() { 
            alert("error");
        }              
    });
}
