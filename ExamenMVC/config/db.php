<?php
//función obtener conexión
function obtenerConexion(): PDO
{
    $conexion = new PDO(
        'mysql:host=127.0.0.1;port=8889;dbname=tfg;charset=utf8mb4',
        'root',
        'root'
    );
    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    //devolvemos conexion
    return $conexion;
}
