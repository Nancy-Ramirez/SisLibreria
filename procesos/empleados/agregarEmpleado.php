<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Empleados.php";

	$obj= new empleados();


	$datos=array(
            $_POST['deparatamentoSelect'],
            $_POST['nombre'],
			$_POST['apellido'],
			$_POST['direccion'],
			$_POST['email'],
			$_POST['telefono'],
			$_POST['dui'],
            $_POST['salario']
				);

	echo $obj->agregarEmpleado($datos);

	
	
 ?>