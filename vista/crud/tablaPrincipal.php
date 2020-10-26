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
            <th width="10%">Id</th>
            <th width="20%">Nombres</th>
            <th width="20%">Apellidos</th>
            <th width="20%">Fecha registro</th>
            <th width="15%">Editar</th>
            <th width="15%">Eliminar</th>
            <!-- <th width="30%" colspan="2"></th> -->
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
                    <center>
                    <form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                        <input type='hidden' name='id' value='" . $result->id . "'>
                        <button name='editar' class='btn btn-secondary' data-toggle='modal' data-target='#editarModal'>
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                        </svg>                                  
                        </button>
                    </form>
                    </center>
                </td>
                <td>
                    <center>
                    <form  onsubmit=\"return confirm('Realmente desea eliminar el registro?');\" method='POST' action='" . $_SERVER['PHP_SELF'] . "'>
                        <input type='hidden' name='id' value='" . $result->id . "'>
                        <button class='btn btn-danger' name='eliminar'>
                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                              <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                              <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                            </svg>                                            
                        </button>                                      
                    </form>
                    </center>
                </td>
            </tr>";
    }
}
?>
        </tbody>
    </table>
</div>