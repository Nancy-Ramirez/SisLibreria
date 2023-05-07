<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Articulos.php";

$obj= new articulos();

$datos=array(
		$_POST['idArticulo'],
	    $_POST['nombre_articuloU'],
	    $_POST['descripcionU'],
	    $_POST['precioU'],
	    $_POST['stockU']
			);

    echo $obj->actualizaArticulo($datos);

 ?>