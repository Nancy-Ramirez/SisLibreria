<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Departamentos.php";

	

	$datos=array(
		$_POST['id_departamentoU'],
		$_POST['nombre_departamentoU']
			);

	$obj= new departamento();

	echo $obj->actualizaDepartamento($datos);

 ?>