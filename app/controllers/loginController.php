<?php
namespace App\Controllers;
use App\models\UsuarioModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/UsuarioModel.php";


class LoginController extends BaseController{

    public function __construct() {
        $this->layout = "login_layout";
    }
    public function initLogin(){
        if (isset($_POST["txtUser"]) && isset($_POST["txtPassword"])) {
            $user = trim($_POST["txtUser"]) ?? null;
            $password = trim($_POST["txtPassword"]) ?? null;
            //var_dump($user, $password);

            if ($user != null && $password != null) {
                //se valida la existencia del usuario y contraseña en la BD
                $loginObj = new UsuarioModel();
                $resp = $loginObj->validarLogin($user, $password);
                if ($resp) {
                    $userRole = $_SESSION['rol'];
                    
                    // Role-based redirection
                    switch ($userRole) {
                        case 1: //Administrador
                            $this->redirectTo("usuario/indexAdministrador");
                            break;
                        case 2://Administrativo
                            $this->redirectTo("usuario/indexAdministrativo");
                            break;
                        case 3: //Funcionario
                            $this->redirectTo("usuario/indexBienvenida");
                            break;
                        default: //Instructor
                            $this->redirectTo("usuario/indexBienvenida");
                    }
                    exit();
                }else{
                    $errors = "El usuario y/o contraseña son incorrectos";

                }
            }else{
                $errors = "El usuario y/o contraseña no pueden ser vacíos";
            }
            $data = [
                "errors" => $errors,
            ];
            $this->render("login/login.php", $data);
        }else{
            //Se renderiza el formulario del login
            $this->render("login/login.php");
        }

    }

    public function logoutLogin(){
        session_destroy();
        header("Location: /login/init");
    }
}