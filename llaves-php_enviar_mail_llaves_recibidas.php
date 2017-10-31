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
            $mail->addAddress("$this->correo", "$this->nomcliente");
            //$mail->addAddress("weromero@uninorte.edu.co", 'weromero@uninorte.edu.co');
            $mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
            //Set the subject line
            $mail->Subject = 'Devolucion de llaves del :' . "$this->descripcion_cc" .' al Lab de micros ';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
            //Replace the plain text body with one created manually
            $mail->Body =   'El dia : ' . "$this->f_h_recibido" . ' se realizo la devolucion de las llaves del ' . "$this->descripcion_cc " . ' al laboratorio de micros'."\r\n" .
                                        'Tenga en cuenta la siguientes información descrita abajo. '. "\r\n" . "\r\n" .
                                        'La fecha y hora de la devolución de las llaves     : '."$this->f_h_recibido" . "\r\n" .
                                        'Usuario que que se le prestaron las llaves         : '."$this->nomcliente". "\r\n" .
                                        'Trabajo que se realizo en el centro de cableado    : '."$this->trabajo". "\r\n" .  "\r\n" . 
                                        'Nota importante.'. "\r\n" .
                                        'Con este E-mail queda nota de que usted entrego estas llaves al Laboratorio de Micros.'. "\r\n" .
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
