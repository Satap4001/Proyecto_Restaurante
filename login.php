<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass">
        <input type="checkbox" name="recordar" id="recordar">
        <button type="submit">Enviar Datos</button>
    </form>
</body>
</html>
<?php 

    if (isset($_POST['usuario']) && isset($_POST['pass'])){
        if ( empty($_POST['usuario']) || empty($_POST['pass']) ){
            die("Debes rellenar todos los campos");
        } else { 
            $host = 'localhost:3306';
            $dbname = 'cadena_restaurantes';
            $dbuser = 'root';
            $dbpass = '';
            $charset = 'utf8mb4';
            $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=$charset" , $dbuser , $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pass = $_POST['pass'];
            $usuario = $_POST['usuario'];

            $stmt = $pdo->prepare("SELECT * FROM restaurantes WHERE correo = :usuario");
            $stmt->execute([
                ':usuario' => $usuario
            ]);

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($pass == $resultado['Clave'] && $usuario == $resultado['Correo']){
                echo "Has iniciado correctamente a la página, bienvenido";
            } else {
                echo "Error, no has accedido, usuario o contraseña incorrecta";
            }
        }

    }
    


?>