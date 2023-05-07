<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Articulos.php";

	$obj= new articulos();

	$datos=array(
					$datos[0]=$iduser,
					$datos[2]=$_POST['nombre_articulo'],
					$datos[3]=$_POST['descripcion'],
					$datos[4]=$_POST['precio'],
					$datos[5]=$_POST['stock'],
	);
				echo $obj->insertaArticulo($datos);
