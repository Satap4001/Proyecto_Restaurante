<?php 
    session_start();
    
    $pesoProducto= 0;
    $pesoTotal = 0;
    $fecha = date("d/m/Y");

    echo $fecha;


    foreach ($_SESSION['carrito'] as $producto => $pesoUnidades) {
        $pesoProducto = getWeight($producto);

        $pesoTotal += $pesoProducto[0] * $pesoUnidades;


    }

?>