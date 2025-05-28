<?php
$root = dirname(__DIR__) . '/';
require_once $root . 'Datos/DB.php';
require_once $root . 'Entidades/Proyecto.php';

class ProyectoController {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function listar() {
        try {
            $conn = $this->db->conectar();
            $stmt = $conn->query("SELECT * FROM Proyectos");
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $proyectos; // Devolver el array en lugar de imprimirlo
        } catch (Exception $e) {
            echo "Error al listar proyectos: " . $e->getMessage();
            return [];
        }
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $proyecto = new Proyecto();
                $id_cliente = trim($_POST['id_cliente'] ?? '');
                $nombre_proyecto = trim($_POST['nombre_proyecto'] ?? '');
                $descripcion = trim($_POST['descripcion'] ?? '');
                $fecha_inicio = trim($_POST['fecha_inicio'] ?? date('Y-m-d'));
                $fecha_fin = trim($_POST['fecha_fin'] ?? null);
                $estado = trim($_POST['estado'] ?? 'pendiente');
                $fecha_creacion = trim($_POST['fecha_creacion'] ?? date('Y-m-d H:i:s'));

                if (empty($id_cliente) || empty($nombre_proyecto)) {
                    throw new Exception("El ID del cliente y el nombre del proyecto son obligatorios.");
                }
                if (!in_array($estado, ['pendiente', 'en_progreso', 'completado'])) {
                    throw new Exception("Estado no válido.");
                }

                $proyecto->setId_proyecto($_POST['id_proyecto'] ?? null);
                $proyecto->setId_cliente($id_cliente);
                $proyecto->setNombre_proyecto($nombre_proyecto);
                $proyecto->setDescripcion($descripcion);
                $proyecto->setFecha_inicio($fecha_inicio);
                $proyecto->setFecha_fin($fecha_fin);
                $proyecto->setEstado($estado);
                $proyecto->setFecha_creacion($fecha_creacion);

                $conn = $this->db->conectar();
                $stmt = $conn->prepare("CALL guardar_proyecto(?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $proyecto->getId_cliente(),
                    $proyecto->getNombre_proyecto(),
                    $proyecto->getDescripcion(),
                    $proyecto->getFecha_inicio(),
                    $proyecto->getFecha_fin(),
                    $proyecto->getEstado()
                ]);
                header("Location: " . BASE_URL . "?controller=Proyecto&action=listar");
                exit();
            } catch (Exception $e) {
                echo "Error al guardar proyecto: " . $e->getMessage();
            }
        }
    }

    public function modificar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id_proyecto = $_POST['id_proyecto'] ?? null;
                if (!$id_proyecto) {
                    throw new Exception("ID de proyecto no proporcionado.");
                }

                $proyecto = new Proyecto();
                $id_cliente = trim($_POST['id_cliente'] ?? '');
                $nombre_proyecto = trim($_POST['nombre_proyecto'] ?? '');
                $descripcion = trim($_POST['descripcion'] ?? '');
                $fecha_inicio = trim($_POST['fecha_inicio'] ?? date('Y-m-d'));
                $fecha_fin = trim($_POST['fecha_fin'] ?? null);
                $estado = trim($_POST['estado'] ?? 'pendiente');
                $fecha_creacion = trim($_POST['fecha_creacion'] ?? date('Y-m-d H:i:s'));

                if (empty($id_cliente) || empty($nombre_proyecto)) {
                    throw new Exception("El ID del cliente y el nombre del proyecto son obligatorios.");
                }
                if (!in_array($estado, ['pendiente', 'en_progreso', 'completado'])) {
                    throw new Exception("Estado no válido.");
                }

                $proyecto->setId_proyecto($id_proyecto);
                $proyecto->setId_cliente($id_cliente);
                $proyecto->setNombre_proyecto($nombre_proyecto);
                $proyecto->setDescripcion($descripcion);
                $proyecto->setFecha_inicio($fecha_inicio);
                $proyecto->setFecha_fin($fecha_fin);
                $proyecto->setEstado($estado);
                $proyecto->setFecha_creacion($fecha_creacion);

                $conn = $this->db->conectar();
                $stmt = $conn->prepare("CALL modificar_proyecto(?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $proyecto->getId_proyecto(),
                    $proyecto->getId_cliente(),
                    $proyecto->getNombre_proyecto(),
                    $proyecto->getDescripcion(),
                    $proyecto->getFecha_inicio(),
                    $proyecto->getFecha_fin(),
                    $proyecto->getEstado(),
                    $proyecto->getFecha_creacion()
                ]);
                header("Location: " . BASE_URL . "?controller=Proyecto&action=listar");
                exit();
            } catch (Exception $e) {
                echo "Error al modificar proyecto: " . $e->getMessage();
            }
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id_proyecto = $_POST['id_proyecto'] ?? null;
                if (!$id_proyecto) {
                    throw new Exception("ID de proyecto no proporcionado.");
                }

                $conn = $this->db->conectar();
                $stmt = $conn->prepare("CALL eliminar_proyecto(?)");
                $stmt->execute([$id_proyecto]);
                header("Location: " . BASE_URL . "?controller=Proyecto&action=listar");
                exit();
            } catch (Exception $e) {
                echo "Error al eliminar proyecto: " . $e->getMessage();
            }
        }
    }
}

?>