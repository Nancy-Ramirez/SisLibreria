<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Compras.php";

	$obj= new compra();


	$datos=array(
	    $_POST['id_productoSelect'],
	    $_POST['cantidad'],
	    $_POST['precio_compra']
				);

	echo $obj->agregaCompra($datos);

	?>
