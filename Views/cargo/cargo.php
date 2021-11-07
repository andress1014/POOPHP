<a class="btn btn-primary pull-right" href="?c=empleado" style="margin: 2px">Empleados</a>
<a class="btn btn-primary pull-right" href="?o=car&a=Crud" style="margin: 2px">Crear Cargos</a>
<a class="btn btn-primary pull-right" href="?r=area" style="margin: 2px">Areas</a>
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
                <td><?php echo $dato->id_cargo; ?></td>
                <td><?php echo $dato->nombre; ?></td>
                <td>
                    <a class="btn btn-warning" href="?o=car&a=Crud&id=<?php echo $dato->id_cargo; ?>">Editar</a>
                </td>
                <td>
                    <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?o=car&a=Eliminar&id=<?php echo $dato->id_cargo; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
<script src="assets/js/datatable.js">

</script>


</html>