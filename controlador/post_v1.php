<?php

/*
 * Copyright (C) 2020 Jorge Luis Pérez Canto
 */

if (isset($_POST['eliminar'])) {
    $id = (isset($_REQUEST['id'])) ? trim($_REQUEST['id']) : null;
    if ($id) {
        $persona = Persona::buscarPorId($id);
        if ($persona) {
            $respuesta = $persona->eliminar();
            if ($respuesta->rowCount() > 0) {
                $count = $respuesta->rowCount();
                echo "<div class='content alert alert-primary'> Gracias: $count registro ha sido eliminado  </div>";
            } else {
                echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
                //print_r($respuesta->errorInfo());
            }
        } else {
            echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
        }
    }
} 
else if (isset($_POST['insertar'])) 
{
    $persona = new Persona();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombres = (isset($_POST['nombres'])) ? trim($_POST['nombres']) : null;
        $apellidos = (isset($_POST['apellidos'])) ? trim($_POST['apellidos']) : null;
        //$fecha = (isset($_POST['fecha'])) ? trim($_POST['fecha']) : null;
        $fecha = date('Y-m-d');
        $persona->setNombres($nombres);
        $persona->setApellidos($apellidos);
        $persona->setFecha($fecha);
        $respuesta = $persona->guardar();
        $lastInsertId = $persona->getId();
        if ($lastInsertId > 0) {
            echo "<div class='content alert alert-primary' > Gracias $nombres . Tu registro ha sido guardado </div>";
        } else {
            echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";
            //print_r($respuesta->errorInfo());
        }
    }
} 
else if (isset($_POST['actualizar'])) 
{
    $id = (isset($_REQUEST['id'])) ? trim($_REQUEST['id']) : null;
    if ($id) {
        $persona = Persona::buscarPorId($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombres = (isset($_POST['nombres'])) ? trim($_POST['nombres']) : null;
            $apellidos = (isset($_POST['apellidos'])) ? trim($_POST['apellidos']) : null;
            //$fecha = (isset($_POST['fecha'])) ? trim($_POST['fecha']) : null;
            $fecha = date('Y-m-d');
            $persona->setNombres($nombres);
            $persona->setApellidos($apellidos);
            $persona->setFecha($fecha);
            $respuesta = $persona->guardar();
            if ($respuesta->rowCount() > 0) {
                $count = $respuesta->rowCount();
                echo "<div class='content alert alert-primary'> Se ha actualizado $count registro. </div>";
            } else {
                echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";
                //print_r($respuesta->errorInfo());
            }
        }
    }
}