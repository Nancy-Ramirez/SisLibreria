<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$id_empleado=$_POST['empleadoVenta'];
	$id_producto=$_POST['productoVenta'];
	$id_producto=$_POST['existencia'];
	$descripcion=$_POST['descripcion'];
	$precio_venta=$_POST['precio_venta'];

	$sql="SELECT nombre,apellido 
			from empleado
			where id_empleado='$id_empleado'";
	$result=mysqli_query($conexion,$sql);

	$c=mysqli_fetch_row($result);

	$nempleado=$c[1]." ".$c[0];

	$sql="SELECT nombre_articulo 
			from articulos 
			where id_producto='$id_producto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$articulo=$id_producto."||".
				$nombreproducto."||".
				$descripcion."||".
				$precio_venta."||".
				$nempleado."||".
				$id_empleado;

	$_SESSION['tablaComprasTemp'][]=$articulo;
