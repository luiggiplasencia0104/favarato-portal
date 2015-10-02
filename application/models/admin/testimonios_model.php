<?php

class Testimonios_model extends CI_Model {

    private $TestId;
    private $TestNombres;
    private $TestAlias;
    private $TestPais;
    private $TestEmail;
    private $TestFecha;
    private $TestDescripcion;
    private $TestEstado;
    private $_Data = array();
    private $_n;

    public function get_Data($Index, $Limit) {
        $Data = $this->_Data;
        if ($this->get_n() == 0)
            $Limit = 0;
        if ($Limit > $this->get_n())
            $Limit = $this->get_n();
        $return = array();
        for ($i = $Index; $i < $Limit; $i++) {
            array_push($return, $Data[$i]);
        }
        return $return;
    }

    public function get_Datos() {
        return $this->_Data;
    }

    public function set_Data($_Data) {
        $this->_Data = $_Data;
    }

    public function getTestId() {
        return $this->TestId;
    }

    public function setTestId($TestId) {
        $this->TestId = $TestId;
    }

    public function getTestNombres() {
        return $this->TestNombres;
    }

    public function setTestNombres($TestNombres) {
        $this->TestNombres = $TestNombres;
    }

    public function getTestAlias() {
        return $this->TestAlias;
    }

    public function setTestAlias($TestAlias) {
        $this->TestAlias = $TestAlias;
    }

    public function getTestPais() {
        return $this->TestPais;
    }

    public function setTestPais($TestPais) {
        $this->TestPais = $TestPais;
    }

    public function getTestEmail() {
        return $this->TestEmail;
    }

    public function setTestEmail($TestEmail) {
        $this->TestEmail = $TestEmail;
    }

    public function getTestFecha() {
        return $this->TestFecha;
    }

    public function setTestFecha($TestFecha) {
        $this->TestFecha = $TestFecha;
    }

    public function getTestDescripcion() {
        return $this->TestDescripcion;
    }

    public function setTestDescripcion($TestDescripcion) {
        $this->TestDescripcion = $TestDescripcion;
    }

    public function getTestEstado() {
        return $this->TestEstado;
    }

    public function setTestEstado($TestEstado) {
        $this->TestEstado = $TestEstado;
    }

    public function get_n() {
        return $this->_n;
    }

    public function set_n($_n) {
        $this->_n = $_n;
    }

    function testimoniosIns() {
        $parametros = array(
            'INS-TESTIMONIO',
            $this->getTestNombres(),
            '',
            $this->getTestPais(),
            $this->getTestEmail(),
            $this->getTestDescripcion()
        );
        $query = $this->db->query("CALL USP_GEN_I_TESTIMONIOS (?,?,?,?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function testimoniosQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_TESTIMONIOS (?,?,?,?)", $Parametros);
        $this->db->close();

        if (count($query) > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function testimoniosGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_TESTIMONIOS(?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();

            //CREANDO EL OBJETO
            $this->setTestId($row->nTestID);
            $this->setTestNombres($row->cTestNombres);
            $this->setTestAlias($row->cTestAlias);
            $this->setTestEmail($row->cTestEmail);
            $this->setTestPais($row->Pais);
            $this->setTestDescripcion($row->cTestDescripcion);
            $this->setTestEstado($row->cPaisIso2);
            return $row;
        } else {
            return null;
        }
    }

}

?>