$(function(){   
    // CLICK PARA MOSTRAR INFORMACIÓN DE NIÑOS, MUJERES O HOMBRES
    $(".view-enlace").on('click', function(event){ 
        var url_enlace = $(this).attr('dato-enlace');
        location.href = url_enlace;
    });
});