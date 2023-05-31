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


<table class="table table-bordered table-hover" style="text-align:center;">
    <p class="text-center fs-4 fw-bold">Listado de usuarios permitidos en el sistema</p>
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
        <!-- Button trigger modal -->
        <a type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>')">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
        </svg>
        </a>  
        <!--
            <a type="submit" data-toggle="modal" data-target="#actualizaUsuarioModal"
                onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                <path d="M16 5l3 3" />
                </svg>
            </a>
        -->
        </td>
        <td>
            <a type="submit" onclick="eliminarUsuario('<?php echo $ver[0]; ?>')">
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