<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchasing_Process extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/productos_categoria_model');
    }

    public function index() {
        $data['main_content'] = 'proceso_compra/proceso_compra_view';
        $data['title'] = '.: Favarato Express Inc.  - '. lang("idioma.menu-opcion4") .' :.';
        $data['menu_formas'] = 'formas_compra';
        $data['breadcrumbs'] = 'formas_compra_1';
        $data['ruta_es'] = URL_MAIN.'es/proceso_compra';
        $data['ruta_en'] = URL_MAIN.'en/purchasing_process';
        
        $idioma = $this->uri->segment(1);
        $data["menu_categorias"] = $this->productos_categoria_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, ''));
        
        if ($idioma == "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }
        
        $this->load->view('inicio/template_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


