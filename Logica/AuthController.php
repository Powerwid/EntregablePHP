<?php
// Definir la raíz del proyecto
$root = dirname(__DIR__) . '/';
require_once $root . 'Datos/DB.php';
require_once $root . 'Entidades/Usuario.php';
require_once $root . 'Utils/Auth.php';

class AuthController {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $conn = $this->db->conectar();
            $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE correo = ?");
            $stmt->execute([$correo]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                Auth::iniciarSesion($usuario['id_usuario'], $usuario['correo'], $usuario['rol']);
                header("Location: " . BASE_URL . "?controller=Auth&action=dashboard");
                exit();
            } else {
                $error = "Correo o contrasena incorrectos.";
                require_once 'login.php';
            }
        } else {
            require_once 'login.php';
        }
    }

    public function logout() {
        Auth::cerrarSesion();
    }

    public function dashboard() {
        Auth::verificarSesion();
        require_once 'dashboard.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'] ?? '';
            $contrasena = password_hash($_POST['contrasena'] ?? '', PASSWORD_DEFAULT);
            $nombre = $_POST['nombre'] ?? '';
            $apellido = $_POST['apellido'] ?? '';
            $rol = $_POST['rol'] ?? 'empleado';

            try {
                $conn = $this->db->conectar();
                // Verificar si el correo ya existe
                $stmt = $conn->prepare("SELECT COUNT(*) FROM Usuarios WHERE correo = ?");
                $stmt->execute([$correo]);
                $existe = $stmt->fetchColumn();

                if ($existe > 0) {
                    $error = "Ese correo ya está en uso.";
                    require_once 'login.php';
                    return;
                }

                // Si no existe, guardar el usuario
                $stmt = $conn->prepare("CALL guardar_usuario(?, ?, ?, ?, ?)");
                $stmt->execute([$correo, $contrasena, $nombre, $apellido, $rol]);
                header("Location: " . BASE_URL . "?controller=Auth&action=login");
                exit();
            } catch (PDOException $e) {
                $error = "Error al registrar usuario: " . $e->getMessage();
                require_once 'login.php';
            }
        } else {
            require_once 'login.php';
        }
    }
}

?>