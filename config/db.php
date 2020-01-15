<?php

class Database{

    //Funcion estatica de la clase que hace la conexion a la DB y la devuelve como valor
    //Como es estatica, puede ser llamada sin instanciar la clase( Database:connect() )
	public static function connect(){
		$db = new mysqli('localhost', 'root', '', 'tienda_master');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

