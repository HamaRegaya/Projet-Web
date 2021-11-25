<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){

    $path = "classes/";
    $exten = ".php";
    $fullPath = $path . $className  . $exten; 

    if(!file_exists($fullPath)){
        return false;
    }
    
    include_once $fullPath;
}

?>