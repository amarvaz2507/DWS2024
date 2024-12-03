<?php
    namespace App\Roles;

    use App\Interfaces\RolInterface;

    class Usuario implements RolInterface{
        public function mostrarPermisos(): string{
            return "Permisos: Ver";
        }
    }
?>