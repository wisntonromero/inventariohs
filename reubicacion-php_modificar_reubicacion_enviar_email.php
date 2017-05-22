<?php
    include('config.php');
    require_once('sesion.php');
    require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $reu_id                 = ($_POST['reu_id']);
    $activo_equipo          = strtoupper($_POST['activo_equipo']);
    $id_tip                 = $_POST['id_tip'];
    $tipo_equipo            = $_POST['tipo_equipo'];
    $id_mar                 = $_POST['id_mar'];
    $marca                  = strtoupper($_POST['marca']);
    $modelo_equipo          = strtoupper($_POST['modelo_equipo']);
    $id_pri                 = $_POST['id_pri'];
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
    $usuario                = strtoupper($_POST['usuario']);
    $nuevo_ext_tel          = strtoupper($_POST['nuevo_ext_tel']);

    $bloque                 = strtoupper($_POST['bloque']);
    $piso                   = strtoupper($_POST['piso']);
    $cubiculo               = strtoupper($_POST['cubiculo']);

    $dir_ip                 = $_POST['dir_ip'];
    $dir_mac                = strtoupper($_POST['dir_mac']);
    $punto_de_red           = strtoupper($_POST['punto_de_red']);
    $ot_sigma               = strtoupper($_POST['ot_sigma']);
    $activo_equipo_soporte  = strtoupper($_POST['activo_equipo_soporte']);
    $observaciones          = strtoupper($_POST['observaciones']);

    $nuevo_responsable      = strtoupper($_POST['nuevo_responsable']);
    $email_nuevo_responsable= strtolower($_POST['email_nuevo_responsable']);
    $nuevo_usuario          = strtoupper($_POST['nuevo_usuario']);
    $email_nuevo_usuario    = strtolower($_POST['email_nuevo_usuario']);
    $nuevo_bloque           = strtoupper($_POST['nuevo_bloque']);
    $nuevo_piso             = strtoupper($_POST['nuevo_piso']);
    $nuevo_cubiculo         = strtoupper($_POST['nuevo_cubiculo']);

    // $query = "UPDATE compras SET com_observaciones='$observaciones' WHERE com_activo_equipo='$activo_equipo'";
    // $resultado1 = mysql_query($query,$conexion);

    $query = "UPDATE reubicaciones SET reu_activo='$activo_equipo', reu_tipo_equipo='$id_tip', reu_marca_equipo='$id_mar', reu_modelo_equipo='$modelo_equipo',
    reu_activo_monitor='$activo_monitor',reu_estado_equipo='$id_est',reu_prioridad='$id_pri',reu_responsable='$responsable', reu_usuario='$usuario',
    reu_bloque='$bloque', reu_piso='$piso', reu_cubiculo='$cubiculo', reu_activo_equipo_retirar='$activo_equipo_retirar', reu_activo_monitor_retirar='$activo_monitor_retirar',
    reu_proceso_equipo_retirar='$id_pro', reu_nuevo_responsable='$nuevo_responsable', reu_email_nuevo_responsable='$email_nuevo_responsable', reu_nuevo_usuario='$nuevo_usuario', reu_email_nuevo_usuario='$email_nuevo_usuario', reu_nuevo_bloque='$nuevo_bloque', reu_nuevo_piso='$nuevo_piso',
    reu_nuevo_cubiculo='$nuevo_cubiculo', reu_dir_ip='$dir_ip', reu_dir_mac='$dir_mac', reu_punto_de_red='$punto_de_red', reu_extension='$nuevo_ext_tel', reu_ot_sigma='$ot_sigma',
    reu_activo_soporte='$activo_equipo_soporte', reu_observacion='$observaciones', reu_f_ult_actualizacion=NOW() WHERE reu_id='$reu_id'";
    $resultado1 = mysql_query($query,$conexion);


    $query  = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$id_est',NOW(),'$activo_equipo',upper('$user'))" or die("Error in the consult.." . mysqli_error($query));
    $resultado2 = mysql_query($query,$conexion);


    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
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
    //$mail->addAddress("trasladosybajas@uninorte.edu.co", "Traslados y Bajas Uninorte");
    $mail->addAddress("coordinadorequipoinformatico@uninorte.edu.co>", "Coordinador Equipo Informatico");
    $mail->addAddress("arellanaa@uninorte.edu.co>", "Alvaro Ivan Santiago Arellana");
   // $mail->addAddress("egaliano@uninorte.edu.co", "Emma Beatriz Galiano Vargas");
  //  $mail->AddCC("recepciondeactivos@uninorte.edu.co", "Recepcion de Activos");
  //  $mail->AddCC("soportealmacen2@uninorte.edu.co", "Soporte Almacen 2");
    $mail->AddCC("$email_nuevo_responsable", "$nuevo_responsable");
    $mail->AddCC("$email_nuevo_usuario", "$nuevo_usuario");
    $mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
    
    //Set the subject line
    $mail->Subject = 'TRASLADO DE ACTIVO :  ' . "$activo_equipo";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
    //Replace the plain text body with one created manually
    $mail->Body =   'Por medio del presente correo, hago entrega del siguiente equipo : '."\r\n" . "\r\n" .
                    'Activo del equipo          : '. "$activo_equipo"."\r\n" .
                    'Tipo de equipo             : '. "$tipo_equipo" . "\r\n" .
                    'Marca del equipo           : '. "$marca" . "\r\n" .
                    'Activo monitor             : '. "$activo_monitor" . "\r\n" .
                    'Responsable del equipo     : '. "$nuevo_responsable". "\r\n" .
                    'Usuario del equipo         : '. "$nuevo_usuario". "\r\n" .
                    'Bloque                     : '. "$nuevo_bloque". "\r\n" .
                    'Piso                       : '. "$nuevo_piso". "\r\n" .
                    'Ubicación                  : '. "$nuevo_cubiculo". "\r\n" .
                    'Activo retirado            : '. "$activo_equipo_retirar"."\r\n".
                    'Activo monitor retirado    : '. "$activo_monitor_retirar"."\r\n".
                    'Proceso equipo retirado    : '. "$proceso_equipo_retirar". "\r\n" .
                    'Observaciones              : '. "$observaciones". "\r\n" ."\r\n" .
                    'El activo se entrega en perfectas condiciones, el usuario se RESPONSABILIZA por la custodia y buen manejo del mismo durante su permanecía en la universidad.'. "\r\n" . "\r\n" .
                    'Una vez recibida la notificación, el Auxiliar de activos  actualiza la información en el sistema Banner de acuerdo a los procedimientos establecidos.' . "\r\n" . "\r\n" .
                    'Sr. Usuario, si usted encuentra alguna inconsistencia en la información suministrada en el presente correo, favor notificarlo inmediatamente a trasladosybajas@uninorte.edu.co ó a coordinadordeactivos@uninorte.edu.co' . "\r\n" . "\r\n" .
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


