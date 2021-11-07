<?php foreach ($this->model->ListarArea() as $d) {
            if($empleado->area == $d->id_area){
                $dato = $d->nombre;
            }
        }
        foreach ($this->model->ListarCargo() as $d) {
            if($empleado->cargo == $d->id_cargo){
                $dato2 = $d->nombre;
            }
        } ?>
<a class="btn btn-primary pull-right" href="?c=empleado" style="margin: 2px">Empleados</a>
<h1 class="page-header">
    <?php echo $empleado->id_empleado != null ? $empleado->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=empleado">empleado</a></li>
  <li class="active"><?php echo $empleado->id_empleado != null ? $empleado->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=emplea&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_empleado" value="<?php echo $empleado->id_empleado; ?>" />
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $empleado->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
    </div>
    
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $empleado->correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required>
    </div>
    <div class="form-group">
        <label>Cargo</label>
        <select name="Cargo" id=""  class="form-control"  required>
        <option value="<?php echo $empleado->cargo; ?>"><?php !empty($_REQUEST['id']) ? print_r($dato2) : print_r("Seleccionar Cargo"); ?></option>
        <?php  foreach ($this->model->ListarCargo() as $d) : ?>
        <option value="<?php echo $d->id_cargo; ?>"><?php echo $d->nombre; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Area</label>
        
        <select name="Area" id=""  class="form-control"  required>
        <option value="<?php echo $empleado->area ; ?>"><?php !empty($_REQUEST['id']) ? print_r($dato) : print_r("Seleccionar Area"); ?></option>
        <?php  foreach ($this->model->ListarArea() as $d) : ?>
        <option value="<?php echo $d->id_area; ?>"><?php echo $d->nombre; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
       
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>