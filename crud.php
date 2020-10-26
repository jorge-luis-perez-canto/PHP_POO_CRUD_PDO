<?php include('BDconect.php'); ?>
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
        <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
        
        <script src="./js/jquery-3.5.1.js"></script>
        
        <script src="./js/materialize.min.js"></script>
        
        <script src="js/bootstrap.min.js"></script> 
        <!-- <script src="js/popper.js"></script>  -->

        <script type="text/javascript">
            $(document).ready(function () {
                setTimeout(function () {
                    $(".content").fadeOut(1500);
                }, 3000);

            });
        </script>
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- <script src="./js/jquery-3.4.1.min.js"></script> -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
        <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
        <!-- <script src="./js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="./css/materialize.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
            include_once 'header.php';
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
                        echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $nombres  </div>";
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

                <!-- Insertar Registros-->
                <?php if (isset($_POST['formInsertar'])) { ?>
                <div class="modal fade" id="insertarModal" tabindex="-1" role="dialog" aria-labelledby="insertarModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="insertarModalLabel">Actualización de datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="col-12 col-md-12"> 
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nombres">Nombres</label>
                                                <input name="nombres" type="text" class="form-control" placeholder="Nombres" autofocus>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="edad">Apellidos</label>
                                                <input name="apellidos" type="text" class="form-control" id="edad" placeholder="Apellidos">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button name="insertar" type="submit" class="btn btn-primary  btn-block">
                                                Guardar 
                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-upload' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                  <path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                                                  <path fill-rule='evenodd' d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z'/>
                                                </svg>                                            
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                  //$('#insertarModal').modal('toggle');
                  $('#insertarModal').modal('show');
                </script>                            
                <?php } ?>
                <!-- Fin Insertar Registros-->

                <?php
                if (isset($_POST['editar'])) {
                    $id = $_POST['id'];
                    $sql = "SELECT * FROM tbl_datos WHERE id = :id";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    $obj = $stmt->fetchObject();
                ?>
                <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModalLabel">Actualización de datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="col-12 col-md-12"> 
                                    <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                        <input value="<?php echo $obj->id; ?>" name="id" type="hidden">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nombres" class="col-form-label">Nombres</label>
                                                <input value="<?php echo $obj->nombres; ?>" name="nombres" type="text" class="form-control" placeholder="Nombres" autofocus>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="edad" class="col-form-label">Apellidos</label>
                                                <input value="<?php echo $obj->apellidos; ?>" name="apellidos" type="text" class="form-control" id="edad" placeholder="Apellidos">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="form-group">
                                                <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
                                            </div>                        
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                  //$('#editarModal').modal('toggle');
                  $('#editarModal').modal('show');
                </script>
                <?php } ?>


                <!-- TABLA PRINCIPAL -->
                    <div class="col-12 col-md-12"> 
                        <!-- Contenido -->
                        <br>
                        <div style="float:left; margin-bottom:5px;">
                            <form action="" method="post">
                                <button class="btn btn-primary" name="formInsertar">
                                    Nuevo registro 
                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                      <path fill-rule='evenodd' d='M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
                                      <path fill-rule='evenodd' d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                    </svg>                        
                                </button>
                                <!--
                                <a href="index.php">
                                    <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                -->
                            </form>
                        </div>
                        <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <th width="5%">id</th>
                            <th width="25%">Nombres</th>
                            <th width="25%">Apellidos</th>
                            <th width="20%">Fecha registro</th>
                            <th width="25%" colspan="2"></th>
                            </thead>
                            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_datos";
                $query = $connect->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                            echo "<tr>
                                    <td>" . $result->id . "</td>
                                    <td>" . $result->nombres . "</td>
                                    <td>" . $result->apellidos . "</td>
                                    <td>" . $result->fecha . "</td>
                                    <td>
                                        <form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                                            <input type='hidden' name='id' value='" . $result->id . "'>
                                            <button name='editar' class='btn btn-secondary' data-toggle='modal' data-target='#editarModal'>
                                            Editar 
                                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                            </svg>                                        
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                                            <input type='hidden' name='id' value='" . $result->id . "'>
                                            <button class='btn btn-danger' name='eliminar'>
                                                Eliminar 
                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                                </svg>                                            
                                            </button>                                      
                                        </form>
                                    </td>
                                </tr>";
                    }
                }
                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fin Contenido -->

            </div>
            
    </div>
    <!-- Fin row -->
</div>            
        </main>

            <div class="container">
                <span class="text-muted">
                    <p style="text-align: right; margin-right:25px;">
                        Creado por <a href="https://jorgeperez.website/" id="autor" target="_blank">Jorge Luis Pérez Canto</a>
                    </p>
                </span> 
            </div>
        <footer>
            <?php
            include_once 'footer.php';
            ?>	
        </footer>

    </body>
</html>