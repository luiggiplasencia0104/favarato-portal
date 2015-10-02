var countries_list = [];
$(function () {
    soloCodigoCiudad("#codigo", "keypress");
    cboCountriesGet();

    $(".cerrar_valid").on('click', function (event) {
        $("#c_div_popup_valid_user").modal("hide");
    });

    // FUNCION PARA REGISTRAR LOS DATOS DEL CONTACTO
    $("#contact").validate({
        ignore: '.ignore'
        , rules: {
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
                email: true
            },
            subject: {
                required: true
            },
            text: {
                required: true
            }
        },
        submitHandler: function (form) {
            msgLoadSave("#sms_ins_enviar_email", ".btn_envia_email");
            var email = $("#email").val();
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                beforeSend: function () {
                    msjCargando('REGISTRANDO DATOS...');
                },
                success: function (response) {
                    if (response === '1') {
                        setTimeout(function () {
                            enviar_email(email);
                        }, 2000);
                    } else {
                        msgLoadSaveRemove(".btn_envia_email");
                        mensaje("Error Inesperado registrando el mensaje!, vuelva a intentarlo", "r");
                    }
                },
                error: function (msg) {
                    msgLoadSaveRemove(".btn_envia_email");
                    mensaje("Error Inesperado registrando el mensaje !, vuelva a intentarlo", "r");
                }
            });
        }
    });
});

// FUNCIÓN PARA OBTENER EL LISTADO DE PAÍSES
function cboCountriesGet() {
    $.ajax({
        type: "POST",
        url: 'contactanos/getCboPaises',
        success: function (response) {
            var data = evalResponseJson(response);
            if (data.a_paises !== null) {
                countries_list = $.map(data.a_paises, function (value, idx) {
                    return {
                        id: value.cPaisNombre_es,
                        text: value.cPaisNombre_es,
                        icon: value.cPaisIso2
                    };
                });

                initCountriesSelector();
            } else {
                mensaje("Error inesperado, no se cargaron los datos de los países!", "r");
            }
        },
        error: function () {
            alert("error");
        }
    });
}

// Función para instanciar la funcionalidad del select2 para los países
function initCountriesSelector() {
    var o_countries;
    $("#pais").select2({
        placeholder: 'Seleccionar',
        data: countries_list,
        formatResult: function (response)
        {
            if (response.icon !== '') {
                this.content = "<img src='http://" + ruta + "/img/country-flags/" + response.icon + ".png' class='icons_country_flags' /> " + response.text;
            } else {
                this.content = response.text;
            }
            return this.content;
        },
        formatSelection: function (response)
        {
            if (response.icon !== '') {
                this.content = "<img src='http://" + ruta + "/img/country-flags/" + response.icon + ".png' class='icons_country_flags' /> " + response.text;
            } else {
                this.content = response.text;
            }
            return this.content;
        },
        query: function (q) {
            if ('term' in q) {
                var pageSize = 10, results = countries_list.filter(function (e) {
                    return (q.term === "" || e.text.toUpperCase().indexOf(q.term.toUpperCase()) === 0);
                });
                q.callback({results: results.slice((q.page - 1) * pageSize, q.page * pageSize),
                    more: results.length >= q.page * pageSize});
            } else {
                o_countries = {id: '', text: 'Seleccionar', icon: ''};
            }
        }
    });

    $("#pais").select2('data', o_countries);
}

function enviar_email(email) {
    var cliente = $("#name").val();
    $.ajax({
        type: "POST",
        url: 'contactanos/enviar_email',
        data: {
            email: email,
            cliente: cliente
        },
        beforeSend: function () {
            msjCargando('ENVIANDO EMAIL...');
        },
        complete: function () {
            $('#mensajecarga').children().remove();
            $('#mensajecarga').hide();
        },
        success: function (response) {
            if (response === '1') {
                msgLoadSaveRemove(".btn_envia_email");
                window.location.href = 'http://' + ruta + '/' + $("#hid_segmento_idioma").val() + '/contactanos/mensaje_exito';
            } else {
                mensaje("Error Inesperado, no se ha enviado el email  !, vuelva a intentarlo", "r");
            }
        },
        error: function (msg) {
            mensaje("Error Inesperado, no se ha enviado el email  !, vuelva a intentarlo", "r");
        }
    });
}