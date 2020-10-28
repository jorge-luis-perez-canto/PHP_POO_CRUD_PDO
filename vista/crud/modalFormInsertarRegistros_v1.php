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