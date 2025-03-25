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
                    VALUES (:doc, :nombre, :correo, :telefono, :password, :rol)";
            
            $hashedPassword = password_hash($ContraseñaUsuario, PASSWORD_DEFAULT);
            
            $statement = $this->dbConnection->prepare($sql);
            
            $statement->bindValue(':doc', $DocumentoUsuario);
            $statement->bindValue(':nombre', $NombreUsuario);
            $statement->bindValue(':correo', $CorreoUsuario);
            $statement->bindValue(':telefono', $TelefonoUsuario);
            $statement->bindValue(':password', $hashedPassword);
            $statement->bindValue(':rol', $FKidRol);
            
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

    public function getAll(): array {
        try {
            $sql = "SELECT u.*, r.Rol as NombreRol 
                    FROM $this->table u 
                    LEFT JOIN rol r ON u.FKidRol = r.idRol";
            return $this->dbConnection->query($sql)->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            // throw lanza una excepcion cuando ocurre un error, osea si falla genera PDOException
            throw new PDOException("Error al obtener usuarios: " . $e->getMessage());
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

    public function validateLogin($documento, $contraseña) {
        try {
            // Consulta SQL para obtener el usuario por documento
            $stmt = $this->dbConnection->prepare("SELECT * FROM usuario WHERE DocumentoUsuario = :documento");
            $stmt->bindParam(":documento", $documento);
            $stmt->execute();
    
            // Obtener el usuario
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Si el usuario existe y la contraseña es correcta
            if ($usuario && password_verify($contraseña, $usuario['ContraseñaUsuario'])) {
                return true; // Login exitoso
            }
    
            return false; // Login fallido
        } catch (PDOException $ex) {
            echo "Error al validar el login: " . $ex->getMessage();
            return false; // En caso de error, se retorna false
        }
    }
}