
            $contar= "SELECT COUNT(*) from alumnodatos where  turno= '8:30'";
            $stmtd = $conn -> query($contar);
            $count = $stmtd->fetch_row()[0];
            echo $count;
            if ($count < 180) {
                $_SESSION['hora']='8:30';
                $_SESSION['nombre_lab']='Laboratorio 1';
                echo 'jola';
                $stmtt = $conn->prepare($INSERT);
                $stmtt ->bind_param("sssssssssssiissssdsss",$nboleta,$nombre,$aPaterno,$aMaterno,$fNacimiento,$genero,$curp,$calle,$numero,$colonia,$alcaldia,$CP,$telefono,$email,$escProc,$entidadFed,$nomesc,$promedio,$opcion,$_SESSION['hora'],$_SESSION['nombre_lab']);
                $stmtt->execute();
            }