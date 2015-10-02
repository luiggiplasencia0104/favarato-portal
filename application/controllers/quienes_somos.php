<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quienes_Somos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/publicidad_model');
        $this->load->model('admin/parametro_model');
        $this->load->model('admin/multimedia_model');
        $this->load->model('admin/usuario_model');
        $this->load->model('admin/productos_categoria_model');
    }

    public function acerca_nosotros() {
        $idioma = $this->uri->segment(1);
        $data['main_content'] = 'about_us/about_us_view';
        $data['title'] = '.: Favarato Express Inc.  - ' . lang("idioma.menu-opcion2-sub1") . ' :.';
        $data['breadcrumbs'] = 'about_us_1';
        $data['left_navigation1'] = 'current_subpage';
        $data['menu_about'] = 'aboutus';
        $data["menu_categorias"] = $this->productos_categoria_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, '', null, null));
        $data["publicidad"] = $this->publicidad_model->publicidadQry(Array('L-PUBLICIDAD-CRITERIO', $idioma, 'no-data', '149', null, null));
        $data['ruta_es'] = URL_MAIN . 'es/quienes_somos/acerca_nosotros';
        $data['ruta_en'] = URL_MAIN . 'en/who_we_are/about_us';

        $data['css_styles'] = Array(
            URL_CSS . 'sidebar_menu'
        );

        if ($idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }

        $this->load->view('inicio/template_view', $data);
    }

    public function equipo_trabajo() {
        $idioma = $this->uri->segment(1);
        $data['main_content'] = 'about_us/our_team_view';
        $data['title'] = '.: Favarato Express Inc. - ' . lang("idioma.menu-opcion2-sub3") . ' :.';
        $data['breadcrumbs'] = 'about_us_3';
        $data['left_navigation3'] = 'current_subpage';
        $data['menu_about'] = 'aboutus';

        $data['css_styles'] = Array(
            URL_CSS . 'team-member'
            , URL_CSS . 'sidebar_menu'
        );

        //$data["menu_categorias"] = $this->productos_categoria_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, '', null, null));
        $data["team_fava"] = $this->usuario_model->usuariosQry(Array('LISTAR-PERSONAS-CRITERIO-PORTAL', $idioma, '', ''));
        $data['ruta_es'] = URL_MAIN . 'es/quienes_somos/equipo_trabajo';
        $data['ruta_en'] = URL_MAIN . 'en/who_we_are/our_team';

        if ($idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }

        $this->load->view('inicio/template_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


