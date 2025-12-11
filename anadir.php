<?php 

    session_start();
    $cod = $_POST['codProduct'];
    $unidades = $_POST['numComprar'];
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'];
    }

    if(isset($_SESSION['carrito'][$cod])){
        $_SESSION['carrito'][$cod] += $unidades;
    } else {
        $_SESSION['carrito'][$cod] = $unidades;
    }

    header("Location: carrito.php");
    exit();
?>