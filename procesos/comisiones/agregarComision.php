<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Comisiones.php";

	$obj= new comision();


	$datos=array(
	    $_POST['nombre_comision'],
	    $_POST['venta_base'],
	    $_POST['venta_limite'],
	    $_POST['porcentaje']
				);

	echo $obj->agregaComision($datos);

	?>
