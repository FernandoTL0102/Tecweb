<?php

session_start();

require "../backend/email/correo.php";
require '../backend/pdf/pdf_maker.php';
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
$curp =$_SESSION['curp'];
$pdf = generatePDF($_SESSION);
$doc = $pdf->Output('S', "", true);
$pdf->Output('D', $curp.".pdf", true);
?>