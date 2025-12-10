<head>
    <style>
    body {
        background-image: url(Images/fondo.webp);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container {
        width: 100%;
        min-height: 100vh;
        padding: 20px;
        background-color: rgba(240,240,240,0.05);
    }

    h1 {
        text-align: center;
        color: #587ba1;
        margin-bottom: 20px;
    }

    h2 {
        text-align: center;
        color: #587ba1;
        margin-bottom: 20px;
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .princ {
        background-color: lightgray;
    }

    table th,
    table td {
        padding: 12px 15px;
        text-align: center;
    }

    table th {
        background-color: #587ba1;
        color: white;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f4f4f4;
    }

    button {               
        margin: 5px;                 
        cursor: pointer;
        font-size: 14px;
    }
    </style>
</head>
<?php 
    require_once('bd.php');
    require 'cabecera.php';
        
    echo "<div class='container'><h1>Lista de Productos</h1>";
    $categoria = $_POST["CodCat"];
    $nombreCat = searchCategoryByID($categoria);
    echo "<h2>".$nombreCat[0]["Nombre"]."<h2>";

    $productos = getProductFromCategory($categoria);

    echo "<table border = 1px>";
    echo "<tr class = 'princ'><td>Nombre</td><td>Descripción</td><td>Peso</td><td>Stock</td><td>Comprar</td></tr>";
    foreach($productos as $producto) {
        echo "<tr><td>".$producto["Nombre"]."</td>
            <td>".$producto["Descripcion"]."</td>
            <td>".$producto["Peso"]."</td>
            <td>".$producto["Stock"]."</td>";
        echo "<td><form action = carrito.php><input type='hidden' value='".$producto['CodProd'] ."' name='codProduct'><input type='hidden' value='".$producto['Nombre'] ."' name='nombreProduct'><input type = 'number' name = 'numComprar'><button type = 'submit'>Comprar</button></form></td></tr>";
    };
    echo"</table></div>";
?>