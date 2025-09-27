<?php

namespace App\Controllers;
use App\Models\SolicitudModel;
use App\Models\ClienteModel;
use App\Models\ServicioModel;
use App\Models\EstadoModel;
use App\Models\TipoServicioModel; // Importar el modelo para los tipos de servicio

require_once "baseController.php";
require_once MAIN_APP_ROUTE . "../models/SolicitudModel.php";
require_once MAIN_APP_ROUTE . "../models/ClienteModel.php";
require_once MAIN_APP_ROUTE . "../models/ServicioModel.php";
require_once MAIN_APP_ROUTE . "../models/EstadoModel.php";
require_once MAIN_APP_ROUTE . "../models/TipoServicioModel.php"; // Requerir el modelo para los tipos de servicio

class SolicitudController extends BaseController
{
    public function __construct()
    {
        // Se define la plantilla para este controlador
        $this->layout = "admin_layout";
        // Llamamos al constructor del padre
        parent::__construct();
    }

    public function index()
    {
        echo "<br>CONTROLLER> SolicitudController";
        echo "<br>ACTION> index";
    }
    public function SolicitudEstadisticas()
    {
        $this->render('solicitud/solicitudEstadisticas.php', ["titulo" => "Solicitudes Estadisticas"]);
    }


   
    // Este view verifica el rol del usuario y muestra las solicitudes correspondientes
    public function view()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $rol = $_SESSION['rol'] ?? null; // 1 = admin, 3 = funcionario, 4 = instructor
        $idUsuario = $_SESSION['idUsuario'] ?? null;

        $solicitudObj = new SolicitudModel();

        if ($rol == 1) {
            // Administrador: ver todas las solicitudes
            $solicitudes = $solicitudObj->getAll();
        } elseif ($rol == 3 || $rol == 4) {
            // Funcionario o Instructor: solo las asignadas a él
            $solicitudes = $solicitudObj->getByAsignacion($idUsuario);
        } else {
            $solicitudes = [];
        }

        $clienteObj = new ClienteModel();
        $clientes = $clienteObj->getAll();

        $servicioObj = new ServicioModel();
        $servicios = $servicioObj->getAll();

        $estadoObj = new EstadoModel();
        $estados = $estadoObj->getAll();

        $data = [
            "solicitudes" => $solicitudes,
            "clientes" => $clientes,
            "servicios" => $servicios,
            "estados" => $estados,
            "titulo" => "solicitudes"
        ];

        $this->render('solicitud/view.php', $data);
    }

    public function newSolicitud()
    {
        $clienteObj = new ClienteModel();
        $clientes = $clienteObj->getAll();

        $servicioObj = new ServicioModel();
        $servicios = $servicioObj->getAll();

        $estadoObj = new EstadoModel();
        $estados = $estadoObj->getAll();

        $data = [
            "clientes" => $clientes,
            "servicios" => $servicios,
            "estados" => $estados,
            "titulo" => "Nueva solicitud"
        ];
        $this->render('solicitud/new.php', $data);
    }

    public function createSolicitud()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clienteObj = new ClienteModel();
            $documento = $_POST['documento'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];

            // Verificar si el cliente existe o crear uno nuevo
            $cliente = $clienteObj->getClienteByDocumento($documento);
            if (!$cliente) {
                $idCliente = $clienteObj->saveCliente($documento, $nombre, $correo, $telefono);
            } else {
                $idCliente = $cliente->idCliente;
            }

            // Obtener el idUsuario de la sesión
            if (session_status() === PHP_SESSION_NONE) session_start();
            $idUsuario = $_SESSION['idUsuario'] ?? null;

            // Datos de la solicitud
            $descripcion = $_POST['descripcion'];
            $fechaEvento = $_POST['fecha_evento'];
            $idServicio = $_POST['servicio'];
            $idTipoServicio = $_POST['tipo_servicio']; // Nuevo campo
            $estado = $_POST['estado']; // Viene como 3 (Pendiente) por defecto
            $lugar = $_POST['lugar'] ?? null;
            $municipio = $_POST['municipio'] ?? null;

            $solicitudObj = new SolicitudModel();
            try {
                $solicitudObj->saveSolicitud(
                    $descripcion,
                    $fechaEvento,
                    $idCliente,
                    $idTipoServicio, // Guardar el tipo de servicio
                    $estado,
                    $idUsuario, // Pasar el usuario de la sesión
                    $lugar,
                    $municipio
                );
                $this->redirectTo("solicitud/view");
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function viewSolicitud($id)
    {
        $solicitudObj = new SolicitudModel();
        $solicitudInfo = $solicitudObj->getSolicitud($id);
        $data = [
            "solicitud" => $solicitudInfo,
            "titulo" => "Ver solicitud #" . $id
        ];
        $this->render("solicitud/viewOne.php", $data);
    }

    public function editSolicitud($id)
    {
        $solicitudObj = new SolicitudModel();
        $solicitudInfo = $solicitudObj->getSolicitud($id);

        $servicioObj = new ServicioModel();
        $servicios = $servicioObj->getAll();

        $tipoServicioObj = new TipoServicioModel();
        $tiposServicio = $tipoServicioObj->getAll();

        $estadoObj = new EstadoModel();
        $estados = $estadoObj->getAll();

        // Obtener usuarios
        require_once MAIN_APP_ROUTE . "../models/UsuarioModel.php";
        $usuarioObj = new \App\Models\UsuarioModel();
        $usuarios = $usuarioObj->getAll();

        // Filtrar solo usuarios con FKidRol 3 (Funcionario) o 4 (Instructor)
        $usuariosAsignables = array_filter($usuarios, function ($usuario) {
            return in_array($usuario->FKidRol, [3, 4]);
        });

        $data = [
            "solicitud" => $solicitudInfo,
            "servicios" => $servicios,
            "tiposServicio" => $tiposServicio,
            "estados" => $estados,
            "usuariosAsignables" => $usuariosAsignables, // Cambia aquí
            "titulo" => "Editar solicitud"
        ];
        $this->render("solicitud/edit.php", $data);
    }

    public function updateSolicitud()
    {
        if (isset($_POST["Descripcion"])) {
            try {
                $id = $_POST["idSolicitud"] ?? null;
                $descripcion = $_POST["Descripcion"] ?? null;
                $fechaSolicitud = $_POST["FechaSolicitud"] ?? null;
                $nombreCliente = $_POST["NombreCliente"] ?? null;
                $idTipoServicio = $_POST["IdTipoServicio"] ?? null;
                $idEstado = $_POST["IdEstado"] ?? null;
                $lugar = $_POST["Lugar"] ?? null;
                $municipio = $_POST["Municipio"] ?? null;
                $comentarios = $_POST["Comentarios"] ?? null;
                $observaciones = $_POST["Observaciones"] ?? null;
                $asignacion = $_POST["Asignacion"] ?? null; // Nueva línea para obtener la asignación

                // Primero obtenemos la solicitud actual para saber el ID del cliente
                $solicitudObj = new SolicitudModel();
                $solicitudActual = $solicitudObj->getSolicitud($id);

                if (!$solicitudActual) {
                    throw new \Exception("No se encontró la solicitud");
                }

                // Actualizamos el nombre del cliente usando el ID del cliente de la solicitud actual
                $clienteObj = new ClienteModel();
                $clienteObj->editCliente(
                    $solicitudActual->FKcliente, // ID del cliente actual
                    $solicitudActual->DocumentoCliente, // Mantener el documento actual
                    $nombreCliente, // Nuevo nombre
                    $solicitudActual->CorreoCliente, // Mantener el correo actual
                    $solicitudActual->TelefonoCliente // Mantener el teléfono actual
                );

                // Si el admin asigna un usuario, cambia el estado a "Asignado" (id 7)
                if ($asignacion) {
                    $idEstado = 7; // 7 es el idEstado para "Asignado" según tu tabla estado
                }

                // Actualizamos la solicitud manteniendo el mismo ID de cliente
                $solicitudObj->editSolicitud(
                    $id,
                    $descripcion,
                    $fechaSolicitud,
                    $solicitudActual->FKcliente, // Mantener el mismo ID del cliente
                    $idTipoServicio,
                    $idEstado,
                    $lugar,
                    $municipio,
                    $comentarios,
                    $observaciones,
                    $asignacion // Pasar la asignación
                );

                $this->redirectTo("solicitud/view");
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function deleteSolicitud($id)
    {
        $solicitudObj = new SolicitudModel();
        $solicitudObj->deleteSolicitud($id);
        $this->redirectTo("solicitud/view");
    }

    public function dashboard()
    {
    // Obtener total de solicitudes pendientes
    $solicitudObj = new SolicitudModel();
    $totalSolicitudesPendientes = $solicitudObj->getSolicitudesPendientes();
    
    $data = [
        "totalSolicitudesPendientes" => $totalSolicitudesPendientes,
        "titulo" => "Dashboard Administrativo"
    ];
    
    $this->render('admin/indexAdministrativo.php', $data);
    }
    public function archivadas() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $rol = $_SESSION['rol'] ?? null;
        $idUsuario = $_SESSION['idUsuario'] ?? null;

        $solicitudModel = new \App\Models\SolicitudModel();

        if ($rol == 1) {
            // Administrador: ver todas las archivadas
            $solicitudes = $solicitudModel->getArchivadas();
        } elseif ($rol == 3 || $rol == 4) {
            // Instructor o Funcionario: solo las archivadas asignadas a él
            $solicitudes = $solicitudModel->getArchivadasByAsignacion($idUsuario);
        } else {
            $solicitudes = [];
        }

        // Puedes cargar los demás datos igual que en view()
        $clienteObj = new \App\Models\ClienteModel();
        $clientes = $clienteObj->getAll();

        $servicioObj = new \App\Models\ServicioModel();
        $servicios = $servicioObj->getAll();

        $estadoObj = new \App\Models\EstadoModel();
        $estados = $estadoObj->getAll();

        $data = [
            "solicitudes" => $solicitudes,
            "clientes" => $clientes,
            "servicios" => $servicios,
            "estados" => $estados,
            "titulo" => "Solicitudes Archivadas"
        ];

        // Reutiliza la vista view.php
        $this->render('solicitud/view.php', $data);
    }

    public function archivarSolicitud($idSolicitud) {
        header('Content-Type: application/json');
        try {
            $solicitudModel = new \App\Models\SolicitudModel();
            $success = $solicitudModel->archivar($idSolicitud); // Solo marca como archivada
            if ($success) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'No se pudo archivar']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
        exit;
    }
    
    public function desarchivarSolicitud($idSolicitud) {
        header('Content-Type: application/json');
        try {
            $solicitudModel = new \App\Models\SolicitudModel();
            $success = $solicitudModel->desarchivar($idSolicitud);
            if ($success) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'No se pudo desarchivar']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
        exit;
    }

    public function solicitudesPorEstadoAPI()
    {
        header('Content-Type: application/json');
        $solicitudObj = new \App\Models\SolicitudModel();
        $data = $solicitudObj->getSolicitudesPorEstado();
        echo json_encode($data);
        exit;
    }
  

    
    public function serviciosMasSolicitadosAPI() {
        header('Content-Type: application/json');
        try {
            $solicitudObj = new \App\Models\SolicitudModel();
            $data = $solicitudObj->getServiciosMasSolicitados();
            echo json_encode($data);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
        exit;
    }
    public function solicitudesPorMesAPI() {
        header('Content-Type: application/json');
        try {
            $solicitudObj = new \App\Models\SolicitudModel();
            $data = $solicitudObj->getSolicitudesPorMes();
            
            // Convertir números de mes a nombres
            $meses = [
                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
                4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
                7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
                10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
            ];
            
            $formattedData = [];
            foreach ($data as $row) {
                $formattedData[] = [
                    'mes' => $meses[$row['mes']],
                    'en_proceso' => (int)$row['en_proceso'],
                    'ejecutadas' => (int)$row['ejecutadas']
                ];
            }
            
            echo json_encode($formattedData);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
        exit;
    }
    public function municipiosMasSolicitudesAPI() {
        header('Content-Type: application/json');
        try {
            $solicitudObj = new \App\Models\SolicitudModel();
            $data = $solicitudObj->getMunicipiosMasSolicitudes();
            echo json_encode($data);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
        exit;
    }
}

