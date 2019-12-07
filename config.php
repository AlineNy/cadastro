<?php


function incluirClasses($nomeClasse){

    if(file_exists($nomeClasse.".php") === true){

        require_once($nomeClasse.".php");
    }

}

spl_autoload_register("incluirClasses");

spl_autoload_register(function($nomeClasse){
    
    if(file_exists("controller".DIRECTORY_SEPARATOR.$nomeClasse.".php") === true){

        require_once("controller".DIRECTORY_SEPARATOR.$nomeClasse.".php");
    }
});

spl_autoload_register(function($nomeClasse){
    
    if(file_exists("view".DIRECTORY_SEPARATOR.$nomeClasse.".php") === true){

        require_once("view".DIRECTORY_SEPARATOR.$nomeClasse.".php");
    }
});
spl_autoload_register(function($nomeClasse){
    
    if(file_exists("model".DIRECTORY_SEPARATOR.$nomeClasse.".php") === true){

        require_once("model".DIRECTORY_SEPARATOR.$nomeClasse.".php");
    }
});

?>