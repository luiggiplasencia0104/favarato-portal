<?php

class app_helper {

    function getPathInfo() {
        $CI = & get_instance();
        return $CI->router->fetch_class().'-'.$CI->router->fetch_method();
    }

}

?>
