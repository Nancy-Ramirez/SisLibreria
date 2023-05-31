<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Departamentos</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container-fluid" style="margin-top: 85px;">
			<h1>Departamentos</h1>
			<div class="row ">
				<div class="col-sm-4 border-end">
					<form id="frmDepartamentos">
						<label>Departamento</label>
						<input type="text" class="form-control input-sm" name="nombre_departamento" id="nombre_departamento">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaDepartamento">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaDepartamentoLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="modalDepartamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Actualiza Departamento</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="frmDepartamentoU">
							<input type="text" hidden="" id="id_departamentoU" name="id_departamentoU">
							<label>Departamento</label>
							<input type="text" id="nombre_departamentoU" name="nombre_departamentoU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaDepartamento" class="btn btn-warning"data-bs-dismiss="modal">Guardar</button>
						<button type="button"  class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaDepartamentoLoad').load("departamentos/tablaDepartamentos.php");

			$('#btnAgregaDepartamento').click(function(){

				vacios=validarFormVacio('frmDepartamentos');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmDepartamentos').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/departamentos/agregaDepartamento.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmDepartamentos')[0].reset();

					$('#tablaDepartamentoLoad').load("departamentos/tablaDepartamentos.php");
					alertify.success("Departamento agregado con exito");
				}else{
					alertify.error("No se pudo agregar departamento");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaDepartamento').click(function(){

				datos=$('#frmDepartamentoU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/departamentos/actualizaDepartamento.php",
					success:function(r){
						if(r==1){
							$('#tablaDepartamentoLoad').load("departamentos/tablaDepartamentos.php");
							alertify.success("Actualizado con exito");
						}else{
							alertify.error("no se pudo actaulizar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function agregaDato(idDepartamento,departamento){
			$('#id_departamentoU').val(idDepartamento);
			$('#nombre_departamentoU').val(departamento);
		}

		function eliminaDepartamento(idDepartamento){
			alertify.confirm('¿Desea eliminar esta categoria?', function(){ 
				$.ajax({
					type:"POST",
					data:"id_departamento=" + idDepartamento,
					url:"../procesos/departamentos/eliminarDepartamento.php",
					success:function(r){
						if(r==1){
							$('#tablaDepartamentoLoad').load("departamentos/tablaDepartamento.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>