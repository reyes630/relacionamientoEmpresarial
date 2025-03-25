<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class SolicitudModel extends BaseModel{
    public function __construct(
        ?int $idSolicitud = null,
        ?string $Descripcion = null,
        ?string $FechaSolicitud = null,
        ?int $IdCliente = null,
        ?int $IdServicio = null,
        ?int $IdEstado = null
    ) {
        $this->table = "solicitud";
        // Se llama al constructor del padre
        parent::__construct();
    }

    public function saveSolicitud($Descripcion, $FechaSolicitud, $IdCliente, $IdServicio, $IdEstado){
        try {
            $sql = "INSERT INTO {$this->table} (Descripcion, FechaSolicitud, IdCliente, IdServicio, IdEstado) 
                    VALUES (:Descripcion, :FechaSolicitud, :IdCliente, :IdServicio, :IdEstado)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":Descripcion", $Descripcion, PDO::PARAM_STR);
            $statement->bindParam(":FechaSolicitud", $FechaSolicitud, PDO::PARAM_STR);
            $statement->bindParam(":IdCliente", $IdCliente, PDO::PARAM_INT);
            $statement->bindParam(":IdServicio", $IdServicio, PDO::PARAM_INT);
            $statement->bindParam(":IdEstado", $IdEstado, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la solicitud: " . $ex->getMessage();
        }
    }

    public function getSolicitud($id){
        try {
            $sql = "SELECT s.*, c.NombreCliente, sv.NombreServicio, e.NombreEstado 
                    FROM {$this->table} s
                    JOIN cliente c ON s.IdCliente = c.idCliente
                    JOIN servicio sv ON s.IdServicio = sv.idServicio
                    JOIN estado e ON s.IdEstado = e.idEstado
                    WHERE s.idSolicitud = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la solicitud: " . $ex->getMessage();
        }
    }

    

    public function editSolicitud($id, $Descripcion, $FechaSolicitud, $IdCliente, $IdServicio, $IdEstado){
        try {
            $sql = "UPDATE {$this->table} 
                    SET Descripcion = :Descripcion, FechaSolicitud = :FechaSolicitud, 
                        IdCliente = :IdCliente, IdServicio = :IdServicio, IdEstado = :IdEstado 
                    WHERE idSolicitud = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":Descripcion", $Descripcion, PDO::PARAM_STR);
            $statement->bindParam(":FechaSolicitud", $FechaSolicitud, PDO::PARAM_STR);
            $statement->bindParam(":IdCliente", $IdCliente, PDO::PARAM_INT);
            $statement->bindParam(":IdServicio", $IdServicio, PDO::PARAM_INT);
            $statement->bindParam(":IdEstado", $IdEstado, PDO::PARAM_INT);
            $statement->execute();
            return true;
        } catch (PDOException $ex) {
            echo "Error al editar la solicitud: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteSolicitud($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE idSolicitud = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al eliminar la solicitud: " . $ex->getMessage();
        }
    }
}
?>
