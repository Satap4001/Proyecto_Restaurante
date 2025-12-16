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

    function getWeight($id){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT Peso FROM Productos where CodProd like :codProd");
        $stmt->execute([":codProd" => $id]);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    function addPedido ($fecha,$enviado,$peso, $idRes){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("INSERT INTO pedidos (Fecha, Enviado, Peso, CodRes) values (:fecha, :enviado, :peso, :CodRes)");
        $stmt->execute([":fecha" => $fecha, ":enviado" => $enviado, ":peso" => $peso , ":CodRes" => $idRes]);

        $codPedido = $pdo->lastInsertId();
        //DEVOLVEMOS EL CODIGO DEL PEDIDO PARA LUEGO ASIGNARLO A PEDIDO_PRODUCTO EN LA BASE DE DATOS
        return $codPedido;
    }

    function getUserID ($user){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT CodRes FROM Restaurantes where Correo like :Correo");
        $stmt->execute([":Correo" => $user]);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    function getUser ($id){
        $pdo = connectDatabase();

        $stmt = $pdo->prepare("SELECT Correo FROM Restaurantes where codRes like :id");
        $stmt->execute([":id" => $id]);

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    function addProductoPedido($codPedido, $codProdcuto,$unidades){

        $pdo = connectDatabase();

        $stmt = $pdo->prepare("INSERT INTO pedidosproductos (CodPed, CodProd, Unidades) values (:CodPed, :CodProd,:Unidades)");
        $stmt->execute([":CodPed" => $codPedido , ":CodProd" => $codProdcuto , ":Unidades" => $unidades]);


    }
    
?>