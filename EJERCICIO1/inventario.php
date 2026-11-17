<?php
//clase producto
class Inventario
{
    //atributos
    private array $datos;

    //constructor
    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    //funciones
    public function obtenerProductosDisponibles()
    {
        //declaramos array
        $aux = [];

        //bucle que recorre todos los productos
        foreach ($this->datos as $producto) {
            //guardamos info en variables
            $stock = $producto["stock"];
            $estado = $this->clasificar($stock);

            //condicional disponible
            if ($estado == "Disponible") {
                //guardamos en array
                $aux[] = $producto;
            }
        }
        
        //devolvemos a usuario
        return $aux;
    }

    public function clasificar(int $stock)
    {
        //condicional por stock
        if ($stock == 0) {
            return "Agotado";
        } elseif ($stock <= 3) {
            return "Stock bajo";
        } else {
            return "Disponible";
        }
    }

    public function calculaValorTotalStock()
    {
        //variable valor
        $valor = 0;
        foreach ($this->datos as $producto) {
            //guardamos info en variables
            $precio = $producto["precio"];
            $stock = $producto["stock"];

            //sumamos a variable valor
            $valor += $precio * $stock;
        }

        //devolvemos a usuario
        return $valor;
    }

    public function buscarProductoIdentificador(int $id)
    {
        //variable producto
        $productoAux = null;

        //bucle que recorre todos los productos
        foreach ($this->datos as $producto) {
            //guardamos id en variable
            $idActual = $producto["id"];

            //condicional si es el que busca
            if ($idActual == $id) {
                $productoAux = $producto;
            }
        }

        //devolvemos a usuario
        return $productoAux;
    }

    public function obtenerNombresProductos()
    {
        //declaramos array 
        $aux = [];

        //bucle que recorre todos los productos
        foreach ($this->datos as $producto) {
            //guardamos nombre en variables
            $nombre = $producto["nombre"];

            //guardamos en array
            $aux[] = $nombre;
        }

        //devolvemos a usuario
        return $aux;
    }

    public function obtenerCategorias()
    {
        //declaramos array
        $aux = [];

        //bucle que recorre todos los productos
        foreach ($this->datos as $producto) {
            //guardamos categoria en variables
            $categoria = $producto["categoria"];

            //guardamos en array con comprobación
            if (!in_array($categoria, $aux)) {
                $aux[] = $categoria;
            }
        }

        //devolvemos a usuario
        return $aux;
    }
}
