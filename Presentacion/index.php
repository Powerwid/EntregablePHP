<?php
session_start(); // Esto inicia la sesión una vez para toda la aplicación

// Calcular la BASE_URL dinámicamente
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$base_path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
define('BASE_URL', "$protocol://$host$base_path/index.php");

// Incluir todos los controladores (ajustar la ruta relativa)
require_once '../Logica/AuthController.php';
require_once '../Logica/ClienteController.php';
require_once '../Logica/ProyectoController.php';
require_once '../Logica/ReporteController.php';

// Obtener el controlador y la acción desde la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Verificar autenticación para todas las rutas excepto login y registrar
if ($controller !== 'Auth' || ($action !== 'login' && $action !== 'registrar')) {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: " . BASE_URL . "?controller=Auth&action=login");
        exit();
    }
}

// Mapear controladores a clases
$controllers = [
    'Auth' => 'AuthController',
    'Cliente' => 'ClienteController',
    'Proyecto' => 'ProyectoController',
    'Reporte' => 'ReporteController'
];

// Verificar si el controlador existe
if (!array_key_exists($controller, $controllers)) {
    die("Controlador no encontrado: $controller");
}

// Crear una instancia del controlador
$controllerName = $controllers[$controller];
$controllerInstance = new $controllerName();

// Verificar si la acción existe en el controlador
if (!method_exists($controllerInstance, $action)) {
    die("Acción no encontrada: $action en $controllerName");
}

// Ejecutar la acción
$controllerInstance->$action();
?>
