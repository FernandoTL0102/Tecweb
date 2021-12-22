<?php 




$host = "localhost";
    $dbusername = "root";
    $dbpassword = "fernando";
    $dbname = "alumnos";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $SELECT = 'SELECT nickn,pass from alumnos.admin where nickn = ? ';
        
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("s",$_POST['nickn']);
        $stmt ->execute();
        $stmt->store_result();
         // SI EL USUARIO EXISTE EN LA TABLA SE EXTRAE Y SE APUNTA SU DNI Y SU CLAVE
    if ($stmt->num_rows > 0){
       $stmt->bind_result($nickn, $pass);
       $stmt->fetch();
       
            // AHORA VERIFICA SI LA CLAVE QUE SE EXTRAJO DE LA TABLA ES IGUAL A LA QUE SE ENVIA DESDE EL FORMULARIO         
            if ($_POST['pass'] === $pass) 
                {
                   // SI COINICIDEN AMBAS CONTRASEÑAS SE INICIA LA SESION Y SE LE DA LA BIENCENIDA AL USUARIO CON ECHO
                   session_start();
                   $_SESSION['loggedin'] = TRUE;
                   header('Location: ../admin/perfil/perfil.php');
                }else{ 
                    $av = 'Contraseña incorrecta';
                    }
          }else { 
                    $av = 'Usuario incorrecto'; 
                }

   $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">

    <title>FalloEnLogin</title>
</head>
<body>
        <img src="../img/escom.png", class="responsive1">
        <img src="../img/ipn.png", class="responsive2">
        <div class="center">
            <h1>Error en Inicar Sesión</h1>
            <p><?php echo $av ;?></p>
        </div>
</body>
</html>