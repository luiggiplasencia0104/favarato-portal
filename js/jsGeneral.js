function msjCargando(msg) {
    var msg_loading = msg === undefined ? 'CARGANDO...' : msg;
    var $e = $('#mensajecarga');
    $e.removeClass('hide');
    $e.children().remove();
    var $div_fond = getElement('div').addClass('fond').attr('align', 'center');
    var $div_general = getElement('div').addClass('contener_general');
    var $div_mixte1 = getElement('div').addClass('contener_mixte');
    var $div_ball1 = getElement('div').addClass('ballcolor ball_1');
    var $div_mixte2 = getElement('div').addClass('contener_mixte');
    var $div_ball2 = getElement('div').addClass('ballcolor ball_2');
    var $div_mixte3 = getElement('div').addClass('contener_mixte');
    var $div_ball3 = getElement('div').addClass('ballcolor ball_3');
    var $div_mixte4 = getElement('div').addClass('contener_mixte');
    var $div_ball4 = getElement('div').addClass('ballcolor ball_4');

    $div_general
            .append($div_mixte1).append($div_ball1.append('&nbsp;'))
            .append($div_mixte2).append($div_ball2.append('&nbsp;'))
            .append($div_mixte3).append($div_ball3.append('&nbsp;'))
            .append($div_mixte4).append($div_ball4.append('&nbsp;'));

    var $div = getElement('div').css('padding-top', '5px');
    var $div_text = getElement('div').css({
        'color': '#FFF'
        , 'font-weight': '700'
        , 'font-size': '15px'
        , 'padding-top': '20px'
    }).text(msg_loading);

    $div.append($div_text);

    $e.append($div_fond.append($div_general).append($div));
    $e.show();
}

/* LIMPIA UN FORMULARIO */
function limpiarForm(obj) {
    // enaviar asi: limpiarForm('#miForm');
    $(':input', $(obj)).each(function () {
        var type = this.type;
        var tag = this.tagName.toLowerCase();
        if (type === 'text' || type === 'password' || tag === 'textarea' || type === 'hidden')
            this.value = '';
        else if (type === 'checkbox' || type === 'radio')
            this.checked = false;
        else if (tag === 'select')
            this.selectedIndex = 0; //-1
    });
}


/* MASCARAS */
function mascaraCelular(obj) {
    $(obj).mask("999-999-999");
}

function mascaraTelefono(obj) {
    $(obj).mask("(999) 999999");
}

/* MENSAJERIA */
function msgLoading(obj, msg) {
    if (msg === undefined) {
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><img src='http://" + ruta + "/img/loading.gif'/>&nbsp;Cargando ... por favor espere.</div>");
    } else {
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><img src='http://" + ruta + "/img/loading.gif'/>&nbsp;" + " " + msg + "</div>");
    }
}

function msgAviso(obj, msg) {
    if (msg === undefined) {
        $(obj).html("<section class='infobox'><p>No se encontraron registros</p></section>");
    } else {
        $(obj).html("<section class='infobox'><p>" + msg + "</p></section>");
    }
}

function msgExito(obj, msg) {
    if (msg === undefined) {
        $(obj).html("<div id='msg_exito' class='alert alert-success'><span class='ui-icon ui-icon-check' style='float: left; margin-right: .3em;'></span> <strong>¡Bien! ... </strong> Operacion realizada exitosamente.</div>");
    } else {
        $(obj).html("<div id='msg_exito' class='alert alert-success'><span class='ui-icon ui-icon-check' style='float: left; margin-right: .3em;'></span> <strong>¡Bien! ... </strong> " + msg + "</div>");
    }
}

// mensaje de informacion con opcion de cerrarlo desde una X
function msgInfo(obj, msg) {
    if (msg === undefined) {
        $(obj).html('<div id="msg_information"><div class="alert alert-info alert-block"><h4 class="alert-heading"><span class="ui-icon ui-icon-flag" style="float: left; margin-right: .3em;margin-left: 0"></span>Informaci&oacute;n !</h4>No se encontraron registros.</div></div>');
    } else {
        $(obj).html('<div id="msg_information"><div class="alert alert-info alert-block"><h4 class="alert-heading"><span class="ui-icon ui-icon-flag" style="float: left; margin-right: .3em;margin-left: 0"></span>Informaci&oacute;n !</h4>' + msg + '</div></div>');
    }
}

function msgError(obj, msg) {
    if (msg === undefined) {
        $(obj).html("<div id='msg_error' class='alert alert-error'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> <strong>¡Error! ... </strong> Ha ocurrido un error, vuelva a intentarlo.</div>");
    } else {
        $(obj).html("<div id='msg_error' class='alert alert-error'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> <strong>¡Error! ... </strong> " + msg + "</div>");
    }
}

function msgAlerta(obj, msg) {
    $(obj).html("<div id='msg_alert'  class='alert'><strong>¡Cuidado! ... </strong> " + msg + "</div>");
}

function msgLoadSave(obj, btn) { //preload al costado del boton
    $(btn).attr("disabled", "true");
    $(obj).html("<div id='msg_saving' style='display:inline;'><img src='http://" + ruta + "/img/loading.gif'/></div>");
}

function msgLoadSaveRemove(btn) {
    $("#msg_saving").remove();
    $(btn).removeAttr("disabled");
}

function initEvtClosePopup(objCerrar, ObjPopup) {
    $(objCerrar).click(function () {
        $(ObjPopup).dialog("close");
    })
}
;

function deshabilitaPegar(obj) {
    $(obj).keydown(function (event) {
        var teclasNoPermitidas = new Array('c', 'x', 'v');
        var keyCode = (event.keyCode) ? event.keyCode : event.which;
        var esCtrl;
        esCtrl = event.ctrlKey
        if (esCtrl) {
            for (i = 0; i < teclasNoPermitidas.length; i++) {
                if (teclasNoPermitidas[i] === String.fromCharCode(keyCode).toLowerCase()) {
                    return false;
                }
            }
        }
        return true;
    });

    $(obj).bind('contextmenu', function (e) {
        return false;
    });
}

function getElement(tag) {
    return $(document.createElement(tag));
}

function evalResponseJson(data) {
    return $.parseJSON(data);
}