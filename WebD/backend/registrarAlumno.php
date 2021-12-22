<?php 

session_start();

require "../backend/email/correo.php";
require '../backend/pdf/pdf_maker.php';
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;

$nboleta = $_SESSION['boleta'];
$nombre =$_SESSION['nombre'];
$aPaterno = $_SESSION['apePaterno'];
$aMaterno = $_SESSION['apeMaterno'];
$fNacimiento = $_SESSION['fechaNac'];
$genero = $_SESSION['gen'];
$curp =$_SESSION['curp'];
$calle = $_SESSION['calle'];
$numero = $_SESSION['numCalle'];
$colonia =$_SESSION['colonia'];
$alcaldia = $_SESSION['alcaldia'];
$CP = $_SESSION['codigoPost'];
$telefono = $_SESSION['telefono'];
$email =$_SESSION['correo'];
$escProc = $_SESSION['procedencia'];
$entidadFed = $_SESSION['entidadFed'];
$nomesc = $_SESSION['nomEsc'];
$promedio = $_SESSION['prom'];
$opcion = $_SESSION['opcion'];

if(!empty($nboleta) || !empty($nombre) || !empty($aPaterno) || !empty($aMaterno) || !empty($fNacimiento) || !empty($genero) || !empty($curp) || !empty($calleNum) || !empty($colonia) || !empty($alcaldia) || !empty($CP) || !empty($telefono) || !empty($email) || !empty($escProc) || !empty($promedio) || !empty($opcion)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "fernando";
    $dbname = "alumnos";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $SELECT = 'SELECT Id from alumnodatos where Id = ? limit 1';
        $INSERT = "INSERT INTO alumnodatos (Id,Nombre,ApellidoP,ApellidoM,Fecha,Genero,CURP,Calle,Numero,Colonia,Acaldia,CodigoPostal,Telefono,Correo,EscuelaProcedencia,EntidadProcedencia,NombreEscuela,Promedio,EscomOpcion,Turno,Lab)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("s",$nboleta);
        $stmt ->execute();
        $stmt ->bind_result($nboleta);
        $stmt ->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0){
            $stmt ->close();
            $contar= "SELECT COUNT(*) from alumnodatos where  turno= '8:30'";
            $contard= "SELECT COUNT(*) from alumnodatos where  turno= '10:15'";
            $contart= "SELECT COUNT(*) from alumnodatos where  turno= '12:00'";

            $stmtd = $conn -> query($contar);
            $stmtt = $conn -> query($contard);
            $stmtc = $conn -> query($contart);

            $count = $stmtd->fetch_row()[0];
            $countd = $stmtt->fetch_row()[0];
            $countt = $stmtc->fetch_row()[0];


            if ($count <= 180) {
                $_SESSION['hora']="8:30";
                $hora = $_SESSION['hora'];
                //seleccion de lab 
                $contarl= "SELECT COUNT(*) from alumnodatos where  Turno= '8:30' and Lab = 'Laboratorio 1'";
                $contardl= "SELECT COUNT(*) from alumnodatos where  Turno= '8:30' and Lab = 'Laboratorio 2'";
                $contartl= "SELECT COUNT(*) from alumnodatos where  Turno= '8:30' and Lab = 'Laboratorio 3'";
                $contarcl= "SELECT COUNT(*) from alumnodatos where  Turno= '8:30' and Lab = 'Laboratorio 4'";
                $contarccl= "SELECT COUNT(*) from alumnodatos where  Turno= '8:30' and Lab = 'Laboratorio 5'";
                $contarsl= "SELECT COUNT(*) from alumnodatos where  Turno= '8:30' and Lab = 'Laboratorio 6'";
                $stmtdl = $conn -> query($contarl);
                $stmttl = $conn -> query($contardl);
                $stmtcl = $conn -> query($contartl);
                $stmtccl = $conn -> query($contarcl);
                $stmtsl = $conn -> query($contarccl);
                $stmtssl = $conn -> query($contarsl);
                $countl = $stmtdl->fetch_row()[0];
                $countdl = $stmttl->fetch_row()[0];
                $counttl = $stmtcl->fetch_row()[0];
                $countcl = $stmtccl->fetch_row()[0];
                $countccl = $stmtsl->fetch_row()[0];
                $countsl = $stmtssl->fetch_row()[0];
                if ($countl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 1";

                }else if ($countl > 30 && $countdl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 2";

                }else if ($countl > 30 && $countdl > 30 && $counttl <= 30 ) {
                    $_SESSION['nombre_lab']="Laboratorio 3";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl <=30) {
                    $_SESSION['nombre_lab']="Laboratorio 4";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl > 30 && $countccl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 5";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl > 30 && $countccl > 30 && $countsl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 6";

                }
                $lab= $_SESSION['nombre_lab'];

            }else if ($count>180 && $countd <= 180) {
                $_SESSION['hora']="10:15";
                $hora = $_SESSION['hora'];
                //seleccion de lab
                $contarl= "SELECT COUNT(*) from alumnodatos where  Turno= '10:15' and Lab = 'Laboratorio 1'";
                $contardl= "SELECT COUNT(*) from alumnodatos where  Turno= '10:15' and Lab = 'Laboratorio 2'";
                $contartl= "SELECT COUNT(*) from alumnodatos where  Turno= '10:15' and Lab = 'Laboratorio 3'";
                $contarcl= "SELECT COUNT(*) from alumnodatos where  Turno= '10:15' and Lab = 'Laboratorio 4'";
                $contarccl= "SELECT COUNT(*) from alumnodatos where  Turno= '10:15' and Lab = 'Laboratorio 5'";
                $contarsl= "SELECT COUNT(*) from alumnodatos where  Turno= '10:15' and Lab = 'Laboratorio 6'";
                $stmtdl = $conn -> query($contarl);
                $stmttl = $conn -> query($contardl);
                $stmtcl = $conn -> query($contartl);
                $stmtccl = $conn -> query($contarcl);
                $stmtsl = $conn -> query($contarccl);
                $stmtssl = $conn -> query($contarsl);
                $countl = $stmtdl->fetch_row()[0];
                $countdl = $stmttl->fetch_row()[0];
                $counttl = $stmtcl->fetch_row()[0];
                $countcl = $stmtccl->fetch_row()[0];
                $countccl = $stmtsl->fetch_row()[0];
                $countsl = $stmtssl->fetch_row()[0];
                if ($countl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 1";

                }else if ($countl > 30 && $countdl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 2";

                }else if ($countl > 30 && $countdl > 30 && $counttl <= 30 ) {
                    $_SESSION['nombre_lab']="Laboratorio 3";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl <=30) {
                    $_SESSION['nombre_lab']="Laboratorio 4";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl > 30 && $countccl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 5";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl > 30 && $countccl > 30 && $countsl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 6";

                }
                $lab= $_SESSION['nombre_lab'];
                
            }else if ($count>180 && $countd > 180 && $countt <= 180) {
                $_SESSION['hora']="12:00";
                $hora = $_SESSION['hora'];
                //seleccion de lab
                $contarl= "SELECT COUNT(*) from alumnodatos where  Turno= '12:00' and Lab = 'Laboratorio 1'";
                $contardl= "SELECT COUNT(*) from alumnodatos where  Turno= '12:00' and Lab = 'Laboratorio 2'";
                $contartl= "SELECT COUNT(*) from alumnodatos where  Turno= '12:00' and Lab = 'Laboratorio 3'";
                $contarcl= "SELECT COUNT(*) from alumnodatos where  Turno= '12:00' and Lab = 'Laboratorio 4'";
                $contarccl= "SELECT COUNT(*) from alumnodatos where  Turno= '12:00' and Lab = 'Laboratorio 5'";
                $contarsl= "SELECT COUNT(*) from alumnodatos where  Turno= '12:00' and Lab = 'Laboratorio 6'";
                $stmtdl = $conn -> query($contarl);
                $stmttl = $conn -> query($contardl);
                $stmtcl = $conn -> query($contartl);
                $stmtccl = $conn -> query($contarcl);
                $stmtsl = $conn -> query($contarccl);
                $stmtssl = $conn -> query($contarsl);
                $countl = $stmtdl->fetch_row()[0];
                $countdl = $stmttl->fetch_row()[0];
                $counttl = $stmtcl->fetch_row()[0];
                $countcl = $stmtccl->fetch_row()[0];
                $countccl = $stmtsl->fetch_row()[0];
                $countsl = $stmtssl->fetch_row()[0];
                if ($countl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 1";

                }else if ($countl > 30 && $countdl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 2";

                }else if ($countl > 30 && $countdl > 30 && $counttl <= 30 ) {
                    $_SESSION['nombre_lab']="Laboratorio 3";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl <=30) {
                    $_SESSION['nombre_lab']="Laboratorio 4";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl > 30 && $countccl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 5";

                }else if ($countl > 30 && $countdl > 30 && $counttl > 30 && $countcl > 30 && $countccl > 30 && $countsl <= 30) {
                    $_SESSION['nombre_lab']="Laboratorio 6";

                }
                $lab= $_SESSION['nombre_lab'];
            }
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("sssssssssssiissssdsss",$nboleta,$nombre,$aPaterno,$aMaterno,$fNacimiento,$genero,$curp,$calle,$numero,$colonia,$alcaldia,$CP,$telefono,$email,$escProc,$entidadFed,$nomesc,$promedio,$opcion,$hora,$lab);
            $stmt->execute();
            $pdf = generatePDF($_SESSION);
            $doc = $pdf->Output('S', "", true);

            //$pdf->Output('D', $curp.".pdf", true);
            
            $emSend = sendCorreo(
                $doc, $email, $nombre, $curp
            );
            
            if($emSend != 1) {
                $av= "Fallo el envío del correo";
            }else {$av = "Se ha registrado correctamente el usuario "; }
            
        }else{
            $av= "Alguien ya registro ese Número de Boleta!!";
        }
        $stmt->close();
        $conn->close();
    }

}else{
    echo "Todos los datos son obligatorios!!";
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">

    <title>RegistroCompletado</title>
</head>
<body>
        <img src="../img/escom.png", class="responsive1">
        <img src="../img/ipn.png", class="responsive2">
        <div class="center">
            <h1><?php echo $av;?></h1>
            <form action="generar.php" method="post">
                <input type="submit" value="Generar PDF">
            </form>
            <br>
            <button id='login' onclick="inciarsesion()">Iniciar Sesion</button>
            <br>
            <input id='recu' type="button" value="Recuperar PDF"></input>

        </div>
        <script src="../registro/validacion.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>


