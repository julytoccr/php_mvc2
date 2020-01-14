<?php

function controllers_autoload($classname){
	include 'controllers/' . ucfirst($classname) . '.php';
}

/*Registro la funcion callback que se hara cargo del autoload*/
spl_autoload_register('controllers_autoload');