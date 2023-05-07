<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/Comisiones.php";

$obj= new comision();

$datos=array(
		$_POST['id_comisionU'],
	    $_POST['nombre_comisionU'],
	    $_POST['venta_baseU'],
	    $_POST['venta_limiteU'],
	    $_POST['porcentajeU']
			);

    echo $obj->actualizaComision($datos);
