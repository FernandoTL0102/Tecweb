<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "fernando";
$dbname = "alumnos";
$boleta= $_POST['boleta'];

require "../backend/email/correo.php";
require '../backend/pdf/pdf_maker.php';
session_start();
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
    $SELECT = 'SELECT Id from alumnodatos where Id = ? limit 1';
    $stmt = $conn->prepare($SELECT);
    $stmt ->bind_param("s",$boleta);
    $stmt ->execute();
    $stmt ->bind_result($nboleta);
    $stmt ->store_result();
    $rnum = $stmt->num_rows;
    if($rnum != 0){


        $Select = "SELECT * from alumnodatos  where Id = ?";
        $stmt = $conn->prepare($Select);
        $stmt ->bind_param("s",$boleta);
        $stmt ->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['boleta'] = $row["Id"];
        $_SESSION['nombre'] =$row["Nombre"];
        $_SESSION['apePaterno'] = $row["ApellidoP"];
        $_SESSION['apeMaterno'] = $row["ApellidoM"];
        $_SESSION['fechaNac'] = $row["Fecha"];
        $_SESSION['gen'] = $row["Genero"];
        $_SESSION['curp'] = $row["CURP"];
        $_SESSION['calle'] = $row["Calle"];
        $_SESSION['numCalle'] = $row["Numero"];
        $_SESSION['colonia'] =  $row["Colonia"];
        $_SESSION['alcaldia'] = $row['Acaldia'];
        $_SESSION['codigoPost'] = $row["CodigoPostal"];
        $_SESSION['telefono']= $row["Telefono"];
        $_SESSION['correo'] =$row["Correo"];
        $_SESSION['procedencia'] = $row["EscuelaProcedencia"];
        $_SESSION['entidadFed'] = $row["EntidadProcedencia"];
        $_SESSION['nomEsc'] = $row["NombreEscuela"];
        $_SESSION['prom'] = $row["Promedio"];
        $_SESSION['opcion'] = $row["EscomOpcion"];
        $_SESSION['hora']=$row["Turno"];
        $_SESSION['nombre_lab']=$row["Lab"];
        $curp =$_SESSION['curp'];
        $nombre =$_SESSION['nombre'];
        $email =$_SESSION['correo'];

        $pdf = generatePDF($_SESSION);
        $doc = $pdf->Output('S', "", true);

        //$pdf->Output('D', $curp.".pdf", true);
            
        $emSend = sendCorreo(
            $doc, $email, $nombre, $curp
        );
        if($emSend != 1) {
                $av= "Fallo el envío del correo";
        }else{
             $av= "Se ha recuperado correctamente el pdf debera de estar en tu bandeja de correo "; 
            }
    }else{
        $av = "No existe ningun alumno con este numero de boleta";
    }        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">

    <title>ResRecuperarPDF</title>
</head>
<body>
        <img src="../img/escom.png", class="responsive1">
        <img src="../img/ipn.png", class="responsive2">
        <div class="center">
            <h1><?php echo $av;?></h1>
            <button id='login' onclick="inciarsesion()">Iniciar Sesión</button>
            <input id='recu' type="button" value="Registrar Alumno"></input>
        </div>
        <script src="../recuperar/rec.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>