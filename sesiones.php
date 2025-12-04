<?php 
    
    if (isset($_POST['usuario']) && isset($_POST['pass'])){
        if ( empty($_POST['usuario']) || empty($_POST['pass']) ){
            die("Debes rellenar todos los campos");
        } else { 
            session_start();
            
            $host = 'localhost:3300';
            $dbname = 'cadena_restaurantes';
            $dbuser = 'root';
            $dbpass = '';
            $charset = 'utf8mb4';
            $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=$charset" , $dbuser , $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pass = $_POST['pass'];
            $usuario = $_POST['usuario'];

            $_SESSION['usuario'] = $usuario;
            $_SESSION['pass'] = $pass;

            $stmt = $pdo->prepare("SELECT * FROM restaurantes WHERE correo = :usuario");
            $stmt->execute([
                ':usuario' => $usuario
            ]);

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($pass == $resultado['Clave'] && $usuario == $resultado['Correo']){
                header("Location: ");
            } else {
                echo "Error, no has accedido, usuario o contraseña incorrecta";
            }
        }

    }
    
?>