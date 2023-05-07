<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Departamentos.php";

	$obj= new departamento();
	
	$fecha=date("Y-m-d");
	$id_usuario=$_SESSION['iduser'];
	$nombre_departamento=$_POST['nombre_departamento'];

	$datos=array(
		$id_usuario,
		$nombre_departamento,
		$fecha);

	echo $obj->agregaDepartamento($datos);


 ?>