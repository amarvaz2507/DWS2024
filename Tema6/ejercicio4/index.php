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
=======

// Intentar incluir el archivo perro.php
try {
    if (!file_exists('perro.php')) {
        throw new Exception('El archivo perro.php no existe.');
    }
    include 'perro.php'; // Si lanza la excepción no hace el include
} catch (Exception $e) {
    die($e->getMessage());
}

// Crear el objeto labrador y mostrar sus propiedades
$labrador = new Perro('Grande', 'Labrador', 'Amarillo', 'Max');
$labrador->mostrar_propiedades();
echo "<br>"; 

// Hacer que el perro "hable"
$labrador->speak();
echo "<br>";

// Crear el objeto caniche
$caniche = new Perro('Pequeño', 'Caniche', 'Blanco', 'Fifi');
$caniche->mostrar_propiedades();
echo "<br>";

// Hacer que el caniche "hable"
$caniche->speak();
echo "<br>";

// Intentar cambiar una propiedad con validación
$perro_error_message = $labrador->set_nombre('Bella');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
echo "<br>";

// Intentar un nombre inválido
$perro_error_message = $labrador->set_nombre('NombreDemasiadoLargoParaSerValido');
echo $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado';
echo "<br>";

// Crear una librería con más animales (ejemplo)
$chihuahua = new Perro('Muy pequeño', 'Chihuahua', 'Marrón', 'Taco');
$pastor_aleman = new Perro('Grande', 'Pastor Alemán', 'Negro y marrón', 'Rex');
$chihuahua->mostrar_propiedades();
echo "<br>";
$pastor_aleman->mostrar_propiedades();
echo "<br>";

?>
>>>>>>> 36ef7fdd9352e40fdcdaabbc6a4c5e08a213a5c7
