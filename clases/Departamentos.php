<?php 

	class departamento{

		public function agregaDepartamento($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into departamento(id_usuario,
										nombre_departamento,
										fechaCaptura)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]')";

			return mysqli_query($conexion,$sql);
		}

		public function actualizaDepartamento($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE departamento set nombre_departamento='$datos[1]'
								where id_departamento='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaDepartamento($iddepartamento){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from departamento
					where id_departamento='$iddepartamento'";
			return mysqli_query($conexion,$sql);
		}

	}

 ?>