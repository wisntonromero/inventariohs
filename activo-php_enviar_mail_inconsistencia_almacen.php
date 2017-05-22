<?php
  include('config.php');
  include_once("sesion.php");
  require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST['activo_equipo'];
    $tipo_equipo = $_POST['tipo_equipo'];
    $activo_mon = $_POST['activo_mon'];
    $bloque = $_POST['bloque'];
	$piso = $_POST['piso'];
	$cubiculo = $_POST['cubiculo'];
    $departamento = $_POST['departamento'];
    $usuario = $_POST['usuario'];
    $email_usuario = $_POST['email_usuario'];
    $responsable = $_POST['responsable'];
    $email_responsable = $_POST['email_responsable'];

/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('Etc/UTC');
//Create a new PHPMailer instance
$mail-> charSet = "UTF-8";
//$mail­->Encoding = "quoted­printable";
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
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
$mail->Username = ($_SESSION['correo']);
//Password to use for SMTP authentication
$mail->Password = base64_decode(($_SESSION['contrasena']));
//Set who the message is to be sent from
$mail->setFrom('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
//Set an alternative reply-to address
$mail->addReplyTo('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
//Set who the message is to be sent to
$mail->addAddress('trasladosybajas@uninorte.edu.co', 'trasladosybajas@uninorte.edu.co');
$mail->AddCC("coordinadordeactivos@uninorte.edu.co", "Jairo Insignares Palacio");
$mail->AddBCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
//$mail->AddCC("$email_usuario", "$usuario");
//Set the subject line
$mail->Subject = 'INCONSISTENCIA EN RESPONSABLE DEL EQUIPO - FAVOR REVISAR ACTIVO :  ' . "$activo_equipo";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = 	'Según lo solicitado por usted, envío información del equipo con posible INCONSISTENCIA: '. "\r\n" . "\r\n" .
				'Activo del equipo                  : '. "$activo_equipo"."\r\n" .
				'Tipo de equipo                     : '. "$tipo_equipo" . "\r\n" .
                'Activo monitor                     : '. "$activo_mon" . "\r\n" .
                'Responsable del equipo en banner   : '. "$responsable". "\r\n" .
				'Usuario del equipo actual          : '. "$usuario". "\r\n" .
				'Departamento                       : '. "$departamento". "\r\n" .
				'Bloque                             : '. "$bloque". "\r\n" .
				'Piso                               : '. "$piso". "\r\n" .
				'Ubicación                          : '. "$cubiculo". "\r\n" ."\r\n" .
                'NOTA: Favor responder por este mismo medio, las modificaciones realizadas para actualizar datos en el inventario interno del Laboratorio de Micros.'."\r\n" ."\r\n" .
                'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos del Laboratorio de Micros.' ;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
