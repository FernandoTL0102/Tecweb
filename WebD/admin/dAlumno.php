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
    <link rel="stylesheet" href="../css/registro.css">

    <title>DeleteAlumno</title>
</head>
<body>
        <img src="../img/escom.png", class="responsive1">
        <img src="../img/ipn.png", class="responsive2">
        <div class="center">
            <h1>Eliminar alumno</h1>
            <p>Ingresa un numero de boleta:</p>
        </div>
        <div class="center">
        <form action="../backend/delete.php" method="post">
            <input type="text" name="nboleta" maxlength="10">
            <input type="submit" value="Eliminar">
        </form>
        </div>

</body>
</html>