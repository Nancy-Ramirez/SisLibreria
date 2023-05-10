<?php 
	
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();

	$sql="SELECT    us.id_usuario,
					us.nombre,
					us.apellido,
					us.usuario
			from usuarios as us";
	$result=mysqli_query($conexion,$sql);

 ?>


<table class="table" style="text-align:center;">
    <caption style="text-align:center; font-size:20px"><label>Listado de usuarios permitidos en el sistema</label></caption>
    <tr class="text-white" style="background-color: #36736D;  color:white;">
        <th style="text-align:center;">Nombre</th>
        <th style="text-align:center;">Apellido</th>
        <th style="text-align:center;">Usuario</th>
        <th style="text-align:center;">Editar</th>
        <th style="text-align:center;">Eliminar</th>
    </tr>

    <?php while($ver=mysqli_fetch_row($result)): ?>

    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td>
            <span data-toggle="modal" data-target="#actualizaUsuarioModal" class="btn btn-warning btn-sm"
                onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-sm" onclick="eliminarUsuario('<?php echo $ver[0]; ?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>
    <?php endwhile; ?>
</table>