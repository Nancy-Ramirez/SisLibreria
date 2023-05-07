<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Compras.php";

$obj= new compra();

$datos=array(
		$_POST['id_productoSelect'],
	    $_POST['precioU'],
	    $_POST['stockU']
			);

    echo $obj->actualizaCompraArt($datos);

 ?>