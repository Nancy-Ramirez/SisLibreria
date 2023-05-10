<?php
require_once "../../clases/Conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "SELECT COUNT(*) total FROM articulos";
$cuenta = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($cuenta);

$resultado_pagina = 5;
$num = $fila["total"];

//contar articulos de la base de datos
$paginas = $num / $resultado_pagina;
$paginas = ceil($paginas);
?>

<?php
if (isset($_GET["pagina"])) {
  $pag = $_GET["pagina"];
} else {
  $pag = 1;
}

//La pagina inicio en 0 y se multiplica $resultado_pagina

$empieza = ($pag - 1) * $resultado_pagina;

$sql = "SELECT
                    art.nombre_articulo,
                    descripcion,
                    stock,
                    id_producto
		  from articulos as art
          group by art.id_producto LIMIT $empieza, $resultado_pagina ";
$result = mysqli_query($conexion, $sql);
?>


<table class="table" >
    <caption style="text-align:center; font-size:20px"><label >Lista de articulos disponibles</label></caption>
    <tr class="text-white" style="background-color: #36736D;  color:white;">
        <th style="text-align:center;">Nombre de Producto</th>
        <th style="text-align:center;">Descripcion</th>
        <th style="text-align:center;">Stock</th>
        <th style="text-align:center;">Editar</th>
        <th style="text-align:center;">Eliminar</th>
    </tr>


    <?php while ($ver = mysqli_fetch_row($result)): ?>

        <tr>
            <td><?php echo $ver[0]; ?></td>
            <td><?php echo $ver[1]; ?></td>
            <td style="text-align:center;"><?php echo $ver[2]; ?></td>
            <td style="text-align:center;">
                <span data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-sm" onclick="agregaDatosArticulo('<?php echo $ver[3]; ?>')">
                    <span class="glyphicon glyphicon-pencil"></span>
                </span>
            </td>
            <td style="text-align:center;">
                <span class="btn btn-danger btn-sm" onclick="eliminaArticulo('<?php echo $ver[3]; ?>')">
                    <span class="glyphicon glyphicon-remove"></span>
                </span>
            </td>
        </tr>
    <?php endwhile; ?>
    

</table>

<?php if (isset($_GET["pagina"])) {
  $pagina = $_GET["pagina"];
  echo "Valor de 'pagina': " . $pagina;
} else {
  echo "El parámetro 'pagina' no está definido.";
} ?>

<!--PAGINACION-->
    <nav aria-label="Page navigation example" style="display: flex; justify-content: center;
">
  <ul class="pagination">
    <li class="page-item">

      <a class="page-link" 
      href='articulos.php?pagina=1'>
        <span aria-hidden="true">Primera</span>
      </a>
    </li>
    
    <?php for ($i = 0; $i < $paginas; $i++): ?>
       <li class="page-item">
          <a class="page-link"
          href='articulos.php?pagina=<?php echo $i + 1; ?>'>
            <?php echo $i + 1; ?>
          </a>
       </li> 
    <?php endfor; ?>
       
    <li class="page-item">
      <a class="page-link" 
      href='rticulos.php?pagina=<?php $_GET["paginas"] + 1; ?>' >
        <span aria-hidden="true">Última</span>
      </a>
    </li>
  </ul>
</nav>