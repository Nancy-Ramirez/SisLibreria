<?php 
	require_once "../../clases/Conexion.php";

	$obj= new conectar();
	$conexion= $obj->conexion();

	$sql="SELECT emp.id_empleado,
				emp.nombre,
				emp.apellido,
                emp.dui,
				emp.direccion,
				emp.email,
				emp.telefono,
                emp.salario,
				dep.nombre_departamento 
		from empleado  as emp
		inner join departamento as dep
		on emp.id_departamento = dep.id_departamento";
	$result=mysqli_query($conexion,$sql);
 ?>

<div class="table-responsive">
	 <table class="table table-hover table-condensed table-bordered " style="text-align: center;">
	 	<caption><label>Empleados</label></caption>
	 	<tr>
	 		<td>Nombre</td>
	 		<td>Apellido</td>
            <td>DUI</td>
	 		<td>Direccion</td>
	 		<td>Email</td>
	 		<td>Telefono</td>
	 		<td>Salario</td>
			<td>Departamento</td>
	 		<td>Editar</td>
	 		<td>Eliminar</td>
	 	</tr>

	 	<?php while($ver=mysqli_fetch_row($result)): ?>

	 	<tr>
		  	
			
	 		<td><?php echo $ver[1]; ?></td>
	 		<td><?php echo $ver[2]; ?></td>
	 		<td><?php echo $ver[3]; ?></td>
	 		<td><?php echo $ver[4]; ?></td>
            <td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td><?php echo $ver[8]; ?></td>
			
	 		<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalEmpleadosUpdate" onclick="agregaDatosEmpleado('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminarEmpleado('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
	 	</tr>
	 <?php endwhile; ?>
	 </table>
</div>