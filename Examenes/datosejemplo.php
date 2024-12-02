<?php
// Array de usuarios
    $usuarios = [
        "juanp" => [
            "contraseña" => "1234",
            "nombre" => "Juan",
            "apellido1" => "Pérez",
            "apellido2" => "Sánchez",
            "correo" => "juan.perez@example.com",
            "fecha_registro" => "2023-01-15"
        ],
        "mariag" => [
            "contraseña" => "abcd",
            "nombre" => "María",
            "apellido1" => "Gómez",
            "apellido2" => "López",
            "correo" => "maria.gomez@example.com",
            "fecha_registro" => "2022-11-20"
        ],
        "carlost" => [
            "contraseña" => "qwerty",
            "nombre" => "Carlos",
            "apellido1" => "Torres",
            "apellido2" => "Ramírez",
            "correo" => "carlos.torres@example.com",
            "fecha_registro" => "2024-02-01"
        ]
    ];

    // Validar correos electrónicos
    foreach ($usuarios as $usuario) {
        if (!filter_var($usuario['correo'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("ERROR DEL SISTEMA: El correo electrónico no es válido.");
        }
    }

    // Array de reservas
    $reservas = [
        "RES-00001" => [
            "sala" => "Sala A",
            "usuario" => "juanp",
            "fecha_inicio" => "2024-01-15",
            "fecha_fin" => "2024-01-16",
            "comentarios" => "Reunión mensual"
        ],
        "RES-00002" => [
            "sala" => "Sala B",
            "usuario" => "mariag",
            "fecha_inicio" => "2024-02-05",
            "fecha_fin" => "2024-02-06",
            "comentarios" => "Presentación proyecto"
        ],
        "RES-00003" => [
            "sala" => "Sala A",
            "usuario" => "carlost",
            "fecha_inicio" => "2024-03-10",
            "fecha_fin" => "2024-03-11",
            "comentarios" => "Taller práctico"
        ]
    ];

    // Función de login
    function login($usu, $pw) {
        global $usuarios;
        if (empty($pw)) {
            throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
        }
        return isset($usuarios[$usu]) && $usuarios[$usu]['contraseña'] === $pw;
    }

    // Función para mostrar datos de un usuario
    function escribeUsuario($usu) {
        global $usuarios;
        if (!isset($usuarios[$usu])) {
            throw new Exception("ERROR DEL SISTEMA: El usuario no existe.");
        }
        $usuario = $usuarios[$usu];
        echo "{$usuario['apellido1']} {$usuario['apellido2']}, {$usuario['nombre']} (Correo: {$usuario['correo']})<br>";
        echo "Registrado desde el " . date("d de F de Y", strtotime($usuario['fecha_registro'])) . "<br>";
    }

    // Función para mostrar reservas de un usuario
    function escribeReservas($usu) {
        global $usuarios, $reservas;
        if (!isset($usuarios[$usu])) {
            throw new Exception("ERROR DEL SISTEMA: El usuario no existe.");
        }
        echo "Reservas realizadas por {$usuarios[$usu]['nombre']} {$usuarios[$usu]['apellido1']}<br>";
        echo "<table border='1'>";
        echo "<tr><th>ID Reserva</th><th>Sala</th><th>Fecha de Inicio</th><th>Fecha de Fin</th><th>Comentarios</th></tr>";
        foreach ($reservas as $id => $reserva) {
            if ($reserva['usuario'] === $usu) {
                echo "<tr>
                    <td>{$id}</td>
                    <td>{$reserva['sala']}</td>
                    <td>{$reserva['fecha_inicio']}</td>
                    <td>{$reserva['fecha_fin']}</td>
                    <td>{$reserva['comentarios']}</td>
                </tr>";
            }
        }
        echo "</table>";
    }
?>
