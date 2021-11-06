<?php
require_once "./Model/Empleado.php";

class empleadoController {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new empleado();
    }

    public function Index() {
        require_once './Views/header.php';
        require_once './Views/empleado/empleado.php';
    }

    public function Crud() {
        $empleado = new empleado();

        if (isset($_REQUEST['id'])) {
            $empleado = $this->model->Obtener($_REQUEST['id']);
        }
        require_once './Views/header.php';
        require_once './Views/empleado/empleado_editar.php';
    }
    public function Guardar() {
        $empleado = new empleado();

        $empleado->id_empleado = $_REQUEST['id_empleado'];
        $empleado->nombre = $_REQUEST['Nombre'];
        $empleado->correo = $_REQUEST['Correo'];
        $empleado->cargo = $_REQUEST['Cargo'];
        $empleado->area = $_REQUEST['Area'];
     
        $empleado->id_empleado > 0
                ? $this->model->Actualizar($empleado)
                : $this->model->Registrar($empleado);
                header('Location: index.php');
    
    }
    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}