<?php

require_once('persona_model.php');

class usuario_model extends Persona_model {

    private $usuID;
    private $usuNick;
    private $usuClave;
    private $usuTipo;
    private $usuFechaRegistro;
    private $usuEstado;

    function __construct() {
        parent::__construct();
    }

    public function getUsuID() {
        return $this->usuID;
    }

    public function setUsuID($usuID) {
        $this->usuID = $usuID;
    }

    public function getUsuNick() {
        return $this->usuNick;
    }

    public function setUsuNick($usuNick) {
        $this->usuNick = $usuNick;
    }

    public function getUsuClave() {
        return $this->usuClave;
    }

    public function setUsuClave($usuClave) {
        $this->usuClave = $usuClave;
    }

    public function getUsuTipo() {
        return $this->usuTipo;
    }

    public function setUsuTipo($usuTipo) {
        $this->usuTipo = $usuTipo;
    }

    public function getUsuFechaRegistro() {
        return $this->usuFechaRegistro;
    }

    public function setUsuFechaRegistro($usuFechaRegistro) {
        $this->usuFechaRegistro = $usuFechaRegistro;
    }

    public function getUsuEstado() {
        return $this->usuEstado;
    }

    public function setUsuEstado($usuEstado) {
        $this->usuEstado = $usuEstado;
    }

    function getDatosUsuario($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PERSONA(?,?,?,?)", $parametros);
        $this->db->close();

        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setPerId($row->nPerID);
            $this->setPerNombres($row->cPerNombres);
            $this->setPerTelefono($row->Telefono);
            $this->setPerCelular($row->Celular);
            $this->setPerFechaNacimiento($row->fecha_nac);
            $this->setPerEmail($row->Correo);
            $this->setPerSexo($row->Sexo);
            $this->setPerArea($row->cod_area);
            $this->setPerCargo($row->cod_cargo);
            $this->setPerFacebook($row->facebook);
            $this->setPerSkype($row->skype);
            $this->setPerFoto($row->foto);
            $this->setUsuID($row->nUsuID);
            $this->setUsuEstado($row->cUsuEstado);
            $this->setUsuTipo($row->cUsuTipo);
            $this->setPerFoto($row->foto);
            return $row;
        } else {
            return null;
        }
    }

    function usuariosQry($Parametros) {
            $query = $this->db->query("CALL USP_GEN_S_PERSONA (?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}