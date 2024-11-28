<?php
    try{
        if(!file_exists("perroadri.php")){
            throw new Exception("El fichero perro.php no existe");
        }
        include "perroadri.php";
    }catch(Exception $e){
        echo "<br>Error: {$e->getMessage()} <br>";
    }

    $labrador = new Perro("Grande", "Labrador" , "Negro", "Pacomer");
    $caniche = new Perro("Pequeño","Caniche","Blanco","GAldeano");
    
    echo $labrador->mostrar_propiedades();
    echo $labrador->speak();
    echo "<br>";

    echo $caniche->mostrar_propiedades();
    echo $caniche->speak();
    echo "<br>";

    $perro_error_message=$labrador->setNombre("Luna");
    echo $perro_error_message ? "<br>Nombre actualizado correctamente<br>" : "<br>Nombre no modificado<br>";
    echo "<br>";

    $perro_error_message=$labrador->setNombre("NombreDemasiadoLargoParaSerValido");
    echo $perro_error_message ? "<br>Nombre actualizado correctamente<br>" : "<br>Nombre no modificado<br>";
    echo "<br>";

    echo $labrador->mostrar_propiedades();
    echo $labrador->speak();
?>