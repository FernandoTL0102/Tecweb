<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">

    <title>LoginAdmin</title>
</head>
<body>
    <img src="../img/escom.png", class="responsive1">
    <img src="../img/ipn.png", class="responsive2">
    <div class="center">
            <h1>Inicar Sesión</h1>
            <p>Ingrese tu usuario y contraseña:</p>
    </div>
    <div class="center">
        <form action="../backend/login.php" method="post">
            <input type="text" placeholder='Usuario' name="nickn" id="nickn">
            <br><br>
            <input type="password" placeholder='Contraseña' name="pass" id="pass">
            <br><br>
            <input type="submit" value="Iniciar sesión">
        </form>
    </div>    
</body>
</html>