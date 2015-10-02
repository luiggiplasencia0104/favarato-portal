<?php

include_once ('multimedia_model.php');

class Productos_model extends Multimedia_model {

    private $ProdId;
    private $ProdNombreEs;
    private $ProdNombreEn;
    private $ProdDescripcionEs;
    private $ProdDescripcionEn;
    private $ProdCatId;
    private $ProdCategoria;
    private $ProdSubCatId;
    private $ProdSubCategoria;
    private $ProdMarId;
    private $ProdMarca;
    private $ProdPrecio;
    private $ProdTallasEs;
    private $ProdTallasEn;
    private $ProdFechaRegistro;
    private $ProdFotoPortada;
    private $ProdEstado;
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

    public function getProdId() {
        return $this->ProdId;
    }

    public function setProdId($ProdId) {
        $this->ProdId = $ProdId;
    }

    public function getProdNombreEs() {
        return $this->ProdNombreEs;
    }

    public function setProdNombreEs($ProdNombreEs) {
        $this->ProdNombreEs = $ProdNombreEs;
    }

    public function getProdNombreEn() {
        return $this->ProdNombreEn;
    }

    public function setProdNombreEn($ProdNombreEn) {
        $this->ProdNombreEn = $ProdNombreEn;
    }

    public function getProdDescripcionEs() {
        return $this->ProdDescripcionEs;
    }

    public function setProdDescripcionEs($ProdDescripcionEs) {
        $this->ProdDescripcionEs = $ProdDescripcionEs;
    }

    public function getProdDescripcionEn() {
        return $this->ProdDescripcionEn;
    }

    public function setProdDescripcionEn($ProdDescripcionEn) {
        $this->ProdDescripcionEn = $ProdDescripcionEn;
    }

    public function getProdCatId() {
        return $this->ProdCatId;
    }

    public function setProdCatId($ProdCatId) {
        $this->ProdCatId = $ProdCatId;
    }

    public function getProdCategoria() {
        return $this->ProdCategoria;
    }

    public function setProdCategoria($ProdCategoria) {
        $this->ProdCategoria = $ProdCategoria;
    }

    public function getProdSubCatId() {
        return $this->ProdSubCatId;
    }

    public function setProdSubCatId($ProdSubCatId) {
        $this->ProdSubCatId = $ProdSubCatId;
    }

    public function getProdSubCategoria() {
        return $this->ProdSubCategoria;
    }

    public function setProdSubCategoria($ProdSubCategoria) {
        $this->ProdSubCategoria = $ProdSubCategoria;
    }

    public function getProdMarId() {
        return $this->ProdMarId;
    }

    public function setProdMarId($ProdMarId) {
        $this->ProdMarId = $ProdMarId;
    }

    public function getProdMarca() {
        return $this->ProdMarca;
    }

    public function setProdMarca($ProdMarca) {
        $this->ProdMarca = $ProdMarca;
    }

    public function getProdPrecio() {
        return $this->ProdPrecio;
    }

    public function setProdPrecio($ProdPrecio) {
        $this->ProdPrecio = $ProdPrecio;
    }

    public function getProdTallasEs() {
        return $this->ProdTallasEs;
    }

    public function setProdTallasEs($ProdTallasEs) {
        $this->ProdTallasEs = $ProdTallasEs;
    }
    
    public function getProdTallasEn() {
        return $this->ProdTallasEn;
    }

    public function setProdTallasEn($ProdTallasEn) {
        $this->ProdTallasEn = $ProdTallasEn;
    }

    public function getProdFechaRegistro() {
        return $this->ProdFechaRegistro;
    }

    public function setProdFechaRegistro($ProdFechaRegistro) {
        $this->ProdFechaRegistro = $ProdFechaRegistro;
    }

    public function getProdFotoPortada() {
        return $this->ProdFotoPortada;
    }

    public function setProdFotoPortada($ProdFotoPortada) {
        $this->ProdFotoPortada = $ProdFotoPortada;
    }

    public function getProdEstado() {
        return $this->ProdEstado;
    }

    public function setProdEstado($ProdEstado) {
        $this->ProdEstado = $ProdEstado;
    }

    public function get_n() {
        return $this->_n;
    }

    public function set_n($_n) {
        $this->_n = $_n;
    }

    function productosQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTOS (?,?,?,?,?,?,?)", $Parametros);
        $this->db->close();
        $this->set_n(count($query->result_array()));

        if ($this->get_n() > 0) {
            $i = 0;
            $query = $query->result_array();
            foreach ($query as $query) {
                $this->_Data[$i]['nProdID'] = $query['nProdID'];
                $this->_Data[$i]['nombre_producto'] = $query['nombre_producto'];
                $this->_Data[$i]['nCatID'] = $query['nCatID'];
                $this->_Data[$i]['nSubCatID'] = $query['nSubCatID'];
                $this->_Data[$i]['foto_producto'] = $query['foto_producto'];
                $i++;
            }
            return true;
        } else {
            return null;
        }
    }
    
    function productosQryOtros($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTOS (?,?,?,?,?)", $Parametros);
        $this->db->close();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function productosGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTOS(?,?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setProdId($row->nProdID);
            $this->setProdNombreEs($row->nombre_es);
            $this->setProdNombreEn($row->nombre_en);
            $this->setProdDescripcionEs($row->desc_es);
            $this->setProdDescripcionEn($row->desc_en);
            $this->setProdCatId($row->nCatID);
            $this->setProdSubCatId($row->nSubCatID);
            $this->setProdMarId($row->nMarID);
            $this->setProdPrecio($row->precio_producto);
            $this->setProdTallasEs($row->tallas_producto_es);
            $this->setProdTallasEn($row->tallas_producto_en);
            $this->setProdFechaRegistro($row->dProdFechaRegistro);
            $this->setProdFotoPortada($row->foto_producto);
            $this->setProdEstado($row->cTbIdEstado);
            return $row;
        } else {
            return null;
        }
    }

    /* FOTOS DE LOS PRODUCTOS */
    function productosQryFotos($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_UPLOADS_PRODUCTOS (?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function productosGetInfoFoto($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_UPLOADS_PRODUCTOS(?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setMultId($row->nMultID);
            $this->setMultTituloEs($row->titulo_foto_es);
            $this->setMultTituloEn($row->titulo_foto_en);
            $this->setMultEstado($row->cMultProdEstado);
            $this->setMultLinkMiniatura($row->cMLinkMiniatura);
            return $row;
        } else {
            return null;
        }
    }

}

?>