<?php
$root = dirname(__DIR__) . '/';
require_once $root . 'Datos/DB.php';

class AsignacionController {
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function listar() {
        try {
            $conn = $this->db->conectar();
            $stmt = $conn->query("SELECT * FROM Asignaciones_Proyectos");
            $asignaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $asignaciones;
        } catch (Exception $e) {
            echo "Error al listar asignaciones: " . $e->getMessage();
            return [];
        }
    }
}

?>