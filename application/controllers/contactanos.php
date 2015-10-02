<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactanos extends CI_Controller {

    private $idioma;

    function __construct() {
        parent::__construct();
        $this->idioma = $this->uri->segment(1);
        $this->load->model('admin/ubigeo_model');
        $this->load->model('admin/publicidad_model');
        $this->load->model('admin/multimedia_model');
        $this->load->model('admin/buzon_mensajes_model');
    }

    public function index() {
        $data['main_content'] = 'contact/contact_view';
        $data['title'] = '.: Favarato Express Inc.  - ' . lang("idioma.menu-opcion6") . ' :.';
        $data['menu_contact'] = 'contact';
        $data['breadcrumbs'] = 'contact_1';

        $data['css_styles'] = Array(
            URL_JS . 'select2/select2'
            , URL_JS . 'select2/select2-bootstrap'
            , URL_CSS . 'jquery.jgrowl'
            , URL_CSS . 'validate/validation'
        );

        $data['js_scripts'] = Array(
            URL_JS . 'validacion/jqueryvalidate_' . $this->idioma
            ,URL_JS . 'jsValidacionGeneral'
            ,URL_JS . 'contact/jsContact_' . $this->idioma
        );

        $data["publicidad"] = $this->publicidad_model->publicidadQry(Array('L-PUBLICIDAD-PORTAL', $this->idioma, 'no-data', '153', null, null));
        $data['ruta_es'] = URL_MAIN . 'es/contactanos';
        $data['ruta_en'] = URL_MAIN . 'en/contact_us';

        if ($this->idioma === "es") {
            $data['url_social'] = $data['ruta_es'];
        } else {
            $data['url_social'] = $data['ruta_en'];
        }

        $this->load->view('inicio/template_view_2', $data);
    }

    function getCboPaises() {
        $key_db = 'cache_db_' . $this->idioma . app_helper::getPathInfo();
        $cache_countries = cache_helper::getEntryCache($key_db);

        if (!$cache_countries) {
            $cache_countries = $this->ubigeo_model->paisQry(Array('L-PAISES-' . strtoupper($this->idioma)));
            cache_helper::setEntryCache($key_db, $cache_countries);
        }

        echo json_encode(Array('a_paises' => $cache_countries));
    }

    function usuarioContactoValidacion() {
        $POST = $this->input->post();
        $accion = $POST['accion'];
        $criterio = $POST['criterio'];
        $result = $this->loaders->validacionDato($accion, '', $criterio, '', '', '');

        if ($result === "true") {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function mensajeContactoIns() {
        $POST = $this->input->post();
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('name', 'nombre cliente', 'required|trim');
            $this->form_validation->set_rules('empresa', 'empresa', 'required|trim');
            $this->form_validation->set_rules('pais', 'pais', 'required|trim');
            $this->form_validation->set_rules('ciudad', 'ciudad', 'required|trim');
            $this->form_validation->set_rules('telefono', 'telefono', 'required|trim');
            $this->form_validation->set_rules('email', 'email', 'required|trim');
            $this->form_validation->set_rules('subject', 'asunto', 'required|trim');
            $this->form_validation->set_rules('text', 'mensaje', 'required|trim');
            $this->form_validation->set_message('required', 'El campo %s es requerido');

            if ($this->form_validation->run() === TRUE) {
                $this->buzon_mensajes_model->setMenNombre($POST['name']);
                $this->buzon_mensajes_model->setMenEmpresa($POST['empresa']);
                $this->buzon_mensajes_model->setMenPais($POST['pais']);
                $this->buzon_mensajes_model->setMenCiudad($POST['ciudad']);
                $this->buzon_mensajes_model->setMenCodigoCiudad($POST['codigo']);
                $this->buzon_mensajes_model->setMenTelefonoFijo($POST['telefono']);
                $this->buzon_mensajes_model->setMenCelular($POST['celular']);
                $this->buzon_mensajes_model->setMenEmail($POST['email']);
                $this->buzon_mensajes_model->setMenAsunto($POST['subject']);
                $this->buzon_mensajes_model->setMenDescripcion($POST['text']);
                $result = $this->buzon_mensajes_model->mensajeContactoIns();
                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            show_404();
        }
    }

    function mensaje_exito() {
        $data['title'] = '.: Favarato Express Inc.  - ' . lang("idioma.menu-opcion8") . ' :.';
        $this->load->view('contact/script_view', $data);
    }

    function enviar_email() {
        $POST = $this->input->post();
        $for = $POST['email'];
        $cliente = $POST['cliente'];

        $this->session->set_userdata('correo_electronico', $for);
        $this->session->set_userdata('cliente', $cliente);



//        var_dump($this->session->userdata('correo_electronico'));
//        var_dump($this->session->userdata('cliente'));
//        exit();
        //configuracion para gmail
        $smtp_user = SMPT_USER;
        $smtp_clave = SMPT_PASS;
        $identificacion = SMPT_IDENTITY;

        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => SMPT_HOST,
            'smtp_port' => SMPT_PORT,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_clave,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        $asunto = 'Mensaje de Bienvenida';

        $contenido = "Bienvenidos a <b>Favarato Express Inc.</b>, muchas gracias por su interés y por contactarnos.<br /><br /> 
            Nuestra compañía, localizada en Miami-Florida, se dedica a comercializar saldos por cambio de temporada y excesos de inventarios de las 
            cadenas de tiendas por departamento más prestigiadas de los Estados Unidos. Por esto, podemos ofrecerle desde lotes pequeños de 200 unidades 
            hasta contenedores de 20', 40' y 45' de ropa y accesorios para toda la familia, artículos para el hogar, juguetes y todo lo necesario para 
            el éxito de su negocio.<br /><br />
            
            Toda nuestra mercadería es nueva y con etiquetas originales. A la misma vez negociamos con productos de retorno o re manufacturados. 
            Le ofrecemos los mejores precios de hasta 70% menos del costo original.<br /><br />
            
            Aunque no trabajamos con catálogo de inventario, podemos brindarle un listado de los lotes disponibles y fotos que le mostrarán más 
            claramente el tipo de producto que contiene cada categoría. Por ejemplo (por favor, haga clic para ver algunas fotos): <br /><br />
            
            <a href='https://picasaweb.google.com/105177782421202956432/MACYSVeranoMujer?authuser=0&authkey=Gv1sRgCL-H6IaGg6P_MQ&feat=directlink' target='_blank' >Ropa de mujer</a><br />
            <a href='https://picasaweb.google.com/105177782421202956432/CARTERSSetsPrimaveraVerano?authuser=0&authkey=Gv1sRgCKjQpMmRrdOs6wE&feat=directlink' target='_blank'>Ropa para niños</a><br />
            <a href='https://picasaweb.google.com/105177782421202956432/TARGETRopaDeportiva?authuser=0&authkey=Gv1sRgCJSbgsCv3_nB9gE&feat=directlink' target='_blank'>Ropa de deporte</a><br /> 
            <a href='https://picasaweb.google.com/105177782421202956432/Maquillaje?authuser=0&authkey=Gv1sRgCNrx4ZWP98SkGA&feat=directlink' target='_blank'>Saldos de maquillaje</a><br /><br />
            
            Nosotros nos encargamos de empacar su mercadería, hacer el papeleo correspondiente y entregarla en la empresa de transportes que usted nos 
            indique.  Si es su primera vez importando, nosotros le ayudamos a conseguir una compañía confiable y reconocida con la que hayamos trabajado 
            anteriormente.<br /><br />
            
            Esperamos poder ayudarle con todo lo que usted necesita. A la brevedad posible, una de nuestras asesoras de ventas se comunicará con usted 
            para brindarle información más detallada. <br /><br />
            
            Atentamente,<br /><br />
            <img src='" . URL_IMG . "img_loguito.jpg' /><br />
            Daniela Chirinos<br />
            Presidente
        ";

        $this->email->initialize($configGmail);
        $this->email->from($smtp_user, $identificacion);
        $this->email->to($for);
        $this->email->subject('FAVARATO EXPRESS INC. - ' . $asunto);

        $body_mensaje = '<p style="text-align:justify;padding:5px 8px 5px 8px;">' . $contenido . '</p>';

        $footer_mensaje = '</div>
        </div>
        <center>';

        $this->email->message($body_mensaje . $footer_mensaje);

        if ($this->email->send()) {
            echo "1";
        } else {
            echo $this->email->print_debugger();
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


