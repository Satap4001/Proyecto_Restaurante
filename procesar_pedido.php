<?php
    require_once("cabecera.php");
    require_once("bd.php");
    
    
    $pesoProducto= (float) 0;
    $pesoTotal = (float) 0;
    $fecha = date("d/m/Y");

    echo $fecha;


    foreach ($_SESSION['carrito'] as $producto => $pesoUnidades) {
        $pesoProducto = getWeight($producto);

        $pesoTotal += ($pesoProducto[0]['Peso']) * $pesoUnidades;
        $codRest = getUserID($_SESSION['usuario']);
        
        
    }
    $codPedido = addPedido($fecha,true,$pesoTotal,$codRest[0]['CodRes']);



    foreach ($_SESSION['carrito'] as $producto => $Unidades) {
        addProductoPedido($codPedido, $producto, $Unidades);
    }

    echo "<br>" .  $pesoTotal;

?>