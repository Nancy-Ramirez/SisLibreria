

	<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_departamento,nombre_departamento
					FROM departamento";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table" style="text-align: center;">
	<caption style="text-align:center; font-size:20px"><label>Listado de departamentos</label></caption>
	<tr class="text-white" style="background-color: #36736D;  color:white;">
		<th style="text-align:center;">Departamento</th>
		<th style="text-align:center;">Editar</th>
		<th style="text-align:center;">Eliminar</th>
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td><?php echo $ver[1] ?></td>
		<td>
			<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#actualizaDepartamento" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-sm" onclick="eliminaDepartamento('<?php echo $ver[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>

<?php endwhile; ?>
</table>