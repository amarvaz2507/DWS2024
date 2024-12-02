<?php
    // Creamos los arrays algunos ya inicializados como el de usuario
    $usuarios=[
        "82A"=>[
            "contrasenia"=>"paco1234",
            "nombre"=>"Paco",
            "edad"=>25,
            "tarjeta"=>[
                "numero"=>6477392683995346,
                "cvv"=>345
            ]
        ],
        "82B"=>[
            "contrasenia"=>"sara7563",
            "nombre"=>"Sara",
            "edad"=>20,
            "tarjeta"=>[
                "numero"=>4781234678128921,
                "cvv"=>982
            ]
        ],
        "27C"=>[
            "contrasenia"=>"culo84",
            "nombre"=>"Marco",
            "edad"=>32,
            "tarjeta"=>[
                "numero"=>5214562378126719,
                "cvv"=>415
            ]
        ]
    ];


    $usuariosarellenar=[]; 

    $productos=[];

    $pedidos=[];

    //rellenamos usuarios aunque no vamos a usuarlo
    function rellenaUsuarios() {
        global $usuariosarellenar;

        //Inicializamos variable array
        $usuariosarellenar = []; 
    
        for ($i = 0; $i < 3; $i++) {
            $numeros=str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
            $abecedarioDNI="TRWAGMYFPDXBNJZSQVHLCKE";
            $calculoLetra= $abecedarioDNI[$numeros % 23];
            $dniarellenar=$numeros . $calculoLetra; //Hacemos un DNI valido aleatorio

            //Rellenamos
            $dni = $dniarellenar; 
            $nombre = "usuario_cliente" . ($i + 1);
            $edad = rand(17, 100); // Genera una edad entre 18 y 65 años
            $contrasenia = "usuario"; 

            //Hacemos numero de tarjeta aleatorio
            $numerotarjeta = "";
            for ($i = 0; $i < 4; $i++) {
                $numerotarjeta .= str_pad(rand(0, 9999999999999999), 4, '0', STR_PAD_LEFT) . ($i < 3 ? ' ' : '');
            }

            $tarjeta = [
                'numero' => rand(1000000000000000, 9999999999999999),
                'cvv' => rand(100, 999), // CVV Aletaroio
            ];
            
            //Asignamos al array
            $usuariosarellenar[$dni] = [
                'contrasenia' => $contrasenia,
                'nombre' => $nombre,
                'edad' => $edad,
                'tarjeta' => $tarjeta,
            ];
        }
    }

    rellenaUsuarios(); //Ejecutamos por probar si funciona

    //Rellenamos los productos por numero de productos existentes
    function rellenaProductos($numProductos){
        global $productos;
        for ($i = 0; $i < $numProductos; $i++) { //Iteramos en esos productos
            $unidades = rand(10, 20);
            $precio = rand(1, 50);
            $recogeProd = str_pad($i + 1, 3, "00", STR_PAD_LEFT);

            $productos[$i] = [ //Añadimos al array indexado sus caracteristicas
                'codigo' => $recogeProd,
                'unidades' => $unidades,
                'precio' => $precio . " euros",
            ];
        }
    }

    rellenaProductos("9"); //Ejecutamos la funcion

    function rellenaPedidos() { //Rellenamos los pedidos
        global $usuarios;
        global $productos; //Pillamos cada array global del codigo
        global $pedidos;
        $dnis=["82A","82B","27C"]; //Cogemos cada uno de los dnis que hemos creado a mano y los metemos en una variable tipo array
        for ($i = 0; $i < 3; $i++) {
            $productosrandom = rand(0, count($productos) - 1);
            $producto = $productos[$productosrandom]; //Hacemos y asignamos a una variable los productos randomizados
            $pedidos[$i] = [ //Rellenamos el array de pedidos
                'dni' => $dnis[0],
                'idProducto' => $producto['codigo'],
                'cantidad' => rand(1, $producto['unidades']),
                'precioLinea' => ((int)$producto['unidades'] * (int)$producto['precio'])
            ];
        }
    }

    rellenaPedidos(); //Ejecutamos para comprobar

    //Mostramos los pedidos
    function mostrarPedidos($dniUsuario) {
        global $usuarios;
        global $pedidos;
        global $productos;
    
        //Filtramos los pedido de ese usuario logueado
        $pedidosUsuario = array_filter($pedidos, function ($pedido) use ($dniUsuario) {
            return $pedido['dni'] === $dniUsuario;
        });
    
        //Si existe pero no tiene pedidos entonces mostramos mensaje de error
        if (empty($pedidosUsuario)) {
            throw new Exception("No se encontraron pedidos para este usuario.");
        }
        
        "<h4>Pedidos para el DNI: {$dniUsuario}</h4>";
        //Hacemos la tabla
        echo "<table border='1'>";
        echo "<tr>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Precio Línea (€)</th>
              </tr>";
    
        $precioTotal = 0;
    
        foreach ($pedidosUsuario as $pedido) { //Recorremos el array con un foreach para cada pedido
            $producto = $productos[array_search($pedido['idProducto'], array_column($productos, 'codigo'))];
            //Cogemos del array de productos unicamente el codigo del producto mediante arrayseach del id de producto de cada pedido el codigo
    
            echo "<tr>
                    <td>{$pedido['idProducto']}</td>
                    <td>{$pedido['cantidad']}</td>
                    <td>{$pedido['precioLinea']}</td>
                  </tr>";
    
            $precioTotal += $pedido['precioLinea']; //Sumamos los precios para el total y despues lo mostramos
        }
        echo "<tr>
                <td colspan='2'><strong>Total Pedido:</strong></td>
                <td>{$precioTotal} €</td>
              </tr>";
        echo "</table>";
    }

    //PRUEBAS DE EJECUCION DE CODIGO
    print_r($pedidos);
    echo "<br>";
    echo "<br>";
    print_r($productos);
    echo "<br>";
    echo "<br>";
    print_r($usuariosarellenar);
    echo "<br>";
    echo "<br>";
    print_r($usuarios);
    echo "<br>";
    echo "<br>";
    mostrarPedidos("82A")

?>