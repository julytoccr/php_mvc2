<?php
/*
*  Este archivo va a "atajar" todas las peticiones NO estaticas, es decir
*  que no se encuentren en el filesystem . Es como el front controller
*/

//Inicio uso de sesiones
session_start();

//Cargo archivos necesarios

//archivo donde se registra la funcion de autoload de clases
require_once 'autoload.php';

//configuracion del acceso a db
require_once 'config/db.php';

//Constantes usadas en todo el sitio
require_once 'config/parameters.php';

//clases/funciones utiles
require_once 'helpers/utils.php';

//Cargo vista del header
require_once 'views/layout/header.php';

//Cargo vista del sidebar
require_once 'views/layout/sidebar.php';

//Comienzo parte principal del sitio,
if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = controller_default;
	
}else{
	show_error();
	exit();
}

/*Si la clase no esta difinida, se llama a la funcion regitrada para autoload*/
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();
	}else{
		show_error();
	}
}else{
	show_error();
}
//Fin parte principal del sitio

//Cargo vista del footer
require_once 'views/layout/footer.php';