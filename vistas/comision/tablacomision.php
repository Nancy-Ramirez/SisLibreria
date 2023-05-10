
<?php 
	require_once "../../clases/Conexion.php";

	$obj= new conectar();
	$conexion= $obj->conexion();

	$sql="SELECT id_comision, 
				nombre_comision,
				venta_base,
				venta_limite,
				porcentaje
		from comision";
	$result=mysqli_query($conexion,$sql);
 ?>

<div class="table-responsive">
	 <table class="table" style="text-align: center;">
	 	<caption style="text-align:center; font-size:20px"><label>Lista de reglas de comisión</label></caption>
	 	<tr class="text-white" style="background-color: #36736D;  color:white;">
	 		<th style="text-align:center;">Nombre Comision</th>
	 		<th style="text-align:center;">Venta Base</th>
	 		<th style="text-align:center;">Venta Limite</th>
	 		<th style="text-align:center;">Porcentaje</th>
	 		<th style="text-align:center;">Editar</th>
	 		<th style="text-align:center;">Eliminar</th>
	 	</tr>

	 	<?php while($ver=mysqli_fetch_row($result)): ?>

	 	<tr>
	 		<td><?php echo $ver[1]; ?></td>
	 		<td><?php echo $ver[2]; ?></td>
	 		<td style="text-align:center;"><?php echo $ver[3]; ?></td>
	 		<td style="text-align:center;"><?php echo $ver[4]; ?></td>
	 		<td>
				<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalComisionUpdate" onclick="agregaDatosComision('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-sm" onclick="eliminarComision('<?php echo $ver[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
	 	</tr>
	 <?php endwhile; ?>
	 </table>
</div>