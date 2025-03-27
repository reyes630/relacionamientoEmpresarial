<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use PDO;
use PDOException;

require_once "baseController.php";
require_once MAIN_APP_ROUTE . "../models/UsuarioModel.php";

class LoginController extends BaseController {
    public function __construct() {
        $this->layout = "login_layout";
    }

    public function initLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        $this->render("login/login.php");
    }

    public function validateLogin($documento, $contraseña) {
        // Add logic to validate login credentials
        // For example, query the database to check if the user exists
        $dsn = DRIVER . ":host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARTSET;
        $pdo = new \PDO($dsn, USERNAME_DB, PASSWORD_DB);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM usuario WHERE DocumentoUsuario = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$documento]);
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($usuario && $usuario['ContraseñaUsuario'] === $contraseña) {
            return $usuario;
        }
        return false;
    }

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $json = file_get_contents('php://input');
                $data = json_decode($json, true);
                
                $documento = trim($data['documento']);
                $contraseña = trim($data['contraseña']);

                $dsn = DRIVER . ":host=" . HOST . ";dbname=" . DATABASE . ";charset=" . CHARTSET;
                $pdo = new PDO($dsn, USERNAME_DB, PASSWORD_DB);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM usuario WHERE DocumentoUsuario = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$documento]);
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($usuario) {
                    if ($usuario['ContraseñaUsuario'] === $contraseña) {
                        $_SESSION['usuario_id'] = $usuario['idUsuario'];
                        $_SESSION['usuario_nombre'] = $usuario['NombreUsuario'];
                        $_SESSION['usuario_rol'] = $usuario['FKidRol'];
                        $_SESSION['last_activity'] = time();
                        
                        echo json_encode(['success' => true]);
                        exit();
                    } else {
                        echo json_encode(['success' => false, 'error' => 'La contraseña ingresada es incorrecta']);
                        exit();
                    }
                } else {
                    echo json_encode(['success' => false, 'error' => 'El usuario no existe en el sistema']);
                    exit();
                }
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'error' => 'Error de conexión: ' . $e->getMessage()]);
                exit();
            }
        }
    }

    public function logoutLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: /login/init");
        exit();
    }

    public function logout() {
        // Iniciar sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Destruir todas las variables de sesión
        $_SESSION = array();
        
        // Destruir la sesión
        session_destroy();
        
        // Redireccionar al login
        header('Location: /login/init');
        exit();
    }
}