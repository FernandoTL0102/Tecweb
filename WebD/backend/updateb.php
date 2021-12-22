<?php
$nboleta= $_POST['nboleta'];
$nombre= $_POST['nombre'];
$aPaterno= $_POST['aPaterno'];
$aMaterno= $_POST['aMaterno'];
$fNacimiento= $_POST['fNacimiento'];
$genero= $_POST['gen'];
$curp= $_POST['curp'];
$calle= $_POST['calle'];
$calleNum= $_POST['numCalle'];
$colonia= $_POST['colonia'];
$alcaldia= $_POST['alcaldia'];
$CP= $_POST['CP'];
$telefono= $_POST['telefono'];
$email= $_POST['email'];
$escProc= $_POST['procedencia'];
$entidadFed= $_POST['entidadFed'];
$nomesc= $_POST['nomEsc'];
$promedio= $_POST['promedio'];
$opcion= $_POST['opcion'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "fernando";
$dbname = "alumnos";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}else{
    $Update = "UPDATE alumnodatos SET 
    Id = ?,
    Nombre=?,
    ApellidoP=?,
    ApellidoM=?,
    Fecha=?,
    Genero=?,
    CURP=?,
    Calle=?,
    Numero=?,
    Colonia=?,
    Acaldia=?,
    CodigoPostal=?,
    Telefono=?,
    Correo=?,
    EscuelaProcedencia=?,
    EntidadProcedencia=?,
    NombreEscuela=?,
    Promedio=?,
    EscomOpcion=?
    WHERE Id = ?";
$prepare = $conn->prepare($Update);
$prepare ->bind_param("ssssssssissiissssdss",$nboleta,$nombre,$aPaterno,$aMaterno,$fNacimiento,$genero,$curp,$calle,$calleNum,$colonia,$alcaldia,$CP,$telefono,$email,$escProc,$entidadFed,$nomesc,$promedio,$opcion,$nboleta);
$prepare->execute();
$a = $conn->affected_rows;
if ($a > 0) {
    header('Location: ../admin/perfil/perfil.php');
}else{
    echo 'algo salio mal';
}


}

?>