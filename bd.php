<?php 

    function connectDatabase ( ){

        $host = 'localhost';
        $dbname = 'cadena_restaurantes';
        $dbuser = 'root';
        $dbpass = '';
        $charset = 'utf8mb4';
        $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=$charset" , $dbuser , $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    function searchCategory ($categoria){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT * FROM categorias WHERE Nombre like :categoria");
        $stmt->execute([":categoria" => $categoria]);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
    
    function getCategory (){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT * FROM categorias");
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }      
?>