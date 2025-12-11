<head>
<style>
    /* Estilo general del contenedor */
    body {
        background-image: url(Images/fondo.webp);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container {
        background-color:  rgb(240, 240, 240, 0.05); 
        width: 100%;
        min-height: 100vh;
        padding: 10px 20px;
        box-sizing: border-box;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #587ba1ff;
        text-shadow: 1px 1px 5px rgba(10, 1, 74, 0.5);
    }

    .category-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    
    .category-list li {
        width: 250px;
        height: 45px;
        background: white;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform .15s ease, box-shadow .15s ease;
        display: block;              
        align-items: stretch;
        justify-content: stretch;
        overflow: hidden;
        align-items: center;            
    }

    
    .category-list li:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .category-list li button {
        width: 100%;
        height: 100%;
        background: white;
        border: none;
        padding: 0;                
        margin: 0;                 
        cursor: pointer;
        font-size: 14px;
        display: flex;                 
        align-items: center;           
        justify-content: center;  
    }

    .category-list li button:hover {
        background: #f4f4f4;
    }

</style>
</head>

<body>
    <?php 
        require_once('bd.php');
        require 'cabecera.php';

        echo "<div class='container'>
                <h1>Lista de categorías</h1>
                <ul class='category-list'>";

        $categorias = getCategory();
        foreach ($categorias as $categoria) {
            echo "<li><form action = 'productos.php' method = 'post'><input type='hidden' value='".$categoria['CodCat'] ."' name='CodCat'><button type = 'submit'>".$categoria["Nombre"]."</button></form></li>";
        }

        echo "</ul></div>";
    ?>
</body>