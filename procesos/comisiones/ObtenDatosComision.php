<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Comisiones.php";

	$obj= new comision();

	echo json_encode($obj->obtenDatosComision($_POST['idcomision']));

 ?>