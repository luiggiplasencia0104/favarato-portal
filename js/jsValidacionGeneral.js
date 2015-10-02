
function unbindAttr(obj,evt){
    $(obj).unbind(evt);
}

function soloNumeros(obj,evt){
    $(obj).bind(evt, function(e) { 
        return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true;
    })
}
function sin_tilde(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÑñ()\s_]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}
// @luiggi
function letras(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÁÉÍÓÚÑáéíóúñ()\s_]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function formato_doc(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[0123456789\s-]/;
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function soloCodigoCiudad(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[0123456789\s-*+]/;
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function numeros_decimales(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[0123456789\.]/;
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}




function sololetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíúóabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    especiales = [8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
function direccion_validacion(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÑñ0123456789().#\s_-]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function email_validacion(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÑñ0123456789().@\s_-]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function letra_guion_numeros(obj,evt){  
    $(obj).bind(evt, function(e) {       
        tecla = (document.all) ? e.keyCode : e.which;
        if (e.keyCode==8) return true;
        if (e.keyCode==9) return true;
        if (e.keyCode==35) return true;
        if (e.keyCode==36) return true;
        if (e.keyCode==37) return true;
        if (e.keyCode==38) return true;
        if (e.keyCode==39) return true;
        if (e.keyCode==40) return true;
        if (e.keyCode==46) return true;
        if (e.keyCode==1) return true;
        patron =/[A-Za-zÑñ0123456789\-]/; 
        te = String.fromCharCode(tecla); 
        return patron.test(te);
    })
}

function solodireccion(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " �����-abcdefghijklmn�opqrstuvwxyz _�#;,.:ABCDEFGHIJKLMN�OPQRSTUVWXYZ0123456789";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

function soloemail(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "-abcdefghijklmn�opqrstuvwxyz_@�.ABCDEFGHIJKLMN�OPQRSTUVWXYZ0123456789";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


function solousuario(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "-abcdefghijklmn�opqrstuvwxyz_@�.ABCDEFGHIJKLMN�OPQRSTUVWXYZ0123456789";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
 
}

function solodouble(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron = /[-123456789.1234567890]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}



function ClaveUsuario(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (e.keyCode==8) return true;
    if (e.keyCode==9) return true;
    if (e.keyCode==35) return true;
    if (e.keyCode==36) return true;
    if (e.keyCode==37) return true;
    if (e.keyCode==38) return true;
    if (e.keyCode==39) return true;
    if (e.keyCode==40) return true;
    if (e.keyCode==46) return true;
    if (e.keyCode==1) return true;
    patron =/[A-Za-zÁÉÍÓÚÑáéíóúñ()-123456789.@_]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te);
}
 
function locaciones(e) { // 1
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "-1234567890.";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
 
function titulos(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " �����abcdefghijklmn�opqrstuvwxyzABCDEFGHIJKLMN�OPQRSTUVWXYZ1234567890.#";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
	 
	 
function dinero(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890.";
    especiales = [1,8,9,36,37,39,46];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
	 
function documentos(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmn�opqrstuvwxyzABCDEFGHIJKLMN�OPQRSTUVWXYZ1234567890.-/";
    especiales = [1,8,9,36,37,39,46];
    
    disables= [16];

    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }
    
    tecla_disabled = true
    for(var i in disables){
        if(key == disables[i]){
            disables = false;
            break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

function letrasYnumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;
    

    if (e.keyCode==8) return true;
    if (e.keyCode==9) return true;
    if (e.keyCode==37) return true;
    if (e.keyCode==38) return true;
    if (e.keyCode==39) return true;
    if (e.keyCode==40) return true;
    
    patron =/[A-Za-zÁÉÍÓÚÑáéíóúñ0-9()\s_]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te);
}


function solodecimales(e) { // 1
    
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    if (tecla==9) return true; 
    if (e.keyCode==9) return true;
    patron = /[0123456789.1234567890]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}