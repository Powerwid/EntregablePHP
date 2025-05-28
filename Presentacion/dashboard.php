<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido al Dashboard</h1>
    <?php
    session_start();
    if (isset($_SESSION['correo']) && isset($_SESSION['rol'])) {
        echo "<p>Usuario: " . htmlspecialchars($_SESSION['correo']) . " (Rol: " . htmlspecialchars($_SESSION['rol']) . ")</p>";
    } else {
        header("Location: " . BASE_URL . "?controller=Auth&action=login");
        exit();
    }
    ?>

    <h2>Opciones</h2>
    <ul>
        <li><a href="index.php?controller=Cliente&action=listar">Gestionar Clientes</a></li>
        <li><a href="index.php?controller=Proyecto&action=listar">Gestionar Proyectos</a></li>
        <li><a href="index.php?controller=Reporte&action=proyectosPorCliente">Reportes</a></li>
        <li><a href="index.php?controller=Auth&action=logout">Cerrar Sesión</a></li>
    </ul>

    <?php
    // Incluir controladores
    require_once '../Logica/ClienteController.php';
    require_once '../Logica/ProyectoController.php';
    require_once '../Logica/AsignacionController.php';

    // Instanciar controladores
    $clienteController = new ClienteController();
    $proyectoController = new ProyectoController();
    $asignacionController = new AsignacionController();

    // Obtener datos
    $clientes = $clienteController->listar();
    $proyectos = $proyectoController->listar();
    $asignaciones = $asignacionController->listar();
    ?>

    <!-- Sección de Clientes -->
    <div class="section">
        <h2>Lista de Clientes</h2>
        <?php if (empty($clientes)): ?>
            <p>No hay clientes para mostrar.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Cliente</th>
                        <th>Nombre Empresa</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha Creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cliente['id_cliente'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($cliente['nombre_empresa'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($cliente['correo'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($cliente['telefono'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($cliente['direccion'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($cliente['fecha_creacion'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Sección de Proyectos -->
    <div class="section">
        <h2>Lista de Proyectos</h2>
        <?php if (empty($proyectos)): ?>
            <p>No hay proyectos para mostrar.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Proyecto</th>
                        <th>ID Cliente</th>
                        <th>Nombre Proyecto</th>
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>Fecha Creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos as $proyecto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($proyecto['id_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['id_cliente'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['nombre_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['descripcion'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_inicio'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_fin'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['estado'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_creacion'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Sección de Asignaciones -->
    <div class="section">
        <h2>Lista de Asignaciones</h2>
        <?php if (empty($asignaciones)): ?>
            <p>No hay asignaciones para mostrar.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Asignación</th>
                        <th>ID Proyecto</th>
                        <th>ID Usuario</th>
                        <th>Rol en Proyecto</th>
                        <th>Fecha Asignación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asignaciones as $asignacion): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($asignacion['id_asignacion'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['id_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['id_usuario'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['rol_en_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['fecha_asignacion'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>