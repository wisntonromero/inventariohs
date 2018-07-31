    <?php
        include('config.php');
        ini_set ('error_reporting', E_ALL);
        include_once('sesion.php');

        require 'phpmailer/PHPMailerAutoload.php';
        header('Content-Type: application/json');

        $conexion = mysql_connect($server,$username,$password);
        mysql_set_charset('utf8',$conexion);
        mysql_select_db($database);

        //$id                         = strtoupper($_POST['id']);
        $activo_equipo              = strtoupper($_POST['activo_equipo']);
        $tipo_equipo                = strtoupper($_POST['tipo_equipo']);
        $marca_equipo               = strtoupper($_POST['marca_equipo']);
        $modelo_equipo              = strtoupper($_POST['modelo_equipo']);
        $serial_equipo              = strtoupper($_POST['serial_equipo']);
        $f_prestamo                 = $_POST['f_prestamo'];
        $f_limite                   = $_POST['f_limite'];
        $activo_danado              = strtoupper($_POST['activo_danado']);

        $bloque                     = strtoupper($_POST['bloque']);
        $piso                       = strtoupper($_POST['piso']);
        $cubiculo                   = strtoupper($_POST['cubiculo']);
        $departamento               = strtoupper($_POST['departamento']);
        $usuario_equipo             = strtoupper($_POST['usuario_equipo']);
        $email_usuario              = strtolower($_POST['email_usuario']);
        $ext_tel                    = strtoupper($_POST['ext_tel']);

        $ot_sigma                   = strtoupper($_POST['ot_sigma']);
        $usuario_tecnico            = strtoupper($_POST['usuario_tecnico']);
        $email_usuario_tecnico      = strtolower($_POST['email_usuario_tecnico']);
        $usuario_que_presta_soporte = strtoupper($_POST['usuario_que_presta_soporte']);
        $observaciones              = strtoupper($_POST['observaciones']);

        $query = "INSERT INTO prestamo_soportes (activo_equipo, tipo_equipo, f_prestamo, f_limite, activo_danado, bloque, piso, cubiculo, departamento, usuario_equipo, email_usuario, ext_tel, ot_sigma, usuario_tecnico, email_usuario_tecnico, usuario_que_presta_soporte, observaciones)
        VALUES ('$activo_equipo', '$tipo_equipo', '$f_prestamo', '$f_limite', '$activo_danado', '$bloque', '$piso', '$cubiculo', '$departamento', '$usuario_equipo', '$email_usuario', '$ext_tel', '$ot_sigma', '$usuario_tecnico', '$email_usuario_tecnico', '$usuario_que_presta_soporte','$observaciones') ";
        $resultado = mysql_query($query,$conexion);

        $query = "UPDATE hardware SET estado_equipo='EN PRESTAMO' WHERE activo_equipo='$activo_equipo'";
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
        $mail->addAddress("$email_usuario", "$usuario_equipo");
        $mail->AddCC("$email_usuario_tecnico", "$usuario_tecnico");
        $mail->AddCC("coordinadorequipoinformatico@uninorte.edu.co", "Alvaro Ivan Santiago Arellana");
        $mail->AddCC("comprasmantenimiento3@uninorte.edu.co", 'Compras Mantenimiento Uninorte 03');
        $mail->AddCC("labmicros@uninorte.edu.co", 'Laboratorio Microcomputadores');
        $mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
        //Set the subject line
        $mail->Subject = 'Préstamo  de equipo de soporte activo:  ' . "$activo_equipo";
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->Body =   'El día : ' . "$f_prestamo" . ' se realiza entrega de un equipo activo Nro : '. "$activo_equipo " . ' en calidad de soporte o préstamo.'. "\r\n" .
                                'Tenga en cuenta la siguiente información: '. "\r\n" . "\r\n" .
                                'Fecha de préstamo                                                   : ' ."$f_prestamo". "\r\n" .
                                'Fecha de limite del préstamo *                                      : ' ."$f_limite". "\r\n" .
                                'Activo equipo prestado                                              : ' ."$activo_equipo". "\r\n" .
                                'Tipo de equipo                                                      : ' ."$tipo_equipo". "\r\n" .
                                'Marca del equipo                                                    : ' ."$marca_equipo". "\r\n" .
                                'Modelo del equipo                                                   : ' ."$modelo_equipo". "\r\n" .
                                'Serial del equipo                                                   : ' ."$serial_equipo". "\r\n" .
                                '********************************************************************'."\r\n" .
                                'Activo dañado                                                       : ' ."$activo_danado". "\r\n" .
                                'Usuario al que se le coloca el equipo de soporte o en préstamo      : ' ."$usuario_equipo". "\r\n" .
                                'E-mail del usuario                                                  : ' ."$email_usuario". "\r\n" .
                                'Bloque                                                              : ' ."$bloque". "\r\n" .
                                'Piso                                                                : ' ."$piso". "\r\n" .
                                'Cubículo                                                            : ' ."$cubiculo". "\r\n" .
                                'Departamento                                                        : ' ."$departamento". "\r\n" .
                                'Ext Telefónica                                                      : ' ."$ext_tel". "\r\n" .
                                'Ot de Aranda                                                        : ' ."$ot_sigma". "\r\n" .
                                'Técnico que atiende el servicio                                     : ' ."$usuario_tecnico". "\r\n" .
                                'Observaciones                                                       : ' ."$observaciones". "\r\n" . "\r\n" .
                                'Nota importante:'. "\r\n" .
                                '* Se instaló equipo de soporte que estará disponible por los próximos 120 días calenadario, una vez cumplido este tiempo la oficina de mantenimiento podrá retirar el equipo en caso de necesitarlo.' . "\r\n" . "\r\n" .
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