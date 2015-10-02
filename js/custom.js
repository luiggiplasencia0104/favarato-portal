jQuery(function () {
    getListMenuCategories();
});

/*----------------------------------------------------*/
/*	Carousel Section
 /*----------------------------------------------------*/
jQuery('.portfolio-carousel').carousel({
    interval: false,
    wrap: false
});

jQuery('.client-carousel').carousel({
    interval: false,
    wrap: false
});

jQuery('.testimonials-carousel').carousel({
    interval: 5000,
    pause: "hover"
});

// ================== IDIOMA =============================
jQuery(function () {
    jQuery('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
        effect: 'fade',
        testMode: true,
        onChange: function (evt) {
            if (evt.selectedItem === "es") {
                window.location.href = $("#ruta_es").val();
            } else {
                window.location.href = $("#ruta_en").val();
            }
        }
    });
});

/*----------------------------------------------------*/
/*	Sticky Menu
 /*----------------------------------------------------*/

jQuery(function () {
    jQuery(".main-header").sticky({
        topSpacing: 0
    });
});

/*----------------------------------------------------*/
/*	Scroll To Top Section
 /*----------------------------------------------------*/
jQuery(function () {
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });

    jQuery('.scrollup').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});

/*----------------------------------------------------*/
/*	Jquery Carousel
 /*----------------------------------------------------*/
$('.carousel[id]').each(
        function () {
            var html = '<div class="carousel-nav" data-target="' + $(this).attr('id') + '"><ul>';

            for (var i = 0; i < $(this).find('.item').size(); i++) {
                html += '<li><a';
                if (i === 0) {
                    html += ' class="activado"';
                }

                html += ' href="#">â€¢</a></li>';
            }

            html += '</ul></li>';
            $(this).before(html);

        }
).bind('slid', function (e) {
    var nav = $('.carousel-nav[data-target="' + $(this).attr('id') + '"] ul');
    var index = $(this).find('.item.active').index();
    var item = nav.find('li').get(index);

    nav.find('li a.activado').removeClass('activado');
    $(item).find('a').addClass('activado');
});

$('.carousel-nav a').on('click', function (e) {
    var index = $(this).parent().index();
    var carousel = $('#' + $(this).closest('.carousel-nav').attr('data-target'));

    carousel.carousel(index);
    e.preventDefault();
});

/* CUANDO ES MOVIL */
jQuery(function () {
    jQuery("ul.sf-menu").on({
        click: function () {
            msjCargando();
        }
    });

    /*Mobile device topnav opener*/
    jQuery(".down-button").on({
        click: function () {
            jQuery(".down-button .icon-current").toggleClass("icon-angle-up icon-angle-down");
        }
    });

    //jQuery( ".menu_mobile" ).click(function() {
    jQuery(".menu_mobile").on({
        click: function () {
            if (jQuery(this).hasClass("menu_cerrado")) {
                jQuery(this).removeClass("menu_cerrado");
                jQuery(this).addClass("menu_abierto");
                jQuery(".menu").removeClass("collapse");
            } else {
                jQuery(this).removeClass("menu_abierto");
                jQuery(this).addClass("menu_cerrado");
                jQuery(".menu").addClass("collapse");
            }
        }
    });
});

/* FACEBOOK LIKEBOX PLUGIN */
jQuery(function () {
    jQuery(".clase_facebook").on({
        click: function () {
            if ($('#contenedor_fb').children().length === 0) {
                jQuery('#contenedor_fb').css("margin-top", "10px");
                jQuery('#contenedor_fb').html('<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FFavaratoExpress&amp;width=250&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="width:250px;border:none; overflow:hidden; height:258px;" allowTransparency="true"></iframe>');
            }
        }
    });

    jQuery(".clase_twitter").on({
        click: function () {

        }
    });
});

function getListMenuCategories() {
    $.ajax({
        type: "JSON",
        url: "http://" + ruta + "/" + current_language + "/productos/getListMenuCategories",
        beforeSend: function () {
            msjCargando();
        },
        complete: function () {
            $('#mensajecarga').children().remove();
            $('#mensajecarga').hide();
            $('.content').removeClass('heigth-page');
            $('.content-page-change').removeClass('hide');
            $('#style-switcher').removeClass('hide');
            $('#style-switcher2').removeClass('hide');

            if (pathname === pathControllerContact) {
                setTimeout(function () {
                    loadScriptmapa();
                }, 500);
            }
        },
        success: function (response) {
            var data = evalResponseJson(response);
            constructMenuCategories(data.a_categories, 'list_menu_categories');
        }
    });
}

function constructMenuCategories(a_categories, etiqueta) {
    var nameController = current_language === 'es' ? "productos" : "products";
    var $e = $('#' + etiqueta);

    $.each(a_categories, function (idx, value) {
        var $tag_li = getElement('li');
        var $tag_a = getElement('a');
        var $tag_span = getElement('span').text(value.desc_categoria + ' ');

        var $descCategoriaUrl = current_language === 'es' ? value.url_categoria + "-al-por-mayor" : "wholesale-" + value.url_categoria;

        if (value.estado === 'I') {
            $tag_a.attr('href', 'javascript:void(0);')
                    .click(function () {
                        swal({
                            title: "Advertencia",
                            text: "Estimado cliente en estos momentos no disponemos de productos para la categoria de " + value.desc_categoria,
                            type: "warning",
                            confirmButtonClass: 'btn-info',
                            confirmButtonText: 'Aceptar'
                        });
                    })
                    .append($tag_span).append(getElement('label').addClass('label_boot label-danger label_menu').append('No disponible'));
        } else {
            $tag_a.attr('href', 'http://' + ruta + '/' + current_language + '/' + nameController + '/' + $descCategoriaUrl).append($tag_span);
        }

        $tag_li.append($tag_a);

        if ((value.subcategorias).length > 0) {
            var $subtag_ul = getElement('ul');

            $.each(value.subcategorias, function (idsc, value2) {
                var $subtag_li = getElement('li');
                var $subtag_a = getElement('a');
                var $subtag_span = getElement('span').text(value2.desc_subcategoria + ' ');
                if (value2.estado === 'I') {
                    $subtag_a.attr('href', 'javascript:void(0);')
                            .click(function () {
                                swal({
                                    title: "Advertencia",
                                    text: "Estimado cliente en estos momentos no disponemos de productos para la subcategoria de " + value2.desc_subcategoria,
                                    type: "warning",
                                    confirmButtonClass: 'btn-info',
                                    confirmButtonText: 'Aceptar'
                                });
                            })
                            .append($subtag_span).append(getElement('label').addClass('label_boot label-danger label_menu').append('No disponible'));
                } else {
                    $subtag_a.attr('href', 'http://' + ruta + '/' + current_language + '/' + nameController + '/' + $descCategoriaUrl + '/' + value2.url_subcategoria).append($subtag_span);
                }

                $tag_li.append($subtag_ul.append($subtag_li.append($subtag_a)));
            });
        }

        $e.append($tag_li);
    });
}

// FUNCIÓN PARA CARGAR MAPA DE CONTACTANOS
function initialize_maps() {
    var popupinicial;
    var myOptions = {
        center: new google.maps.LatLng(ubi_latitud, ubi_longitud),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    var map = new google.maps.Map(document.getElementById("maps"), myOptions);
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(ubi_latitud, ubi_longitud),
        map: map,
        title: titleMarkerMapFavarato
    });

    if (!popupinicial) {
        popupinicial = new google.maps.InfoWindow();
    }

    var contenido = '<div style="width:auto;"><div style="float:left;margin-left:10px;"><b><span style="font-size:16px;color:#000;">13222 SW 131 St</span></b><br />Miami, FL 33186</div></div>';
    popupinicial.setContent(contenido);
    popupinicial.open(map, marker);
}

function loadScriptmapa() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://maps.google.com/maps/api/js?sensor=false&' +
            'callback=initialize_maps';
    document.body.appendChild(script);
}



