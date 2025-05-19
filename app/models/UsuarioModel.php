<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class UsuarioModel extends BaseModel {
    public function __construct(
        ?int $idUsuario = null,
        ?string $DocumentoUsuario = null,
        ?string $NombreUsuario = null,
        ?string $CorreoUsuario = null,
        ?string $TelefonoUsuario = null,
        ?string $ContraseñaUsuario = null,
        ?int $FKidRol = null
    ) {
        $this->table = "usuario";
        parent::__construct();
    }

    

    public function saveUsuario($DocumentoUsuario, $NombreUsuario, $CorreoUsuario, $TelefonoUsuario, $ContraseñaUsuario, $FKidRol) {
        try {
            $sql = "INSERT INTO usuario (DocumentoUsuario, NombreUsuario, CorreoUsuario, TelefonoUsuario, ContraseñaUsuario, FKidRol) 
                    VALUES (:doc, :nombre, :correo, :telefono, :pass, :rol)";
            
            $statement = $this->dbConnection->prepare($sql);
            
            $statement->bindParam(':doc', $DocumentoUsuario);
            $statement->bindParam(':nombre', $NombreUsuario);
            $statement->bindParam(':correo', $CorreoUsuario);
            $statement->bindParam(':telefono', $TelefonoUsuario);
            $statement->bindParam(':pass', $ContraseñaUsuario);
            $statement->bindParam(':rol', $FKidRol);
            
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el usuario: " . $ex->getMessage();
        }
    }

    public function getUsuario($id) {
        try {
            $sql = "SELECT u.*, r.Rol as NombreRol 
                    FROM $this->table u 
                    LEFT JOIN rol r ON u.FKidRol = r.idRol 
                    WHERE u.idUsuario = :id";
                    
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "Error al obtener usuario: " . $ex->getMessage();
        }
    }

    public function editUsuario($id, $DocumentoUsuario, $NombreUsuario, $CorreoUsuario, $TelefonoUsuario, $ContraseñaUsuario = null, $FKidRol) {
        try {
            if ($ContraseñaUsuario) {
                $sql = "UPDATE $this->table 
                        SET DocumentoUsuario=:DocumentoUsuario, 
                            NombreUsuario=:NombreUsuario, 
                            CorreoUsuario=:CorreoUsuario, 
                            TelefonoUsuario=:TelefonoUsuario, 
                            ContraseñaUsuario=:ContraseñaUsuario, 
                            FKidRol=:FKidRol 
                        WHERE idUsuario=:id";
            } else {
                $sql = "UPDATE $this->table 
                        SET DocumentoUsuario=:DocumentoUsuario, 
                            NombreUsuario=:NombreUsuario, 
                            CorreoUsuario=:CorreoUsuario, 
                            TelefonoUsuario=:TelefonoUsuario, 
                            FKidRol=:FKidRol 
                        WHERE idUsuario=:id";
            }
            
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":DocumentoUsuario", $DocumentoUsuario, PDO::PARAM_STR);
            $statement->bindParam(":NombreUsuario", $NombreUsuario, PDO::PARAM_STR);
            $statement->bindParam(":CorreoUsuario", $CorreoUsuario, PDO::PARAM_STR);
            $statement->bindParam(":TelefonoUsuario", $TelefonoUsuario, PDO::PARAM_STR);
            $statement->bindParam(":FKidRol", $FKidRol, PDO::PARAM_INT);
            
            if ($ContraseñaUsuario) {
                $hashedPassword = password_hash($ContraseñaUsuario, PASSWORD_DEFAULT);
                $statement->bindParam(":ContraseñaUsuario", $hashedPassword, PDO::PARAM_STR);
            }
            
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al editar usuario: " . $ex->getMessage();
        }
    }


    public function deleteUsuario($id) {
        try {
            $sql = "DELETE FROM $this->table WHERE idUsuario = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al eliminar usuario: " . $ex->getMessage();
        }
    }
    public function validarLogin($CorreoUsuario, $ContraseñaUsuario){ //Contraseña que llega del formulario
        $sql = "SELECT * FROM $this->table WHERE CorreoUsuario=:CorreoUsuario";
        $statement = $this->dbConnection->prepare($sql);
        $statement->bindParam(":CorreoUsuario", $CorreoUsuario);
        $statement->execute();
        $resultSet = [];
        while($row = $statement->fetch(PDO::FETCH_OBJ)){
            $resultSet[] = $row;
        }
        if (count($resultSet) > 0) {
            $hash = $resultSet[0]->ContraseñaUsuario; // hash guardado en la base de datos
            if (password_verify($ContraseñaUsuario, $hash)) {
                // La contraseña ingresada es correcta
                $_SESSION["idUsuario"] = $resultSet[0]->idUsuario;
                $_SESSION["nombre"] = $resultSet[0]->NombreUsuario;
                $_SESSION["documento"] = $resultSet[0]->DocumentoUsuario;
                $_SESSION["telefono"] = $resultSet[0]->TelefonoUsuario;
                $_SESSION["correo"] = $resultSet[0]->CorreoUsuario;
                $_SESSION["rol"] = $resultSet[0]->FKidRol;
                $_SESSION["timeOut"] = time();
                session_regenerate_id();
                return $resultSet[0];
            }
        }
        return false;
    }
   
}