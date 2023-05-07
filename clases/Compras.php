<?php

class compra
{

    public function agregaCompra($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $idusuario = $_SESSION['iduser'];
        $fecha = date('Y-m-d');

        $sql = "INSERT into compras (id_usuario,
                                        id_producto,
                                        cantidad,
                                        precio_compra,
										fechaCaptura)
						values ('$idusuario',
								'$datos[0]',
								'$datos[1]',
                                '$datos[2]',
                                '$fecha')";

        return mysqli_query($conexion, $sql);
    }

    public function actualizaCompra($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE compras set cantidad='$datos[1]',
                                      precio_compra='$datos[2]'
								where id_compra='$datos[0]'";
        echo mysqli_query($conexion, $sql);
    }


    public function obtenDatosCompra($idcompra)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_compra, 
						id_producto,
                        cantidad,
                        precio_compra
				from compras where id_compra='$idcompra'";
        $result = mysqli_query($conexion, $sql);

        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_compra' => $ver[0],
            'id_producto' => $ver[1],
            'cantidad' => $ver[2],
            'precio_compra' => $ver[3]
        );

        return $datos;
    }

    public function eliminaCompra($idcompra)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE from compras
					where id_compra='$idcompra'";
        return mysqli_query($conexion, $sql);
    }

    //ESTE ES PARA AGREGAR ACTUALIZAR DIRECTAMENTE TABLA PRODUCTO
    public function actualizaCompraArt($datos){
            $c=new conectar();
			$conexion=$c->conexion();
            
			$sql="UPDATE articulos set  precio=((precio*stock)+('$datos[1]'*'$datos[2]'))/(stock+'$datos[2]'),
										stock=stock+'$datos[2]'
						where id_producto='$datos[0]'";

			return mysqli_query($conexion,$sql);
    }
}
