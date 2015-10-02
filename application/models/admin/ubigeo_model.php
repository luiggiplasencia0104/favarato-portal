<?php

class ubigeo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function paisQry($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PAISES (?)",$parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
}

?>