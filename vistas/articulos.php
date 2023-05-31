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
        <div class="container-fluid" style="margin-top: 85px;">
            <h1>Articulos</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmArticulos" enctype="multipart/form-data">
                        <label>Nombre Articulo</label>
                        <input type="text" class="form-control input-sm" id="nombre_articulo" name="nombre_articulo" >
                        <label >Descripcion</label>
                        <input type="text" class="form-control input-sm" id="descripcion" name="descripcion" >
                        <label >Precio</label>
                        <input type="text" class="form-control input-sm" id="precio" name="precio" >
                        <label >Stock</label>
                        <input type="text" class="form-control input-sm" id="stock" name="stock" >
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
                        
                        <table class="table">
                        <p class="text-center fs-4 fw-bold">Lista de articulos disponibles</p>
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
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#modalArticulos"  onclick="agregaDatosArticulo('<?php echo $ver[3]; ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                        </svg>
                                        </a>
                                    </td>
                                    <td style="text-align:center;">
                                        <a type="button" onclick="eliminaArticulo('<?php echo $ver[3]; ?>')">
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
        <div class="modal fade" id="modalArticulos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-bs-dismiss="modal">Actualizar</button>
                        <button type="button"  class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
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
