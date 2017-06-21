<?php
  include('config.php');
  require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo          = $_POST['activo_equipo'];
    $id_tip                 = $_POST['id_tip'];
    $id_mar                 = $_POST['id_mar'];
    $modelo_equipo          = $_POST['modelo_equipo'];
    $activo_monitor         = $_POST['activo_monitor'];
    $id_pri                 = $_POST['id_pri'];
    $id_est                 = $_POST['estado_equipo'];

    $responsable_actual     = $_POST['responsable_actual'];
    $usuario                = $_POST['usuario'];

    $bloque_actual          = $_POST['bloque_actual'];
    $piso_actual            = $_POST['piso_actual'];
    $cubiculo_actual        = $_POST['cubiculo_actual'];

    $activo_equipo_retirar  = $_POST['activo_equipo_retirar'];
    $activo_monitor_retirar = $_POST['activo_monitor_retirar'];
    $id_pro                 = $_POST['id_pro'];
    $proceso_equipo_retirar = $_POST['proceso_equipo_retirar'];

    $responsable            = $_POST['responsable'];
    $nuevo_usuario          = $_POST['nuevo_usuario'];
    $bloque                 = $_POST['bloque'];
    $piso                   = $_POST['piso'];
    $cubiculo               = $_POST['cubiculo'];
    $nuevo_dir_ip           = $_POST['nuevo_dir_ip'];
    $dir_mac                = $_POST['dir_mac'];
    $nuevo_punto_de_red     = $_POST['nuevo_punto_de_red'];
    $ot_sigma               = $_POST['ot_sigma'];
    $ext_tel                = $_POST['ext_tel'];
    $nuevo_observaciones    = $_POST['nuevo_observaciones'];

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
//$mail->addAddress('linea123@uninorte.edu.co', 'linea123@uninorte.edu.co');
$mail->addAddress('weromero@uninorte.edu.co', 'weromero@uninorte.edu.co');
//$mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
//Set the subject line
$mail->Subject = 'SOLICITUD - Favor hacer reserva de IP a este activo por cambio de equipo :  ' . "$activo_equipo";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = 	'Favor hacer reserva de IP por cambio de equipo : '. "\r\n" . "\r\n" .
				'Activo del equipo 		: '. "$activo_equipo"."\r\n" .
				//'Tipo de equipo 		: '. "$tipo_equipo" . "\r\n" .
				'Dirección IP 			: '. "$nuevo_dir_ip". "\r\n" .
				'Dirección Mac 			: '. "$dir_mac". "\r\n" .
				'Punto de red 			: '. "$nuevo_punto_de_red". "\r\n" .
				'Responsable del equipo : '. "$responsable". "\r\n" .
                'Usuario del equipo 	: '. "$nuevo_usuario". "\r\n" .
				//'Departamento 			: '. "$departamento". "\r\n" .
				'Bloque 				: '. "$bloque". "\r\n" .
				'Piso 					: '. "$piso". "\r\n" .
				'Ubicación 				: '. "$cubiculo". "\r\n" .
				//'Dirección ip sw 		: '. "$dir_ip_sw". "\r\n" .
				//'Puerto en el sw 		: '. "$puerto_sw". "\r\n" .
				//'Vlan Puerto en el sw 	: '. "$vlan_puerto_sw". "\r\n" . "\r\n" .
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
