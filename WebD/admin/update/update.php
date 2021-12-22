<?php
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header('Location: ../admin/login.php');

}
    $_POST['nboleta'];
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "fernando";
    $dbname = "alumnos";
    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $SELECT = 'SELECT Id from alumnodatos where Id = ? limit 1';
        
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("s",$_POST['nboleta']);
        $stmt ->execute();
        $stmt ->bind_result($_POST['nboleta']);
        $stmt ->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0){
            $nboleta=$_POST['nboleta'];
            ?>  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../../css/registro.css">
                <script src="../../admin/perfil.js"></script>

                <title>UpdateNoExitoso</title>
            </head>
            <body>
                    <img src="../../img/escom.png", class="responsive1">
                    <img src="../../img/ipn.png", class="responsive2">
                    <div class="center">
                        <h1>No existe ningun alumno con la boleta <?php echo $nboleta; ?> registrado</h1>
                        <form action="../../backend/redirigirP.php" method="post">
                            <input type="submit" value="Pagina Principal">
                        </form>
                    </div>


            </body>
            </html>
           <?php
        }else{
            $Select = "SELECT * from alumnodatos where Id = ?";
            $stmt = $conn->prepare($Select);
            $stmt ->bind_param("s",$_POST['nboleta']);
            $stmt ->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
$nboleta = $row["Id"];
$nombre =$row["Nombre"];
$aPaterno = $row["ApellidoP"];
$aMaterno = $row["ApellidoM"];
$fNacimiento = $row["Fecha"];
$genero = $row["Genero"];
$curp = $row["CURP"];
$calle = $row["Calle"];
$callenum = $row["Numero"];
$colonia =  $row["Colonia"];
$alcaldia = $row['Acaldia'];
$CP = $row["CodigoPostal"];
$telefono = $row["Telefono"];
$email =$row["Correo"];
$escProc = $row["EscuelaProcedencia"];
$entidadFed = $row["EntidadProcedencia"];
$nomesc = $row["NombreEscuela"];
$promedio = $row["Promedio"];
$opcion = $row["EscomOpcion"];


switch ($opcion) {
    case 'primera':
        $opr1 ="checked";
        $opr2 ="";
        $opr3 ="";
        $opr4 ="";

        break;
    case 'segunda':
        $opr1 ="";
        $opr2 ="checked";
        $opr3 ="";
        $opr4 ="";
        break;
    case 'tercera':
        $opr1 ="";
        $opr2 ="";
        $opr3 ="checked";
        $opr4 ="";
        break;
    case 'cuarta':
        $opr1 ="";
        $opr2 ="";
        $opr3 ="";
        $opr4 ="checked";
        break;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/registro.css">

    <title>UpdateAlumnos</title>
</head>
<body>
        
        <img src="../../img/escom.png", class="responsive1">
        <img src="../../img/ipn.png", class="responsive2">
        <div class="center">
            <h1>Actualizar alumno</h1>
            <p>Con boleta <?php echo $nboleta; ?></p>
        </div>
    <form  method="post" action="../../backend/updateb.php" name="Formulario" id="form" onsubmit="validate(event)">
        <div class="center">
            <legend class="titulo"><strong>Identidad:</strong></legend>
            <label for="nboleta">No. de boleta:</label>
                <input type="text" name="nboleta" id="nboleta" value='<?php echo $nboleta ?>'  size="12" maxlength="12" required>
                <br><br>
            <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value='<?php echo $nombre ?>'  id="nombre" required>
                <br><br>
            <label for="aPaterno">Apellido paterno:</label>
                <input type="text" name="aPaterno" value='<?php echo $aPaterno ?>' id="aPaterno" required>
                <br><br>
            <label for="aMaterno">Apellido materno:</label>
                <input type="text" name="aMaterno" value='<?php echo $aMaterno ?>' id="aMaterno" required>
                <br><br>
            <label for="fNacimieno">Fecha de nacimiento:</label>
                <input type="date" name="fNacimiento" value='<?php echo $fNacimiento ?>' id="fNacimiento" required>
                <br><br>
            <label for="genero">Género:</label>
                <select  id="gen" name="gen" required>
                    <option>-- Selecciona una opción --</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Prefiero no responder">Prefiero no responder</option>
                </select>
            <br><br><label for="curp">CURP:</label>
            <input type="text" name="curp" id="curp" size="20" value='<?php echo $curp ?>'  maxlength="18" required>
            <br>

            <legend class="titulo"><strong>Contacto:</strong></legend>
            <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle"  value=<?php echo $calle;?> required><br> <br>
                <label for="num">Numero:</label>
                <input type="number" id="numCalle" name="numCalle" value=<?php echo $callenum; ?> required><br>
            <br><br>
            <label for="colonia">Colonia:</label>
            <input type="text" name="colonia" id="colonia" value='<?php echo $colonia ?>' required>
            <br><br>
            <label for="alcaldi">Alcaldia:</label>
            <select  id="alcaldia" name="alcaldia" required>
                    <option disabled > --Selecciona una opci&oacute;n-- </option>
                    <option value="Álvaro Obregón">Álvaro Obregón</option>                
                    <option value="Azcapotzalco">Azcapotzalco</option>
                    <option value="Benito Juárez">Benito Juárez</option>
                    <option value="Coyoacán">Coyoacán</option>
                    <option value="Cuajimalpa">Cuajimalpa</option>
                    <option value="Cuauhtémoc">Cuauhtémoc</option>
                    <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                    <option value="Iztacalco">Iztacalco</option>
                    <option value="Iztapalapa">Iztapalapa</option>
                    <option value="Magdalena Contreras">Magdalena Contreras</option>
                    <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                    <option value="Milpa Alta">Milpa Alta</option>
                    <option value="Tláhuac">Tláhuac</option>
                    <option value="Tlalpan">Tlalpan</option>
                    <option value="Venustiano Carranza">Venustiano Carranza</option>
                    <option value="Xochimilco">Xochimilco</option>
                </select><br><br>
            <label for="CP">Código Postal:</label>
            <input type="number" name="CP" id="CP" size="7" value='<?php echo $CP ?>' maxlength="7" required>
            <br><br>
            <label for="telefono">Teléfono o celular:</label>
            <input type="phone" name="telefono" id="telefono" size="12" value='<?php echo $telefono ?>' maxlength="12" required>
            <br><br>
            <label for="email">Correo electrónico:</label>
            <input type="mail" name="email" id="email" value='<?php echo $email ?>' required>
            <br>

            <legend class="titulo"><strong>Procedencia:</strong></legend>
            <label for="escProc">Escuela de procedencia:</label>
            <select id="procedencia" name="procedencia" onchange="changeProcedencia()" required>
                    <option>-- Selecciona una opción --</option>
                    <option value="cecyt1">CECYT #1 "GONZALO VÁZQUEZ VELA"</option>
                    <option value="cecyt2">CECYT #2 "MIGUEL BERNARD PERALES"</option>
                    <option value="cecyt3">CECYT #3 "ESTANISLAO RAMÍREZ RUIZ"</option>
                    <option value="cecyt4">CECYT #4 "LÁZARO CÁRDENAS DEL RÍO"</option>
                    <option value="cecyt5">CECYT #5 "BENITO JUÁREZ GARCÍA"</option>
                    <option value="cecyt6">CECYT #6 "MIGUEL OTHÓN DE MENDIZÁBAL"</option>
                    <option value="cecyt7">CECYT #7 "CUAUHTÉMOC"</option>
                    <option value="cecyt8">CECYT #8 "NARCISO BASSOLS GARCÍA"</option>
                    <option value="cecyt9">CECYT #9 "JUAN DE DIOS BÁTIZ PAREDES"</option>
                    <option value="cecyt10">CECYT #10 “CARLOS VALLEJO MÁRQUEZ”</option>
                    <option value="cecyt11">CECYT #11 "WILFRIDO MASSIEU PÉREZ"</option>
                    <option value="cecyt12">CECYT #12 "JOSÉ MA. MORELOS Y PAVÓN"</option>
                    <option value="cecyt13">CECYT #13 "RICARDO FLORES MAGÓN"</option>
                    <option value="cecyt14">CECYT #14 "LUIS ENRIQUE ERRO SOLER"</option>
                    <option value="cecyt15">CECYT #15 "DIÓDORO ANTÚNEZ ECHEGARAY"</option>
                    <option value="cet1">CET #1 "WALTER CROSS BUCHANAN"</option>
                    <option value="otro">otro</option>
                </select><br><br>
            <label for="entidad-Fed">Entidad Federativa de Procedencia:</label>
            <select id="entidadFed" name="entidadFed" required>
                    <option>-- Selecciona una opción --</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California </option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Ciudad de México">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
                <br>
                <br>
                <label for="nomesc">Nombre de la Escuela:</label>
            <input type="text" name="nomEsc" id="nomEsc" size="50" value='<?php echo $nomesc ?>' maxlength="50" readonly="true" required>
            <br><br>
            <label for="promedio">Promedio:</label><br>
            <input type="number" name="promedio" id="promedio" step="0.01" min="0" max="10" value='<?php echo $promedio ?>' required>
            <br><br>
            <label for="opc">ESCOM fué tu:</label><br>
            <input type="radio" name="opcion" value="primera" <?php echo $opr1?> required><label>Primera opción</label><br>
            <input type="radio" name="opcion" value="segunda" <?php echo $opr2?> required><label>Segunda opción</label><br>
            <input type="radio" name="opcion" value="tercera" <?php echo $opr3?> required><label>Tercera opción</label><br>
            <input type="radio" name="opcion" value="cuarta" <?php echo $opr4?> required><label>Cuarta opción</label> <br>
           
        </div>
        <br>
        <br>
        <div class="center">
        <input id="enviar" type="submit" value="Actualizar">

        </div>

    </form>
    <script src="../../jquery/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../update/update.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        let gen = "<?php echo $genero; ?>";
        let fed = "<?php echo $entidadFed; ?>";
        let alc = "<?php echo $alcaldia; ?>";
        let proc = "<?php echo $escProc; ?>";
        let opc = "<?php echo $opcion; ?>";

        $('#entidadFed > option[value="'+fed+'"]').attr('selected', 'selected');
        $('#procedencia > option[value="'+proc+'"]').attr('selected', 'selected');
        $('#alcaldia > option[value="'+alc+'"]').attr('selected', 'selected');
        $('#gen > option[value="'+gen+'"]').attr('selected', 'selected');
        $('#opcion > option[value="'+opc+'"]').attr('selected', 'selected');
        changeProcedencia();
    });    
    </script>
</body>
</html>
<?php 
    }
    $stmt->close();
}
?>