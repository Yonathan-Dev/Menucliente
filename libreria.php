<?php

include 'config.php';
$conexion = '';

#Conectarse a BD
function conectar()
{
    global $conexion;
    $conexion = mysqli_connect(H, U, P, B, R);
    mysqli_query($conexion, 'set names UTF8');
}

#SELECT
function consultar($consulta)
{
    global $conexion;
    conectar();
    $caja = mysqli_query($conexion, $consulta);
    $data = array();
    while ($reg = mysqli_fetch_assoc($caja)) {
        $data[] = $reg;
    }
    desconectar();
    return $data;
}

#INSERT UPDATE DELETE
function ejecutar($comando)
{
    global $conexion;
    conectar();
    mysqli_query($conexion, $comando);
    desconectar();
}

#CERRAR CONEXION
function desconectar()
{
    global $conexion;
    mysqli_close($conexion);
}
