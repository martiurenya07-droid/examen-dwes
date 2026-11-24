<?php
//requerimos modelo
//requerimos todas las páginas
require __DIR__ . "/config/db.php";
require __DIR__ . "/modelo/model.php";
require __DIR__ . "/controlador/controlador.php";

//empezamos sesión
session_start();

//denegamos acceso a página si no hay usuario
if (!isset($_SESSION["username"])) {
    //redirigimos a login
    header("Location:login.php");
    exit();
}

//guardamos username
$username = $_SESSION["username"];

//validamos que hemos recibido post
if (isset($_POST["nota"])) {
    $nota = $_POST["nota"];
    $id = $_POST["id"];

    if (filter_var($nota, FILTER_VALIDATE_FLOAT) !== false && $nota > 0 && $nota < 10) {
        //es válida

        //si es admin
        if (isset($_POST["profesor"])) {
            $profesor = $_POST["profesor"];

            //llamamos función modelo
            //guardamos conexión
            $conexion = obtenerConexion();

            //creamos modelo
            $modelo = new model($conexion);

            $modelo->updateNota($profesor, $nota, $id);
        } else {
            //llamamos función
            $modelo->updateNota("", $nota, $id);
        }
    }
}
