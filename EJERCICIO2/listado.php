<?php
//empezamos sesión
session_start();

//si no hay usuario, redirigimos a login
if (!isset($_SESSION["user"])) {
    header("Location:login.php");
    exit();
} else {
    //guardamos usuario
    $user = $_SESSION["user"];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Listado de Superhéroes</h1>
    <br>
    <?php
    //abrimos archivo
    $archivo = fopen("heroes.csv", "r");

    //bucle que recorre fila a fila
    $contador = 0;
    while (!feof($archivo)) {
        //guardamos fila
        $fila = fgetcsv($archivo, null, ";", '"', "\\");

        //si fila es false
        if ($fila === false) {
            break;
        }

        //nos saltamos cabecera
        if ($contador != 0) {
            //guardamos info fila
            $superhero = $fila[0];
            $publisher = $fila[1];
            $alter_ego = $fila[2];
            $first_appearance = $fila[3];
            $characters = $fila[4];
            $picture = $fila[5];

            //condicional si es dc o marvel
            if ($user == "DC") {
                if ($publisher == "DC Comics") {
                    echo "<img src='$picture' height='400' width='400'>";
                    echo "<br>";
                    echo "<p>$superhero</p>";
                    echo "<br>";
                    echo "<p>$publisher</p>";
                    echo "<br>";
                    echo "<p>Alter Ego: $alter_ego</p>";
                    echo "<br>";
                    echo "<p>Aparición: $first_appearance</p>";
                    echo "<br>";
                    echo "<p>Personajes: $characters</p>";
                }
            } elseif ($user == "MARVEL") {
                if ($publisher == "Marvel Comics") {
                    echo "<img src='$picture' height='400' width='400'>";
                    echo "<br>";
                    echo "<p>$superhero</p>";
                    echo "<br>";
                    echo "<p>$publisher</p>";
                    echo "<br>";
                    echo "<p>Alter Ego: $alter_ego</p>";
                    echo "<br>";
                    echo "<p>Aparición: $first_appearance</p>";
                    echo "<br>";
                    echo "<p>Personajes: $characters</p>";
                }
            }
        }

        //aumentamos contador
        $contador++;
    }
    fclose($archivo);
    ?>
</body>

</html>