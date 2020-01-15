<?php

//Funcion que se ejecuta cada vez que no se quiere instanciar una clase no definida
function controllers_autoload($classname){
	include 'controllers/' . ucfirst($classname) . '.php';
}

/*Registro la funcion callback que se hara cargo del autoload de clases*/
spl_autoload_register('controllers_autoload');