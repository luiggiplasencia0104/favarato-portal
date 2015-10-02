<?php

include_once ('multimedia_model.php');

class Publicidad_model extends Multimedia_model {

    function publicidadQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PUBLICIDAD (?,?,?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function publicidadQryOtros($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PUBLICIDAD (?,?,?,?)", $Parametros);

        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function publicidadFotosProductosQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_OFERTAS_PRODUCTOS (?,?,?)", $Parametros);

        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    function publicidadGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PUBLICIDAD (?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setMultId($row->nMultID);
            $this->setMultTituloEs($row->desc_es);
            $this->setMultTituloEn($row->desc_en);
            $this->setMultDescripcionEs($row->desclarga_es);
            $this->setMultDescripcionEn($row->desclarga_en);
            $this->setMultLinkMiniatura($row->cMLinkMiniatura);
            $this->setMultLink($row->cMLink);
            $this->setMultFechaInicial($row->cMFechaInicial);
            $this->setMultFechaFinal($row->cMFechaFinal);
            $this->setMultParID($row->nParID);
            $this->setMultCategoriaID($row->cod_categoria);
            $this->setMultSubCategoriaID($row->cod_subcategoria);
            $this->setMultMarcaID($row->cod_marca);
            $this->setMultTallasEs($row->talla_espanol);
            $this->setMultTallasEn($row->talla_ingles);
            $this->setMultPrecio($row->precio_oferta);
            return $row;
        } else {
            return null;
        }
    }

}

?>