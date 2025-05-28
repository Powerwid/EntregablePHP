<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
</head>
<body>
    <h1>Generar Reportes</h1>

    <!-- Reporte de Proyectos por Cliente -->
    <h2>Proyectos por Cliente</h2>
    <label>ID del Cliente: <input type="number" id="clienteId"></label>
    <button onclick="obtenerReporteProyectosPorCliente(document.getElementById('clienteId').value)">Generar</button>

    <!-- Reporte de Asignaciones por Usuario -->
    <h2>Asignaciones por Usuario</h2>
    <label>ID del Usuario: <input type="number" id="usuarioId"></label>
    <button onclick="obtenerReporteAsignacionesPorUsuario(document.getElementById('usuarioId').value)">Generar</button>

    <!-- Reporte de Proyectos por Rango de Fechas -->
    <h2>Proyectos por Rango de Fechas</h2>
    <label>Fecha Inicio: <input type="date" id="fechaInicio"></label>
    <label>Fecha Fin: <input type="date" id="fechaFin"></label>
    <button onclick="obtenerReporteProyectosPorRangoFechas(document.getElementById('fechaInicio').value, document.getElementById('fechaFin').value)">Generar</button>

    <div id="contenedor-reportes"></div>

    <script src="js/reportes.js"></script>
</body>
</html>