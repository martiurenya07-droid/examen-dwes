<?php
//requerimos todas las páginas
require __DIR__ . "/config/db.php";
require __DIR__ . "/modelo/model.php";
require __DIR__ . "/controlador/controlador.php";

//guardamos conexión
$conexion = obtenerConexion();

//creamos modelo
$modelo = new model($conexion);

//creamos controlado
$controlador = new controlador($modelo);

//llamamos a función index
$controlador->index();