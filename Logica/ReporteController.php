<?php
$root = dirname(__DIR__) . '/';
require_once $root . 'Datos/DB.php'; // Usamos Datos/ en lugar de Config/

class ReporteController {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function proyectosPorCliente() {
        $id_cliente = $_GET['id'] ?? null;
        if (!$id_cliente) {
            echo json_encode(['error' => 'ID de cliente no proporcionado']);
            return;
        }

        try {
            $conn = $this->db->conectar();
            $stmt = $conn->prepare("CALL obtener_proyectos_por_cliente(?)");
            $stmt->execute([$id_cliente]);
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($proyectos);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error al obtener proyectos: ' . $e->getMessage()]);
        }
    }

    public function asignacionesPorUsuario() {
        $id_usuario = $_GET['id'] ?? null;
        if (!$id_usuario) {
            echo json_encode(['error' => 'ID de usuario no proporcionado']);
            return;
        }

        try {
            $conn = $this->db->conectar();
            $stmt = $conn->prepare("CALL obtener_asignaciones_por_usuario(?)");
            $stmt->execute([$id_usuario]);
            $asignaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($asignaciones);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error al obtener asignaciones: ' . $e->getMessage()]);
        }
    }

    public function proyectosPorRangoFechas() {
        $fecha_inicio = $_GET['inicio'] ?? null;
        $fecha_fin = $_GET['fin'] ?? null;
        if (!$fecha_inicio || !$fecha_fin) {
            echo json_encode(['error' => 'Fechas no proporcionadas']);
            return;
        }

        try {
            $conn = $this->db->conectar();
            $stmt = $conn->prepare("CALL obtener_proyectos_por_rango_fechas(?, ?)");
            $stmt->execute([$fecha_inicio, $fecha_fin]);
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($proyectos);
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Error al obtener proyectos: ' . $e->getMessage()]);
        }
    }
}

?>