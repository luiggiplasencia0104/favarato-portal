<?php

class Multimedia_model extends CI_Model {

    private $MultId;
    private $MultTituloEs;
    private $MultTituloEn;
    private $MultDescripcionEs;
    private $MultDescripcionEn;
    private $MultLink;
    private $MultLinkMiniatura;
    private $MultFechaRegistro;
    private $MultFechaInicial;
    private $MultFechaFinal;
    private $MultTipo;
    private $MultCategoria;
    private $MultParID;
    private $MultCategoriaID;
    private $MultSubCategoriaID;
    private $MultMarcaID;
    private $MultPrecio;
    private $MultTallasEs;
    private $MultTallasEn;
    private $MultEstado;
    private $Accion;

    public function getMultId() {
        return $this->MultId;
    }

    public function setMultId($MultId) {
        $this->MultId = $MultId;
    }

    public function getMultTituloEs() {
        return $this->MultTituloEs;
    }

    public function setMultTituloEs($MultTituloEs) {
        $this->MultTituloEs = $MultTituloEs;
    }

    public function getMultTituloEn() {
        return $this->MultTituloEn;
    }

    public function setMultTituloEn($MultTituloEn) {
        $this->MultTituloEn = $MultTituloEn;
    }

    public function getMultDescripcionEs() {
        return $this->MultDescripcionEs;
    }

    public function setMultDescripcionEs($MultDescripcionEs) {
        $this->MultDescripcionEs = $MultDescripcionEs;
    }

    public function getMultDescripcionEn() {
        return $this->MultDescripcionEn;
    }

    public function setMultDescripcionEn($MultDescripcionEn) {
        $this->MultDescripcionEn = $MultDescripcionEn;
    }

    public function getMultLink() {
        return $this->MultLink;
    }

    public function setMultLink($MultLink) {
        $this->MultLink = $MultLink;
    }

    public function getMultLinkMiniatura() {
        return $this->MultLinkMiniatura;
    }

    public function setMultLinkMiniatura($MultLinkMiniatura) {
        $this->MultLinkMiniatura = $MultLinkMiniatura;
    }

    public function getMultFechaRegistro() {
        return $this->MultFechaRegistro;
    }

    public function setMultFechaRegistro($MultFechaRegistro) {
        $this->MultFechaRegistro = $MultFechaRegistro;
    }

    public function getMultFechaInicial() {
        return $this->MultFechaInicial;
    }

    public function setMultFechaInicial($MultFechaInicial) {
        $this->MultFechaInicial = $MultFechaInicial;
    }

    public function getMultFechaFinal() {
        return $this->MultFechaFinal;
    }

    public function setMultFechaFinal($MultFechaFinal) {
        $this->MultFechaFinal = $MultFechaFinal;
    }

    public function getMultTipo() {
        return $this->MultTipo;
    }

    public function setMultTipo($MultTipo) {
        $this->MultTipo = $MultTipo;
    }

    public function getMultCategoria() {
        return $this->MultCategoria;
    }

    public function setMultCategoria($MultCategoria) {
        $this->MultCategoria = $MultCategoria;
    }

    public function getMultParID() {
        return $this->MultParID;
    }

    public function setMultParID($MultParID) {
        $this->MultParID = $MultParID;
    }

    public function getMultCategoriaID() {
        return $this->MultCategoriaID;
    }

    public function setMultCategoriaID($MultCategoriaID) {
        $this->MultCategoriaID = $MultCategoriaID;
    }

    public function getMultSubCategoriaID() {
        return $this->MultSubCategoriaID;
    }

    public function setMultSubCategoriaID($MultSubCategoriaID) {
        $this->MultSubCategoriaID = $MultSubCategoriaID;
    }

    public function getMultMarcaID() {
        return $this->MultMarcaID;
    }

    public function setMultMarcaID($MultMarcaID) {
        $this->MultMarcaID = $MultMarcaID;
    }

    public function getMultPrecio() {
        return $this->MultPrecio;
    }

    public function setMultPrecio($MultPrecio) {
        $this->MultPrecio = $MultPrecio;
    }

    public function getMultTallasEs() {
        return $this->MultTallasEs;
    }

    public function setMultTallasEs($MultTallasEs) {
        $this->MultTallasEs = $MultTallasEs;
    }

    public function getMultTallasEn() {
        return $this->MultTallasEn;
    }

    public function setMultTallasEn($MultTallasEn) {
        $this->MultTallasEn = $MultTallasEn;
    }

    public function getMultEstado() {
        return $this->MultEstado;
    }

    public function setMultEstado($MultEstado) {
        $this->MultEstado = $MultEstado;
    }

    public function getAccion() {
        return $this->Accion;
    }

    public function setAccion($Accion) {
        $this->Accion = $Accion;
    }

        
    function qryMultimedia($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_UPLOADS(?,?,?,?)", $parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function multimediaGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_MULTIMEDIA(?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setMultId($row->nMultID);
            $this->setMultLinkMiniatura($row->cMLinkMiniatura);
            $this->setMultLink($row->cMLink);
            $this->setMultTitulo($row->cMTitulo);
            $this->setMultDescripcion($row->cMDescripcion);
            $this->setMultTipo($row->nMTipoID);
            $this->setMultCategoria($row->nMCategID);
            return $row;
        } else {
            return null;
        }
    }
}

?>