<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
     <!-- Begin Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-fixed-top" style="background-color: #023535;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="" src="../img/logo1.png" alt="" width="50px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end">
                <div class="navbar-nav ">

                    <!--Inicio-->
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="inicio.php">Inicio</a>
                    </li>

                    <!--Ventas-->
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="ventas.php">Ventas</a>
                    </li>

                    <!--Compras-->
                    <?php
                    if ($_SESSION['usuario'] != 'Asesor') :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" style="color:white;" href="compras.php?pagina=1">Compras</a>
                        </li>
                    <?php
                    endif;
                    ?>

                    <!--Artículo-->
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="ventas.php?pagina=1">Artículo</a>
                    </li>

                    <!--Comisión-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Comisión
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="comision.php">Reglas de comisión</a></li>
                            <li><a class="dropdown-item" href="#">Reporte de comisión</a></li>
                        </ul>
                    </li>

                    <!--Personal-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Personal
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="empleados.php?pagina=1">Empleados</a></li>
                            <li><a class="dropdown-item" href="departamentos.php">Departamento</a></li>
                        </ul>
                    </li>

                    <!--Usuarios-->
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="usuarios.php">Usuarios</a>
                    </li>

                    <!--Salir-->
                    <li class="nav-item dropdown" style="padding-right: 85px;">
                        <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                            <?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../procesos/salir.php">Salir</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
   
   
    <!-- Main jumbotron for a primary marketing message or call to action -->





    <!-- /container -->


</body>

</html>

<script type="text/javascript">
    $(window).scroll(function() {
        if ($(document).scrollTop() > 150) {
            $('.logo').height(200);

        } else {
            $('.logo').height(100);
        }
    });
</script>