<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    private $idioma;

    function __construct() {
        parent::__construct();
        $this->idioma = $this->uri->segment(1);
        $this->load->model('admin/testimonios_model');
        $this->load->model('admin/publicidad_model');
        $this->load->model('admin/multimedia_model');
        $this->load->model('admin/productos_categoria_model');
    }
    
    public function index() {
        $data['main_content'] = 'inicio/body_view';
        $data['title'] = '.: Favarato Express Inc. - ' . lang("idioma.menu-opcion1") . ' :.';
        $data['menu_home'] = 'home';

        $data['css_styles'] = Array(
            URL_JS . 'layer-slider/layerslider/css/layerslider'
            , URL_CSS . 'buttons_slider'
        );

        $data['js_scripts'] = Array(
            'layer-slider/layerslider/js/greensock',
            'layer-slider/layerslider/js/layerslider.transitions',
            'layer-slider/layerslider/js/layerslider.kreaturamedia.jquery',
            'layer-slider',
        );

        $data["menu_categorias"] = $this->productos_categoria_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $this->idioma, '', null, null));
        $data["publicidad_slider"] = $this->publicidad_model->publicidadQry(Array('L-PUBLICIDAD-PORTAL', $this->idioma, 'no-data', '148', null, null));
        $data["publicidad"] = $this->publicidad_model->publicidadQry(Array('L-PUBLICIDAD-PORTAL-DESC', $this->idioma, 'no-data', '207', null, null));
        $data["testimonios"] = $this->testimonios_model->testimoniosQry(Array('L-TESTIMONIOS-PORTAL', $this->idioma, date('m'), date('Y')));
        $data['ruta_es'] = URL_MAIN . 'es/inicio';
        $data['ruta_en'] = URL_MAIN . 'en/home';

        if ($this->idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }

        $this->load->view('inicio/template_view', $data);
    }

    public function leer_testimonio($nTestID) {
        $query = $this->testimonios_model->testimoniosGet(Array('L-TESTIMONIOS-CODIGO', $this->idioma, $nTestID, ''));
        if ($query) {
            $data['nTestID'] = $this->testimonios_model->getTestId();
            $data['cTestAlias'] = $this->testimonios_model->getTestAlias();
            $data['cTestPais'] = $this->testimonios_model->getTestPais();
            $data['cTestDescripcion'] = $this->testimonios_model->getTestDescripcion();
            $data['cTestPaisIso2'] = $this->testimonios_model->getTestEstado();
        }

        $this->load->view("testimonios/testimonio_seleccionado_view", $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


