<?php

class Categorias_model extends CI_Model {

    private $CatId;
    private $CatDescripcionEs;
    private $CatDescripcionEn;
    private $CatPadreID;
    private $CatOrden;
    private $CatEstado;

    public function getCatId() {
        return $this->CatId;
    }

    public function setCatId($CatId) {
        $this->CatId = $CatId;
    }

    public function getCatDescripcionEs() {
        return $this->CatDescripcionEs;
    }

    public function setCatDescripcionEs($CatDescripcionEs) {
        $this->CatDescripcionEs = $CatDescripcionEs;
    }

    public function getCatDescripcionEn() {
        return $this->CatDescripcionEn;
    }

    public function setCatDescripcionEn($CatDescripcionEn) {
        $this->CatDescripcionEn = $CatDescripcionEn;
    }

    public function getCatPadreID() {
        return $this->CatPadreID;
    }

    public function setCatPadreID($CatPadreID) {
        $this->CatPadreID = $CatPadreID;
    }

    public function getCatOrden() {
        return $this->CatOrden;
    }

    public function setCatOrden($CatOrden) {
        $this->CatOrden = $CatOrden;
    }

    public function getCatEstado() {
        return $this->CatEstado;
    }

    public function setCatEstado($CatEstado) {
        $this->CatEstado = $CatEstado;
    }

    function categoriasQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTO_CATEGORIA (?,?,?,?,?)", $Parametros);
        $CategoriasFinal = array();
        $this->db->close();

        foreach ($query->result_array() as $fila) {
            $CategoriasTemp = array();
            $code_categoria = $fila['nCatID'];

            $subquery = $this->db->query("CALL USP_GEN_S_PRODUCTO_CATEGORIA (?,?,?,?,?)", Array('L-PRODUCTO-PORTAL-SUBCATEGORIAS', $this->uri->segment(1), $code_categoria, null, null));
            $this->db->close();
            foreach ($subquery->result_array() as $subquery) {
                array_push($CategoriasTemp, Array(
                    'nCatID' => $subquery['nCatID']
                    , 'desc_subcategoria' => $subquery['cTbIdDescripcion']
                    , 'url_subcategoria' => strtolower(replace_caracteres_raros($fila['cTbIdDescripcion']))
                    , 'estado' => $subquery['estado']
                ));
            }
            
            array_push($CategoriasFinal, array(
                'nCatID' => $fila['nCatID']
                , 'desc_categoria' => $fila['cTbIdDescripcion']
                , 'url_categoria' => strtolower(replace_caracteres_raros($fila['cTbIdDescripcion'])) 
                , 'estado' => $fila['estado']
                , 'subcategorias' => $CategoriasTemp
            ));
        }

        return $CategoriasFinal;
    }

    function categoriasGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTO_CATEGORIA(?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setCatId($row->nCatID);
            $this->setCatDescripcionEs($row->desc_es);
            $this->setCatDescripcionEn($row->desc_en);
            $this->setCatPadreID($row->nCatPadreID);
            $this->setCatOrden($row->nCatOrden);
            $this->setCatEstado($row->cTbIdEstado);
            return $row;
        } else {
            return null;
        }
    }

    function productos_categoriaGetDatos($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PRODUCTO_CATEGORIA(?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setCatId($row->nCatID);
            $this->setCatDescripcionEs($row->cTbIdDescripcion);
            $this->setCatPadreID($row->nCatPadreID);
            $this->setCatOrden($row->nCatOrden);
            $this->setCatEstado($row->cTbIdEstado);
            return $row;
        } else {
            return null;
        }
    }

}

?>