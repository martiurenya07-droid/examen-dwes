<?php
//empezamos sesión
session_start();

//denegamos acceso a página si no hay usuario
if (!isset($_SESSION["username"])) {
    //redirigimos a login
    header("Location:login.php");
    exit();
}

//guardamos usuario
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poner nota</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Poner nota</h1>

    <?php
    //condicional
    if ($username != "admin") {
    ?>
        <form action="guardar_nota.php" method="post">
            <label>Nueva nota</label>
            <input type="number" name="nota">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    <?php

    } else {
    ?>
        <form action="guardar_nota.php" method="post">
            <label>Profesor</label>
            <input type="text" name="profesor">
            <br>
            <br>
            <label>Nueva nota</label>
            <input type="number" name="nota">
            <br>
            <br>
            <label>Id</label>
            <input type="number" name="id">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    <?php

    }
    ?>
</body>

</html>