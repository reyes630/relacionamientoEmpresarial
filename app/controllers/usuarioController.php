<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use App\Models\RolModel;
use PDO;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/UsuarioModel.php";
require_once MAIN_APP_ROUTE."../models/RolModel.php";

class UsuarioController extends BaseController {
    public function __construct() {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function index() {
        $this->view();
    }
    public function view() {
        $usuarioObj = new UsuarioModel();
        $usuarios = $usuarioObj->getAll();
        $data = [
            "titulo" => "Lista de Usuarios",
            "usuarios" => $usuarios
        ];
        $this->render('usuario/view.php', $data);
    }

    public function newUsuario() {
        $rolObj = new RolModel();
        $roles = $rolObj->getAll();
        $data = [
            "titulo" => "Nuevo Usuario",
            "roles" => $roles
        ];
        $this->render('usuario/new.php', $data);
    }

    public function createUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioObj = new UsuarioModel();
            $usuarioObj->saveUsuario(
                $_POST['DocumentoUsuario'],
                $_POST['NombreUsuario'],
                $_POST['CorreoUsuario'],
                $_POST['TelefonoUsuario'],
                $_POST['ContraseñaUsuario'],
                $_POST['FKidRol']
            );
            $this->redirectTo("usuario/view");
        }
    }

    public function viewUsuario($id) {
        $usuarioObj = new UsuarioModel();
        $usuario = $usuarioObj->getUsuario($id);
        $data = [
            "titulo" => "Ver Usuario",
            "usuario" => $usuario
        ];
        $this->render("usuario/viewOne.php", $data);
    }

    public function editUsuario($id) {
        $usuarioObj = new UsuarioModel();
        $rolObj = new RolModel();
        $usuario = $usuarioObj->getUsuario($id);
        $roles = $rolObj->getAll();
        $data = [
            "titulo" => "Editar Usuario",
            "usuario" => $usuario,
            "roles" => $roles
        ];
        $this->render("usuario/edit.php", $data);
    }

    public function updateUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioObj = new UsuarioModel();
            $usuarioObj->editUsuario(
                $_POST['idUsuario'],
                $_POST['DocumentoUsuario'],
                $_POST['NombreUsuario'],
                $_POST['CorreoUsuario'],
                $_POST['TelefonoUsuario'],
                $_POST['ContraseñaUsuario'] ?? null,
                $_POST['FKidRol']
            );
            $this->redirectTo("usuario/view");
        }
    }

    public function deleteUsuario($id) {
        $usuarioObj = new UsuarioModel();
        $usuarioObj->deleteUsuario($id);
        $this->redirectTo("usuario/view");
    }

    
}