<?php

class Persona_model extends CI_Model {

    private $PerId = '';
    private $PerApellidoPaterno = '';
    private $PerApellidoMaterno = '';
    private $PerNombres = '';
    private $PerEmpresa = '';
    private $PerFechaRegistro = '';
    private $PerFechaNacimiento = '';
    private $PerSexo = '';
    private $PerEstadoCivil = '';
    private $PerCodeTelefono = '';
    private $PerTelefono = '';
    private $PerCelular = '';
    private $PerEmail = '';
    private $PerFacebook = '';
    private $PerTwitter = '';
    private $PerSkype = '';
    private $PerPais = '';
    private $PerCiudad = '';
    private $PerDireccion = '';
    private $PerFoto = '';
    private $PerArea = '';
    private $PerCargo = '';
    private $PerEstado = '';

    function __construct() {
        parent::__construct();
    }

    public function getPerId() {
        return $this->PerId;
    }

    public function setPerId($PerId) {
        $this->PerId = $PerId;
    }

    public function getPerApellidoPaterno() {
        return $this->PerApellidoPaterno;
    }

    public function setPerApellidoPaterno($PerApellidoPaterno) {
        $this->PerApellidoPaterno = $PerApellidoPaterno;
    }

    public function getPerApellidoMaterno() {
        return $this->PerApellidoMaterno;
    }

    public function setPerApellidoMaterno($PerApellidoMaterno) {
        $this->PerApellidoMaterno = $PerApellidoMaterno;
    }

    public function getPerNombres() {
        return $this->PerNombres;
    }

    public function setPerNombres($PerNombres) {
        $this->PerNombres = $PerNombres;
    }

    public function getPerEmpresa() {
        return $this->PerEmpresa;
    }

    public function setPerEmpresa($PerEmpresa) {
        $this->PerEmpresa = $PerEmpresa;
    }

    public function getPerFechaRegistro() {
        return $this->PerFechaRegistro;
    }

    public function setPerFechaRegistro($PerFechaRegistro) {
        $this->PerFechaRegistro = $PerFechaRegistro;
    }

    public function getPerFechaNacimiento() {
        return $this->PerFechaNacimiento;
    }

    public function setPerFechaNacimiento($PerFechaNacimiento) {
        $this->PerFechaNacimiento = $PerFechaNacimiento;
    }

    public function getPerSexo() {
        return $this->PerSexo;
    }

    public function setPerSexo($PerSexo) {
        $this->PerSexo = $PerSexo;
    }

    public function getPerEstadoCivil() {
        return $this->PerEstadoCivil;
    }

    public function setPerEstadoCivil($PerEstadoCivil) {
        $this->PerEstadoCivil = $PerEstadoCivil;
    }

    public function getPerCodeTelefono() {
        return $this->PerCodeTelefono;
    }

    public function setPerCodeTelefono($PerCodeTelefono) {
        $this->PerCodeTelefono = $PerCodeTelefono;
    }

    public function getPerTelefono() {
        return $this->PerTelefono;
    }

    public function setPerTelefono($PerTelefono) {
        $this->PerTelefono = $PerTelefono;
    }

    public function getPerCelular() {
        return $this->PerCelular;
    }

    public function setPerCelular($PerCelular) {
        $this->PerCelular = $PerCelular;
    }

    public function getPerEmail() {
        return $this->PerEmail;
    }

    public function setPerEmail($PerEmail) {
        $this->PerEmail = $PerEmail;
    }

    public function getPerFacebook() {
        return $this->PerFacebook;
    }

    public function setPerFacebook($PerFacebook) {
        $this->PerFacebook = $PerFacebook;
    }

    public function getPerTwitter() {
        return $this->PerTwitter;
    }

    public function setPerTwitter($PerTwitter) {
        $this->PerTwitter = $PerTwitter;
    }

    public function getPerSkype() {
        return $this->PerSkype;
    }

    public function setPerSkype($PerSkype) {
        $this->PerSkype = $PerSkype;
    }

    public function getPerPais() {
        return $this->PerPais;
    }

    public function setPerPais($PerPais) {
        $this->PerPais = $PerPais;
    }

    public function getPerCiudad() {
        return $this->PerCiudad;
    }

    public function setPerCiudad($PerCiudad) {
        $this->PerCiudad = $PerCiudad;
    }

    public function getPerDireccion() {
        return $this->PerDireccion;
    }

    public function setPerDireccion($PerDireccion) {
        $this->PerDireccion = $PerDireccion;
    }

    public function getPerFoto() {
        return $this->PerFoto;
    }

    public function setPerFoto($PerFoto) {
        $this->PerFoto = $PerFoto;
    }

    public function getPerArea() {
        return $this->PerArea;
    }

    public function setPerArea($PerArea) {
        $this->PerArea = $PerArea;
    }

    public function getPerCargo() {
        return $this->PerCargo;
    }

    public function setPerCargo($PerCargo) {
        $this->PerCargo = $PerCargo;
    }

    public function getPerEstado() {
        return $this->PerEstado;
    }

    public function setPerEstado($PerEstado) {
        $this->PerEstado = $PerEstado;
    }

    function personaUpd() {
        $parametros = array(
            $this->getPerId(),
            $this->getPerNombres(),
            $this->getPerFechaNacimiento(),
            $this->getPerSexo(),
            $this->getPerTelefono(),
            $this->getPerCelular(),
            $this->getPerEmail(),
            $this->getPerFacebook(),
            $this->getPerSkype(),
            $this->getPerArea(),
            $this->getPerCargo()
        );

        $query = $this->db->query("CALL USP_GEN_UPD_PERSONA(?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function personaUploadFoto() {
        $parametros = array(
            $this->getPerId(),
            $this->getPerFoto()
        );

        $query = $this->db->query("CALL USP_GEN_UPD_PERSONA_FOTO(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function personaGetFoto($nPerID) {
        $query = $this->db->query("CALL USP_GEN_S_PERSONA_FOTO(?)", $nPerID);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setPerFoto($row->cPerImgDescripcion);
            return $row;
        } else {
            return null;
        }
    }

}

?>
