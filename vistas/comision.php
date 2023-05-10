<?php
session_start();
if (isset($_SESSION["usuario"])) { ?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Comision</title>
        <?php
        require_once "menu.php";
        //Datos para la tabla
        require_once "../../clases/Conexion.php";

        $obj = new conectar();
        $conexion = $obj->conexion();

       

        //PARA PAGINACIÓN
        $sql = "SELECT COUNT(*) total FROM comision";
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
        <h1></h1>
        <div class="container">
            <h1>Comisiones</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmComision">
                        <label>Nombre Comision</label>
                        <input type="text" class="form-control input-sm" id="nombre_comision" name="nombre_comision">
                        <label>Venta Base</label>
                        <input type="text" class="form-control input-sm" id="venta_base" name="venta_base">
                        <label>Venta Limite</label>
                        <input type="text" class="form-control input-sm" id="venta_limite" name="venta_limite">
                        <label>Porcentaje</label>
                        <input type="text" class="form-control input-sm" id="porcentaje" name="porcentaje">
                        <p></p>
                        <span class="btn btn-primary" id="btnAgregarComision">Agregar</span>
                    </form>
                </div>
                <div class="col-sm-8">
                    <!--TABLA-->
                    <div>
                        <!--inicializando tabla-->
                        <?php
                        if (isset($_GET["pagina"])) {
                          $pag = $_GET["pagina"];
                        } else {
                          $pag = 1;
                        }
                        //La pagina inicio en 0 y se multiplica $resultado_pagina
                        $empieza = ($pag - 1) * $resultado_pagina;

                        //LLenamos la tabla con los datos recuperados
                        $sql = "SELECT id_comision, 
                        nombre_comision,
                        venta_base,
                        venta_limite,
                        porcentaje
                from comision LIMIT $empieza, $resultado_pagina";
                        $result = mysqli_query($conexion, $sql);
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-bordered" style="text-align: center;">
                                <caption><label>Comisiones</label></caption>
                                <tr>
                                    <td>Nombre Comision</td>
                                    <td>Venta Base</td>
                                    <td>Venta Limite</td>
                                    <td>Porcentaje</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>

                                <?php while ($ver = mysqli_fetch_row($result)) : ?>

                                    <tr>
                                        <td><?php echo $ver[1]; ?></td>
                                        <td><?php echo $ver[2]; ?></td>
                                        <td><?php echo $ver[3]; ?></td>
                                        <td><?php echo $ver[4]; ?></td>
                                        <td>
                                            <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalComisionUpdate" onclick="agregaDatosComision('<?php echo $ver[0]; ?>')">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="btn btn-danger btn-xs" onclick="eliminarComision('<?php echo $ver[0]; ?>')">
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
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="abremodalComisionUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Actualizar comision</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmComisionU">
                            <input type="text" hidden="" id="id_comisionU" name="id_comisionU">
                            <label>Nombre Comision</label>
                            <input type="text" class="form-control input-sm" id="nombre_comisionU" name="nombre_comisionU">
                            <label>Venta Base</label>
                            <input type="text" class="form-control input-sm" id="venta_baseU" name="venta_baseU">
                            <label>Venta Limite</label>
                            <input type="text" class="form-control input-sm" id="venta_limiteU" name="venta_limiteU">
                            <label>Porcentaje</label>
                            <input type="text" class="form-control input-sm" id="porcentajeU" name="porcentajeU">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAgregarComisionU" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>

                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

    <script type="text/javascript">
        function agregaDatosComision(id_comision) {

            $.ajax({
                type: "POST",
                data: "idcomision=" + id_comision,
                url: "../procesos/comisiones/obtenDatosComision.php",
                success: function(r) {
                    dato = jQuery.parseJSON(r);
                    $('#id_comisionU').val(dato['id_comision']);
                    $('#nombre_comisionU').val(dato['nombre_comision']);
                    $('#venta_baseU').val(dato['venta_base']);
                    $('#venta_limiteU').val(dato['venta_limite']);
                    $('#porcentajeU').val(dato['porcentaje']);

                }
            });
        }

        function eliminarComision(idcomision) {
            alertify.confirm('¿Desea eliminar este cliente?', function() {
                $.ajax({
                    type: "POST",
                    data: "id_comision=" + idcomision,
                    url: "../procesos/comisiones/eliminarComision.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tablaComisionesLoad').load("comision/tablacomision.php");
                            alertify.success("Eliminado con exito!!");
                        } else {
                            alertify.error("No se pudo eliminar");
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

            $('#tablaComisionesLoad').load("comision/tablacomision.php");

            $('#btnAgregarComision').click(function() {

                vacios = validarFormVacio('frmComision');

                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }

                datos = $('#frmComision').serialize();

                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/comisiones/agregarComision.php",
                    success: function(r) {

                        if (r == 1) {
                            $('#frmComision')[0].reset();
                            $('#tablaComisionesLoad').load("comision/tablacomision.php");
                            alertify.success("Comision agregada con exito");
                        } else {
                            alertify.error("No se pudo agregar comision");
                        }
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAgregarComisionU').click(function() {
                datos = $('#frmComisionU').serialize();

                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/comisiones/actualizaComision.php",
                    success: function(r) {

                        if (r == 1) {
                            $('#frmComision')[0].reset();
                            $('#tablaComisionLoad').load("comision/tablacomision.php");
                            alertify.success("Comision actualizado con exito");
                        } else {
                            alertify.error("No se pudo actualizar comision");
                        }
                    }
                });
            })
        })
    </script>


<?php } else {
    header("location:../index.php");
}
?>