<?php 
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header('Location: ../admin/login.php');

}
$host = "localhost";
$dbusername = "root";
$dbpassword = "fernando";
$dbname = "alumnos";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
?>

    <?php    
        }else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/registro.css">

        <title>ReadAlumnos</title>
    </head>
    <body>
    <img src="../img/escom.png", class="responsive1">
    <img src="../img/ipn.png", class="responsive2">
    <div class="center">
            <h1>Estos son todos los alumnos que se han registrado: </h1>
            <form action="../backend/redirigirP.php" method="post">
                            <input type="submit" value="Pagina Principal">
            </form>
    </div>
    <br>
    <br>
    <div class="table-responsive">
        <table style="width:100%">
        <tr>
                <th>Boleta</th>
                <th>Nombre(s)</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo Electrónico</th>
                <th>Nombre de la escuela</th>
                <th>Promedio</th>
                <th>Opcion</th>

        </tr>
        <?php
            $Select = "SELECT * from alumnodatos";
            $result = $conn->query($Select);
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["Id"] ?></td>
                <td><?php echo $row["Nombre"] ?></td>
                <td><?php echo $row["ApellidoP"] ?></td>
                <td><?php echo $row["ApellidoM"] ?></td>
                <td><?php echo $row["Correo"] ?></td>
                <td><?php echo  $row["NombreEscuela"] ?></td>
                <td><?php echo  $row["Promedio"] ?></td>
                <td><?php echo  $row["EscomOpcion"] ?></td>
            </tr>
        <?php  } }?>
        </table>
    </div>            
</body>
</html>
