<?php

require_once('menu_aplicacion_model.php');

class Objeto_model extends Menu_Aplicacion_model {

    //DECLARACION DE VARIABLES
    private $nObjId = '';
    private $cObjNombre = '';
    private $cObjNombreArchivo = '';
    private $nObjIdPadre = '';
    private $bObjEliminado = '';
    private $bObjTipo = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
    }

    function set_nObjId($nObjId) {
        $this->nObjId = $nObjId;
    }

    function set_cObjNombre($cObjNombre) {
        $this->cObjNombre = $cObjNombre;
    }

    function set_cObjNombreArchivo($cObjNombreArchivo) {
        $this->cObjNombreArchivo = $cObjNombreArchivo;
    }

    function set_nObjIdPadre($nObjIdPadre) {
        $this->nObjIdPadre = $nObjIdPadre;
    }

    function set_bObjEliminado($bObjEliminado) {
        $this->bObjEliminado = $bObjEliminado;
    }

    function set_bObjTipo($bObjTipo) {
        $this->bObjTipo = $bObjTipo;
    }

    function get_nObjId() {
        return $this->nObjId;
    }

    function get_cObjNombre() {
        return $this->cObjNombre;
    }

    function get_cObjNombreArchivo() {
        return $this->cObjNombreArchivo;
    }

    function get_nObjIdPadre() {
        return $this->nObjIdPadre;
    }

    function get_bObjEliminado() {
        return $this->bObjEliminado;
    }

    function get_bObjTipo() {
        return $this->bObjTipo;
    }

    // LISTADO DE LOS MÓDULOS DE APLICACIÓN
    function listaMenuOpciones2() {
        $resultado = array();
        $ul = "";
        $active = "";
        $opciones = "";
        $url = $this->session->userdata('url');

        if ($this->uri->segment(1) == "en") {
            $tipo_idioma = 'en/';
        } else {
            $tipo_idioma = "es/";
        }

        $idioma = $this->uri->segment(1);

        $query = $this->listaMenuPrincipal($idioma);

        $this->db->close();
        foreach ($query->result() as $row) {
            $opt = $this->listaSubMenus('W', $row->nAplID, $idioma);
            if ($opt != null) {
                $active = "";
                $ul = 'class="collapsed-nav closed"';
                $array = array();
                foreach ($opt->result() as $opcion) {
                    if ($url) {
                        if ($tipo_idioma . $opcion->cOpdRuta == $url) {
                            $active = "class=\"active open\"";
                            $ul = 'class="collapsed-nav"';
//                            $ul = 'class="collapsed-nav" style="display:block"';
                            $opciones = 'class="active"';
                        } else {
                            $opciones = '';
                            //$opciones = 'style="display:list-item"';
                        }
                    }

                    $array[] = array(
                        "value" => $opcion->cTbIdDescripcion,
                        "url" => $tipo_idioma . $opcion->cOpdRuta,
                        "iconoso" => $opcion->cOpcIcono,
                        "li" => $opciones
                    );
                }

                $resultado[] = array(
                    'menu' => $row->cTbIdDescripcion,
                    'datos' => $array,
                    'icon' => $row->cAplIcono,
                    'active' => $active,
                    'ul' => $ul);
            }
        }
        return $resultado;
    }

    // LISTADO DE LOS MÓDULOS DE APLICACIÓN
    function listaMenuOpciones3() {
        $resultado = array();
        $ul = "";
        $active = "";
        $opciones = "";
        $url = $this->session->userdata('url');

        if ($this->uri->segment(1) == "en") {
            $tipo_idioma = 'en/';
        } else {
            $tipo_idioma = "es/";
        }

        $idioma = $this->uri->segment(1);

        $query = $this->listaMenuPrincipal($idioma);

        $this->db->close();
        foreach ($query->result() as $row) {
            $opt = $this->listaSubMenus('W', $row->nAplID, $idioma);
            if ($opt != null) {
                $active = "";
                $ul = 'class="collapsed-nav closed"';
                $array = array();
                foreach ($opt->result() as $opcion) {
                    if ($url) {
                        if ($tipo_idioma . $opcion->cOpdRuta == $url) {
                            $active = "class=\"active open\"";
                            $ul = 'class="collapsed-nav closed" style="display:block"';
                            $opciones = 'class="active"';
                        } else {
                            $opciones = '';
                        }
                    }

                    $array[] = array(
                        "value" => $opcion->cTbIdDescripcion,
                        "url" => $tipo_idioma . $opcion->cOpdRuta,
                        "iconoso" => $opcion->cOpcIcono,
                        "li" => $opciones
                    );
                }

                $resultado[] = array(
                    'menu' => $row->cTbIdDescripcion,
                    'datos' => $array,
                    'icon' => $row->cAplIcono,
                    'active' => $active,
                    'ul' => $ul);
            }
        }
        return $resultado;
    }

    //LISTA DE LOS MÓDULOS DE APLICACIÓN
    function listaMenuPrincipal($idioma) {
        $query = $this->db->query("CALL USP_GEN_S_MENU_MODULOS (?)", $idioma);
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    //LISTA DE OPCIONES QUE CONTIENEN LOS MÓDULOS DE LA APLICACIÓN
    function listaSubMenus($plataforma, $idaplicacion, $idioma) {
        $idusuario = $this->session->userdata('nUsuID');
        $query = $this->db->query("CALL USP_GEN_S_MENU (?,?,?,?)", array($idusuario, $idaplicacion, $plataforma, $idioma));
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

}

?>