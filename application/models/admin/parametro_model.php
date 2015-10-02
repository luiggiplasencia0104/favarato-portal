<?php

class Parametro_model extends CI_Model {

    private $ParId = '';
    private $ParIdDescripcionEs = '';
    private $ParIdDescripcionEn = '';
    private $ParametroPadre = '';
    private $ParametroEstado = '';

    function __construct() {
        parent::__construct();
    }

    public function getParId() {
        return $this->ParId;
    }

    public function setParId($ParId) {
        $this->ParId = $ParId;
    }

    public function getParIdDescripcionEs() {
        return $this->ParIdDescripcionEs;
    }

    public function setParIdDescripcionEs($ParIdDescripcionEs) {
        $this->ParIdDescripcionEs = $ParIdDescripcionEs;
    }

    public function getParIdDescripcionEn() {
        return $this->ParIdDescripcionEn;
    }

    public function setParIdDescripcionEn($ParIdDescripcionEn) {
        $this->ParIdDescripcionEn = $ParIdDescripcionEn;
    }

    public function getParametroPadre() {
        return $this->ParametroPadre;
    }

    public function setParametroPadre($ParametroPadre) {
        $this->ParametroPadre = $ParametroPadre;
    }

    public function getParametroEstado() {
        return $this->ParametroEstado;
    }

    public function setParametroEstado($ParametroEstado) {
        $this->ParametroEstado = $ParametroEstado;
    }
    
    function parametroPadreGet() {
        $query = $this->db->query("CALL USP_GEN_S_Parametro_Padre");
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function parametroQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PARAMETRO (?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function parametroGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PARAMETRO(?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setParId($row->nParID);
            $this->setParIdDescripcionEs($row->desc_es);
            $this->setParIdDescripcionEn($row->desc_en);
            $this->setParametroPadre($row->nParIDPadre);
            $this->setParametroEstado($row->cTbIdEstado);
            return $row;
        } else {
            return null;
        }
    }
   
}

?>