<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #023535; margin-bottom:20px;">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><a class="navbar-brand" href="#"><img class="" src="../img/logo1.png" alt="" width="50px" height="50px"></a></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarNav">
                <ul class="navbar-nav">
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
                    <?php
                    if ($_SESSION['usuario'] != 'Asesor' && $_SESSION['usuario'] != 'Jefe') :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" style="color:white;" href="ventas.php?pagina=1">Artículo</a>
                        </li>
                    <?php
                    endif;
                    ?>

                    <!--Comisión-->
                    <?php
                    if ($_SESSION['usuario'] != 'Asesor' && $_SESSION['usuario'] != 'Jefe') :
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Comisión
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="comision.php">Reglas de comisión</a></li>
                                <li><a class="dropdown-item" href="#">Reporte de comisión</a></li>
                            </ul>
                        </li>
                    <?php
                    endif;
                    ?>

                    <!--Personal-->
                    <?php
                    if ($_SESSION['usuario'] != 'Asesor' && $_SESSION['usuario'] != 'Coordinador') :
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Personal
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="empleados.php?pagina=1">Empleados</a></li>
                                <li><a class="dropdown-item" href="departamentos.php">Departamento</a></li>
                            </ul>
                        </li>
                    <?php
                    endif;
                    ?>

                    <!--Usuarios-->
                    <?php
                    if ($_SESSION['usuario'] == 'Administrador') :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" style="color:white;" href="usuarios.php">Usuarios</a>
                        </li>
                    <?php
                    endif;
                    ?>

                    <!--Salir-->
                    <li class="nav-item dropdown" style="padding-right: 85px;">
                        <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                            <?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../procesos/salir.php">Salir</a></li>
                        </ul>
                    </li>
                </ul>
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