<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\RolModel;
use PDO;

require_once "baseController.php";
require_once MAIN_APP_ROUTE . "../models/UsuarioModel.php";
require_once MAIN_APP_ROUTE . "../models/RolModel.php";
require_once MAIN_APP_ROUTE . "../models/SolicitudModel.php";


class UsuarioController extends BaseController
{
    public function __construct()
    {
        $this->layout = "admin_layout";
        parent::__construct();
    }

    public function bienvenida()
    {
        $this->render('usuario/indexBienvenida.php', ["titulo" => "Home"]);
    }

    public function HomeAdmin()
    {
        $this->render('usuario/indexAdministrador.php', ["titulo" => "Home Admin"]);
    }

    // combinar la lógica en una sola función
    public function Estadisticas()
    {
        $usuarioObj = new UsuarioModel();
        $totalUsuarios = $usuarioObj->countUsuarios(); // Obtener el total de usuarios

        // Obtener estadísticas de solicitudes:
        $solicitudObj = new \App\Models\SolicitudModel();
        $totalSolicitudesPendientes = $solicitudObj->getSolicitudesPendientes();
        $totalSolicitudesResueltas = $solicitudObj->getSolicitudesResueltas();
        $totalSolicitudesEnProceso = $solicitudObj->getSolicitudesEnProceso(); // Nueva línea

        $this->render('usuario/indexAdministrativo.php', [
            "titulo" => "Estadisticas",
            "totalUsuarios" => $totalUsuarios,
            "totalSolicitudesPendientes" => $totalSolicitudesPendientes,
            "totalSolicitudesResueltas" => $totalSolicitudesResueltas,
            "totalSolicitudesEnProceso" => $totalSolicitudesEnProceso // Nueva línea
        ]);
    }

    public function view()
    {
        $usuarioObj = new UsuarioModel();
        $usuarios = $usuarioObj->getAll();
        $data = [
            "titulo" => "Lista de Usuarios",
            "usuarios" => $usuarios
        ];
        $this->render('usuario/view.php', $data);
    }

    public function newUsuario()
    {
        $rolObj = new RolModel();
        $roles = $rolObj->getAll();
        $data = [
            "titulo" => "Nuevo Usuario",
            "roles" => $roles
        ];
        $this->render('usuario/new.php', $data);
    }

    public function createUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioObj = new UsuarioModel();
            $usuarioObj->saveUsuario(
                $_POST['DocumentoUsuario'],
                $_POST['NombreUsuario'],
                $_POST['CorreoUsuario'],
                $_POST['TelefonoUsuario'],
                password_hash($_POST['ContraseñaUsuario'], PASSWORD_DEFAULT),
                $_POST['FKidRol']
            );
            $this->redirectTo("usuario/view");
        }
    }

    public function viewUsuario($id)
    {
        $usuarioObj = new UsuarioModel();
        $usuario = $usuarioObj->getUsuario($id);
        $data = [
            "titulo" => "Ver Usuario",
            "usuario" => $usuario
        ];

        // Detectar si es una petición AJAX
        if (
            !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            // Renderiza solo el fragmento, sin layout
            $this->renderPartial("usuario/viewOne.php", $data);
        } else {
            // Renderiza con layout normalmente
            $this->render("usuario/viewOne.php", $data);
        }
    }

    public function editUsuario($id)
    {
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

    public function updateUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioObj = new UsuarioModel();
            $contraseña = isset($_POST['ContraseñaUsuario']) ? $_POST['ContraseñaUsuario'] : null;

            $usuarioObj->editUsuario(
                $_POST['idUsuario'],
                $_POST['DocumentoUsuario'],
                $_POST['NombreUsuario'],
                $_POST['CorreoUsuario'],
                $_POST['TelefonoUsuario'],
                $contraseña,
                $_POST['FKidRol']
            );
            $this->redirectTo("usuario/perfil");
        }
    }

    public function deleteUsuario($id)
    {
        $usuarioObj = new UsuarioModel();
        $usuarioObj->deleteUsuario($id);
        $this->redirectTo("usuario/view");
    }

    public function perfil()
    {
        $idUsuario = $_SESSION["idUsuario"];

        $usuarioObj = new UsuarioModel();
        $usuario = $usuarioObj->getUsuario($idUsuario);

        $data = [
            "titulo" => "Perfil Usuario",
            "usuario" => $usuario
        ];

        $this->render('usuario/usuarioPerfil.php', $data);
    }
}
