<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE . "../models/UsuarioModel.php";

class LoginController extends BaseController {
    public function __construct() {
        $this->layout = "login_layout";
    }

    public function initLogin() {
        session_destroy();
        $this->render("login/login.php");
    }

    public function validateLogin($documento, $contraseña) {
        // Crear el objeto del modelo Usuario
        $usuarioModel = new UsuarioModel();
        
        // Validar el login usando documento y contraseña
        $resp = $usuarioModel->validateLogin($documento, $contraseña);
        return $resp;
    }

    public function handleLogin() {
        // Iniciar sesión al inicio
        session_start();

        if (isset($_POST["documento"]) && isset($_POST["contraseña"])) {
            $documento = $_POST["documento"] ?? null;
            $contraseña = $_POST["contraseña"] ?? null;

            // Validar que los campos no estén vacíos
            if ($documento != null && $contraseña != null) {
                // Validar login con documento y contraseña
                $resp = $this->validateLogin($documento, $contraseña);
                
                if ($resp) {
                    // Si la validación es exitosa, guardar la sesión
                    $_SESSION['usuario'] = $documento;  // Guardar el documento como el identificador del usuario en la sesión
                    $this->redirectTo("usuario/view");  // Redirigir al controlador principal
                } else {
                    $errors = "Documento y/o contraseña incorrectos";
                }
            } else {
                $errors = "Documento y/o contraseña no pueden ser vacíos";
            }

            // Pasar errores y renderizar la vista de login
            $data = [
                "errors" => $errors
            ];
            $this->render("login/login.php", $data);
        } else {
            $this->render("login/login.php");
        }
    }

    public function logoutLogin() {
        session_start();
        session_destroy();
        header("Location: /login/init"); // Redirigir a la página de login
        exit(); // Salir para evitar que el código continúe ejecutándose
    }
}
