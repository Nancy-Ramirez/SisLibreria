<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj= new usuarios;

	$pass=sha1($_POST['passwordU']);
	$datos=array(
			$_POST['idUsuario'], 
		    $_POST['nombreU'] , 
		    $_POST['apellidoU'],  
		    $_POST['usuarioU'],
			$pass	);  
	echo $obj->actualizaUsuario($datos);


 ?>