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
 <div class="container">
	<div class="row">
		<div class=" col-lg-3">
			<div class="card bg-c-blue order-card">
				<div class="card-block">
                    <h3 class="m-b-20">Usuarios</h3>
                    <h2 class="text-right"><i class="glyphicon glyphicon-usd text-left"></i><span>486</span></h2>
                    
                </div>
			</div>
			
		</div>
		<div class=" col-lg-3">
			<div class="card bg-c-green order-card">
				<div class="card-block">
                    <h3 class="m-b-20">Usuarios</h3>
                    <h2 class="text-right"><i class="glyphicon glyphicon-usd text-left"></i><span>486</span></h2>
                    
                </div>
			</div>
			
		</div>
		<div class=" col-lg-3">
			<div class="card bg-c-yellow order-card">
				<div class="card-block">
                    <h3 class="m-b-20">Usuarios</h3>
                    <h2 class="text-right"><i class="glyphicon glyphicon-usd text-left"></i><span>486</span></h2>
                    
                </div>
			</div>
			
		</div>
		<div class="col-md-4 col-lg-3">
			<div class="card bg-c-pink order-card">
				<div class="card-block">
                    <h3 class="m-b-20">Usuarios</h3>
                    <h2 class="text-right"><i class="glyphicon glyphicon-usd text-left"></i><span>486</span></h2>
                    
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