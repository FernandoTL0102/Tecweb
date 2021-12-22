<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">

    <title>Recuperar PDF</title>
</head>
<body>
        <div class="center">
            <h1>Recuperar PDF</h1>
            <p>Ingrese tu numero de boleta:</p>
        </div>
        <div class="center">
            <form action="../recuperar/recpdf.php" method="post">
                <input type="text" maxlength="10" name="boleta" id="boleta">
                <br>
                <br><input type="submit" value="Enviar">

            </form>
        </div>
</body>
</html>