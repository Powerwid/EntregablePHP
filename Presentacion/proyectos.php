<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Proyectos</title>
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
    </style>
</head>
<body>
    <h1>Gestión de Proyectos</h1>

    <!-- Formulario para guardar un nuevo proyecto -->
    <h2>Agregar Proyecto</h2>
    <form method="POST" action="index.php?controller=Proyecto&action=guardar">
        <label>ID Proyecto (opcional): <input type="number" name="id_proyecto"></label><br>
        <label>ID Cliente: <input type="number" name="id_cliente" required></label><br>
        <label>Nombre Proyecto: <input type="text" name="nombre_proyecto" required></label><br>
        <label>Descripción: <textarea name="descripcion"></textarea></label><br>
        <label>Fecha Inicio: <input type="date" name="fecha_inicio" required></label><br>
        <label>Fecha Fin: <input type="date" name="fecha_fin"></label><br>
        <label>Estado: 
            <select name="estado" required>
                <option value="pendiente">Pendiente</option>
                <option value="en_progreso">En Progreso</option>
                <option value="completado">Completado</option>
            </select>
        </label><br>
        <label>Fecha Creación: <input type="datetime-local" name="fecha_creacion"></label><br>
        <button type="submit">Guardar</button>
    </form>

    <!-- Formulario para modificar un proyecto -->
    <h2>Modificar Proyecto</h2>
    <form method="POST" action="index.php?controller=Proyecto&action=modificar">
        <label>ID Proyecto: <input type="number" name="id_proyecto" required></label><br>
        <label>ID Cliente: <input type="number" name="id_cliente" required></label><br>
        <label>Nombre Proyecto: <input type="text" name="nombre_proyecto" required></label><br>
        <label>Descripción: <textarea name="descripcion"></textarea></label><br>
        <label>Fecha Inicio: <input type="date" name="fecha_inicio" required></label><br>
        <label>Fecha Fin: <input type="date" name="fecha_fin"></label><br>
        <label>Estado: 
            <select name="estado" required>
                <option value="pendiente">Pendiente</option>
                <option value="en_progreso">En Progreso</option>
                <option value="completado">Completado</option>
            </select>
        </label><br>
        <label>Fecha Creación: <input type="datetime-local" name="fecha_creacion"></label><br>
        <button type="submit">Modificar</button>
    </form>

    <!-- Formulario para eliminar un proyecto -->
    <h2>Eliminar Proyecto</h2>
    <form method="POST" action="index.php?controller=Proyecto&action=eliminar">
        <label>ID Proyecto: <input type="number" name="id_proyecto" required></label><br>
        <button type="submit">Eliminar</button>
    </form>

    <!-- Tabla para listar proyectos -->
    <h2>Lista de Proyectos</h2>
    <?php
    require_once '../Logica/ProyectoController.php';
    $controller = new ProyectoController();
    $proyectos = $controller->listar();

    if (empty($proyectos)) {
        echo "<p>No hay proyectos para mostrar.</p>";
    } else {
        ?>
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
        <?php
    }
    ?>
</body>
</html>