<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>
<?php 

require_once "../clases/Conexion.php";
$c= new conectar();
$conexion=$c->conexion();
$sql="SELECT id_producto,nombre_articulo
		from articulos";
		$result=mysqli_query($conexion,$sql);
?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Compras</title>
        <?php require_once "menu.php"; ?>
    </head>

    <body>
        <div class="container">
            <h1>Entradas de producto</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmCompra">
                    <label>Producto</label>
                    <select class="form-control input-sm" name="id_productoSelect" id="id_productoSelect">
							<option value="A">Selecciona Producto</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
							<?php endwhile; ?>
						</select>
                        <label>Precio</label>
                        <input type="text" class="form-control input-sm" id="precioU" name="precioU">
                        <label>Cantidad</label>
                        <input type="text" class="form-control input-sm" id="stockU" name="stockU">
                        <p></p>
                        <span class="btn btn-primary" id="btnAgregarCompra">Agregar</span>
                    </form>
                </div>
                <div class="col-sm-8">
                    <div id="tablaComprasLoad"></div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="abremodalCompraUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Actualizar Compra</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmCompraU">
                            <input type="text" hidden="" id="id_compraU" name="id_compraU">
                            <label>Cantidad</label>
                            <input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
                            <label>Precio compra</label>
                            <input type="text" class="form-control input-sm" id="precio_compraU" name="precio_compraU">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAgregarCompraU" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>

                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

    <script type="text/javascript">
        function agregaDatosCompra(id_compra) {

            $.ajax({
                type: "POST",
                data: "idcompra=" + id_compra,
                url: "../procesos/compras/obtenDatosCompra.php",
                success: function(r) {
                    dato = jQuery.parseJSON(r);
                    $('#id_compraU').val(dato['id_compra']);
                    $('#cantidadU').val(dato['cantidad']);
                    $('#precio_compraU').val(dato['precio_compra']);

                }
            });
        }

        function eliminarCompra(idcompra) {
            alertify.confirm('¿Desea eliminar este cliente?', function() {
                $.ajax({
                    type: "POST",
                    data: "id_compra=" + idcompra,
                    url: "../procesos/compras/eliminarCompra.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tablaComprasLoad').load("compras/tablacompra.php");
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

            $('#tablaComprasLoad').load("compras/tablacompra.php");

            $('#btnAgregarCompra').click(function() {

                vacios = validarFormVacio('frmCompra');

                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }

                datos = $('#frmCompra').serialize();

                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/compras/actualizaCompra.php",
                    success: function(r) {

                        if (r == 1) {
                            $('#frmCompra')[0].reset();
                            $('#tablaComprasLoad').load("compras/tablacompra.php");
                            alertify.success("Compra agregada con exito");
                        } else {
                            alertify.error("No se pudo agregar compra");
                        }
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAgregarCompraU').click(function() {
                datos = $('#frmCompraU').serialize();

                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/compras/actualizaCompra.php",
                    success: function(r) {

                        if (r == 1) {
                            $('#frmCompra')[0].reset();
                            $('#tablaComprasLoad').load("compras/tablacompra.php");
                            alertify.success("Compra actualizada con exito");
                        } else {
                            alertify.error("No se pudo actualizar compra");
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