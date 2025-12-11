<head>
    <style>
        body {
            background-image: url(Images/fondo.webp);
            background-size: cover;
            background-repeat: no-repeat;
        }

        table {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            table-layout: fixed;
        }

        table th {
            background-color: #587ba1;
            color: white;
            font-weight: bold;
            padding: 12px 15px;
            text-align: center;
        }

        table td {
            padding: 12px 15px;
            text-align: center;
            color: #587ba1;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        td {
            text-align: center;
        }

        td form {
            display: inline-block;
            margin: 0;
        }

        button {
            padding: 6px 12px;
            background-color: #587ba1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3f5c8a;
        }

        p {
            text-align: center;
            color: #587ba1;
            font-size: 1.2rem;
            margin-top: 40px;
            text-shadow: 1px 1px 5px rgba(10, 1, 74, 0.3);
        }

        
    </style>

    </style>
</head>
<?php

    include_once("cabecera.php");
    include_once("bd.php");

    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        echo "<table>";
        echo "<tr class='princ'><th>Producto</th><th>Unidades</th><th>Acción</th></tr>";

        foreach ($_SESSION['carrito'] as $cod => $unidades) {

            $producto = getProductInfo($cod);

            if (!empty($producto) && isset($producto[0]['Nombre'])) {
                $nombre = $producto[0]['Nombre'];
            } else {
                $nombre = "";
            }
            if ($unidades != 0) {
                echo "<tr>";
                echo "<td>" . $nombre . "</td>";
                echo "<td>" . $unidades . "</td>";
                echo "<td>
                            <form action='eliminar.php' method='post'>
                                <input type='hidden' name='cod' value='" . $cod . "'>
                                <button type='submit'>Eliminar</button>
                            </form>
                        </td>";
                echo "</tr>";
            }
        }
        echo "</table><form action='procesar_pedido.php' method='post'>
                                <button type='submit'>Procesar compra</button>
                            </form>";
    } else {
        echo "<p>El carrito está vacío.</p>";
    }

?>