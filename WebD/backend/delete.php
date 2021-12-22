<?php
    $nboleta = $_POST['nboleta'];
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
        $stmt ->bind_param("s",$nboleta);
        $stmt ->execute();
        $stmt ->bind_result($nboleta);
        $stmt ->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0){
           ?>  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/registro.css">
                <script src="../admin/perfil.js"></script>

                <title>DeleteNoExitoso</title>
            </head>
            <body>
                    <img src="../img/escom.png", class="responsive1">
                    <img src="../img/ipn.png", class="responsive2">
                    <div class="center">
                        <h1>No existe ningun alumno con la boleta <?php echo $nboleta; ?> registrado</h1>
                        <form action="../backend/redirigirP.php" method="post">
                            <input type="submit" value="Pagina Principal">
                        </form>
                    </div>


            </body>
            </html>
           <?php
        }else{
            $Delete = "DELETE FROM alumnodatos WHERE Id = ?";
            $prepare = $conn->prepare($Delete);
            $prepare ->bind_param("s",$nboleta);
            $prepare ->execute();
            $prepare -> close();
            ?>
           <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/registro.css">

                <title>DeleteExitoso</title>
            </head>
            <body>
                    <img src="../img/escom.png", class="responsive1">
                    <img src="../img/ipn.png", class="responsive2">
                    <div class="center">
                        <h1>Se elimino al alumno</h1>
                        <p>con  boleta: <?php echo $nboleta; ?></p>
                        <form action="../backend/redirigirP.php" method="post">
                            <input type="submit" value="Pagina Principal">
                        </form>            
                    </div>

            </body>
            </html>
            <?php
        }
        $stmt->close();


    }

?>
