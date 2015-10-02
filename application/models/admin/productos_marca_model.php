<?php

class Productos_Marca_model extends CI_Model {

    private $MarId;
    private $MarDescripcion;
    private $MarCategoria;
    private $MarEstado;

    public function getMarId() {
        return $this->MarId;
    }

    public function setMarId($MarId) {
        $this->MarId = $MarId;
    }

    public function getMarDescripcion() {
        return $this->MarDescripcion;
    }

    public function setMarDescripcion($MarDescripcion) {
        $this->MarDescripcion = $MarDescripcion;
    }

    public function getMarCategoria() {
        return $this->MarCategoria;
    }

    public function setMarCategoria($MarCategoria) {
        $this->MarCategoria = $MarCategoria;
    }

    public function getMarEstado() {
        return $this->MarEstado;
    }

    public function setMarEstado($MarEstado) {
        $this->MarEstado = $MarEstado;
    }

    function productos_marcaIns() {
        $parametros=Array(
            'INS-PRODUCTO-MARCA',
            $this->getMarCategoria(),
            $this->getMarDescripcion(),
        );
        $query = $this->db->query("CALL USP_GEN_I_PRODUCTO_MARCA (?,?,?)", $parametros);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function productos_marcaUpd() {
        $parametros=Array(
            'UPD-PRODUCTO-MARCA',
            $this->getMarId(),
            $this->getMarDescripcion(),
            $this->getMarCategoria()
        );
        $query = $this->db->query("CALL USP_GEN_U_PRODUCTO_MARCA (?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function productos_marcaDel($Parameters) {
        $query = $this->db->query("CALL USP_GEN_U_PRODUCTO_MARCA (?,?,?,?)", $Parameters);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function productos_marcaQry($Parametros) {
        
        if ($Parametros['categoria'] == 'no-data-cbo'){
            $query = $this->db->query("CALL USP_GEN_S_PRODUCTO_MARCA (?,?,?,?)", array('L-PRODUCTO-MARCA-CRITERIO',$Parametros['idioma'],'si-hay-data',''));
        }
        else{
            $query = $this->db->query("CALL USP_GEN_S_PRODUCTO_MARCA (?,?,?,?)", $Parametros);
        }
        
        
         $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function productos_marcaGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTO_MARCA(?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setMarId($row->nMarID);
            $this->setMarDescripcion($row->cMarDescripcion);
            $this->setMarEstado($row->cMarEstado);
            $this->setMarCategoria($row->nCatID);
            return $row;
        } else {
            return null;
        }
    }
    
}

?>