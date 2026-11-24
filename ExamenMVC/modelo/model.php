<?php
//clase modelo
class model
{
    //atributos
    private PDO $conexion;

    //constructor
    public function __construct(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    //función obtener todos
    public function obtenerTodos()
    {
        $sql = 'SELECT * FROM notas';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $notas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $notas;
    }

    //función update a partir de nota
    public function updateNota(string $profesor, float $nota, int $id)
    {
        $sql = 'UPDATE notas SET :profesor = :nota WHERE id = :id';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['profesor' => $profesor, 'nota' => $nota, 'id' => $id]);
    }
}
