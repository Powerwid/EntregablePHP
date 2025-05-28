<?php
class Auth {
    public static function iniciarSesion($id_usuario, $correo, $rol) {
        $_SESSION['usuario_id'] = $id_usuario;
        $_SESSION['correo'] = $correo;
        $_SESSION['rol'] = $rol;
    }

    public static function cerrarSesion() {
        // Destruir todas las variables de sesión
        $_SESSION = array();

        // Eliminar la cookie de sesión
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Destruir la sesión
        session_destroy();

        // Evitar caché
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");
        header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

        // Redirigir a la página de login
        header("Location: " . BASE_URL . "?controller=Auth&action=login");
        exit();
    }

    public static function verificarSesion() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: " . BASE_URL . "?controller=Auth&action=login");
            exit();
        }
    }
}

?>