<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT
                    art.nombre_articulo,
                    SUM(art.stock) as stock,
                    SUM(art.stock*art.precio) as total,
                    TRUNCATE(SUM(art.stock*art.precio)/SUM(art.stock),2) as precio_venta,
                    id_producto
		  from articulos as art
          group by art.id_producto";
	$result=mysqli_query($conexion,$sql);

 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Articulos</label></caption>
    <tr>
        <td>Nombre Categoria</td>
        <td>Stock</td>
        <td>Precio de Venta</td>
    </tr>

    <?php while($ver=mysqli_fetch_row($result)): ?>

    <tr>
        <td><?php echo $ver[0]; ?></td>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[3]; ?></td>
    </tr>
    <?php endwhile; ?>
</table>