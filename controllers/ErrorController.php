<?php

class errorController{
	
	public function index(){
		echo "<h1>Ups...La página que buscas no existe</h1>";
	}

    public function error404(){
        echo "<h1>404 La página que buscas no existe</h1>";
    }


}