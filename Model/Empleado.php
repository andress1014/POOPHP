<?php

class empleado
{
    private $pdo;

    public $id_empleado;
    public $nombre;
    public $correo;
    public $cargo;
    public $area;
    public function __construct()
    {
        try {
            $this->pdo = Database::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT empleado.id_empleado, empleado.nombre as nombre, empleado.correo, cargo.nombre as cargo, area.nombre as area FROM empleado 
            LEFT JOIN cargo ON empleado.cargo = cargo.id_cargo 
            LEFT JOIN area ON empleado.area = area.id_area");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ListarArea()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM area");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ListarCargo()
    {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM cargo");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     public function Obtener($id_empleado)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM empleado WHERE id_empleado = ?");
            $stm->execute(array($id_empleado));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Eliminar($id_empleado)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM empleado WHERE id_empleado = ?");
            $stm->execute(array($id_empleado));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try {
           $sql = "UPDATE empleado SET 
                        nombre          = ?, 
                        correo          = ?,
                        cargo           = ?,
                        area            = ?
                    WHERE id_empleado = ?"; 
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->correo,
                        $data->cargo,
                        $data->area,
                        $data->id_empleado
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar(empleado $data)
    {
        try {
            $sql = "INSERT INTO empleado (nombre, correo, cargo, area) 
                    VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->correo,
                        $data->cargo,
                        $data->area
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
