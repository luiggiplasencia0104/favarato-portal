jQuery(document).ready(function () {
    LayerSlider.initLayerSlider();
        
    $(".ls-slide").bind('click', function(event){ 
        var url = $(this).attr('enlace-ruta');
        location.href = url;
    });
});

var LayerSlider = function () {
    return {

        //Layer Slider
        initLayerSlider: function () {
            $(document).ready(function(){
                jQuery("#layerslider").layerSlider({
                    skin: 'fullwidth',
                    responsive : true,
                    responsiveUnder : 1230,
                    layersContainer : 1230,
                    skinsPath: '../js/layer-slider/layerslider/skins/'
                });
            });     
        }

    };
}();        