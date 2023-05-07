<?php

class comision
{

    public function agregaComision($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $idusuario = $_SESSION['iduser'];
        $fecha = date('Y-m-d');

        $sql = "INSERT into comision (id_usuario,
                                        nombre_comision,
                                        venta_base,
                                        venta_limite,
                                        porcentaje,
										fechaCaptura)
						values ('$idusuario',
								'$datos[0]',
								'$datos[1]',
                                '$datos[2]',
                                '$datos[3]',
                                '$fecha')";

        return mysqli_query($conexion, $sql);
    }

    public function actualizaComision($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE comision set nombre_comision='$datos[1]',
                                      venta_base='$datos[2]',
                                      venta_limite='$datos[3]',
                                      porcentaje='$datos[4]'
								where id_comision='$datos[0]'";
        echo mysqli_query($conexion, $sql);
    }


    public function obtenDatosComision($idcomision)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_comision, 
						nombre_comision,
                        venta_base,
                        venta_limite,
                        porcentaje
				from comision where id_comision='$idcomision'";
        $result = mysqli_query($conexion, $sql);

        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_comision' => $ver[0],
            'nombre_comision' => $ver[1],
            'venta_base' => $ver[2],
            'venta_limite' => $ver[3],
            'porcentaje' => $ver[4]
        );

        return $datos;
    }

    public function eliminaComision($idcomision)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE from comision 
					where id_comision='$idcomision'";
        return mysqli_query($conexion, $sql);
    }
}
