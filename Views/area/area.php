<a class="btn btn-primary pull-right" href="?c=empleado" style="margin: 2px">Empleados</a>
<a class="btn btn-primary pull-right" href="?o=cargo" style="margin: 2px">Cargos</a>
<a class="btn btn-primary pull-right" href="?r=are&a=Crud" style="margin: 2px">Crear Area</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Accion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->Listar() as $dato) : ?>
            <tr>
                <td><?php echo $dato->id_area; ?></td>
                <td><?php echo $dato->nombre; ?></td>
                <td>
                    <a class="btn btn-warning" href="?c=area&a=Crud&id=<?php echo $dato->id_empleado; ?>">Editar</a>
                </td>
                <td>
                    <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?r=area&a=Eliminar&id=<?php echo $dato->id_empleado; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
<script src="assets/js/datatable.js">

</script>


</html>