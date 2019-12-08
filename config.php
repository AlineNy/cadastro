<?php


$filename = $class_name.".php";

function incluirClasses($class_name){


    if(file_exists($filename) === true){

        require_once($filename);
    }

}

spl_autoload_register("incluirClasses");

spl_autoload_register(function($class_name){

    
    
    if(file_exists("controller".DIRECTORY_SEPARATOR.$filename) === true){

        require_once("controller".DIRECTORY_SEPARATOR.$filename);
    }
});

spl_autoload_register(function($class_name){
    
    if(file_exists("view".DIRECTORY_SEPARATOR.$class_name) === true){

        require_once("view".DIRECTORY_SEPARATOR.$class_name);
    }
});
spl_autoload_register(function($class_name){
    
    if(file_exists("model".DIRECTORY_SEPARATOR.$class_name) === true){

        require_once("model".DIRECTORY_SEPARATOR.$class_name);
    }
});

?>