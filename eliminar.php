<?php

    session_start();
    $cod = $_POST['cod'];
    unset($_SESSION['carrito'][$cod]);
    header("Location: carrito.php");

?>