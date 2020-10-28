<?php

/*
 * Copyright (C) 2020 Jorge Luis Pérez Canto
 */

$formulario = (isset($_REQUEST['formulario'])) ? trim($_REQUEST['formulario']) : null;

$titulo = "";
$accion = "";
$txtButton = "";
$id = null;

if ($formulario == "showFormInsertar") 
{
    $titulo = "Ingreso de datos";
    $accion = "ingresar";
    $txtButton = "Guardar";
    //$txtButton = "Ingresar";
} 
else if ($formulario == "showFormEditar") 
{
    $titulo = "Actualización de datos";
    $accion = "editar";
    //$txtButton = "Modificar";
    $txtButton = "Guardar";

    $id = (isset($_REQUEST['id'])) ? trim($_REQUEST['id']) : null;
    $persona = Persona::buscarPorId($id);
} 
else if ($formulario == "showFormEliminar") 
{
    $titulo = "Eliminar";
    $id = (isset($_REQUEST['id'])) ? trim($_REQUEST['id']) : null;
    $persona = Persona::buscarPorId($id);
    $accion = "eliminar";
    $txtButton = "Eliminar";
}
?>
<div class="modal fade" id="modalGuardar" tabindex="-1" role="dialog" aria-labelledby="modalGuardarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalGuardarLabel"><?php echo $titulo ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12 col-md-12"> 
                    <form role='form' id='formularioGuardar'>
                        <input value="<?php echo $accion ?>" name="accion" type="hidden"/>

                        <?php if ($formulario == "showFormEliminar"): ?>
                            <input value="<?php echo $persona->getId(); ?>" name="id" type="hidden"/>
                            <div class="modal-body">
                                <p>¿Está seguro de que desea eliminar este registro de forma permanente?</p>
                            </div>
                        <?php elseif ($formulario == "showFormEditar"): ?>
                            <input value="<?php echo $persona->getId(); ?>" name="id" type="hidden"/>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombres">Nombres</label>
                                    <input value="<?php echo $persona->getNombres(); ?>" name="nombres" type="text" class="form-control" placeholder="Nombres" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="edad">Apellidos</label>
                                    <input value="<?php echo $persona->getApellidos(); ?>" name="apellidos" type="text" class="form-control" id="edad" placeholder="Apellidos"/>
                                </div>
                            </div>
                        <?php elseif ($formulario == "showFormInsertar"): ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombres">Nombres</label>
                                    <input name="nombres" type="text" class="form-control" placeholder="" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="edad">Apellidos</label>
                                    <input name="apellidos" type="text" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($formulario == "showFormEliminar"): ?>
                            <div class="modal-footer form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Continuar</button>
                            </div>                            
                        <?php else: ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <?php echo $txtButton ?> 
                                    <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-upload' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                        <path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                                        <path fill-rule='evenodd' d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z'/>
                                    </svg>
                                </button>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($formulario): ?>
    <script>
        $('#modalGuardar').modal('show');
    </script>
<?php endif; ?>