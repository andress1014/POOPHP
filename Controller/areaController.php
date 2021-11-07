<?php

require_once "./Model/Area.php";

class areaController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new area();
    }
    public function IndexArea()
    {
        require_once './Views/header.php';
        require_once './Views/area/area.php';
    }

    public function Crud()
    {
        $area = new area();

        if (isset($_REQUEST['id'])) {
            $area = $this->model->Obtener($_REQUEST['id']);
        }

        require_once './Views/header.php';
        require_once './Views/area/area_editar.php';
    }
    public function Guardar()
    {
        $area = new area();

        $area->id_area = $_REQUEST['id_area'];
        $area->nombre = $_REQUEST['Nombre'];
      
        $area->id_area > 0
        ? $this->model->Actualizar($area)
        : $this->model->Registrar($area);
        header('Location: index.php?r=area');
    }
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?r=area');
    }
}
