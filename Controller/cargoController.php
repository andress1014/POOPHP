<?php
require_once './Model/Cargo.php';

class cargoController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new cargo();
    }
    public function IndexCargo()
    {
        require_once './Views/header.php';
        require_once './Views/cargo/cargo.php';
    }
    public function Crud()
    {
        $cargo = new cargo();
        if (isset($_REQUEST['id'])) {
            $cargo = $this->model->Obtener($_REQUEST['id']);
        }
        require_once './Views/header.php';
        require_once './Views/cargo/cargo_editar.php';
    }
    public function Guardar()
    {
        $cargo = new cargo();

        $cargo->id_cargo = $_REQUEST['id_cargo'];
        $cargo->nombre = $_REQUEST['Nombre'];

        $cargo->id_cargo > 0
            ? $this->model->Actualizar($cargo)
            : $this->model->Registrar($cargo);
        header('Location: index.php?o=cargo');
    }
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?o=cargo');
    }
}
