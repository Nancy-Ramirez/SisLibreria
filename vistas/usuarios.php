<?php
session_start();
if (isset($_SESSION["usuario"])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>usuarios</title>
        <?php require_once "menu.php"; ?>
        <?php
        require_once "../clases/Conexion.php";
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "SELECT id_rol,nombre_rol
		from rol";
        $result = mysqli_query($conexion, $sql);
        ?>
    </head>

    <body>
        <div class="container-fluid" style="margin-top: 85px;">
            <h1>Administrar usuarios</h1>
            <div class="row">
                <div class="col-sm-4">
                    <form id="frmRegistro">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" name="nombre" id="nombre">
                        <label>Apellido</label>
                        <input type="text" class="form-control input-sm" name="apellido" id="apellido">
                        <label>Usuario</label>
                        <select type="text" class="form-control input-sm" name="usuario" id="usuario">
                            <option value="Administrador">Administrador</option>
                            <option value="Coordinador">Coordinador de ventas</option>
                            <option value="Asesor">Asesor de ventas</option>
                            <option value="Jefe">Jefe de ventas</option>
                        </select>
                        <label>Password</label>
                        <input type="password" class="form-control input-sm" name="password" id="password">
                        <p></p>
                        <span class="btn btn-primary" id="registro">Registrar</span>
                    </form>
                </div>
                <div class="col-sm-7">
                    <div id="tablaUsuariosLoad"></div>
                </div>
            </div>
        </div>


        <!-- Button trigger modal -->

        <!--modal-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualiza Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <form id="frmRegistroU">
                            <input type="text" hidden="" id="idUsuario" name="idUsuario">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
                            <label>Apellido</label>
                            <input type="text" class="form-control input-sm" name="apellidoU" id="apellidoU">
                            <label>Usuario</label>
                            <select type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">
                                <option value="Administrador">Administrador</option>
                                <option value="Coordinador">Coordinador de ventas</option>
                                <option value="Asesor">Asesor de ventas</option>
                                <option value="Jefe">Jefe de ventas</option>
                            </select>
                            <label>Password</label>
                            <input type="password" class="form-control input-sm" name="passwordU" id="passwordU">
                        </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnActualizaUsuario"  class="btn btn-warning">Actualizar</button>
                <button type="button"  class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <!--
        <div class="modal fade" id="actualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Actualiza Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmRegistroU">
                            <input type="text" hidden="" id="idUsuario" name="idUsuario">
                            <label>Nombre</label>
                            <input type="text" class="form-control input-sm" name="nombreU" id="nombreU">
                            <label>Apellido</label>
                            <input type="text" class="form-control input-sm" name="apellidoU" id="apellidoU">
                            <label>Usuario</label>
                            <select type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">
                                <option value="Administrador">Administrador</option>
                                <option value="Coordinador">Coordinador de ventas</option>
                                <option value="Asesor">Asesor de ventas</option>
                                <option value="Jefe">Jefe de ventas</option>
                            </select>
                            <label>Password</label>
                            <input type="password" class="form-control input-sm" name="passwordU" id="passwordU">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="btnActualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Actualiza Usuario</button>

                    </div>
                </div>
            </div>
        </div>
        -->
    </body>

    </html>

    <script type="text/javascript">
        function agregaDatosUsuario(idusuario) {

            $.ajax({
                type: "POST",
                data: "idusuario=" + idusuario,
                url: "../procesos/usuarios/obtenDatosUsuario.php",
                success: function(r) {
                    dato = jQuery.parseJSON(r);

                    $('#idUsuario').val(dato['id_usuario']);
                    $('#nombreU').val(dato['nombre']);
                    $('#apellidoU').val(dato['apellido']);
                    $('#usuarioU').val(dato['usuario']);
                    $('#passwordU').val(dato['password']);
                }
            });
        }

        function eliminarUsuario(idusuario) {
            alertify.confirm('¿Desea eliminar este usuario?', function() {
                $.ajax({
                    type: "POST",
                    data: "idusuario=" + idusuario,
                    url: "../procesos/usuarios/eliminarUsuario.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
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
            $('#btnActualizaUsuario').click(function() {

                datos = $('#frmRegistroU').serialize();
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/usuarios/actualizaUsuario.php",
                    success: function(r) {

                        if (r == 1) {
                            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
                            alertify.success("Actualizado con exito :D");
                        } else {
                            alertify.error("No se pudo actualizar :(");
                        }
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');

            $('#registro').click(function() {

                vacios = validarFormVacio('frmRegistro');

                if (vacios > 0) {
                    alertify.alert("Debes llenar todos los campos!!");
                    return false;
                }

                datos = $('#frmRegistro').serialize();
                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/regLogin/registrarUsuario.php",
                    success: function(r) {
                        //alert(r);

                        if (r == 1) {
                            $('#frmRegistro')[0].reset();
                            $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
                            alertify.success("Agregado con exito");
                        } else {
                            alertify.error("Fallo al agregar :(");
                        }
                    }
                });
            });
        });
    </script>

<?php } else {header("location:../index.php");}
?>
