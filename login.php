<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <form action="sesiones.php" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" id="pass">
        <label for="recordar">Recordar Usuario</label>
        <input type="checkbox" name="recordar" id="recordar">
        <button type="submit">Enviar Datos</button>
    </form>
</body>
</html>
