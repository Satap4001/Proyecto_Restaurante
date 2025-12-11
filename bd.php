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

    function searchCategoryByID ($codCat){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT * FROM categorias WHERE CodCat like :categoria");
        $stmt->execute([":categoria" => $codCat]);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
    
    function getProductFromCategory($codCat) {
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT * FROM productos WHERE CodCat like :categoria");
        $stmt->execute([":categoria" => $codCat]);

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
    
    function getProductInfo($id){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT Nombre FROM Productos where CodProd like :codProd");
        $stmt->execute([":codProd" => $id]);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }
?>