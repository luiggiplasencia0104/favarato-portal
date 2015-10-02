<?php

class cache_helper {

    function getEntryCache($type_cache){
        $CI = & get_instance();
        $CI->load->driver('cache', array('adapter' => 'apc'));
        return $CI->cache->get($type_cache);
    }
    
    function setEntryCache($type_cache, $data_cache){
        $CI = & get_instance();
        $CI->load->driver('cache', array('adapter' => 'apc'));
        $CI->cache->save($type_cache, $data_cache, 300);
        $CI->cache->get($type_cache);
    }
    
}

?>
