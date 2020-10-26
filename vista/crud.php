<?php require_once '../modelo/BDconect.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="CRUD PDO PHP7">
        <meta name="author" content="Jorge Luis Pérez Canto">
        <title>CRUD PHP</title>
        
        <!-- Bootstrap core CSS -->
        
        <!-- Custom styles for this template -->
        <link href="./css/sticky-footer-navbar.css" rel="stylesheet">
        
        <script src="./js/jquery-3.5.1.js"></script>
        <script src="./js/materialize.min.js"></script>
        <script src="./js/bootstrap.min.js"></script> 
        <!-- <script src="./js/popper.js"></script>  -->

        <script type="text/javascript">
            $(document).ready(function () {
                setTimeout(function () {
                    $(".content").fadeOut(1500);
                }, 3000);

            });
        </script>
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <link rel="stylesheet" href="./css/materialize.css">
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/estilo.css">
        <!--
                Autor: Jorge Luis Pérez Canto-
                Carné: 201024865
                Fecha: 24-Oct-2020.
        -->
    </head>
    <body>

        <header>
            <?php
            include_once './header.php';
            ?>         
        </header>

        <main>
            <div class="container">
                <p><b>USAC-EFPEM</b></p>
                <p><b>Didáctica de la Programación</b></p>
                <p><b>Evaluación Parcial II</b></p>
                <center>
                    <p><b>CRUD PHP</b></p>
                </center>

                <?php
                if (isset($_POST['eliminar'])) {
                    ////////////// Actualizar la tabla /////////
                    $consulta = "DELETE FROM `tbl_datos` WHERE `id`=:id";
                    $sql = $connect->prepare($consulta);
                    $sql->bindParam(':id', $id, PDO::PARAM_INT);
                    $id = trim($_POST['id']);

                    $sql->execute();

                    if ($sql->rowCount() > 0) {
                        $count = $sql->rowCount();
                        echo "<div class='content alert alert-primary'> Gracias: $count registro ha sido eliminado  </div>";
                    } else {
                        echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
                        print_r($sql->errorInfo());
                    }
                }// Cierra envio de guardado
                ?>

                <?php
                if (isset($_POST['insertar'])) {
                    ///////////// Informacion enviada por el formulario /////////////
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $fecha = date('Y-m-d');
                    ///////// Fin informacion enviada por el formulario /// 
                    ////////////// Insertar a la tabla la informacion generada /////////
                    $sql = "insert into tbl_datos(nombres,apellidos,fecha) values(:nombres,:apellidos,:fecha)";

                    $sql = $connect->prepare($sql);
                    $sql->bindParam(':nombres', $nombres, PDO::PARAM_STR, 25);
                    $sql->bindParam(':apellidos', $apellidos, PDO::PARAM_STR, 25);
                    $sql->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                    $sql->execute();

                    $lastInsertId = $connect->lastInsertId();
                    if ($lastInsertId > 0) {
                        echo "<div class='content alert alert-primary' > Gracias $nombres . Tu registro ha sido guardado </div>";
                    } else {
                        echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";
                        print_r($sql->errorInfo());
                    }
                }// Cierra envio de guardado
                ?>

                <?php
                if (isset($_POST['actualizar'])) {
                    ///////////// Informacion enviada por el formulario /////////////
                    $id = trim($_POST['id']);
                    $nombres = trim($_POST['nombres']);
                    $apellidos = trim($_POST['apellidos']);
                    $fecha = date('Y-m-d');
                    ///////// Fin informacion enviada por el formulario /// 
                    ////////////// Actualizar la tabla /////////
                    $consulta = "UPDATE tbl_datos SET `nombres`= :nombres, `apellidos` = :apellidos, `fecha` = :fecha WHERE `id` = :id";
                    $sql = $connect->prepare($consulta);
                    $sql->bindParam(':nombres', $nombres, PDO::PARAM_STR, 25);
                    $sql->bindParam(':apellidos', $apellidos, PDO::PARAM_STR, 25);
                    $sql->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                    $sql->bindParam(':id', $id, PDO::PARAM_INT);
                    $sql->execute();

                    if ($sql->rowCount() > 0) {
                        $count = $sql->rowCount();
                        echo "<div class='content alert alert-primary'> Gracias: $count registro ha sido actualizado  </div>";
                    } else {
                        echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";
                        print_r($sql->errorInfo());
                    }
                }// Cierra envio de guardado
                ?>

                <hr>
                <div class="row">

                
                <!-- Form Insertar -->
                <?php 
                    include_once './crud/modalFormInsertarRegistros.php';
                ?>

                <!-- From Editar --> 
                <?php 
                    include_once './crud/modalFormEditarRegistros.php';
                ?>
                
                <!-- Tabla principal -->
                <?php 
                    include_once './crud/tablaPrincipal.php';
                ?>                

                    
                        </div>
                        <!-- Fin Contenido -->
                    </div>
                </div>
                <!-- Fin row -->
            </div>            
        </main>

        <?php 
            include_once './crud/footerCrud.php';
        ?>    
        <footer>
            <?php
            include_once './footer.php';
            ?>	
        </footer>

    </body>
</html>