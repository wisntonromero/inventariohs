    <?php
        include('config.php');
        include_once("sesion.php");
        
        require 'phpmailer/PHPMailerAutoload.php';
        header('Content-Type: application/json');
        
        $conexion = mysql_connect($server,$username,$password);
        mysql_set_charset('utf8',$conexion);
        mysql_select_db($database);

        $nro_cc = $_POST['nro_cc'];
        $descripcion_cc = $_POST['descripcion_cc'];
        $f_h_prestamo = $_POST['f_h_prestamo'];
        $f_h_limite = $_POST['f_h_limite'];
      
        $cliente = $_POST['cliente'];
        $empresa = $_POST['empresa'];
        $correo = $_POST['correo'];
        $ext_tel = $_POST['ext_tel'];
        $trabajo = $_POST['trabajo'];

        $query = "INSERT INTO prestamo_llaves (nro_cc, descripcion_cc, f_h_prestamo, f_h_limite, f_h_recibido, cliente, empresa, correo, ext_tel, trabajo) VALUES ('$nro_cc', '$descripcion_cc',
        '$f_h_prestamo', '$f_h_limite', '$f_h_recibido', '$cliente', '$empresa', '$correo','$ext_tel', '$trabajo') ";

        $resultado = mysql_query($query,$conexion);

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
        $mail->addAddress("$correo", "$cliente");
        $mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
        //Set the subject line
        $mail->Subject = 'Prestamo de llaves para ingreso al :  ' . "$descripcion_cc";
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->Body =   'El dia : ' . "$f_h_prestamo" . ' se hace entrega de las llaves del '. "$descripcion_cc " . ' según formato de acceso a los centros de cableados diligenciado y enviado por usted via E-mail.'. "\r\n" ."\r\n" .
                                'TENER EN CUENTA LA SIGUIENTE INFORMACIÓN: '. "\r\n" . "\r\n" .

                                'LA PERSONA ENCARGADA DE RETIRAR LAS LLAVES DEL LAB DE MICROS ES EL ING DE PROYECTOS QUE SOLICITA LAS LLAVES.'. "\r\n" . "\r\n" .
                                
                                'LAS LLAVES DE LOS CENTROS DE CABLEADOS SE PRESTAN ÚNICAMENTE PARA INSPECCIONES O REVISIÓN DE EQUIPOS EN CASO DE ALGUN DAÑO O EMERGENCIA. '. "\r\n" . "\r\n" .

                                'LAS LLAVES DE LOS CENTROS DE CABLEADOS NO SE PRESTAN PARA TRABAJOS EN DÍA DE SEMANA, EN HORARIO LABORAL O DE CLASES. LOS TRABAJOS DENTRO DE LOS CENTROS DE CABLEADOS SE AUTORIZAN ÚNICAMENTE LOS DÍAS DE SEMANA DESPUÉS  DE 8:30 PM,  SÁBADOS  A PARTIR DE 3:30 PM , DOMINGOS Y FESTIVOS TODO EL DÍA.'. "\r\n" . "\r\n" .

                                'La fecha y hora limite para la devolución de las llaves es para el  : '."$f_h_limite" . "\r\n" .
                                'Usuario que solicita las llaves                                     : ' ."$cliente". "\r\n" .
                                'Trabajo a realizar en el centro de cableado                         : ' ."$trabajo". "\r\n" .  "\r\n" . 
                                'Nota importante.'. "\r\n" .
                                'Las llaves deben ser devueltas únicamente en el laboratorio de micros al responsable de los centros de cableados.  En horario de oficina de 8:00 am a 12:00 pm y de 2:00 pm  a 6:00 pm' . "\r\n" .    
                                'Recuerde que una vez usted entregue las llaves en las manos del responsable, le llegara automáticamente un E-mail confirmando la devolución de las mismas.' . "\r\n" . "\r\n" . 
                                'Este E-mail es enviado automáticamente desde el sistema de préstamo de llaves.' ;//Mensaje de 2 lineas
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }

?>