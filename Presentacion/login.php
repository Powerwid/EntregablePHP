<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=Auth&action=login">
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Contraseña: <input type="password" name="contrasena" required></label><br>
        <button type="submit">Iniciar Sesión</button>
    </form>

    <h2>Registrarse</h2>
    <form method="POST" action="index.php?controller=Auth&action=registrar">
        <label>Correo: <input type="email" name="correo" required></label><br>
        <label>Contraseña: <input type="password" name="contrasena" required></label><br>
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Apellido: <input type="text" name="apellido" required></label><br>
        <label>Rol: 
            <select name="rol" required>
                <option value="empleado">Empleado</option>
                <option value="admin">Admin</option>
            </select>
        </label><br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>