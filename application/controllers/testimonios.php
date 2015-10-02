<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimonios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/ubigeo_model');
        $this->load->model('admin/testimonios_model');
    }

    public function index() {
        $data['title'] = '.: Favarato Express Inc. - '.lang('idioma.menu-opcion7').' :.';
        $data['paises'] = $this->ubigeo_model->paisQry(Array('L-PAISES-' . strtoupper($this->uri->segment(1))));
        $this->load->view('testimonios/registrar_testimonio_view', $data);
    }

    function testimoniosIns() {
        $accion='VALID-TESTIMONIOS-INS-CRITERIO';
        $email=$this->input->post('txt_ins_test_email');
        $validacion = $this->testimoniosValidacion($accion,$email);
        if ($validacion == "1") {
            echo "email_repetido";
        } else {
            $this->form_validation->set_rules('txt_ins_test_nombres', 'nombres', 'required|trim');
            $this->form_validation->set_rules('cbo_ins_test_paises', 'pais', 'required|trim');
            $this->form_validation->set_rules('txt_ins_test_email', 'email', 'required|trim');
            $this->form_validation->set_rules('txt_ins_test_testimonio', 'testimonio', 'required|trim');
            $this->form_validation->set_message('required', 'El campo %s es requerido');

            if ($this->form_validation->run() == TRUE) {
                $this->testimonios_model->setTestNombres($this->input->post('txt_ins_test_nombres'));
                $this->testimonios_model->setTestPais($this->input->post('cbo_ins_test_paises'));
                $this->testimonios_model->setTestEmail($this->input->post('txt_ins_test_email'));
                $this->testimonios_model->setTestDescripcion($this->input->post('txt_ins_test_testimonio'));
                $result = $this->testimonios_model->testimoniosIns();

                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        }
    }

    function testimoniosValidacion($accion,$criterio) {
        $result = $this->loaders->validacionDato($accion, '', $criterio, '', '', '');

        if ($result == "true") {
            return "1";
        } else {
            return "0";
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


