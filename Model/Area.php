<?php

class area
{
    private $pdo;

    public $id_area;
    public $nombre;

    public function __construct()
    {
        try {
            $this->pdo = Database::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar()
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
    public function Obtener($id_area)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM area WHERE id_area = ?");
            $stm->execute(array($id_area));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Eliminar($id_area)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM area WHERE id_area = ?");
            $stm->execute(array($id_area));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE area SET 
                        nombre    = ?, 
                    WHERE id_area = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->id_area
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar(area $data)
    {
        try {
            echo $sql = "INSERT INTO area (nombre) 
                    VALUES (?)"; 
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
