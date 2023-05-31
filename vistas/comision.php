<?php
session_start();
if (isset($_SESSION['usuario'])) {

?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Comision</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <h1></h1>
        <div class="container-fluid" style="margin-top: 85px;">
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
                    <div id="tablaComisionesLoad"></div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="modalComision" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Actualizar comision</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button id="btnAgregarComisionU" type="button" class="btn btn-primary" data-bs-dismiss="modal">Actualizar</button>
                        <button type="button"  class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
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


<?php
} else {
    header("location:../index.php");
}
?>