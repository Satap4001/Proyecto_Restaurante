<?php

session_start();
    $cod = $_POST['codProduct'];
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'];
    }
    $_SESSION['carrito'][$cod] = 0;
    header("Location: carrito.php");

?>