<?php

//clase controlador
class controlador
{
    //atributos
    private model $modelo;

    //generamos constructor
    public function __construct(model $modelo)
    {
        $this->modelo = $modelo;
    }

    //función index
    public function index()
    {
        //obtenemos todas las notas y las guardamos en array
        $notas = $this->modelo->obtenerTodos();

        //incluimos vista
        require __DIR__ . "/../listado.php";
    }
}
