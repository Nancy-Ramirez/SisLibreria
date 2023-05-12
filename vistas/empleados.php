<?php
session_start();
if (isset($_SESSION['usuario'])) {

?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>Empleados</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php";
		$c = new conectar();
		$conexion = $c->conexion();
		$sql = "SELECT id_departamento,nombre_departamento
		from departamento";
		$result = mysqli_query($conexion, $sql);

		//PARA PAGINACIÓN
		$sql = "SELECT COUNT(*) total FROM empleado";
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
			<h1>Agregar Empleado</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmEmpleados">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellido" name="apellido">
						<label>DUI</label>
						<input type="text" class="form-control input-sm" id="dui" name="dui">
						<label for="">Departamento</label>
						<select class="form-control input-sm" name="deparatamentoSelect" id="deparatamentoSelect">
							<option value="A">Selecciona Departamento</option>
							<?php while ($ver = mysqli_fetch_row($result)) : ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
							<?php endwhile; ?>
						</select>
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" id="direccion" name="direccion">
						<label>Email</label>
						<input type="text" class="form-control input-sm" id="email" name="email">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="telefono" name="telefono">
						<label>Salario</label>
						<input type="text" class="form-control input-sm" id="salario" name="salario">

						<p></p>
						<span class="btn btn-primary" id="btnAgregarEmpleado">Agregar</span>
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
						$sql = "SELECT emp.id_empleado,
						emp.nombre,
						emp.apellido,
						emp.dui,
						emp.direccion,
						emp.email,
						emp.telefono,
						emp.salario,
						dep.nombre_departamento 
				from empleado  as emp
				inner join departamento as dep
				on emp.id_departamento = dep.id_departamento LIMIT $empieza, $resultado_pagina";
						$result = mysqli_query($conexion, $sql);
						?>
						<div class="table-responsive">
							<table class="table">
								<caption style="text-align:center; font-size:20px"><label>Listado de empleados</label></caption>
								<tr class="text-white" style="background-color: #36736D;  color:white;">
									<th style="text-align:center;">Nombre</th>
									<th style="text-align:center;">Apellido</th>
									<th style="text-align:center;">DUI</th>
									<th style="text-align:center;">Direccion</th>
									<th style="text-align:center;">Email</th>
									<th style="text-align:center;">Telefono</th>
									<th style="text-align:center;">Salario</th>
									<th style="text-align:center;">Departamento</th>
									<th style="text-align:center;">Editar</th>
									<th style="text-align:center;">Eliminar</th>
								</tr>

								<?php while ($ver = mysqli_fetch_row($result)) : ?>

									<tr>


										<td><?php echo $ver[1]; ?></td>
										<td><?php echo $ver[2]; ?></td>
										<td><?php echo $ver[3]; ?></td>
										<td><?php echo $ver[4]; ?></td>
										<td ><?php echo $ver[5]; ?></td>
										<td style="text-align:center;"><?php echo $ver[6]; ?></td>
										<td style="text-align:center;">$ <?php echo $ver[7]; ?></td>
										<td><?php echo $ver[8]; ?></td>

										<td style="text-align:center;">
											<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalEmpleadosUpdate" onclick="agregaDatosEmpleado('<?php echo $ver[0]; ?>')">
												<span class="glyphicon glyphicon-pencil"></span>
											</span>
										</td>
										<td style="text-align:center;">
											<span class="btn btn-danger btn-sm" onclick="eliminarEmpleado('<?php echo $ver[0]; ?>')">
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

										<a class="page-link" href='empleados.php?pagina=<?php echo $_GET["pagina"] - 1; ?>'>
											Anterior
										</a>
									</li>

									<?php for ($i = 0; $i < $paginas; $i++) : ?>
										<li class="page-item
                                    <?php echo $_GET["pagina"] == $i + 1
											? "active"
											: ""; ?>">

											<a class="page-link" href='empleados.php?pagina=<?php echo $i +
																								1; ?>'>
												<?php echo $i + 1; ?>
											</a>
										</li>
									<?php endfor; ?>

									<li class="page-item 
                                <?php echo $_GET["pagina"] >= $paginas
									? "disabled"
									: " "; ?>">
										<a class="page-link" href='empleados.php?pagina=<?php echo $_GET["pagina"] + 1; ?>'>
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
		<div class="modal fade" id="abremodalEmpleadosUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualizar Empleado</h4>
					</div>
					<div class="modal-body">
						<form id="frmEmpleadosU" enctype="multipart/form-data">
							<input type="text" hidden="" id="idEmpleado" name="idEmpleado">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" id="apellidosU" name="apellidosU">
							<label>DUI</label>
							<input type="text" class="form-control input-sm" id="duiU" name="duiU">
							<label for="">Departamento</label>
							<select class="form-control input-sm" id="departamentoSelectU" name="departamentoSelectU">
								<option value="A">Selecciona Departamento</option>
								<?php
								$sql = "SELECT id_departamento,nombre_departamento
								from departamento";
								$result = mysqli_query($conexion, $sql);
								?>
								<?php while ($ver = mysqli_fetch_row($result)) : ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Direccion</label>
							<input type="text" class="form-control input-sm" id="direccionU" name="direccionU">
							<label>Email</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">
							<label>Telefono</label>
							<input type="text" class="form-control input-sm" id="telefonoU" name="telefonoU">
							<label>Salario</label>
							<input type="text" class="form-control input-sm" id="salarioU" name="salarioU">

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizarEmpleadoU" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>

					</div>
				</div>
			</div>
		</div>

	</body>

	</html>

	<script type="text/javascript">
		function agregaDatosEmpleado(idEmpleado) {

			$.ajax({
				type: "POST",
				data: "idEmpleado=" + idEmpleado,
				url: "../procesos/empleados/obtenDatosEmpleado.php",
				success: function(r) {
					dato = jQuery.parseJSON(r);
					$('#idEmpleado').val(dato['id_empleado']);
					$('#nombreU').val(dato['nombre']);
					$('#apellidosU').val(dato['apellido']);
					$('#duiU').val(dato['dui']);
					$('#departamentoSelectU').val(dato['id_departamento']);
					$('#direccionU').val(dato['direccion']);
					$('#emailU').val(dato['email']);
					$('#telefonoU').val(dato['telefono']);
					$('#salarioU').val(dato['salario']);

				}
			});
		}

		function eliminarEmpleado(idEmpleado) {
			alertify.confirm('¿Desea eliminar este Empleado?', function() {
				$.ajax({
					type: "POST",
					data: "idEmpleado=" + idEmpleado,
					url: "../procesos/empleados/eliminarEmpleado.php",
					success: function(r) {
						if (r == 1) {
							$('#tablaEmpleadosLoad').load("empleados/tablaEmpleados.php");
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

			$('#tablaEmpleadosLoad').load("empleados/tablaEmpleados.php");

			$('#btnAgregarEmpleado').click(function() {

				vacios = validarFormVacio('frmEmpleados');

				if (vacios > 0) {
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos = $('#frmEmpleados').serialize();

				$.ajax({
					type: "POST",
					data: datos,
					url: "../procesos/empleados/agregarEmpleado.php",
					success: function(r) {

						if (r == 1) {
							$('#frmEmpleados')[0].reset();
							$('#tablaEmpleadosLoad').load("empleados/tablaEmpleados.php");
							alertify.success("Empleado agregado con exito");
						} else {
							alertify.error("No se pudo agregar Empleado");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#btnActualizarEmpleadoU').click(function() {

				datos = $('#frmEmpleadosU').serialize();
				$.ajax({
					type: "POST",
					data: datos,
					url: "../procesos/empleados/actualizaEmpleado.php",
					success: function(r) {
						if (r == 1) {
							$('#tablaEmpleadosLoad').load("empleados/tablaEmpleados.php");
							alertify.success("Actualizado con exito :D");
						} else {
							alertify.error("Error al actualizar :(");
						}
					}
				});
			});
		});
	</script>


<?php
} else {
	header("location:../index.php");
}
?>