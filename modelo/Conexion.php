<?php

if (!defined('CONTROLADOR'))
    exit;

class Conexion extends PDO {

    private $prefijo_dsn = 'mysql';
    private $db_host = 'localhost';
    private $db_name = 'dbparcial2';
    private $db_user = 'root';
    private $db_pass = '';
    private $collation = 'utf8';
    private $dsn;

    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        $this->dsn = $this->prefijo_dsn . ":host=" . $this->db_host . ";dbname=" . $this->db_name . ";charset=" . $this->collation;
        try {
            //parent::__construct("{$this->prefijo_dsn}:dbname={$this->db_name};host={$this->db_host};charset=utf8", $this->db_user, $this->db_pass);
            parent::__construct($this->dsn, $this->db_user, $this->db_pass);
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }

}
