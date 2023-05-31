<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>

	<title>inicio</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<div class="container" style="margin-top: 85px;">
	<div class="row mt-4">
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-blue">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Ventas</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
						<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
					</svg>
					</div>
					</div>
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href=" ventas.php" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-green">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Compras</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
							<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
						</svg>
					</div>
					</div>	
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="compras.php?pagina=1" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-yellow">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Articulos</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
						</svg>
					</div>
					</div>
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="articulos.php?pagina=1" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-pink">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Comision</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
						<path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
						<path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
					</svg>
					</div>
					</div>	
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="comision.php" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-purple">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Personal</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
							<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
						</svg>
					</div>
					</div>
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="empleados.php?pagina=1" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-celete">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Departamento</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
  					<path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Z"/>
					</svg>
					</div>
					</div>
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="departamento.php" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-blue1">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Usuarios</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
					<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
					</svg>
					</div>
					</div>
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="usuarios.php" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mt-2 ">
			<div class="card bg-c-blue1">
				<div class="card-body d-flex text-white ">
					<div class="p-4">
					<div class="position-absolute top-0 start-0 p-3">
						<h3>Clientes</h3>
					</div>
					<div class="position-absolute top-0 end-0 p-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
					<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
					</svg>
					</div>
					</div>
				</div>
				<div class="card-footer align-items-center justify-content-between">
					<a href="clientes.php" class="text-white"> Ver Detalles</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6 mt-4">
			<div class="card">
				<div class="card-header">
					Ventas
				</div>
				<div class="card-body">
				<div>
  <canvas id="myChart"></canvas>
</div>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>