<?php
session_start();

if (isset($_POST['txtNombre']) && isset($_POST['txtMail']) && isset($_POST['txtFono']) && isset($_POST['cbxTipoFicha']) && isset($_POST['txtNombrePaciente']) && isset($_POST['txtRutPaciente'])) {


$nombre = $_POST['txtNombre'];
$remitente = $_POST['txtMail'];
$nroTelefono = $_POST['txtFono'];
$nombrePaciente = $_POST['txtNombrePaciente'];
$rutPaciente = $_POST['txtRutPaciente'];
$tipoFicha = $_POST['cbxTipoFicha'];
$descripcion = "";

if(count($tipoFicha) > 1){
    $descripcion = $tipoFicha[0]. " | " . $tipoFicha[1];
}else{
    $descripcion = implode($tipoFicha);
}

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username = 'registrosclinicale@clinicale.cl';
$mail->Password = 'Faj42792';
$mail->SetFrom('registrosclinicale@clinicale.cl', 'Solicitud Registro Clínico');
$mail->addAddress('katalina.guerrero@clinicale.cl', 'Estadística');
// $mail->SMTPDebug  = 3;
// $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';

$mail->Subject = 'Ficha de '. $nombrePaciente;
$mail->Body    = '<b> Información de contacto </b> </br>  <b> Solicitante: </b>' . $nombre.
'</br> <b>E-mail: </b>'. $remitente. "</br><b>Telefono:</b> " . $nroTelefono. "</br> 
<b>Paciente:</b> ".$rutPaciente." | ".$nombrePaciente. "</br> 
<b>Tipo de Ficha:</b> ". $descripcion;
$mail->AltBody = 'Solicitante: '. $nombre. ' Información de contacto'. $remitente;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $_SESSION['exito'] = 'exito';
    header("Location: solicitud.php");
}


}


?>
