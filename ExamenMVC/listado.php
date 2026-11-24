<?php
//empezamos sesión
session_start();

//sacamos de página si no hay usuario
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
    <title>Listado</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    echo "<h1>Bienvenido $username</h1>";

    //si tenemos notas
    if (!empty($notas)) {
        //condicional dependiendo de usuario
        if ($username == "admin") {
            //mostramos todas las notas
            echo "<table>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>apellido1</th>";
            echo "<th>apellido2</th>";
            echo "<th>profesor1</th>";
            echo "<th>profesor2</th>";
            echo "<th>profesor3</th>";
            echo "<th>profesor4</th>";
            echo "<th>Acción</th>";
            echo "</tr>";

            //bucle que recorre todas las notas
            foreach ($notas as $notas) {
                //guardamos
                $id = $notas["id"];
                $apellido1 = $notas["apellido1"];
                $apellido2 = $notas["apellido2"];
                $profesor1 = $notas["profesor1"];
                $profesor2 = $notas["profesor2"];
                $profesor3 = $notas["profesor3"];
                $profesor4 = $notas["profesor4"];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$apellido1</td>";
                echo "<td>$apellido2</td>";
                echo "<td>$profesor1</td>";
                echo "<td>$profesor2</td>";
                echo "<td>$profesor3</td>";
                echo "<td>$profesor4</td>";
                echo "<td> <a href='poner_nota.php?id=$id'>Poner/Editar nota</a></td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {
            //si no es admin
            //mostramos todas las notas
            echo "<table>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>apellido1</th>";
            echo "<th>apellido2</th>";
            echo "<th>$username</th>";
            echo "<th>Acción</th>";
            echo "</tr>";

            //bucle que recorre todas las notas
            foreach ($notas as $notas) {
                //guardamos
                $id = $notas["id"];
                $apellido1 = $notas["apellido1"];
                $apellido2 = $notas["apellido2"];
                $profesor1 = $notas["profesor1"];
                $profesor2 = $notas["profesor2"];
                $profesor3 = $notas["profesor3"];
                $profesor4 = $notas["profesor4"];

                if ($username == "profesor1") {
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$apellido1</td>";
                    echo "<td>$apellido2</td>";
                    echo "<td>$profesor1</td>";
                    echo "<td> <a href='poner_nota.php?id=$id'>Poner/Editar nota</a></td>";

                    echo "</tr>";
                } elseif ($username == "profesor2") {
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$apellido1</td>";
                    echo "<td>$apellido2</td>";
                    echo "<td>$profesor2</td>";
                    echo "<td> <a href='poner_nota.php?id=$id'>Poner/Editar nota</a></td>";

                    echo "</tr>";
                } elseif ($username == "profesor3") {
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$apellido1</td>";
                    echo "<td>$apellido2</td>";
                    echo "<td>$profesor3</td>";
                    echo "<td> <a href='poner_nota.php?id=$id'>Poner/Editar nota</a></td>";

                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$apellido1</td>";
                    echo "<td>$apellido2</td>";
                    echo "<td>$profesor4</td>";
                    echo "<td> <a href='poner_nota.php?id=$id'>Poner/Editar nota</a></td>";
                    echo "</tr>";
                }
            }

            echo "<table>";
        }
    }
    ?>

</body>

</html>