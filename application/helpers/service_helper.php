<?php

//---------------------------------------------------------------------------
//SERVICIOS EN PRUEBA -> ADANYC (AL 20/09/12)
//---------------------------------------------------------------------------
//-
// COMBO SIMPLE SIN --SELECCIONE OPCION--     ---- 
function combosso($query, $atributos) {
    $data = toArrayNumerico($query);
    $result = "";
    $result .= "<select " . $atributos . ">";

    foreach ($data as $fila) {
        $result .= "<option value=$fila[0]>" . utf8_encode($fila[1]) . "</option>";
    }
    $result .= "</select>";

//    $resultx = print_r($result);
    return $result;
}

// COMBO NUMERICO ASCENDENTE (recibe un rango de numeros y construye el combo) 
function combonasc($liminf, $limsup, $atributos) {
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $liminf; $i <= $limsup; $i++) {
        $result .= "<option value=$i>" . $i . "</option>";
    }

    $result .= "</select>";

    return $result;
}

// COMBO NUMERICO DESCENDENTE (recibe un rango de numeros y construye el combo) 
function combondesc($limsup, $liminf, $atributos) {
    $result = "";
    $result .= "<select " . $atributos . ">";

    for ($i = $limsup; $i >= $liminf; $i--) {
        $result .= "<option value=$i>" . $i . "</option>";
    }

    $result .= "</select>";

    return $result;
}

// CONVIERTE UN ARRAY A NUMERICO (EQUIVALENTE A mysql_fetch_row)
function toArrayNumerico($query) {
    $array = array();
    $fila = $col = 0;

    foreach ($query->result() as $row) {
        $col = 0;
        foreach ($row as $key => $value) {
            $array[$fila][$col] = $value;
            $col++;
        }
        $fila++;
    }
    return $array;
}

function toNameMonth($valor) {
    switch ($valor) {
        case '01':
            $m = lang('idioma.meses_1');
            break;
        case '02':
            $m = lang('idioma.meses_2');
            break;
        case '03':
            $m = lang('idioma.meses_3');
            break;
        case '04':
            $m = lang('idioma.meses_4');
            break;
        case '05':
            $m = lang('idioma.meses_5');
            break;
        case '06':
            $m = lang('idioma.meses_6');
            break;
        case '07':
            $m = lang('idioma.meses_7');
            break;
        case '08':
            $m = lang('idioma.meses_8');
            break;
        case '09':
            $m = lang('idioma.meses_9');
            break;
        case '10':
            $m = lang('idioma.meses_10');
            break;
        case '11':
            $m = lang('idioma.meses_11');
            break;
        case '12':
            $m = lang('idioma.meses_12');
            break;
        default:
            $m = 'valor incorrecto del mes';
            break;
    }

    return $m;
}

function replace_caracteres_raros($cadena) {
    $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
    $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    $validacion_extras = Array(',', '"', '(', ')', '&', '/', "'", '%', ":",);
    $primer_replace = str_replace($validacion_extras, "", str_replace(" ", "-", $cadena));
    $segundo_replace = str_replace($no_permitidas, $permitidas, $primer_replace);
    $texto_limpio = $segundo_replace;

    return $texto_limpio;
}

?>
