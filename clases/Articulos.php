<?php 
	class articulos{
		
		public function insertaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$fecha=date('Y-m-d');

			$sql="INSERT into articulos (
										id_usuario,
										nombre_articulo,
										descripcion,
										precio,
										stock,
										fechaCaptura) 
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$fecha')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_producto, 
						nombre_articulo, 
						descripcion,
						precio,
						stock 
				from articulos 
				where id_producto='$idarticulo'";
			$result=mysqli_query($conexion,$sql);

			$ver=mysqli_fetch_row($result);

			$datos=array(
					"id_producto" => $ver[0],
					"nombre_articulo" => $ver[1],
					"descripcion" => $ver[2],
					"precio" => $ver[3],
					"stock" => $ver[4]
						);

			return $datos;
		}

		public function actualizaArticulo($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE articulos set nombre_articulo='$datos[1]', 
										descripcion='$datos[2]',
										precio='$datos[3]',
										stock='$datos[4]'
						where id_producto='$datos[0]'";

			return mysqli_query($conexion,$sql);
		}

		public function eliminaArticulo($idarticulo){
			$c=new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from articulos 
					where id_producto='$idarticulo'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>