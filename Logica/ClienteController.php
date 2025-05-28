<?php
$root = dirname(__DIR__) . '/';
require_once $root . 'Datos/DB.php';
require_once $root . 'Entidades/Cliente.php';

class ClienteController {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function listar() {
        try {
            $conn = $this->db->conectar();
            $stmt = $conn->query("SELECT * FROM Clientes");
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes; // Devolver el array en lugar de imprimirlo
        } catch (Exception $e) {
            echo "Error al listar clientes: " . $e->getMessage();
            return [];
        }
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $cliente = new Cliente();
                $nombre_empresa = trim($_POST['nombre_empresa'] ?? '');
                $correo = trim($_POST['correo'] ?? '');
                $telefono = trim($_POST['telefono'] ?? '');
                $direccion = trim($_POST['direccion'] ?? '');
                $fecha_creacion = trim($_POST['fecha_creacion'] ?? date('Y-m-d H:i:s'));

                if (empty($nombre_empresa) || empty($correo)) {
                    throw new Exception("El nombre de la empresa y el correo son obligatorios.");
                }
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("El correo no es válido.");
                }

                $cliente->setId_cliente($_POST['id_cliente'] ?? null);
                $cliente->setNombre_empresa($nombre_empresa);
                $cliente->setCorreo($correo);
                $cliente->setTelefono($telefono);
                $cliente->setDireccion($direccion);
                $cliente->setFecha_creacion($fecha_creacion);

                $conn = $this->db->conectar();
                $stmt = $conn->prepare("CALL guardar_cliente(?, ?, ?, ?)");
                $stmt->execute([
                    $cliente->getNombre_empresa(),
                    $cliente->getCorreo(),
                    $cliente->getTelefono(),
                    $cliente->getDireccion()
                ]);
                header("Location: " . BASE_URL . "?controller=Cliente&action=listar");
                exit();
            } catch (Exception $e) {
                echo "Error al guardar cliente: " . $e->getMessage();
            }
        }
    }

    public function modificar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id_cliente = $_POST['id_cliente'] ?? null;
                if (!$id_cliente) {
                    throw new Exception("ID de cliente no proporcionado.");
                }

                $cliente = new Cliente();
                $nombre_empresa = trim($_POST['nombre_empresa'] ?? '');
                $correo = trim($_POST['correo'] ?? '');
                $telefono = trim($_POST['telefono'] ?? '');
                $direccion = trim($_POST['direccion'] ?? '');
                $fecha_creacion = trim($_POST['fecha_creacion'] ?? date('Y-m-d H:i:s'));

                if (empty($nombre_empresa) || empty($correo)) {
                    throw new Exception("El nombre de la empresa y el correo son obligatorios.");
                }
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("El correo no es válido.");
                }

                $cliente->setId_cliente($id_cliente);
                $cliente->setNombre_empresa($nombre_empresa);
                $cliente->setCorreo($correo);
                $cliente->setTelefono($telefono);
                $cliente->setDireccion($direccion);
                $cliente->setFecha_creacion($fecha_creacion);

                $conn = $this->db->conectar();
                $stmt = $conn->prepare("CALL modificar_cliente(?, ?, ?, ?, ?)");
                $stmt->execute([
                    $cliente->getId_cliente(),
                    $cliente->getNombre_empresa(),
                    $cliente->getCorreo(),
                    $cliente->getTelefono(),
                    $cliente->getDireccion()
                ]);
                header("Location: " . BASE_URL . "?controller=Cliente&action=listar");
                exit();
            } catch (Exception $e) {
                echo "Error al modificar cliente: " . $e->getMessage();
            }
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id_cliente = $_POST['id_cliente'] ?? null;
                if (!$id_cliente) {
                    throw new Exception("ID de cliente no proporcionado.");
                }

                $conn = $this->db->conectar();
                $stmt = $conn->prepare("CALL eliminar_cliente(?)");
                $stmt->execute([$id_cliente]);
                header("Location: " . BASE_URL . "?controller=Cliente&action=listar");
                exit();
            } catch (Exception $e) {
                echo "Error al eliminar cliente: " . $e->getMessage();
            }
        }
    }
}

?>