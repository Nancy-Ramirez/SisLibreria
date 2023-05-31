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
		<div class="container-fluid" style="margin-top: 85px;">
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
							<table class="table table-hover table-bordered ">
							<p class="text-center fs-4 fw-bold">Listado de Empleados</p>
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
											<a type="button"  data-bs-toggle="modal" data-bs-target="#modalEmpleados" onclick="agregaDatosEmpleado('<?php echo $ver[0]; ?>')">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
												<path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
												<path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
												<path d="M16 5l3 3" />
											</svg>
											</a>
										</td>
										<td style="text-align:center;">
											<a type="button" onclick="eliminarEmpleado('<?php echo $ver[0]; ?>')">
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
		<div class="modal fade" id="modalEmpleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Actualizar Empleado</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
						<button id="btnActualizarEmpleadoU" type="button" class="btn btn-primary" data-bs-dismiss="modal">Actualizar</button>
						<button type="button"  class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
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