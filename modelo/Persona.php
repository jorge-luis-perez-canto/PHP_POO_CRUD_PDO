<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Persona {

    private $id;
    private $nombres;
    private $apellidos;
    private $fecha;
    
    const TABLA = 'tbl_datos';
    
    public function __construct($nombre=null, $apellido=null, $fecha=null, $id=null) {
        $this->nombres = $nombre;
        $this->apellidos = $apellido;
        $this->fecha = $fecha;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getNombres() {
        return $this->nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setNombres($nombres): void {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->id) /* Modifica */ {
            $query = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombres = :nombres, apellidos = :apellidos, fecha = :fecha WHERE id = :id');
            $query->bindParam(':nombres', $this->nombres, PDO::PARAM_STR, 25);
            $query->bindParam(':apellidos', $this->apellidos, PDO::PARAM_STR, 25);
            $query->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $query->bindParam(':id', $this->id, PDO::PARAM_INT);
            $query->execute();
        } else /* Inserta */ {
            $query = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombres, apellidos, fecha) VALUES(:nombres, :apellidos, :fecha)');
            $query->bindParam(':nombres', $this->nombres, PDO::PARAM_STR, 25);
            $query->bindParam(':apellidos', $this->apellidos, PDO::PARAM_STR, 25);
            $query->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $query->execute();
            $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
        return $query;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $query = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
        $conexion = null;
        return $query;
    }

    public static function buscarPorId($id) {
        $conexion = new Conexion();
        $query = $conexion->prepare('SELECT nombres, apellidos, fecha FROM ' . self::TABLA . ' WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $registro = $query->fetch(); //$query->fetchObject();
        $conexion = null;
        if ($registro) {
            return new self($registro['nombres'], $registro['apellidos'], $registro['fecha'], $id);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        //$query = $conexion->prepare('SELECT id, nombres, apellidos, fecha FROM ' . self::TABLA . ' ORDER BY nombre');
        //$query = $conexion->prepare('SELECT id, nombres, apellidos, fecha FROM ' . self::TABLA);
        $sql = 'SELECT id, nombres, apellidos, fecha FROM ' . self::TABLA;
        $query = $conexion->prepare($sql);
        $query->execute();
        //$results = $query->fetchAll();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $conexion = null;
        return $results;
    }

}
