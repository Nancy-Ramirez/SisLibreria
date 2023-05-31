

	<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_departamento,nombre_departamento
					FROM departamento";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table table-bordered table-hover" style="text-align: center;">
<p class="text-center fs-4 fw-bold">Listado de departamentos</p>
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
			<a  type="button" data-bs-toggle="modal" data-bs-target="#modalDepartamento" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
				<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
				<path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
				<path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
				<path d="M16 5l3 3" />
			</svg>
			</a>
		</td>
		<td>
			<a type="button" onclick="eliminaDepartamento('<?php echo $ver[0] ?>')">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 7l16 0" />
            <path d="M10 11l0 6" />
            <path d="M14 11l0 6" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
			</a>
		</td>
	</tr>

<?php endwhile; ?>
</table>