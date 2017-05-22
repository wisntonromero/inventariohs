<?php
    include('config.php');
    //require_once('sesion.php');
    require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = strtoupper($_POST['activo_equipo']);
    $tipo_equipo = strtoupper($_POST['tipo_equipo']);
    $marca_equipo = strtoupper($_POST['marca_equipo']);
    $modelo_equipo = strtoupper($_POST['modelo_equipo']);
    $serial_equipo = strtoupper($_POST['serial_equipo']);
    $estado_equipo = strtoupper($_POST['estado_equipo']);

    $dir_mac = strtoupper($_POST['dir_mac']);

    $responsable = strtoupper($_POST['responsable']);
    $email_responsable = strtolower ($_POST['email_responsable']);
    $usuario = strtoupper($_POST['usuario']);
    $email_usuario = strtolower ($_POST['email_usuario']);
    $ext_tel = $_POST['ext_tel'];
    $f_compra = $_POST['f_compra'];
    $bodega_actual = strtoupper($_POST['bodega_actual']);
    $observaciones = strtoupper($_POST['observaciones']);

    $query = "INSERT INTO alquilados(activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, serial_equipo, activo_mon, estado_equipo, dir_ip, dir_mac, punto_de_red, punto_de_voz, f_ult_actualiza, departamento, responsable, email_responsable, usuario, email_usuario, ext_tel, f_compra, bodega_actual, observaciones)
    VALUES ('$activo_equipo', '$tipo_equipo', '$marca_equipo', '$modelo_equipo', '$serial_equipo', 'NO APLICA', '$estado_equipo', '000.000.000.000', '$dir_mac', 'NO TIENE', 'NO TIENE',  NOW(), 'NO APLICA', '$responsable', '$email_responsable', '$usuario', '$email_usuario', '$ext_tel', '$f_compra', '$bodega_actual', '$observaciones')";
    $resultado1 = mysql_query($query,$conexion);

    $query  = "INSERT INTO bitacora_alquilados(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('7',NOW(),'$activo_equipo',upper('$user'))" or die("Error in the consult.." . mysqli_error($query));
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
        $mail->Username = ($_SESSION['correo'], $_SESSION['nombre']);
        //Password to use for SMTP authentication
        $mail->Password = base64_decode(($_SESSION['contrasena']));
        //Set who the message is to be sent from
        $mail->setFrom($_SESSION['correo'], $_SESSION['nombre']);
        //Set an alternative reply-to address
        $mail->addReplyTo($_SESSION['correo'], $_SESSION['nombre']);
        //Set who the message is to be sent to
        $mail->addAddress("$email_usuario", "$usuario");
       // $mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
        $mail->AddCC("$email_responsable", "$responsable");
        //$mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
        //Set the subject line
        $mail->Subject = 'Entrada a bodega de un pc alquilado, activo:  ' . "$activo_equipo";
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->Body =   'El día de hoy se realiza la entrada de un equipo alquilado a bodega, con activo Nro : '. "$activo_equipo " . '.'. "\r\n" .
                                'Tenga en cuenta la siguientes información descrita abajo. '. "\r\n" . "\r\n" .
                                'Activo equipo alquilado que entra a bodega                          : ' ."$activo_equipo". "\r\n" .
                                'Tipo de equipo                                                      : ' ."$tipo_equipo". "\r\n" .
                                'Marca del equipo                                                    : ' ."$marca_equipo". "\r\n" .
                                'Modelo del equipo                                                   : ' ."$modelo_equipo". "\r\n" .
                                'Serial del equipo                                                   : ' ."$serial_equipo". "\r\n" .
                                'Estado del equipo                                                   : ' ."$estado_equipo". "\r\n" .
                                'Responsable del equipo                                              : ' ."$responsable". "\r\n" .
                                'Usuario o técnico custodio del equipo                               : ' ."$usuario". "\r\n" .
                                'Fecha de compra del equipo                                          : ' ."$f_compra". "\r\n" .
                                'Bodega donde se encuentra el equipo actualmente                     : ' ."$bodega_actual". "\r\n" .
                                'Observaciones                                                       : ' ."$observaciones". "\r\n" .
                                'Nota importante:'. "\r\n" .
                                'Este E-mail es enviado automáticamente desde el sistema de inventario del Laboratorio de Micros.' ;//Mensaje de 2 lineas
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
?>