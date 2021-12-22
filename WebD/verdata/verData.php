<?php
session_start();
$_SESSION['boleta']= $_POST['boleta'];
$_SESSION['nombre']= $_POST['nombre'];
$_SESSION['apePaterno']= $_POST['apePaterno'];
$_SESSION['apeMaterno']= $_POST['apeMaterno'];
$_SESSION['fechaNac']= $_POST['fechaNac'];
$_SESSION['gen']= $_POST['gen'];
$_SESSION['curp']= $_POST['curp'];
$_SESSION['calle']= $_POST['calle'];
$_SESSION['numCalle']= $_POST['numCalle'];
$_SESSION['colonia']= $_POST['colonia'];
$_SESSION['alcaldia']= $_POST['alcaldia'];
$_SESSION['codigoPost']= $_POST['codigoPost'];
$_SESSION['telefono']= $_POST['telefono'];
$_SESSION['correo']= $_POST['correo'];
$_SESSION['procedencia']= $_POST['procedencia'];
$_SESSION['entidadFed']= $_POST['entidadFed'];
$_SESSION['nomEsc']= $_POST['nomEsc'];
$_SESSION['prom']= $_POST['prom'];
$_SESSION['opcion']= $_POST['opcion'];
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">

    <title>Ver Data</title>
</head>
<body>
    <img src="../img/escom.png", class="responsive1">
        <img src="../img/ipn.png", class="responsive2">
        <div class="center">
            <h1>Revisa la información que ingresaste</h1>

        </div>
    <div class="center">
    <label for="boleta">No. de boleta: <?php echo $nboleta ?> </label>
    </div>
    <div class="center">
    <label for="nombre">Nombre(s): <?php echo $nombre ?>  </label>
    </div>
    <div class="center">
    <label for="apePaterno">Apellido paterno: <?php echo $aPaterno ?> </label>
    </div>
    <div class="center">
    <label for="apeMaterno">Apellido materno: <?php echo $aMaterno ?> </label>
    </div>
    <div class="center">
    <label for="fechaNac">Fecha de nacimiento : <?php echo $fNacimiento ?> </label>
    </div>
    <div class="center">
    <label for="genero">Género: <?php echo $genero ?> </label>
    </div>
    <div class="center">
    <label for="curp">CURP: <?php echo $curp ?> </label>
    </div>
    <div class="center">
    <label for="calle">Calle: <?php echo $calle ?> </label>
    </div>
    <div class="center">
    <label for="num">Numero: <?php echo $numero ?> </label>
    </div>
    <div class="center">
    <label for="colonia">Colonia: <?php echo $colonia ?> </label>
    </div>
    <div class="center">
    <label for="codigoPost">Código postal: <?php echo $CP ?> </label>
    </div>
    <div class="center">
    <label for="alcaldia">Alcadia: <?php echo $alcaldia ?> </label>
    </div>
    <div class="center">
    <label for="telefono">Teléfono o celular: <?php  echo $telefono?> </label>
    </div>
    <div class="center">
    <label for="email">Correo electrónico: <?php echo $email ?> </label>
    </div>
    <div class="center">
    <label for="escProc">Escuela de procedencia: <?php echo $escProc ?> </label>
    </div>
    <div class="center">
    <label for="nomEsc">Nombre de la escuela: <?php echo $nomesc ?> </label>
    </div>
    <div class="center">
    <label for="entidadFed">Entidad Federativa de Procedencia: <?php echo $entidadFed ?> </label>
    </div>
    <div class="center">
    <label for="prom">Promedio: <?php echo $promedio ?> </label>
    </div>
    <div class="center">
    <label for="opc">ESCOM fué tu: <?php echo $opcion ?> </label>
    </div>
    <br>
    <div class="center">
    <form action="../backend/registrarAlumno.php">
        <input id="enviar" type="submit" value="Registrar">
        <input type="button" value="Modificar" id="btn_save">
    </form>
    </div>

    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../verdata/verValidacion.js"></script>

</body>
</html>
