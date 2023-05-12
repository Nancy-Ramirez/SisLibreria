<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
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
    <!-- Begin Navbar -->
    <div id="nav">
        <div class="navbar navbar-fixed-top" data-spy="affix" data-offset-top="100" style="background-color: #023535;">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="inicio.php"><img class="" src="../img/logo1.png" alt="" width="75px" height="75px"></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div id="navbar" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <!--Inicio-->
                        <li>
                            <a href="inicio.php" style="color: white">
                                <span class="glyphicon glyphicon-home"></span>
                                Inicio
                            </a>
                        </li>
                        <!--Ventas-->
                        <li><a href="ventas.php" style="color: white"><span class="glyphicon glyphicon-usd"></span>
                                Ventas</a>
                        </li>
                        <!--Compras-->
                        <?php
                        if ($_SESSION['usuario'] == 'Administrador') :
                        ?>
                            <li><a href="compras.php?pagina=1" style="color: white"><span class="glyphicon glyphicon-usd"></span>
                                    Compras</a>
                            </li>
                        <?php
                        endif;
                        ?>

                        <!--Articulos-->
                        <?php
                        if ($_SESSION['usuario'] == "Jefe") :
                        ?>
                            <li><a href="articulos.php?pagina=1" style="color: white"><span class="glyphicon glyphicon-apple"></span>
                                    Articulo</a>
                            </li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($_SESSION['usuario'] == "Administrador") :
                        ?>
                            <li><a href="articulos.php?pagina=1" style="color: white"><span class="glyphicon glyphicon-apple"></span>
                                    Articulo</a>
                            </li>
                        <?php
                        endif;
                        ?>

                        <!--Comisión-->
                        <?php
                        if ($_SESSION['usuario'] == "Jefe") :
                        ?>
                            <li class="dropdown">
                                <a href="#" style="color: white" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Comisión<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="comision.php">Reglas comisión</a></li>
                                    <li><a href="#">Reporte comision</a></li>
                                </ul>
                            </li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($_SESSION['usuario'] == "Administrador") :
                        ?>
                            <li class="dropdown">
                                <a href="#" style="color: white" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Comisión<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="comision.php">Reglas comisión</a></li>
                                    <li><a href="#">Reporte comision</a></li>
                                </ul>
                            </li>
                        <?php
                        endif;
                        ?>

                        <!--Personal-->
                        <?php
                        if ($_SESSION['usuario'] == "Administrador") :
                        ?>
                            <li class="dropdown">
                                <a href="#" style="color: white" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="	glyphicon glyphicon-edit"></span> Personal <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="empleados.php?pagina=1">Empleados</a></li>
                                    <li><a href="departamento.php">Departamento</a></li>
                                </ul>
                            </li>
                        <?php
                        endif;
                        ?>
                        <!--Usuarios-->
                        <?php
                        if ($_SESSION['usuario'] == "Administrador") :
                        ?>
                            <li><a href="usuarios.php" style="color: white"><span class="glyphicon glyphicon-user"></span>
                                    Usuarios</a>
                            </li>
                        <?php
                        endif;
                        ?>

                        <li class="dropdown">
                            <a href="#" style="color: #41a0b0" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-off"></span>
                                <?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li> <a style="color: white" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.contatiner -->
        </div>
    </div>
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