<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Empleados.php";

$obj= new empleados();

$datos=array(
		$_POST['idEmpleado'],
		$_POST['departamentoSelectU'],
	    $_POST['nombreU'],
	    $_POST['apellidosU'],
		$_POST['direccionU'],
		$_POST['emailU'],
		$_POST['telefonoU'],
	    $_POST['duiU'],
	    $_POST['salarioU']
			);

    echo $obj->actualizaEmpleado($datos);

 ?>