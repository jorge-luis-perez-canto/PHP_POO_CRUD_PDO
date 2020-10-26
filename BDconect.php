<?php

// DB CREDENCIALES DE USUARIO.
// Desarrollo

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dbparcial2');


// Producción
/*
  define('DB_HOST','localhost');
  define('DB_USER','jorgakxe_george');
  define('DB_PASS','298@f+D^@xF~');
  define('DB_NAME','jorgakxe_dbparcial2');
 */

// Ahora, establecemos la conexión.
try {
// Ejecutamos las variables y aplicamos UTF8
    $connect = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>