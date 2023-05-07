<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


<!DOCTYPE html>
<html>

<head>
    <title>articulos</title>
    <?php require_once "menu.php"; ?>
    <?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nombre_categoria
		from categorias";
		$result=mysqli_query($conexion,$sql);
		?>
</head>

<body>
    <div class="container">
        <h1>Articulos</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmArticulos" enctype="multipart/form-data">
                    <label>Nombre Articulo</label>
                    <input type="text" class="form-control input-sm" id="nombre_articulo" name="nombre_articulo">
                    <label>Descripcion</label>
                    <input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
                    <label>Precio</label>
                    <input type="text" class="form-control input-sm" id="precio" name="precio">
                    <label>Stock</label>
                    <input type="text" class="form-control input-sm" id="stock" name="stock">
                    <p></p>
                    <span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaArticulosLoad"></div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
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
                    <button id="btnActualizaarticulo" type="button" class="btn btn-warning"
                        data-dismiss="modal">Actualizar</button>

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

<?php 
}else{
	header("location:../index.php");
}
?>