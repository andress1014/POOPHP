<?php
class cargo
{
    private $pdo;

    public $id_cargo;
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

            $stm = $this->pdo->prepare("SELECT * FROM cargo");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Obtener($id_cargo)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM cargo WHERE id_cargo = ?");
            $stm->execute(array($id_cargo));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Eliminar($id_cargo)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM cargo WHERE id_cargo = ?");
            $stm->execute(array($id_cargo));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE cargo SET
                        nombre = ?
                        WHERE id_cargo = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->id_cargo
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar(cargo $data)
    {
        try {
            $sql = "INSERT INTO cargo (nombre)
                    VALUES (?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
