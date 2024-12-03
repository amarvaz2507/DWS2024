<?php
    require_once 'vendor/autoload.php';

    use App\Roles\Administrador;
    use App\Roles\Moderador;
    use App\Roles\Usuario;
    use App\Gestion\GestorUsuarios;
    
    // Crear el gestor de usuarios
    $gestor = new GestorUsuarios();
    
    // Crear instancias de los roles
    $admin = new Administrador();
    $moderador = new Moderador();
    $usuario = new Usuario();
    
    // Agregar usuarios con sus roles
    $gestor->agregarUsuario("Juan", $admin);
    $gestor->agregarUsuario("Carlos", $moderador);
    $gestor->agregarUsuario("Ana", $usuario);
    
    // Mostrar permisos de los usuarios
    echo "Permisos de Juan: " . $gestor->mostrarPermisosUsuario("Juan") . "
    ";
    echo "Permisos de Carlos: " . $gestor->mostrarPermisosUsuario("Carlos") . "
    ";
    echo "Permisos de Ana: " . $gestor->mostrarPermisosUsuario("Ana") . "
    ";
?>