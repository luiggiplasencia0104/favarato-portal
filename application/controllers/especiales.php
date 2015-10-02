<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Especiales extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/testimonios_model');
        $this->load->model('admin/publicidad_model');
        $this->load->model('admin/multimedia_model');
        $this->load->model('admin/productos_categoria_model');
        $this->load->model('admin/productos_marca_model');
    }

    public function index() {
        $idioma = $this->uri->segment(1);
        $data['main_content'] = 'especiales/especiales_view';
        $data['title'] = '.: Favarato Express Inc.  - ' . lang("idioma.menu-opcion5") . ' :.';
        $data['menu_especiales'] = 'especiales';
        $data['breadcrumbs'] = 'especial_1';
        $data['ruta_es'] = URL_MAIN . 'es/especiales';
        $data['ruta_en'] = URL_MAIN . 'en/specials';
        $data["menu_categorias"] = $this->productos_categoria_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, ''));
        $data["list_especiales"] = $this->publicidad_model->publicidadQry(Array('L-PUBLICIDAD-OFERTA-CRITERIO', $idioma, 'no-data', '148'));
        
        if ($idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }
        
        $this->load->view('inicio/template_view', $data);
    }

    public function detalle($nombre_id_publicidad) {
        $idioma = $this->uri->segment(1);
        $cadena = explode("_", $nombre_id_publicidad);
        $data = $this->publicidadGet($cadena[1]);

        $data['main_content'] = 'especiales/especial_selected_view';
        $data['title'] = '.: Favarato Express Inc.  - ' . lang("idioma.menu-opcion5-info") . ' :.';
        $data['menu_especiales'] = 'especiales';
        $data['breadcrumbs'] = 'especial_2';
        $data['ruta_es'] = URL_MAIN . 'es/especiales/detalle/'.$nombre_id_publicidad;
        $data['ruta_en'] = URL_MAIN . 'en/specials/detail/'.$nombre_id_publicidad;
        
        $data['css_styles'] = Array(
            URL_CSS . 'css_productos'
        );

        $data['js_scripts'] = Array(
            'jquery.carouFredSel-6.2.1-packed',
            'js_portal/productos/jsProductosInfo'
        );
        
        $data["menu_categorias"] = $this->productos_categoria_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, ''));
        
        if ($idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }

        // Obtener el nombre de la categoria de la oferta
        $id_categoria = explode("_", $data["id_categoria"]);

        $this->productos_categoria_model->productos_categoriaGet(Array('L-PRODUCTO-CATEGORIA-CODIGO', '', $id_categoria[1]));
        if ($idioma == "es") {
            $data['categoria_oferta'] = $this->productos_categoria_model->getCatDescripcionEs();
        } else {
            $data['categoria_oferta'] = $this->productos_categoria_model->getCatDescripcionEn();
        }

        // Obtener el nombre de la subcategoria de la oferta
        if ($data["id_subcategoria"] != "") {
            $id_subcategoria = explode("_", $data["id_subcategoria"]);
            $this->productos_categoria_model->productos_categoriaGet(Array('L-PRODUCTO-CATEGORIA-CODIGO', '', $id_subcategoria[1]));
            if ($idioma == "es") {
                $data['subcategoria_oferta'] = $this->productos_categoria_model->getCatDescripcionEs();
            } else {
                $data['subcategoria_oferta'] = $this->productos_categoria_model->getCatDescripcionEn();
            }
        }

        // Fotos de los productos de la Oferta
        $data["fotos_productos"] = $this->publicidad_model->publicidadFotosProductosQry(Array('L-OFERTAS-PRODUCTOS-PORTAL', $idioma, $cadena[1]));
        $data["foto_principal"] = $data['fotos_productos'][0]["foto_producto"];
        
        // Listado de Otras ofertas
        $variables[0] = 'L-PUBLICIDAD-OFERTAS-OTROS';
        $variables[1] = $this->uri->segment(1);
        $variables[2] = $cadena[1];
        $variables[3] = '148';
        $data["otras_ofertas"] = $this->publicidad_model->publicidadQryOtros($variables);
        
        $this->load->view('inicio/template_view', $data);
    }

    function publicidadGet($nMultID) {
        $query = $this->publicidad_model->publicidadGet(Array('L-PUBLICIDAD-OFERTA-CODIGO', '', $nMultID, ''));

        if ($query) {
            $data['MultID'] = $this->publicidad_model->getMultId();
            $data['MultTituloEs'] = $this->publicidad_model->getMultTituloEs();
            $data['MultTituloEn'] = $this->publicidad_model->getMultTituloEn();
            $data['MultDescripcionEs'] = $this->publicidad_model->getMultDescripcionEs();
            $data['MultDescripcionEn'] = $this->publicidad_model->getMultDescripcionEn();
            $data['MultLinkMiniatura'] = $this->publicidad_model->getMultLinkMiniatura();
            $data['MultLink'] = $this->publicidad_model->getMultLink();
            $data['FechaInicial'] = $this->publicidad_model->getMultFechaInicial();
            $data['FechaFinal'] = $this->publicidad_model->getMultFechaFinal();
            $data['ubicacion'] = $this->publicidad_model->getMultParID();
            $data['id_categoria'] = $this->publicidad_model->getMultCategoriaID();
            $data['id_subcategoria'] = $this->publicidad_model->getMultSubCategoriaID();
            $data['marca_oferta'] = $this->publicidad_model->getMultMarcaID();
            $data['precio_oferta'] = $this->publicidad_model->getMultPrecio();
            $data['tallaes_oferta'] = $this->publicidad_model->getMultTallasEs();
            $data['tallaen_oferta'] = $this->publicidad_model->getMultTallasEn();
            return $data;
        } else {
            return false;
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


