<?php
    namespace App\Roles;

    use App\Interfaces\RolInterface;

    class Moderador implements RolInterface{
        public function mostrarPermisos(): string{
            return "Permisos: Editar, Ver";
        }
    }
?>