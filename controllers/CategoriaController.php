<?php

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$categoria = new CategoriaModelo();
		$categorias = $categoria->getAll();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new CategoriaModelo();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new ProductoModelo();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$categoria = new CategoriaModelo();
			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();
		}
		header("Location:".base_url."categoria/index");
	}
	
}