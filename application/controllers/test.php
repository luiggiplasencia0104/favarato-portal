<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function cleanDataCache(){
        $this->load->driver('cache', array('adapter' => 'apc'));
        $this->cache->clean();
        
        echo '<h1>SE HA LIMPIADO LA CACHE</h1>';
    }
    
    public function info_cache(){
        
    }
    
    function loca() {
        $this->load->driver('cache');
        if ($this->cache->apc->is_supported()) {
            $data = $this->cache->apc->get('foo');
            if (!$data) {
                echo 'cache miss!<br />';
                $data = $this->aplicacion_model->aplicacionCombo(array('L-APLICACION-COMBO', $this->idioma, ''));
                $this->cache->apc->save('foo', $data, 60);
            }
            print_r($data);
            echo '<pre>';
            var_dump($this->cache->apc->cache_info());
            echo '</pre>';
        } else {
            echo 'no cache';
        }
    }

    public function cache_pruebas() {
        $key_js = 'cache_js'.app_helper::getPathInfo();        
        $cache_js = cache_helper::getEntryCache($key_js);

        if (!$cache_js) {
            echo 'grabando cache pues men';

            $cache_js = Array(
                'layer-slider/layerslider/js/greensock',
                'layer-slider/layerslider/js/layerslider.transitions',
                'layer-slider/layerslider/js/layerslider.kreaturamedia.jquery',
                'layer-slider'
            );

            cache_helper::setEntryCache($key_js, $cache_js);
        }

        print_r($cache_js);
        exit();
    }

    public function cache_pruebas2() {
        $key_js = 'cache_js'.app_helper::getPathInfo();
        print_r($key_js);
        $cache_js = cache_helper::getEntryCache($key_js);

        if (!$cache_js) {
            echo 'grabando cache pues men';

            $cache_js = Array(
                'layer-slider/layerslider/js/greensock',
                'layer-slider/layerslider/js/layerslider.transitions',
                'layer-slider/layerslider/js/layerslider.kreaturamedia.jquery',
                'layer-slider'
            );

            cache_helper::setEntryCache($key_js, $cache_js);
        }

        print_r($cache_js);
        exit();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


