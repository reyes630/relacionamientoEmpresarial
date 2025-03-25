<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class ClienteModel extends BaseModel{
    public function __construct(
        ?int $idCliente = null,
        ?string $DocumentoCliente = null,
        ?string $NombreCliente = null,
        ?string $CorreoCliente = null,
        ?string $TelefonoCliente = null
    )
    {
        $this->table = "cliente";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveCliente($DocumentoCliente, $NombreCliente, $CorreoCliente, $TelefonoCliente){
        try {
            $sql = "INSERT INTO $this->table (DocumentoCliente, NombreCliente, CorreoCliente, TelefonoCliente) VALUES (:DocumentoCliente, :NombreCliente, :CorreoCliente, :TelefonoCliente)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":DocumentoCliente", $DocumentoCliente, PDO::PARAM_STR);
            $statement->bindParam(":NombreCliente", $NombreCliente, PDO::PARAM_STR);
            $statement->bindParam(":CorreoCliente", $CorreoCliente, PDO::PARAM_STR);
            $statement->bindParam(":TelefonoCliente", $TelefonoCliente, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el cliente: ".$ex->getMessage();
        }
    }

    public function getCliente($id){
        try {
            $sql = "SELECT * FROM $this->table WHERE idCliente = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener cliente: ".$ex->getMessage();
        }
    }

    public function editCliente($id, $DocumentoCliente, $NombreCliente, $CorreoCliente, $TelefonoCliente){
        try {
            $sql = "UPDATE {$this->table} SET DocumentoCliente=:DocumentoCliente, NombreCliente=:NombreCliente, CorreoCliente=:CorreoCliente, TelefonoCliente=:TelefonoCliente WHERE idCliente=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":DocumentoCliente", $DocumentoCliente, PDO::PARAM_STR);
            $statement->bindParam(":NombreCliente", $NombreCliente, PDO::PARAM_STR);
            $statement->bindParam(":CorreoCliente", $CorreoCliente, PDO::PARAM_STR);
            $statement->bindParam(":TelefonoCliente", $TelefonoCliente, PDO::PARAM_STR);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el cliente";
        }
    }

    public function deleteCliente($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE idCliente=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el cliente";
        }
    }
}