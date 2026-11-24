<?php
//empezamos sesión
session_start();

//array usuarios y contraseñas
$usuarios = [["user" => "admin", "password" => 1234], ["user" => "profesor1", "password" => 1234], ["user" => "profesor2", "password" => 1234], ["user" => "profesor3", "password" => 1234], ["user" => "profesor4", "password" => 1234]];

//comprobamos si hemos recibido post
if (isset($_POST["user"]) && isset($_POST["password"])) {
    //guardamos
    $user = $_POST["user"];
    $password = $_POST["password"];

    //comprobamos si es válida
    $valido = false;
    $explicacion = "Usuario o contraseña incorrectas";

    //comprobamos si es válido
    foreach ($usuarios as $usuario) {
        if ($user == $usuario["user"]) {
            $explicacion = "Contraseña incorrecta";
            if ($password = $usuario["password"]) {
                $explicacion = "Login correcto";
                $valido = true;
            }
        }
    }

    //si es correcto redirigimos a index.php
    echo "<p>$explicacion</p>";

    //almacenamos usuario en sesión

    if ($valido) {
        $_SESSION["username"] = $user;
        header("Location:index.php");
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
        <label>Usuario</label>
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