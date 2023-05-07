<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Compras.php";
$idcom=$_POST['id_compra'];

	$obj=new compra();

	echo $obj->eliminaCompra($idcom);

 ?>