<?php
//se compone el mensaje
include('config.php');
 // include_once("sesion.php");
require 'phpmailer/PHPMailerAutoload.php';


//recogida de información
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$foto = $_FILES['foto'];
$foto2 = $_FILES['foto2'];

//validamos la información (ejemplo muy sencillo)
$errores = array();
if ($nombre == ""){
  	$errores[] = "Falta nombre";
}
if ($edad == ""){
  $errores[] = "Falta edad";
}
if ($foto['name'] == "" || $foto['size'] == 0){
  $errores[] = "Falta la foto";
}
if ($foto2['name'] == "" || $foto2['size'] == 0){
  $errores[] = "Falta la foto2";
}

//si hay errores se muestran y se sale del programa
if (count($errores) > 0){
  echo "Se han encontrado los siguientes errores:<br />";
  foreach($errores as $error){
    echo $error."<br />";
  }
  
  die("<a href=˜index.html˜>Atrás</a>");
}


$mail = new PHPMailer();
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "weromero@uninorte.edu.co";
//****$mail->Username = ($_SESSION['correo']);
//Password to use for SMTP authentication
$mail->Password = "werd741110";
$mail->setFrom('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
$mail->Subject = 'APROBACIÓN PARA EL ENVÍO DE EQUIPOS SIN REPARACIÓN AL ALMACÉN.    SOLICITUD : ';
$mail->AddAddress("weromero@uninorte.edu.co", "weromero@uninorte.edu.co");
$body = "Nuevo sociorn";
$body .= "Nombre: $nombrern";
$body .= "Edad: $edadrn";
$mail->Body = $body;
//adjuntamos un archivo
$mail->AddAttachment($foto['tmp_name'],$foto['name']);
$mail->AddAttachment($foto2['tmp_name'],$foto2['name']);
echo $foto;
$mail->Send();

echo "Solicitud enviada. Gracias.";
?>