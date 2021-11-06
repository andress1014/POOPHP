<?php
require_once 'Model/database.php';

//Index---------------------------------------------------------
if (!isset($_REQUEST['c']) && !isset($_REQUEST['r'])) {
    require_once 'Controller/empleadoController.php';
    $controller = 'EmpleadoController';
    $controller = new $controller;
    $controller->Index();
} else {
    //Empleaos-----------------------------------------------------
    // Todo esta lógica hara el papel de un FrontController
    if (isset($_REQUEST['c']) && $_REQUEST['c'] === 'empleado') {
        require_once 'Controller/empleadoController.php';
        $controller = 'EmpleadoController';
        $controller = new $controller;
        $controller->Index();
    }
    if (isset($_REQUEST['c']) && $_REQUEST['c'] === 'emplea') {
        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instanciamos el controlador
        require_once "Controller/empleadoController.php";
        $controller = 'EmpleadoController';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
    }
    //Area---------------------------------------------------------------

    if (isset($_REQUEST['r']) && $_REQUEST['r'] === 'area') {
        require_once 'Controller/areaController.php';
        $controller = 'AreaController';
        $controller = new $controller;
        $controller->IndexArea();
    } else { // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['r']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'IndexArea';

        // Instanciamos el controlador
        require_once "Controller/areaController.php";
        $controller = 'AreaController';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
    }
}
