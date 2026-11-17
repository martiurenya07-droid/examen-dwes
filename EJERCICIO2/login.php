<?php
//empezamos sesión
session_start();

//declaramos usuarios y contraseñas validas
$usuario1 = "DC";
$usuario2 = "MARVEL";
$contraseñas = 1234;
//comprobamos si hemos recibido post
if (isset($_POST["user"]) && isset($_POST["password"])){
    //guardamos lo recibido
    $user = $_POST["user"];
    $password = $_POST["password"];

    //comprobamos si son correctas
    if (($user == $usuario1 || $user == $usuario2) && $password == $contraseñas){
        //guardamos en variable de sesión el usuario
        $_SESSION["user"] = $user;

        //redirigimos a página
        header ("Location:listado.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="user">
        <br>
        <br>
        <label>Contraseña</label>
        <input type="password" name="password">
        <br>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>