async function obtenerReporteProyectosPorCliente(clienteId) {
    try {
        const response = await fetch(`index.php?controller=Reporte&action=proyectosPorCliente&id=${clienteId}`);
        const data = await response.json();
        
        const tabla = document.createElement('table');
        tabla.className = 'tabla-reportes';
        
        // Encabezados
        const encabezados = `
            <tr>
                <th>ID Proyecto</th>
                <th>Nombre Proyecto</th>
                <th>Nombre Cliente</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
            </tr>
        `;
        tabla.innerHTML = encabezados;
        
        // Filas
        data.forEach(proyecto => {
            const fila = `
                <tr>
                    <td>${proyecto.id_proyecto}</td>
                    <td>${proyecto.nombre_proyecto}</td>
                    <td>${proyecto.nombre_cliente}</td>
                    <td>${proyecto.fecha_inicio}</td>
                    <td>${proyecto.fecha_fin || 'N/A'}</td>
                    <td>${proyecto.estado}</td>
                </tr>
            `;
            tabla.innerHTML += fila;
        });
        
        document.getElementById('contenedor-reportes').innerHTML = '';
        document.getElementById('contenedor-reportes').appendChild(tabla);
    } catch (error) {
        console.error('Error al obtener el reporte:', error);
        alert('Hubo un error al generar el reporte. Intenta de nuevo.');
    }
}

async function obtenerReporteAsignacionesPorUsuario(usuarioId) {
    try {
        const response = await fetch(`index.php?controller=Reporte&action=asignacionesPorUsuario&id=${usuarioId}`);
        const data = await response.json();
        
        const tabla = document.createElement('table');
        tabla.className = 'tabla-reportes';
        
        const encabezados = `
            <tr>
                <th>ID Proyecto</th>
                <th>Nombre Proyecto</th>
                <th>Nombre Usuario</th>
                <th>Rol en Proyecto</th>
                <th>Fecha Asignación</th>
            </tr>
        `;
        tabla.innerHTML = encabezados;
        
        data.forEach(asignacion => {
            const fila = `
                <tr>
                    <td>${asignacion.id_proyecto}</td>
                    <td>${asignacion.nombre_proyecto}</td>
                    <td>${asignacion.nombre_usuario}</td>
                    <td>${asignacion.rol_en_proyecto || 'N/A'}</td>
                    <td>${asignacion.fecha_asignacion}</td>
                </tr>
            `;
            tabla.innerHTML += fila;
        });
        
        document.getElementById('contenedor-reportes').innerHTML = '';
        document.getElementById('contenedor-reportes').appendChild(tabla);
    } catch (error) {
        console.error('Error al obtener el reporte:', error);
        alert('Hubo un error al generar el reporte. Intenta de nuevo.');
    }
}

async function obtenerReporteProyectosPorRangoFechas(fechaInicio, fechaFin) {
    try {
        const response = await fetch(`index.php?controller=Reporte&action=proyectosPorRangoFechas&inicio=${fechaInicio}&fin=${fechaFin}`);
        const data = await response.json();
        
        const tabla = document.createElement('table');
        tabla.className = 'tabla-reportes';
        
        const encabezados = `
            <tr>
                <th>ID Proyecto</th>
                <th>Nombre Proyecto</th>
                <th>Nombre Cliente</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
            </tr>
        `;
        tabla.innerHTML = encabezados;
        
        data.forEach(proyecto => {
            const fila = `
                <tr>
                    <td>${proyecto.id_proyecto}</td>
                    <td>${proyecto.nombre_proyecto}</td>
                    <td>${proyecto.nombre_cliente}</td>
                    <td>${proyecto.fecha_inicio}</td>
                    <td>${proyecto.fecha_fin || 'N/A'}</td>
                    <td>${proyecto.estado}</td>
                </tr>
            `;
            tabla.innerHTML += fila;
        });
        
        document.getElementById('contenedor-reportes').innerHTML = '';
        document.getElementById('contenedor-reportes').appendChild(tabla);
    } catch (error) {
        console.error('Error al obtener el reporte:', error);
        alert('Hubo un error al generar el reporte. Intenta de nuevo.');
    }
}