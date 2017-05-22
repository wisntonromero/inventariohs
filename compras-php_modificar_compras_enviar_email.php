<?php
    include('config.php');
    require_once('sesion.php');
    require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo          = strtoupper($_POST['activo_equipo']);
    $orden_de_compra        = strtoupper($_POST['orden_de_compra']);
    $id_tip                 = $_POST['id_tip'];
    $tipo_equipo            = $_POST['tipo_equipo'];
    $id_mar                 = $_POST['id_mar'];
    $modelo_equipo          = strtoupper($_POST['modelo_equipo']);
    $id_pri                 = $_POST['id_pri'];
    $serial_equipo          = strtoupper($_POST['serial_equipo']);
    $id_cen                 = $_POST['id_cen'];
    $activo_monitor         = strtoupper($_POST['activo_monitor']);
    $serial_monitor         = strtoupper($_POST['serial_monitor']);
    $id_est                 = $_POST['id_est'];
    $estado_equipo          = strtoupper($_POST['estado_equipo']);
    $activo_equipo_retirar  = strtoupper($_POST['activo_equipo_retirar']);
    $activo_monitor_retirar = strtoupper($_POST['activo_monitor_retirar']);
    $id_pro                 = $_POST['id_pro'];
    $proceso_equipo_retirar = $_POST['proceso_equipo_retirar'];

    $responsable            = strtoupper($_POST['responsable']);
    $email_responsable      = strtolower($_POST['email_responsable']);
    $usuario                = strtoupper($_POST['usuario']);
    $email_usuario          = strtolower($_POST['email_usuario']);
    $ext_tel                = strtoupper($_POST['ext_tel']);

    $bloque                 = strtoupper($_POST['bloque']);
    $piso                   = strtoupper($_POST['piso']);
    $cubiculo               = strtoupper($_POST['cubiculo']);

    $dir_ip                 = $_POST['dir_ip'];
    $dir_mac                = strtoupper($_POST['dir_mac']);
    $punto_de_red           = strtoupper($_POST['punto_de_red']);
    $ot_sigma               = strtoupper($_POST['ot_sigma']);
    $observaciones          = strtoupper($_POST['observaciones']);

    // $query = "UPDATE compras SET com_observaciones='$observaciones' WHERE com_activo_equipo='$activo_equipo'";
    // $resultado1 = mysql_query($query,$conexion);

    $query = "UPDATE compras SET com_orden_de_compra='$orden_de_compra',com_tipo_equipo='$id_tip', com_marca_equipo='$id_mar', com_modelo_equipo='$modelo_equipo',
    com_prioridad='$id_pri',com_serial_equipo='$serial_equipo',com_centro_costo='$id_cen',com_activo_monitor='$activo_monitor', com_serial_monitor='$serial_monitor',
    com_estado_equipo='$id_est', com_activo_equipo_retirar='$activo_equipo_retirar', com_activo_monitor_retirar='$activo_monitor_retirar', com_proceso_equipo='$id_pro',
    com_responsable='$responsable', com_email_responsable='$email_responsable', com_usuario='$usuario', com_email_usuario='$email_usuario', com_extension='$ext_tel',com_bloque='$bloque', com_piso='$piso',com_cubiculo='$cubiculo', com_dir_ip='$dir_ip',
    com_dir_mac='$dir_mac', com_punto_de_red='$punto_de_red', com_ot_sigma='$ot_sigma',com_observaciones='$observaciones', com_f_ult_actualizacion=NOW() WHERE com_activo_equipo='$activo_equipo'";
    $resultado1 = mysql_query($query,$conexion);

    $query  = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$id_est',NOW(),'$activo_equipo', upper('$user'))" or die("Error in the consult.." . mysqli_error($query));
    $resultado2 = mysql_query($query,$conexion);

    $query = "INSERT INTO hardware(activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, serial_equipo, activo_mon, estado_equipo, dir_ip, dir_mac, punto_de_red, punto_de_voz, f_ult_actualiza, responsable, email_responsable, usuario, email_usuario, ext_tel, observaciones)
    VALUES ('$activo_equipo', '$tipo_equipo', '$id_mar', '$modelo_equipo', '$serial_equipo', '$activo_monitor', 'ACTIVO', '$dir_ip', '$dir_mac', '$punto_de_red', 'NO TIENE', NOW(), '$responsable', '$email_responsable', '$usuario', '$email_usuario', '$ext_tel', 'VIENE DEL MODULO DE COMPRAS DE JOSE GUERRERO - INGRESO MANUAL.') ";
    $resultado3 = mysql_query($query,$conexion);


    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
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
    $mail->setFrom($_SESSION['correo'], $_SESSION['nombre']);
    //Set an alternative reply-to address
    $mail->addReplyTo($_SESSION['correo'], $_SESSION['nombre']);
    //Set who the message is to be sent to
    $mail->addAddress("trasladosybajas@uninorte.edu.co", "Traslados y Bajas Uninorte");
    $mail->addAddress("coordinadorequipoinformatico@uninorte.edu.co", "Coordinador Equipo Informatico");
    $mail->addAddress("egaliano@uninorte.edu.co", "Emma Beatriz Galiano Vargas");
    $mail->AddCC("recepciondeactivos@uninorte.edu.co", "Recepcion de Activos");
    $mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
    //Set the subject line
    $mail->Subject = 'ENTREGA DE ACTIVO :  ' . "$activo_equipo";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
    //Replace the plain text body with one created manually
    $mail->Body =   'Por medio del presente correo, hago entrega del siguiente equipo, comprado bajo la orden de compra nro : '. "$orden_de_compra". "\r\n" . "\r\n" .
                    'Activo del equipo          : '. "$activo_equipo"."\r\n" .
                    'Tipo de equipo             : '. "$tipo_equipo" . "\r\n" .
                    'Serial equipo              : '. "$serial_equipo" . "\r\n" .
                    'Activo monitor             : '. "$activo_monitor" . "\r\n" .
                    'Serial monitor             : '. "$serial_monitor" . "\r\n" .
                    'Responsable del equipo     : '. "$responsable". "\r\n" .
                    'Usuario del equipo         : '. "$usuario". "\r\n" .
                    'Bloque                     : '. "$bloque". "\r\n" .
                    'Piso                       : '. "$piso". "\r\n" .
                    'Ubicación                  : '. "$cubiculo". "\r\n" .
                    'Activo a retirar           : '. "$activo_equipo_retirar". "\r\n" . 
                    'Activo monitor a retirar   : '. "$activo_monitor_retirar". "\r\n" . 
                    'Proceso equipo retirado    : '. "$proceso_equipo_retirar". "\r\n" .
                    'Observaciones              : '. "$observaciones". "\r\n" . "\r\n" .
                    'El activo se entrega en perfectas condiciones.'. "\r\n" .
                    'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos del Laboratorio de Micros.' ;

    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    mysql_close($conexion);
?>