<?php

//Funcion que se ejecuta cada vez que no se quiere instanciar una clase no definida
function controllers_autoload($classname){
    //Si trato de instanciar un controlador, incluyo el correspondiente archivo
    if(strpos($classname,"Controller")!=false){
        include path_controllers . ucfirst($classname) . '.php';
    }
    //Si trato de instanciar un modelo/entidad, incluyo el correspondiente archivo
    elseif(strpos($classname,"Modelo")!=false){
        include path_modelos . $classname . '.php';
    }
}

/*Registro la funcion callback que se hara cargo del autoload de clases*/
spl_autoload_register('controllers_autoload');