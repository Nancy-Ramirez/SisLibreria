<?php
require_once "../../clases/Conexion.php";
$c = new conectar();
$conexion = $c->conexion();
$sql = "SELECT
                    art.nombre_articulo,
                    descripcion,
                    stock,
                    id_producto
		  from articulos as art
          group by art.id_producto";
$result = mysqli_query($conexion, $sql);

?>

<table class="table table-striped" style="text-align: center;">
    <caption><label>Articulos</label></caption>
    <tr>
        <td>Nombre de Producto</td>
        <td>Descripcion</td>
        <td>Stock</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>

    <?php while ($ver = mysqli_fetch_row($result)) : ?>

        <tr>
            <td><?php echo $ver[0]; ?></td>
            <td><?php echo $ver[1]; ?></td>
            <td><?php echo $ver[2]; ?></td>
            <td>
                <span data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[3] ?>')">
                    <span class="glyphicon glyphicon-pencil"></span>
                </span>
            </td>
            <td>
                <span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[3] ?>')">
                    <span class="glyphicon glyphicon-remove"></span>
                </span>
            </td>
        </tr>
    <?php endwhile; ?>
</table>