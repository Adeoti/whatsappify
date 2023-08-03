<?php

spl_autoload_register('wafyAutoload');
function wafyAutoload($className){
   
    $path = '../classes/'.$className.'.class.php'; 
    
    if(file_exists(plugin_dir_path(__FILE__).$path)){
    require_once plugin_dir_path(__FILE__).$path;
    }else{
       // echo "FILE NOT SEEN AT ALL";
    }
    
}