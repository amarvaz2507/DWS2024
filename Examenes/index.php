<?php
    require_once 'datos.php';
    session_start();

    $mensaje_error = '';

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['login'])) {
        $usuario = $_GET['usuario'] ?? '';
        $contraseña = $_GET['contraseña'] ?? '';

        if (!preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
            $mensaje_error = "ERROR: El nombre de usuario contiene caracteres no permitidos.";
        } else {
            try {
                if (login($usuario, $contraseña)) {
                    $_SESSION['usuario'] = $usuario;
                } else {
                    $mensaje_error = "ERROR: Usuario o contraseña incorrectos.";
                }
            } catch (Exception $e) {
                $mensaje_error = $e->getMessage();
            }
        }
    }

    if (isset($_SESSION['usuario'])) {
        $usuario_actual = $_SESSION['usuario'];
        try {
            escribeUsuario($usuario_actual);
            escribeReservas($usuario_actual);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
    ?>
        <form method="GET">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <br>
            <button type="submit" name="login">Iniciar Sesión</button>
        </form>
        <?php if ($mensaje_error): ?>
            <p style="color: red;"><?= $mensaje_error ?></p>
        <?php endif; ?>
    <?php
    }
?>
