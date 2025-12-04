<?php 
    
    if (isset($_POST['usuario']) && isset($_POST['pass'])){
        if ( empty($_POST['usuario']) || empty($_POST['pass']) ){
            die("Debes rellenar todos los campos");
        } else { 
            session_start();
            
            $host = 'localhost';
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
                if (isset($_POST['recordar'])){
                    setcookie("recordar", $usuario , time() + 3600 );
                }
                header("Location: categorias.php");
            } else {
                echo "<br>Error, no has accedido, usuario o contraseña incorrecta";
            }
        }

    } else {
        header("Location: login.php");
    }
    
?>