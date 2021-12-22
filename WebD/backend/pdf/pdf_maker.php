
<?php
require('fpdf183/fpdf.php');

class PDF extends FPDF
{
    // Tabla coloreada
    function FancyTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(35, 158, 220);
        $this->SetTextColor(255);
        $this->SetDrawColor(138, 148, 255);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B', 11);
        $w = array(30, 80, 30, 30);

        // Cabecera
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);

        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = true;

        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['boleta'], 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row['nombre_lab']), 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['hora'], 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
      
    }
    function Header()
    {
        
        $this->Image('../img/encabezado.fw.png', 10, 10, 200, 25);
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(100, 10, utf8_decode(
            'Registro examen diágnostico ESCOM'
        ), 0, 0, 'L');
    }
}

function generatePDF($datos){
    // Creamos nuestro objeto pdf
    $pdf = new Pdf();
    // Agregamos una pagina al archivo
    $pdf->AddPage();
    
    // Personalizamos los amrgenes
    $pdf->SetMargins(20, 20, 20);
    
    $pdf->Ln(15);
    //**********************TITULOS****************************
    //              LOGO DEL IPN
    /*
    $pdf->Image('../img/ipn.png', 25, 25, 30, 25);
    
    // Definimos la fuente
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 6, utf8_decode(
        "INSTITUTO POLITÉCNICO NACIONAL"
    ), 0, 1, 'C');
    
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 6, utf8_decode(
        "ESCUELA SUPERIOR DE COMPUTO"
    ), 0, 1, 'C');*/
    //*****************INFORMACION ESTUDIANTE****************************
    
    //      ENCABEZADO
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->MultiCell(0, 5, utf8_decode(
        "Has concluido el proceso de registro satisfactoriamente. A continuación se"
            . " muestra la información que has brindado para el registro y la información"
            . " sobre tu horario asignado."
    ), 0, 1);
    $pdf->Ln(5);
    
    
    
    if ($datos != "false") {
        //  -----------------SECCION DE IDENTIDAD------------------------
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(0, 6, utf8_decode(
            "Información personal"
        ), 0, 1);
        
        $pdf->Cell(30, 6, 'Nombre: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(130, 4, utf8_decode(
            $datos['nombre'] . " " . $datos['apePaterno'] . " " . $datos['apeMaterno']
        ), 0, 1);
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Nacimiento: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['fechaNac'], 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Sexo: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['gen'], 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'CURP: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['curp'], 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Boleta: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['boleta'], 0, 1);
        $pdf->Ln(4);
    
        //-----------------BLOQUE DE CONTACTO
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(0, 6, utf8_decode(
            "Información de contacto"
        ), 0, 1,);
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Calle: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, utf8_decode($datos['calle']), 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, utf8_decode('Número: '), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['numCalle'], 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'C.P.: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['codigoPost'], 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Celular: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['telefono'], 0, 1);
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Colonia: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(130, 6, utf8_decode($datos['colonia']), 0, 1);
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Correo: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(130, 6, $datos['correo'], 0, 1);
        $pdf->Ln(4);
    
        //-----------------BLOQUE DE PROCEDENCIA
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(0, 6, utf8_decode(
            "Información de procedencia"
        ), 0, 1,);
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Escuela: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(130, 6, utf8_decode($datos['nomEsc']), 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Entidad: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, utf8_decode($datos['entidadFed']), 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, 'Promedio: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['prom'], 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 6, utf8_decode('Opción: '), 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(55, 6, $datos['opcion'], 0, 1);
    
    
        //*****************INFORMACION HORARIO****************************
        $pdf->Ln(10);
        // ENCABEZADO
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(0, 6, utf8_decode(
            "Horario asignado"
        ), 0, 1,);
    
    
        //Longitud de las filas
        $header = array("Boleta", "Laboratorio", "Hora");
        //En este caso es un array con un solo objeto y debemos mandar un array de objetos.
        $object[] = $datos;
        $pdf->FancyTable($header, $object);
        
    }
    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', 12);


    
    return $pdf;
   
}
?>