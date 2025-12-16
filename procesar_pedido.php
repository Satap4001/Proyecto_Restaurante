<head>
    <title>Pedido procesado</title>
    <style>
        body {
            min-height: 100vh; 
            background-image: url(Images/fondo.webp);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0; 
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Contenedor que centra el bloque sin afectar a la cabecera */
        .contenedor {
            display: flex;
            justify-content: center;
            margin-top: 60px; /* separación respecto a la cabecera */
        }

        /* Bloque tipo tarjeta */
        .bloque {
            display: flex;
            flex-direction: column;
            align-items: center;
            
            padding: 30px 40px;
            max-width: 500px;
            width: 90%;

            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            
            text-align: center;
            position: relative;
        }

        /* Detalle decorativo simple */
        .bloque::before {
            content: "";
            width: 60px;
            height: 4px;
            background-color: #587ba1ff;
            border-radius: 2px;
            margin-bottom: 15px;
        }

        /* Títulos y texto */
        .bloque h1 {
            margin-bottom: 15px;
            color: #333;
        }

        .bloque p {
            margin: 8px 0;
            color: #555;
            font-size: 16px;
        }
    </style>
</head>
<?php
    require_once("cabecera.php");
    require_once("bd.php");
    
    
    $pesoProducto= (float) 0;
    $pesoTotal = (float) 0;
    $fecha = date("d/m/Y");

    echo "<div class = 'contenedor'><div class = 'bloque'><h1>PEDIDO REALIZADO</h1><p>".$fecha;



    foreach ($_SESSION['carrito'] as $producto => $pesoUnidades) {
        $pesoProducto = getWeight($producto);

        $pesoTotal += ($pesoProducto[0]['Peso']) * $pesoUnidades;
        $codRest = getUserID($_SESSION['usuario']);
        
        
    }
    $rest = getUser($codRest[0]['CodRes']);
    echo "</p><p>Peso total del pedido: ".$pesoTotal. "</p>
          <p>Restaurante destinatario: ".$rest[0]['Correo']."</div></div>";
    $codPedido = addPedido($fecha,true,$pesoTotal,$codRest[0]['CodRes']);



    foreach ($_SESSION['carrito'] as $producto => $Unidades) {
        addProductoPedido($codPedido, $producto, $Unidades);
    }

    unset($_SESSION['carrito']);
    $_SESSION['carrito'] = [];

    

?>