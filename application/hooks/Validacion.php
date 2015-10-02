<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validacion {

    private $ci;

    const CODE_ERROR_AUTHORIZATION = 203;
    const MSG_VALID_URL_TITLE = 'Autorizaci&oacute;n Denegada';
    const MSG_VALID_URL_TEXT = 'Usted. no ha registrado sus datos en el formulario de contactos';

    public function __construct() {
        $this->ci = & get_instance();
        !$this->ci->load->library('session') ? $this->ci->load->library('session') : false;
        !$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;
    }

    public function LimpiarSessionContacto() {
        if ($this->ci->uri->segment(3) !== "mensaje_exito" || $this->ci->uri->segment(3) !== 'success_message') {
            $this->ci->session->unset_userdata('correo_electronico');
            $this->ci->session->unset_userdata('cliente');
        }
    }

    public function verificarAccesoContacto() {
        if ($this->ci->uri->segment(3) === "mensaje_exito" || $this->ci->uri->segment(3) === 'success_message') {
            if (!(bool) $this->ci->session->userdata('correo_electronico') && !(bool) $this->ci->session->userdata('cliente')) {
                show_error(self::MSG_VALID_URL_TEXT, self::CODE_ERROR_AUTHORIZATION, self::MSG_VALID_URL_TITLE);
            }
        }
    }

}

/*
/end hooks/home.php
*/