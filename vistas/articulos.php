<?php
session_start();
if (isset($_SESSION["usuario"])) { ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>articulos</title>
        <?php require_once "menu.php"; ?>
        <?php
        require_once "../clases/Conexion.php";
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "SELECT id_categoria,nombre_categoria
		from categorias";
        $result = mysqli_query($conexion, $sql);

        $sql = "SELECT COUNT(*) total FROM articulos";
        $cuenta = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($cuenta);

        $resultado_pagina = 5;
        $num = $fila["total"];

        //contar articulos de la base de datos
        $paginas = $num / $resultado_pagina;
        $paginas = ceil($paginas);
        ?>
    </head>

    <body>
        <div class="container" style="margin-top: 85px;">
            <h1>Articulos</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmArticulos" enctype="multipart/form-data">
                        <label style="margin-top:10px;">Nombre Articulo</label>
                        <input type="text" class="form-control input-sm" id="nombre_articulo" name="nombre_articulo" style="padding:15px;">
                        <label style="margin-top:10px;">Descripcion</label>
                        <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" style="padding:15px;">
                        <label style="margin-top:10px;">Precio</label>
                        <input type="text" class="form-control input-sm" id="precio" name="precio" style="padding:15px;">
                        <label style="margin-top:10px;">Stock</label>
                        <input type="text" class="form-control input-sm" id="stock" name="stock" style="padding:15px;">
                        <p></p>
                        <span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
                    </form>
                </div>
                <div class="col-sm-8">

                    <!--TABLA-->

                    <div id="">
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
                        <caption style="text-align:center; font-size:20px"><label>Lista de articulos disponibles</label></caption>
                        <table class="table">
                            
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

                        <!--PAGINACION-->
                        <nav aria-label="Page navigation example" style="display: flex; justify-content: center;
">
                            <ul class="pagination">
                                <li class="page-item
                                <?php echo $_GET["pagina"] <= 1
                                  ? "disabled"
                                  : ""; ?>">

                                    <a class="page-link"
                                    href='articulos.php?pagina=<?php echo $_GET[
                                      "pagina"
                                    ] - 1; ?>'>
                                    Anterior
                                    </a>
                                </li>

                                <?php for ($i = 0; $i < $paginas; $i++): ?>
                                    <li class="page-item
                                    <?php echo $_GET["pagina"] == $i + 1
                                      ? "active"
                                      : ""; ?>">
                                        
                                        <a class="page-link" href='articulos.php?pagina=<?php echo $i +
                                          1; ?>'>
                                            <?php echo $i + 1; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item 
                                <?php echo $_GET["pagina"] >= $paginas
                                  ? "disabled"
                                  : " "; ?>">
                                    <a class="page-link" 
                                    href='articulos.php?pagina=<?php echo $_GET[
                                      "pagina"
                                    ] + 1; ?>'>
                                    Siguiente
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmArticulosU" enctype="multipart/form-data">
                            <input type="text" id="idArticulo" hidden="" name="idArticulo">
                            <label>Nombre Articulo</label>
                            <input type="text" class="form-control input-sm" id="nombre_articuloU" name="nombre_articuloU">
                            <label>Descripcion</label>
                            <input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
                            <label>Precio</label>
                            <input type="text" class="form-control input-sm" id="precioU" name="precioU">
                            <label>Stock</label>
                            <input type="text" class="form-control input-sm" id="stockU" name="stockU">

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

    <script type="text/javascript">
        function agregaDatosArticulo(idarticulo) {
            $.ajax({
                type: "POST",
                data: "idart=" + idarticulo,
                url: "../procesos/articulos/obtenDatosArticulo.php",
                success: function(r) {

                    dato = jQuery.parseJSON(r);
                    $('#idArticulo').val(dato['id_producto']);
                    $('#nombre_articuloU').val(dato['nombre_articulo']);
                    $('#descripcionU').val(dato['descripcion']);
                    $('#precioU').val(dato['precio']);
                    $('#stockU').val(dato['stock']);

                }
            });
        }

        function eliminaArticulo(idArticulo) {
            alertify.confirm('¿Desea eliminar este articulo?', function() {
                $.ajax({
                    type: "POST",
                    data: "idarticulo=" + idArticulo,
                    url: "../procesos/articulos/eliminarArticulo.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                            alertify.success("Eliminado con exito!!");
                        } else {
                            alertify.error("No se pudo eliminar :(");
                        }
                    }
                });
            }, function() {
                alertify.error('Cancelo !')
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnActualizaarticulo').click(function() {

                datos = $('#frmArticulosU').serialize();
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/articulos/actualizaArticulos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                            alertify.success("Actualizado con exito :D");
                        } else {
                            alertify.error("Error al actualizar :(");
                        }
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

            $('#btnAgregaArticulo').click(function() {

                vacios = validarFormVacio('frmArticulos');

                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }

                var formData = new FormData(document.getElementById("frmArticulos"));

                $.ajax({
                    url: "../procesos/articulos/insertaArticulos.php",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function(r) {

                        if (r == 1) {
                            $('#frmArticulos')[0].reset();
                            $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
                            alertify.success("Agregado con exito :D");
                        } else {
                            alertify.error("Fallo al subir el archivo :(");
                        }
                    }
                });

            });
        });
    </script>

<?php } else {header("location:../index.php");}
?>
