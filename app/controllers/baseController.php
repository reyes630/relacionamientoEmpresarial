<?php
namespace App\Controllers;

session_start();

use ValueError;

class BaseController {
    protected string $layout = "main_layout";

    public function __construct() {
        // Validar el tiempo de inactividad de un usuario
        if (isset($_SESSION["timeOut"])) {
            // Se calcula el tiempo de sesión transcurrido
            $tiempoSesion = time() - $_SESSION["timeOut"];
            if ($tiempoSesion > INACTIVE_TIME * 60) {
                // Se destruye la sesión por inactividad
                session_destroy();
                header("Location: /login/login");
                exit();
            } else {
                // Se actualiza el tiempo de sesión
                $_SESSION["timeOut"] = time();
            }
        }
    }

    public function render(string $view, array $arrayData = null) {
        if (isset($arrayData) && is_array($arrayData)) {
            foreach ($arrayData as $key => $value) {
                $$key = $value;
            }
        }
        $content = MAIN_APP_ROUTE . "../views/$view";
        $layout = MAIN_APP_ROUTE . "../views/layouts/{$this->layout}.php";
        include_once $layout;
    }

    public function formatNumber($number) {
        // Formatear número con separador de miles y decimales
        return number_format($number, 2, ',', '.');
    }

    public function redirectTo($view) {
        header("Location: /$view");
        exit();
    }

    // Conexión a la base de datos (usando PDO)
    protected function dbConnect() {
        try {
            $dsn = "mysql:host=localhost;dbname=relacionamientoempresarial;charset=utf8mb4";
            $username = "root";
            $password = "";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            ];
            return new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    protected function verificarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: /login');
            exit();
        }
    }
}
