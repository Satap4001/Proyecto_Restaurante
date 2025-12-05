<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <style>
        /* Estilo del título */
        .login h1 {
            text-align: center;
            font-size: 48px;
            color: #4A90E2;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .login {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Estilo general del cuerpo */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Estilo del formulario */
        form {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        form p {
            margin-bottom: 20px;
        }

        form label {
            font-weight: 600;
            color: #333333;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        form input[type="text"]:focus,
        form input[type="password"]:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        /* Estilo del botón */
        form button {
            width: 100%;
            padding: 12px;
            background: #4A90E2;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        form button:hover {
            background: #357ABD;
            transform: translateY(-2px);
        }

        form button:active {
            transform: translateY(1px);
        }
    </style>
</head>

<body>
    <div class="login">
        <h1>Inicar sesión</h1>
        <form action="sesiones.php" method="POST">
            <p>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario">
            </p>
            <p>
                <label for="pass">Contraseña</label>
                <input type="text" name="pass" id="pass">
            </p>
            <p class="checkbox-container">
                <input type="checkbox" name="recordar" id="recordar">
                <label for="recordar">Recordar Usuario</label>
            </p>
            <p><button type="submit">Enviar Datos</button></p>
        </form>
    </div>
</body>

</html>