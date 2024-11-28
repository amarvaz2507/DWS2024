<?php
    Class Perro{
        public function __construct(
            private string $tamanio="",
            private string $raza="",
            private string $color="",
            private string $nombre=""
        ){
            $this->tamanio = $tamanio;
            $this->raza = $raza;
            $this->color = $color;
            $this->nombre = $nombre;
        }

        public function getTamanio()
        {
            return $this->tamanio;
        }

        public function setTamanio($tamanio)
        {
            if(strlen($tamanio) < 21 ){
                $this->nombre = $tamanio;
                return true;
            }else{
                return false;
            }
        }

        public function getRaza()
        {
            return $this->raza;
        }

        public function setRaza($raza)
        {
            if(strlen($raza) < 21 ){
                $this->nombre = $raza;
                return true;
            }else{
                return false;
            }
        }

        public function getColor()
        {
            return $this->color;
        }

        public function setColor($color)
        {
            if(strlen($color) < 21 ){
                $this->nombre = $color;
                return true;
            }else{
                return false;
            }
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            if(strlen($nombre) < 21 ){
                $this->nombre = $nombre;
                return true;
            }else{
                return false;
            }
        }

        public function speak(){
            $ladrar="<br>conquisten kurdistan digo... guau guau mi nombre es $this->nombre <br>";
            return $ladrar;
        }

        public function mostrar_propiedades(){
            echo "<br> El tamaño del perro es $this->tamanio, su color $this->color, su raza $this->raza y su nombre: $this->nombre <br>";
        }
    }
?>