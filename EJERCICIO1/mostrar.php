<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>Panel de inventario</h1>
    <?php
    //incluimos clase
    require_once("inventario.php");

    //array con los productos
    $datosDeEntrada = [["id" => 1, "nombre" => "Portátil Gaming", "precio" => 1199.99, "stock" => 10, "categoria" => "Electrónica"], ["id" => 2, "nombre" => "Ratón Inalámbrico", "precio" => 45.50, "stock" => 3, "categoria" => "Electrónica"], ["id" => 3, "nombre" => "Teclado Mecánico", "precio" => 89.90, "stock" => 0, "categoria" => "Electrónica"], ["id" => 4, "nombre" => "Silla de Oficina", "precio" => 150.00, "stock" => 7, "categoria" => "Muebles"], ["id" => 5, "nombre" => "Cafetera Express", "precio" => 79.95, "stock" => 12, "categoria" => "Electrodomésticos"]];

    //creamos objeto
    $inventario = new Inventario($datosDeEntrada);

    //mostramos total valor stock
    echo "<h3>Total stock</h3>";
    $totalStock = $inventario->calculaValorTotalStock();
    echo "<p>$totalStock €</p>";

    //mostramos categorias sin repetidos
    echo "<h3>Categorias</h3>";
    $categorias = $inventario->obtenerCategorias();

    //bucle para mostrar array
    echo "<p>";
    foreach ($categorias as $categoria) {
        echo "$categoria,";
    }
    echo "</p>";

    //mostramos tabla con productos
    echo "<table>";
    echo "<br>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Categoria</th>";
    echo "<th>Precio</th>";
    echo "<th>Stock</th>";
    echo "<th>Estado</th>";
    echo "</tr>";

    //bucle que recorre todos los productos
    foreach ($datosDeEntrada as $producto) {
        //guardamos info en variables
        $id = $producto["id"];
        $nombre = $producto["nombre"];
        $precio = $producto["precio"];
        $stock = $producto["stock"];
        $categoria = $producto["categoria"];
        $estado = $inventario->clasificar($stock);

        //mostramos fila
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$nombre</td>";
        echo "<td>$categoria</td>";
        echo "<td>$precio €</td>";
        echo "<td>$stock</td>";

        //condicinal estado
        if ($estado == "Disponible") {
            echo "<td id='disponible'>$estado</td>";
        } elseif ($estado == "Agotado") {
            echo "<td id='agotado'>$estado</td>";
        } else {
            echo "<td>$estado</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>