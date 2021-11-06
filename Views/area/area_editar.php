<a class="btn btn-primary pull-right" href="?r=area" style="margin: 2px">areas</a>
<h1 class="page-header">
    <?php echo $area->id_area != null ? $area->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=area">area</a></li>
  <li class="active"><?php echo $area->id_area != null ? $area->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?r=are&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_area" value="<?php echo $area->id_area; ?>" />
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $area->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
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