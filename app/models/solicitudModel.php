<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class SolicitudModel extends BaseModel {
    public function __construct(
        ?int $idSolicitud = null,
        ?string $Descripcion = null,
        ?string $FechaSolicitud = null,
        ?int $IdCliente = null,
        ?int $IdServicio = null,
        ?int $IdEstado = null
    ) {
        $this->table = "solicitud";
        parent::__construct();
    }

    public function getAll(): array {
        try {
            $sql = "SELECT s.*, c.NombreCliente, sv.Servicio, e.Estado 
                    FROM {$this->table} s
                    JOIN cliente c ON s.FKcliente = c.idCliente
                    JOIN tiposervicio ts ON s.FKtipoServicio = ts.idTipoServicio
                    JOIN servicio sv ON ts.FKidServicio = sv.idServicio
                    JOIN estado e ON s.FKestado = e.idEstado
                    ORDER BY s.FechaCreacion DESC";
            return $this->dbConnection->query($sql)->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new PDOException("Error al obtener solicitudes: " . $e->getMessage());
        }
    }

    public function saveSolicitud($Descripcion, $FechaSolicitud, $IdCliente, $IdServicio, $IdEstado) {
        try {
            $sql = "INSERT INTO {$this->table} 
                    (DescripcionNecesidad, FechaEvento, FechaCreacion, FKcliente, FKtipoServicio, FKestado, FKtipoEvento, FKusuario, MedioSolicitud) 
                    VALUES 
                    (:Descripcion, :FechaSolicitud, CURDATE(), :IdCliente, :IdServicio, :IdEstado, 1, 1, 'Web')";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":Descripcion", $Descripcion, PDO::PARAM_STR);
            $statement->bindParam(":FechaSolicitud", $FechaSolicitud, PDO::PARAM_STR);
            $statement->bindParam(":IdCliente", $IdCliente, PDO::PARAM_INT);
            $statement->bindParam(":IdServicio", $IdServicio, PDO::PARAM_INT);
            $statement->bindParam(":IdEstado", $IdEstado, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            throw new PDOException("Error al guardar la solicitud: " . $ex->getMessage());
        }
    }

    public function getSolicitud($id) {
        try {
            $sql = "SELECT s.*, c.NombreCliente, sv.Servicio, e.Estado, e.Descripcion as EstadoDescripcion 
                    FROM {$this->table} s
                    JOIN cliente c ON s.FKcliente = c.idCliente
                    JOIN tiposervicio ts ON s.FKtipoServicio = ts.idTipoServicio
                    JOIN servicio sv ON ts.FKidServicio = sv.idServicio
                    JOIN estado e ON s.FKestado = e.idEstado
                    WHERE s.idSolicitud = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            throw new PDOException("Error al obtener la solicitud: " . $ex->getMessage());
        }
    }

    public function editSolicitud($id, $Descripcion, $FechaSolicitud, $IdCliente, $IdServicio, $IdEstado) {
        try {
            $sql = "UPDATE {$this->table} 
                    SET DescripcionNecesidad = :Descripcion, 
                        FechaEvento = :FechaSolicitud, 
                        FKcliente = :IdCliente, 
                        FKtipoServicio = :IdServicio, 
                        FKestado = :IdEstado 
                    WHERE idSolicitud = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":Descripcion", $Descripcion, PDO::PARAM_STR);
            $statement->bindParam(":FechaSolicitud", $FechaSolicitud, PDO::PARAM_STR);
            $statement->bindParam(":IdCliente", $IdCliente, PDO::PARAM_INT);
            $statement->bindParam(":IdServicio", $IdServicio, PDO::PARAM_INT);
            $statement->bindParam(":IdEstado", $IdEstado, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            throw new PDOException("Error al editar la solicitud: " . $ex->getMessage());
        }
    }

    public function deleteSolicitud($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE idSolicitud = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            throw new PDOException("Error al eliminar la solicitud: " . $ex->getMessage());
        }
    }
}