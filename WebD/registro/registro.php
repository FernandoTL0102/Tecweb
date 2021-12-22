<!DOCTYPE html>
<html>
    <head> 
        <title>REGISTRO</title>  
        <link rel="stylesheet" href="../css/registro.css">

    </head>
    <body> 
        <img src="../img/escom.png", class="responsive1">
        <img src="../img/ipn.png", class="responsive2">
        <div class="center">
            <h1>Registro de datos generales</h1>
            <h2>Alumnos de nuevo ingreso<br>(Enero 2022)</h2>
            <p>Ingrese los siguientes datos:</p>
        </div>
        <form action="../verdata/verData.php" method = "post"  onsubmit="validate(event)">
            <div class="center">
                <h2><legend class="titulo">Identidad:</legend></h2>
                <label for="boleta">No. de boleta:</label>
                <input type="text" id="boleta" name="boleta"  size="10", maxlength="10" required><br><br>
                <label for="nombre">Nombre(s):</label>
                <input type="text" id="nombre" name="nombre" required><br><br>
                <label for="apePaterno">Apellido paterno:</label>
                <input type="text" id="apePaterno" name="apePaterno" required><br><br>
                <label for="apeMaterno">Apellido materno:</label>
                <input type="text" id="apeMaterno" name="apeMaterno" required><br><br>
                <label for="fechaNac">Fecha de nacimiento :</label>
                <input type="date" id="fechaNac" name="fechaNac" required><br><br>
                <label for="genero">Género:</label>
                <select  id="gen" name="gen" required>
                    <option>-- Selecciona una opción --</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Prefiero no responder">Prefiero no responder</option>
                </select><br><br>
                <label for="curp">CURP:</label>
                <input type="text" id="curp" name="curp" size="20", maxlength="18" required><br>
                <h2><legend class="titulo">Contacto:</legend></h2>
                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" required><br><br>
                <label for="num">Numero:</label>
                <input type="number" id="numCalle" name="numCalle" required><br><br>
                <label for="colonia">Colonia:</label>
                <input type="text" id="colonia" name="colonia" required><br><br>
                <label for="codigoPost">Código postal:</label>
                <input type="number" id="codigoPost" name="codigoPost" size="5", maxlength="5" required><br><br>
                <label for="alcaldia">Alcadia:</label>
                <select name="alcaldia" id="alcaldia" name="alcaldia" required>
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
                <label for="telefono">Teléfono o celular:</label>
                <input type="number" id="telefono" name="telefono" size="10", maxlength="10" required><br><br>
                <label for="email">Correo electrónico:</label>
                <input type="email" name="correo" required="required" id="correo" required><br><br>

                <h2><legend class="titulo">Procedencia:</legend></h2>
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
                <label for="nomEsc">Nombre de la escuela:</label>
                <input type="text" id="nomEsc" name="nomEsc" readonly="true"><br><br>
                <label for="entidadFed">Entidad Federativa de Procedencia:</label>
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
                </select><br><br>
                <label for="prom">Promedio:</label>
                <br>
                <input type="number" id="prom" name="prom"  step="0.01" min="0" max="10" placeholder="00.00" required><br><br>
                <label for="opc">ESCOM fué tu:</label><br>
                <div>
                    <input type="radio" id="primera" name="opcion" value="primera"checked required>
                    <label for="primera">Primera opción</label>
                  </div>
                  
                  <div>
                    <input type="radio" id="segunda" name="opcion" value="segunda" required>
                    <label for="segunda">Segunda opción</label>
                  </div>
                  
                  <div>
                    <input type="radio" id="tercera" name="opcion" value="tercera" required>
                    <label for="tercera">Tercera opción</label>
                  </div>
                  <div>
                    <input type="radio" id="cuarta" name="opcion" value="cuarta" required>
                    <label for="cuarta">Cuarta opción</label>
                  </div>
            </div><br>
            <div  class="center">
            <br><input type="submit" value="Enviar">
            
            
        <form>
            <input type="reset" value="Limpiar">
            <button id='login' onclick="inciarsesion()">Iniciar Sesión</button>
            <input id='recu' type="button" value="Recuperar PDF"></input>
            </div>
        <script src="../registro/validacion.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </body>
    
</html>