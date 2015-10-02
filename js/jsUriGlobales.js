var PATH_PROJECT = 'portal';
var path_local = window.location.host + '/favarato/' + PATH_PROJECT;
var path_production = window.location.host + '/' + PATH_PROJECT;
var ruta = ENVIRONMENT !== 'development' ? path_production : path_local;
var pathname = window.location.pathname;
var pathControllerContact;
var titleMarkerMapFavarato;

if (current_language === "es") {
    titleMarkerMapFavarato = 'Ubicación de Favarato Express Inc.';
    pathControllerContact = ENVIRONMENT !== 'development' ? '/portal/es/contactanos' : '/favarato/portal/es/contactanos';
}else{
    titleMarkerMapFavarato = 'Location Favarato Express Inc.';
    pathControllerContact = ENVIRONMENT !== 'development' ? '/portal/en/contact_us' : '/favarato/portal/es/contact_us';
}

var ubi_latitud = 25.645743;
var ubi_longitud = -80.406983;