<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Buzon_Mensajes_model extends CI_Model {

    private $MenID;
    private $MenNombre;
    private $MenEmpresa;
    private $MenPais;
    private $MenCiudad;
    private $MenCodigoCiudad;
    private $MenTelefonoFijo;
    private $MenCelular;
    private $MenEmail;
    private $MenAsunto;
    private $MenDescripcion;
    private $MenFecha;
    private $MenCodigo;
    private $MenEstado;

    function __construct() {
        parent::__construct();
    }

    public function getMenID() {
        return $this->MenID;
    }

    public function setMenID($MenID) {
        $this->MenID = $MenID;
    }

    public function getMenNombre() {
        return $this->MenNombre;
    }

    public function setMenNombre($MenNombre) {
        $this->MenNombre = $MenNombre;
    }

    public function getMenEmpresa() {
        return $this->MenEmpresa;
    }

    public function setMenEmpresa($MenEmpresa) {
        $this->MenEmpresa = $MenEmpresa;
    }

    public function getMenPais() {
        return $this->MenPais;
    }

    public function setMenPais($MenPais) {
        $this->MenPais = $MenPais;
    }

    public function getMenCiudad() {
        return $this->MenCiudad;
    }

    public function setMenCiudad($MenCiudad) {
        $this->MenCiudad = $MenCiudad;
    }

    public function getMenCodigoCiudad() {
        return $this->MenCodigoCiudad;
    }

    public function setMenCodigoCiudad($MenCodigoCiudad) {
        $this->MenCodigoCiudad = $MenCodigoCiudad;
    }

    public function getMenTelefonoFijo() {
        return $this->MenTelefonoFijo;
    }

    public function setMenTelefonoFijo($MenTelefonoFijo) {
        $this->MenTelefonoFijo = $MenTelefonoFijo;
    }

    public function getMenCelular() {
        return $this->MenCelular;
    }

    public function setMenCelular($MenCelular) {
        $this->MenCelular = $MenCelular;
    }

    public function getMenEmail() {
        return $this->MenEmail;
    }

    public function setMenEmail($MenEmail) {
        $this->MenEmail = $MenEmail;
    }

    public function getMenAsunto() {
        return $this->MenAsunto;
    }

    public function setMenAsunto($MenAsunto) {
        $this->MenAsunto = $MenAsunto;
    }

    public function getMenDescripcion() {
        return $this->MenDescripcion;
    }

    public function setMenDescripcion($MenDescripcion) {
        $this->MenDescripcion = $MenDescripcion;
    }

    public function getMenFecha() {
        return $this->MenFecha;
    }

    public function setMenFecha($MenFecha) {
        $this->MenFecha = $MenFecha;
    }

    public function getMenCodigo() {
        return $this->MenCodigo;
    }

    public function setMenCodigo($MenCodigo) {
        $this->MenCodigo = $MenCodigo;
    }

    public function getMenEstado() {
        return $this->MenEstado;
    }

    public function setMenEstado($MenEstado) {
        $this->MenEstado = $MenEstado;
    }

    function mensajeContactoIns() {
        $parametros = array(
            'INS-CONTACTO-MENSAJE',
            $this->getMenNombre(),
            $this->getMenEmpresa(),
            $this->getMenPais(),
            $this->getMenCiudad(),
            $this->getMenCodigoCiudad(),
            $this->getMenTelefonoFijo(),
            $this->getMenCelular(),
            $this->getMenEmail(),
            $this->getMenAsunto(),
            $this->getMenDescripcion(),
        );

        $query = $this->db->query("CALL USP_GEN_I_BUZON_MENSAJES (?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

