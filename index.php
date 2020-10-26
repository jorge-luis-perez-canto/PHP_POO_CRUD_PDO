<?php include('BDconect.php'); ?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="CRUD PDO PHP7">
        <meta name="author" content="Jorge Luis Pérez Canto">
        <title>CRUD PHP</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                setTimeout(function () {
                    $(".content").fadeOut(1500);
                }, 3000);

            });
        </script>
    </head>

    <body>
        <header> 
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
                <a class="navbar-brand" href="#"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
                    </ul>
                    <!--
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
                    </form>
                    -->
                </div>
            </nav>
        </header>

        <!-- Begin page content -->

        <div class="container">
            
            <h4 class="mt-5">USAC-EFPEM</h3>
            <h4>Didáctica de la Programación</h3>
            <h4>Evaluación Parcial II</h3>
            <br>
            <center>
                <h4 >CRUD PHP</h3>
            </center>
            <br>
            
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
                                <button name="insertar" type="submit" class="btn btn-primary  btn-block">Guardar</button>
                            </div>
                        </form>
                    </div> 
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

                    <div class="col-12 col-md-12"> 
                        <form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input value="<?php echo $obj->id; ?>" name="id" type="hidden">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombres">Nombres</label>
                                    <input value="<?php echo $obj->nombres; ?>" name="nombres" type="text" class="form-control" placeholder="Nombres" autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="edad">Apellidos</label>
                                    <input value="<?php echo $obj->apellidos; ?>" name="apellidos" type="text" class="form-control" id="edad" placeholder="Apellidos">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
                            </div>
                        </form>
                    </div>  
            <?php } ?>
            
            <!-- TABLA PRINCIPAL -->
                <div class="col-12 col-md-12"> 
                    <!-- Contenido -->
                    <br>
                    <div style="float:left; margin-bottom:5px;">
                        <form action="" method="post"><button class="btn btn-primary" name="formInsertar">Nuevo registro</button>  <a href="index.php"><button type="button" class="btn btn-primary">Cancelar</button></a></form></div>
                    <div class="table-responsive">
                        
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <th width="10%">id</th>
                        <th width="25%">Nombres</th>
                        <th width="25%">Apellidos</th>
                        <th width="25%">Fecha registro</th>
                        <th width="15%" colspan="2"></th>
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
                                        <button name='editar'>Editar</button>
                                    </form>
                                </td>
                                <td>
                                    <form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                                        <input type='hidden' name='id' value='" . $result->id . "'>
                                        <button name='eliminar'>Eliminar</button>
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
<!-- Fin container -->
<footer class="footer">
    <div class="container"> <span class="text-muted">
            <p style="text-align: right; margin-right:25px;">Creado por <a href="https://jorgeperez.website/" target="_blank">Jorge Luis Pérez Canto</a></p>
        </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>