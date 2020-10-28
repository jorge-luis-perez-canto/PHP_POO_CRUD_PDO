<?php
/*
 * Copyright (C) 2020 Jorge Luis Pérez Canto
 */

    define('CONTROLADOR', TRUE);
    require_once '../modelo/Persona.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="CRUD PDO PHP7">
        <meta name="author" content="Jorge Luis Pérez Canto">
        <title>CRUD PHP</title>
	
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
            <?php include_once './header.php'; ?>
        </header>

        <main>
            <div class="container">
                <p><b>USAC-EFPEM</b></p>
                <p><b>Didáctica de la Programación</b></p>
                <p><b>Evaluación Parcial II</b></p>
                <center>
                    <p><b>CRUD PHP</b></p>
                </center>

                <div class="mt-3" id="respuesta">
                    <!-- Alertas informativas -->
                </div>
                <hr>

                <?php
                    include_once '../controlador/post_v1.php';
                ?>

                <hr>
                <div class="row">
                <?php
                // Formulario Insertar/Modificar/Eliminar
                // include_once './crud/modalFormGuardar.php';
                ?>

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
                    //$persona = Persona::recuperarTodos();
                    // Tabla principal
                    include_once './crud/tablaPrincipal.php';
                ?>

                        </div>
                        <!-- Fin Contenido -->
                    </div>
                </div>
                <!-- Fin row -->
            </div>         
        </main>

        <?php include_once './crud/footerCrud.php'; ?>
        <footer>
            <?php include_once './footer.php'; ?>
        </footer>

	<!-- 
        <script src="../controlador/app.js"></script>
	-->
    </body>
</html>
