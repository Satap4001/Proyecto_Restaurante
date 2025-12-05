<style>
    /* Estilo general del contenedor */
    body {
        background-image: url(Images/fondo.webp);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container {
        background-color:  rgb(240, 240, 240, 0.55); 
        width: 100%;
        padding: 10px 20px;
        box-sizing: border-box;
    }

    ul {
        list-style-type: disc;
        padding-left: 20px;
    }
</style>
</head>
<body>
    <?php 
        require_once('bd.php');
        require 'cabecera.php';
    
        echo "<div class='container'>
                <h1>Lista de categorías</h1><ul>";
                $categorias = getCategory();
                foreach($categorias as $categoria) {
                    echo "<li>".$categoria["Nombre"]."</li>";
                }
        echo "</ul></div>"
    ?>
</body>