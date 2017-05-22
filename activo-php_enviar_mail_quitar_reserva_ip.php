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
    $marca_equipo = $_POST['marca_equipo'];
    $modelo_equipo = $_POST['modelo_equipo'];
    $activo_mon = $_POST['activo_mon'];
    $estado_equipo = $_POST['estado_equipo'];

    $dir_ip = $_POST['dir_ip'];
    $dir_mac = $_POST['dir_mac'];
    $punto_de_red = $_POST['punto_de_red'];
	$dir_ip_sw = $_POST['dir_ip_sw'];
	$puerto_sw = $_POST['puerto_sw'];
	$vlan_puerto_sw = $_POST['vlan_puerto_sw'];
	$bloque = $_POST['bloque'];
	$piso = $_POST['piso'];
	$cubiculo = $_POST['cubiculo'];
    $f_ult_actualiza = $_POST['f_ult_actualiza'];

    $departamento = $_POST['departamento'];
    $responsable = $_POST['responsable'];
    $usuario = $_POST['usuario'];
    $ext_tel = $_POST['ext_tel'];
    $observaciones = $_POST['observaciones'];

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
$mail->addAddress('csu@uninorte.edu.co', 'csu@uninorte.edu.co');
$mail->AddCC("mierg@uninorte.edu.co", "Gustavo Adolfo Mier Silva");
$mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
//Set the subject line
$mail->Subject = 'SOLICITUD - Favor quitar reserva de ip a este equipo  :  ' . "$activo_equipo" .", ver observaciones.";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = 	'Favor quitar reserva de ip a este equipo 	: '. "\r\n" . "\r\n" .
				'Activo del equipo      : '. "$activo_equipo"."\r\n" .
				'Tipo de equipo         : '. "$tipo_equipo" . "\r\n" .
				'Dirección IP           : '. "$dir_ip". "\r\n" .
				'Dirección Mac          : '. "$dir_mac". "\r\n" .
				'Punto de red           : '. "$punto_de_red". "\r\n" .
				'Usuario del equipo     : '. "$usuario". "\r\n" .
				'Departamento           : '. "$departamento". "\r\n" .
				'Bloque                 : '. "$bloque". "\r\n" .
				'Piso 					: '. "$piso". "\r\n" .
				'Ubicación              : '. "$cubiculo". "\r\n" .
				'Dirección ip sw        : '. "$dir_ip_sw". "\r\n" .
				'Puerto en el sw        : '. "$puerto_sw". "\r\n" .
				'Vlan Puerto en el sw   : '. "$vlan_puerto_sw". "\r\n" .
                'Observaciones          : '. "$observaciones". "\r\n" . "\r\n" .
				'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos.' ;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
