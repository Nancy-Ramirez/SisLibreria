<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Compras.php";

	$obj= new compra();

	echo json_encode($obj->obtenDatosCompra($_POST['idcompra']));

 ?>