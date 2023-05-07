<?php 


require_once "../../clases/Conexion.php";
require_once "../../clases/Comisiones.php";
$idcomi=$_POST['id_comision'];

	$obj=new comision();

	echo $obj->eliminaComision($idcomi);

 ?>