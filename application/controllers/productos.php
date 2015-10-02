<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos extends CI_Controller {

    private $idioma;

    function __construct() {
        parent::__construct();

        $this->idioma = $this->uri->segment(1);
        $this->load->library("pagination");
        $this->load->model('admin/categorias_model');
        $this->load->model('admin/productos_marca_model');
        $this->load->model('admin/productos_model');
    }

    public function getListMenuCategories() {
        $key_db = 'cache_db_' . $this->idioma . '_listMenuCategories';
        $cache_categories = cache_helper::getEntryCache($key_db);

        if (!$cache_categories) {
            $cache_categories = $this->categorias_model->categoriasQry(Array(
                'L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO'
                , $this->idioma
                , ''
                , null
                , null)
            );
            cache_helper::setEntryCache($key_db, $cache_categories);
        }

        echo json_encode(Array('a_categories' => $cache_categories));
    }

    public function categoria($val_categoria, $subcategoria) {
        $idioma = $this->uri->segment(1);

        $data['css_styles'] = Array(
            URL_CSS . 'css_productos'
            , URL_CSS . 'sidebar_menu'
        );
        
        $cadena = explode("-", $val_categoria);

        if ($idioma == "es") {
            $categoria = $cadena[0];
        } else {
            $categoria = $cadena[1];
        }

        if ($categoria != lang('idioma.productos-texto-comparar') || $subcategoria != "") {
            $data['js_scripts'] = Array(
                'js_portal/productos/jsProductosEnlaces',
                'js_portal/productos/jsProductos_' . $idioma,
            );
        } else {
            $data['js_scripts'] = Array(
                'js_portal/productos/jsProductosEnlaces'
            );
        }

        if ($val_categoria == 'ropa-al-por-mayor' && $subcategoria == '') {
            $meta_title = lang('idioma.metatags-productos-title');
            $meta_description = lang('idioma.metatags-productos-desc');
            $title_bread = lang('idioma.productos-ropa');
            $url_bread = lang('idioma.controlador-productos-ropa');
        } else if ($val_categoria == 'ropa-al-por-mayor' && $subcategoria == 'ninos') {
            $meta_title = lang('idioma.metatags-ropa-ninos-title');
            $meta_description = lang('idioma.metatags-ropa-ninos-desc');
            $title_bread = lang('idioma.productos-ropa-de-ninos');
            $url_bread = lang('idioma.controlador-productos-ropa-ninos');
        } else if ($val_categoria == 'ropa-al-por-mayor' && $subcategoria == 'mujer') {
            $meta_title = lang('idioma.metatags-ropa-mujer-title');
            $meta_description = lang('idioma.metatags-ropa-mujer-desc');
            $title_bread = lang('idioma.productos-ropa-de-mujer');
            $url_bread = lang('idioma.controlador-productos-ropa-mujer');
        } else if ($val_categoria == 'ropa-al-por-mayor' && $subcategoria == 'hombre') {
            $meta_title = lang('idioma.metatags-ropa-hombre-title');
            $meta_description = lang('idioma.metatags-ropa-hombre-desc');
            $title_bread = lang('idioma.productos-ropa-de-hombre');
            $url_bread = lang('idioma.controlador-productos-ropa-hombre');
        } else if ($val_categoria == 'joyeria-al-por-mayor' && $subcategoria == '') {
            $meta_title = lang('idioma.metatags-joyeria-title');
            $meta_description = lang('idioma.metatags-joyeria-desc');
            $title_bread = lang('idioma.productos-joyeria');
            $url_bread = lang('idioma.controlador-productos-joyeria');
        } else if ($val_categoria == 'maquillaje-al-por-mayor' && $subcategoria == '') {
            $meta_title = '';
            $meta_description = '';
            $title_bread = lang('idioma.productos-maquillaje');
            $url_bread = lang('idioma.controlador-productos-maquillaje');
        } else if ($val_categoria == 'articulos-de-bebe-al-por-mayor' && $subcategoria == '') {
            $meta_title = '';
            $meta_description = '';
            $title_bread = lang('idioma.productos-articulosbebe');
            $url_bread = lang('idioma.controlador-productos-articulosbebe');
        } else if ($val_categoria == 'productos-para-el-hogar-al-por-mayor' && $subcategoria == '') {
            $meta_title = '';
            $meta_description = '';
            $title_bread = lang('idioma.productos-prohogar');
            $url_bread = lang('idioma.controlador-productos-prohogar');
        } else if ($val_categoria == 'juguetes-al-por-mayor' && $subcategoria == '') {
            $meta_title = '';
            $meta_description = '';
            $title_bread = lang('idioma.productos-juguetes');
            $url_bread = lang('idioma.controlador-productos-juguetes');
        }

        $data['main_content'] = 'productos/products_view';
        $data['title'] = $meta_title;
        $data['meta_description'] = $meta_description;
        $data['breadcrumbs'] = 'products_1';
        $data['title_bread'] = $title_bread;
        $data['url_bread'] = $url_bread;
        $data['menu_products'] = 'products';
        $data['url_social'] = URL_MAIN . $idioma . '/' . $url_bread;

        $data['ruta_es'] = URL_MAIN . 'es/productos/categoria/ropa-al-por-mayor/';
        $data['ruta_en'] = URL_MAIN . 'en/products/category/wholesale-clothing/';
        $data["categorias"] = $this->categorias_model->categoriasQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, ''));

        // VALORES PARA LA CATEGORIA
        $this->categorias_model->productos_categoriaGetDatos(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, rawurldecode($categoria)));
        $data['code_cat'] = $this->categorias_model->getCatId();
        $data['name_categoria'] = $this->categorias_model->getCatDescripcionEs();

        // VALORES PARA LA SUBCATEGORIA
        $this->categorias_model->productos_categoriaGetDatos(Array('L-PRODUCTO-PORTAL-CRITERIO-SUBCATEGORIAS', $idioma, rawurldecode($subcategoria)));
        if ($this->categorias_model->getCatId() == "") {
            $code_subcat = "sin_sc";
        } else {
            $code_subcat = $this->categorias_model->getCatId();
        }

        if ($this->categorias_model->getCatDescripcionEs() == "") {
            $desc_subcat = "sin_sc";
        } else {
            $desc_subcat = $this->categorias_model->getCatDescripcionEs();
        }

        $data['code_subcat'] = $code_subcat;
        $data['name_subcategoria'] = $desc_subcat;

        $this->load->view('inicio/template_view', $data);
    }

    function qryProductos($pag = null) {
        $idioma = $this->uri->segment(1);
        $json = $this->input->post("json");

        if ($json["id_subcategoria"] == "sin_sc") {
            $codigo = $json["id_categoria"];
        } else {
            $codigo = $json["id_subcategoria"];
        }

        $this->categorias_model->productos_categoriaGet(Array('L-PRODUCTO-CATEGORIA-CODIGO', $idioma, $codigo));

        if ($idioma == "es") {
            $valor = $this->categorias_model->getCatDescripcionEs();
        } else {
            $valor = $this->categorias_model->getCatDescripcionEn();
        }

        $params[0] = $json["accion"];
        $params[1] = $idioma;
        $params[2] = 'no-data';
        $params[3] = $json["id_categoria"];
        $params[4] = $json["id_subcategoria"];
        $params[5] = $pag;
        $params[6] = $valor;
        $this->paginacionGet($params, $pag, $json["Mostrar"]);
    }

    public function paginacionGet($Parametros = array(), $RegEmpezar = 0, $RegMostrar = 2) {
        $config = array();
        $this->productos_model->productosQry($Parametros);

        if ($this->productos_model->get_n() > 0) {
            $config["base_url"] = URL_MAIN . "/" . $this->uri->segment(1) . "/products/qryProductos";
            $config["first_url"] = URL_MAIN . "/" . $this->uri->segment(1) . "/products/qryProductos/0";
            $config["total_rows"] = $this->productos_model->get_n();
            $config['per_page'] = $RegMostrar;
            $config['num_links'] = 5;
            $config["uri_segment"] = 4;
            $config['first_link'] = 'Primera';
            $config['last_link'] = 'Última';
            $config['next_link'] = ' ';
            $config['prev_link'] = ' ';
            $this->pagination->initialize($config);
            $data["productos_listado"] = $this->productos_model->get_Data($RegEmpezar, $RegMostrar + $RegEmpezar);
            $data["links"] = $this->pagination->create_links();
            $data["total_filas"] = $this->productos_model->get_n();
            $this->load->view('productos/qry_view', $data);
        } else {

            if ($Parametros[4] == "sin_sc") {
                $texto_error = lang('idioma.productos-norecords-1');
            } else {
                $texto_error = lang('idioma.productos-norecords-2');
            }

            echo '<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert">
                           ' . $texto_error . ' <b>' . $Parametros[6] . '</b>
                        </div>
                    </div>
                </div>
                ';
        }
    }

    public function producto_info($codigo) {
        $cadena = explode("_", $codigo);
        $data = $this->productosGet($cadena[1]);

        $idioma = $this->uri->segment(1);

        $data['css_styles'] = Array(
            URL_CSS . 'css_productos'
        );

        $data['js_scripts'] = Array(
            'jquery.carouFredSel-6.2.1-packed',
            'js_portal/productos/jsProductosInfo'
        );

        $data["menu_categorias"] = $this->categorias_model->productos_categoriaQry(Array('L-PRODUCTO-PORTAL-CATEGORIA-CRITERIO', $idioma, ''));

        /* Obtener la Categoria del Producto */
        $this->categorias_model->productos_categoriaGet(Array('L-PRODUCTO-CATEGORIA-CODIGO', $idioma, $cadena[2]));

        if ($idioma == "es") {
            $descripcion_categoria = replace_caracteres_raros(strtolower($this->categorias_model->getCatDescripcionEs()));
        } else {
            $descripcion_categoria = replace_caracteres_raros(strtolower($this->categorias_model->getCatDescripcionEn()));
        }

        $categoria = $descripcion_categoria;
        $data['categoria'] = $idioma === 'es' ? $this->categorias_model->getCatDescripcionEs() : $this->categorias_model->getCatDescripcionEn();

        /* Obtener la SubCategoria del Producto */
        $this->categorias_model->productos_categoriaGet(Array('L-PRODUCTO-CATEGORIA-CODIGO', $idioma, $cadena[3]));

        if ($idioma == "es") {
            $descripcion_subcategoria = replace_caracteres_raros(strtolower($this->categorias_model->getCatDescripcionEs()));
        } else {
            $descripcion_subcategoria = replace_caracteres_raros(strtolower($this->categorias_model->getCatDescripcionEn()));
        }

        $subcategoria = $descripcion_subcategoria;
        $data['subcategoria'] = $idioma === 'es' ? $this->categorias_model->getCatDescripcionEs() : $this->categorias_model->getCatDescripcionEn();

        /* Obtener la Marca del Producto */
        $this->productos_marca_model->productos_marcaGet(Array('L-PRODUCTO-MARCA-CODIGO', $idioma, $data['nMarID'], ''));
        $data['marca'] = $this->productos_marca_model->getMarDescripcion();


        if ($categoria === 'ropa' && $subcategoria === '') {
            $title_bread = lang('idioma.productos-ropa');
            $url_bread = lang('idioma.controlador-productos-ropa');
        } else if ($categoria === 'ropa' && $subcategoria === 'ninos') {
            $title_bread = lang('idioma.productos-ropa-de-ninos');
            $url_bread = lang('idioma.controlador-productos-ropa-ninos');
        } else if ($categoria === 'ropa' && $subcategoria === 'mujer') {
            $title_bread = lang('idioma.productos-ropa-de-mujer');
            $url_bread = lang('idioma.controlador-productos-ropa-mujer');
        } else if ($categoria === 'ropa' && $subcategoria === 'hombre') {
            $title_bread = lang('idioma.productos-ropa-de-hombre');
            $url_bread = lang('idioma.controlador-productos-ropa-hombre');
        } else if ($categoria === 'joyeria' && $subcategoria === '') {
            $title_bread = lang('idioma.productos-joyeria');
            $url_bread = lang('idioma.controlador-productos-joyeria');
        } else if ($categoria === 'maquillaje' && $subcategoria === '') {
            $title_bread = lang('idioma.productos-maquillaje');
            $url_bread = lang('idioma.controlador-productos-maquillaje');
        } else if ($categoria === 'articulos-de-bebe' && $subcategoria === '') {
            $title_bread = lang('idioma.productos-articulosbebe');
            $url_bread = lang('idioma.controlador-productos-articulosbebe');
        } else if ($categoria === 'productos-para-el-hogar' && $subcategoria === '') {
            $title_bread = lang('idioma.productos-prohogar');
            $url_bread = lang('idioma.controlador-productos-prohogar');
        } else if ($categoria === 'juguetes' && $subcategoria === '') {
            $title_bread = lang('idioma.productos-juguetes');
            $url_bread = lang('idioma.controlador-productos-juguetes');
        }

        $data['main_content'] = 'productos/info_product_view';
        $data['title'] = '.: Favarato Express Inc. - ' . lang('idioma.menu-opcion3-info') . ' :.';
        $data['breadcrumbs'] = 'products_2';
        $data['title_bread'] = $title_bread;
        $data['url_bread'] = $url_bread;
        $data['left_navigation3'] = 'current_subpage';
        $data['menu_products'] = 'products';
        $data['ruta_es'] = URL_MAIN . 'es/productos/producto_info/' . $codigo;
        $data['ruta_en'] = URL_MAIN . 'en/products/product_info/' . $codigo;

        if ($idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }

        $data['fotos_adicionales'] = $this->productos_model->productosQryFotos(
                Array
                    (
                    'L-MULTIMEDIA-PRODUCTOS-PORTAL',
                    $this->uri->segment(1),
                    $data['nProdID']
                )
        );

        $data["foto_one"] = $data['fotos_adicionales'][0]["cMLinkMiniatura"];

        // LISTAR OTROS PRODUCTOS
        $variables[0] = 'L-PRODUCTOS-PORTAL-OTROSPRO';
        $variables[1] = $this->uri->segment(1);
        $variables[2] = $cadena[1];
        $variables[3] = $cadena[2];
        $variables[4] = $cadena[3];
        $data["otros_productos"] = $this->productos_model->productosQryOtros($variables);

        $this->load->view('inicio/template_view', $data);
    }

    function productosGet($nProdId) {
        $query = $this->productos_model->productosGet(Array('L-PRODUCTOS-CODIGO', $this->uri->segment(1), $nProdId, '', ''));

        if ($query) {
            $data['nProdID'] = $this->productos_model->getProdId();
            $data['cProdNombreEs'] = $this->productos_model->getProdNombreEs();
            $data['cProdNombreEn'] = $this->productos_model->getProdNombreEn();
            $data['cProdDescripcionEs'] = $this->productos_model->getProdDescripcionEs();
            $data['cProdDescripcionEn'] = $this->productos_model->getProdDescripcionEn();
            $data['foto_producto'] = $this->productos_model->getProdFotoPortada();
            $data['nCatID'] = $this->productos_model->getProdCatId();
            $data['nSubCatID'] = $this->productos_model->getProdSubCatId();
            $data['nMarID'] = $this->productos_model->getProdMarId();
            $data['marca'] = $this->productos_model->getProdMarca();
            $data['cProdFechaRegistro'] = $this->productos_model->getProdFechaRegistro();
            $data['cProdPrecio'] = $this->productos_model->getProdPrecio();
            $data['cProdTallasEs'] = $this->productos_model->getProdTallasEs();
            $data['cProdTallasEn'] = $this->productos_model->getProdTallasEn();
            $data['cProdEstado'] = $this->productos_model->getProdEstado();
            return $data;
        } else {
            return false;
        }
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */




    