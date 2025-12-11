<?php

    include_once("cabecera.php");
    include_once("bd.php");

    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        echo "<table>";
        echo "<tr class='princ'><th>Producto</th><th>Unidades</th><th>Acción</th></tr>";
  
        foreach ($_SESSION['carrito'] as $cod => $unidades) {

            $producto=getProductInfo($cod);

            if (!empty($producto) && isset($producto[0]['Nombre'])) {
                $nombre = $producto[0]['Nombre'];
            } else {
                $nombre = "";
            }
            
            echo "<tr>";
            echo "<td>" . $nombre . "</td>";
            echo "<td>" . $unidades . "</td>";
            echo "<td><form action='eliminar.php' method='post'>
                    <input type='hidden' name='cod' value='" . $cod . "'>
                    <button type='submit'>Eliminar</button>
                </form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>El carrito está vacío.</p>";
    }

?>