<?php
//header("Access-Control-Allow-Origin: *");
/* 
 * Copyright (C) 2020 Jorge Luis Pérez Canto
 */
require_once '../modelo/Persona.php';

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : null;

if (($accion != '') && ($accion != null)) {
    $persona = new Persona();

    switch ($accion) {
        case 'ingresar':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nombres = (isset($_POST['nombres'])) ? trim($_POST['nombres']) : null;
                $apellidos = (isset($_POST['apellidos'])) ? trim($_POST['apellidos']) : null;
                $fecha = date('Y-m-d');
                $persona->setNombres($nombres);
                $persona->setApellidos($apellidos);
                $persona->setFecha($fecha);
                $respuesta = $persona->guardar();
                $lastInsertId = $persona->getId();
                if ($lastInsertId > 0) {
                    echo ("<div class='content alert alert-primary' > Gracias $nombres . Tu registro ha sido guardado </div>");
                } else {
                    echo ("<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>");
                }
            }
            break;
        case 'editar':
            $id = (isset($_REQUEST['id'])) ? trim($_REQUEST['id']) : null;
            if($id){
                $persona = Persona::buscarPorId($id);
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $nombres = (isset($_POST['nombres'])) ? trim($_POST['nombres']) : null;
                    $apellidos = (isset($_POST['apellidos'])) ? trim($_POST['apellidos']) : null;
                    $fecha = date('Y-m-d');
                    $persona->setNombres($nombres);
                    $persona->setApellidos($apellidos);
                    $persona->setFecha($fecha);
                    $respuesta = $persona->guardar();
                    if ($respuesta->rowCount() > 0) {
                        $count = $respuesta->rowCount();
                        echo ("<div class='content alert alert-primary'> Se ha actualizado $count registro. </div>");
                    } else {
                        echo ("<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>");
                    }
                }
            }
            break;
        case 'eliminar':
            $id = (isset($_REQUEST['id'])) ? trim($_REQUEST['id']) : null;
            if($id){
                $persona = Persona::buscarPorId($id);
                if ($persona) {
                    $respuesta = $persona->eliminar();
                    if ($respuesta->rowCount() > 0) {
                        $count = $respuesta->rowCount();
                        echo ("<div class='content alert alert-primary'>El registro ha sido eliminado</div>");
                    } else {
                        echo ("<div class='content alert alert-danger'>No se pudo eliminar el registro</div>");
                    }
                } else {
                    echo ("<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>");
                }
            }
            break;
    }
    
}
?>