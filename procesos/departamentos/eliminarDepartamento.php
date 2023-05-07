<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Departamentos.php";
	$id=$_POST['id_departamento'];

	$obj= new departamento();
	echo $obj->eliminaDepartamento($id);

 ?>