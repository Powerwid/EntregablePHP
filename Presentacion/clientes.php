<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
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
    <h1>Gestión de Clientes</h1>

    <!-- Formulario para guardar un nuevo cliente -->
    <h2>Agregar Cliente</h2>
    <form method="POST" action="index.php?controller=Cliente&action=guardar">
        <label>ID Cliente (opcional): <input type="number" name="id_cliente"></label><br>
        <label>Nombre Empresa: <input type="text" name="nombre_empresa" required></label><br>
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Teléfono: <input type="text" name="telefono"></label><br>
        <label>Dirección: <input type="text" name="direccion"></label><br>
        <label>Fecha Creación: <input type="datetime-local" name="fecha_creacion"></label><br>
        <button type="submit">Guardar</button>
    </form>

    <!-- Formulario para modificar un cliente -->
    <h2>Modificar Cliente</h2>
    <form method="POST" action="index.php?controller=Cliente&action=modificar">
        <label>ID Cliente: <input type="number" name="id_cliente" required></label><br>
        <label>Nombre Empresa: <input type="text" name="nombre_empresa" required></label><br>
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Teléfono: <input type="text" name="telefono"></label><br>
        <label>Dirección: <input type="text" name="direccion"></label><br>
        <label>Fecha Creación: <input type="datetime-local" name="fecha_creacion"></label><br>
        <button type="submit">Modificar</button>
    </form>

    <!-- Formulario para eliminar un cliente -->
    <h2>Eliminar Cliente</h2>
    <form method="POST" action="index.php?controller=Cliente&action=eliminar">
        <label>ID Cliente: <input type="number" name="id_cliente" required></label><br>
        <button type="submit">Eliminar</button>
    </form>

    <!-- Tabla para listar clientes -->
    <h2>Lista de Clientes</h2>
    <?php
    require_once '../Logica/ClienteController.php';
    $controller = new ClienteController();
    $clientes = $controller->listar();

    if (empty($clientes)) {
        echo "<p>No hay clientes para mostrar.</p>";
    } else {
        ?>
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
        <?php
    }
    ?>
</body>
</html>