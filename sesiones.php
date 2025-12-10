<head>
    <style>
    /* Estilo general del contenedor */
    body {
        background-image: url(Images/fondo.webp);
        background-size: cover;
        background-repeat: no-repeat;
        color: red;
    }
    </style>
</head>
<?php 
    require_once('bd.php');
    if (isset($_POST['usuario']) && isset($_POST['pass'])){
        if ( empty($_POST['usuario']) || empty($_POST['pass']) ){
            die("Debes rellenar todos los campos");
        } else { 
            session_start();
            //Conexion a base de datos
            $pdo = connectDatabase();

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
                echo "<br class = 'error'>Error, no has accedido, usuario o contraseña incorrecta";
            }
        }

    } else {
        header("Location: login.php");
    }
    
?>