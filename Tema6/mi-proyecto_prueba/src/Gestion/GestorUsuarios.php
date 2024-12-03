<?php
    namespace App\Gestion;

    use App\Interfaces\RolInterface;

    class GestorUsuarios{
        private $usuarios = [];

        public function agregarUsuario(string $nombre, RolInterface $rol){
            $this -> usuarios[$nombre]=$rol;
        }

        public function mostrarPermisosUsuario(string $nombre){
            if(isset($this->usuarios[$nombre])){
                return $this->usuarios[$nombre]->mostrarPermisos();
            }
            return "Usuario no encontrado.";
        }
    }
?>