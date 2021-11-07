<a class="btn btn-primary pull-right" href="?o=cargo" style="margin: 2px">cargos</a>
<h1 class="page-header">
    <?php echo $cargo->id_cargo != null ? $cargo->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=cargo">cargo</a></li>
  <li class="active"><?php echo $cargo->id_cargo != null ? $cargo->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?o=car&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_cargo" value="<?php echo $cargo->id_cargo; ?>" />
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $cargo->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
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