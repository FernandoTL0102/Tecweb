<?php 
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header('Location: ../admin/login.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/registro.css">

    <title>Administrador</title>
</head>
<body>
    <img src="../../img/escom.png", class="responsive1">
    <img src="../../img/ipn.png", class="responsive2">
    <div class="center">
            <h1>Bienvenido Administrador</h1>
    </div>
    <div class="center">
        <button id='C' onclick="CREATE()">Registrar alumno</button>
        <br>
        <br>
        <button id='R' onclick="redirigirR()">Ver alumnos</button>
        <br>
        <br>
        <button id='U' onclick="redirigirU()">actualizar alumno</button>
        <br>
        <br>
        <button id='D' onclick="redirigirD()">eliminar alumno</button>
    </div>
    
    <script src="../../admin/perfil/perfil.js"></script>

</body>
</html>