<?php 

	class empleados{

		public function agregarEmpleado($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$idusuario=$_SESSION['iduser'];
            
			$sql="INSERT into empleado (id_usuario,
                                        id_departamento,
										nombre,
										apellido,
										direccion,
										email,
										telefono,
										dui,
                                        salario)
							values ('$idusuario',
									'$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
                                    '$datos[6]',
                                    '$datos[7]')";
			return mysqli_query($conexion,$sql);	
		}

		public function obtenDatosEmpleado($idEmpleado){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_empleado, 
                            id_departamento,
							nombre,
							apellido,
							direccion,
							email,
							telefono,
							dui,
                            salario 
				from empleado 
				where id_empleado ='$idEmpleado'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'id_empleado' => $ver[0], 
                    'id_departamento' => $ver[1], 
					'nombre' => $ver[2],
					'apellido' => $ver[3],
					'direccion' => $ver[4],
					'email' => $ver[5],
					'telefono' => $ver[6],
					'dui' => $ver[7],
                    'salario' => $ver[8]
						);
			return $datos;
		}

		public function actualizaEmpleado($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE empleado set   id_departamento='$datos[1]',
                                        nombre='$datos[2]',
										apellido='$datos[3]',
										direccion='$datos[4]',
										email='$datos[5]',
										telefono='$datos[6]',
										dui='$datos[7]',
                                        salario='$datos[8]'
								where id_empleado='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminaEmpleado($idEmpleado){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from empleado where id_empleado='$idEmpleado'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>