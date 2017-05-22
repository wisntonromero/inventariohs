<html>
  <head>
    <meta http-equiv="REFRESH" content="0;url=almacen-bajas-form-ingresar_baja.php">
  </head>
  <body>
      <?php
          include('config.php');
          require 'phpmailer/PHPMailerAutoload.php';
          header('Content-Type: application/json');
        

          $conexion = mysql_connect($server,$username,$password);
          mysql_set_charset('utf8',$conexion);
          mysql_select_db($database);

          //Traemos la información por POST
          
          $solicitud          = $_POST['solicitud'];
          $f_registro         = $_POST['f_registro'];
          $observaciones      = strtoupper($_POST['observaciones']);
          $relacion_activos   = strtoupper($_POST['relacion_activos']);
          $archivo_formato    = $_FILES['archivo_formato'];
          $archivo_soporte    = $_FILES['archivo_soporte'];

          $porciones = explode(",", $relacion_activos);
           
            for ($i=0;$i<count($porciones);$i++){ 
               echo $porciones[$i]; // porción1

                $query = "INSERT INTO bajas_reubicaciones_detalle(solicitud,activo,recibido_almacen) VALUES ('$solicitud','$porciones[$i]','NO') ";
                $resultado = mysql_query($query,$conexion);

            }  
            
            $query = "INSERT INTO bajas_reubicaciones_almacen(solicitud,tipo,f_registro,estado1,observaciones) VALUES ('$solicitud','BAJA','$f_registro','ENVIADO A EMMA','$observaciones') ";
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
          $mail->Username = "weromero@uninorte.edu.co";
          //****$mail->Username = ($_SESSION['correo']);
          //Password to use for SMTP authentication
          $mail->Password = "werd741110";
          //*******$mail->Password = base64_decode(($_SESSION['contrasena']));
          //Set who the message is to be sent from
          $mail->setFrom('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
          //Set an alternative reply-to address
          $mail->addReplyTo('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
          //Set who the message is to be sent to
          $mail->addAddress('weromero@uninorte.edu.co', 'weromero@uninorte.edu.co');
          //$mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
          //Set the subject line
          $mail->Subject = 'APROBACIÓN PARA EL ENVÍO DE EQUIPOS SIN REPARACIÓN AL ALMACÉN.    SOLICITUD : '."$solicitud";
          //Read an HTML message body from an external file, convert referenced images to embedded,
          //convert HTML into a basic plain-text alternative body
          //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
          //Replace the plain text body with one created manually
          $mail->Body =   'Solicitud #              : '. "$solicitud". "\r\n" . "\r\n" .
                          'Fecha de registro  : '. "$f_registro". "\r\n" .
                          'Buenos días / tardes  Ing. Emma '. "\r\n" . "\r\n" .
                  'Solicitamos su aprobación  para  el envío de equipos  sin reparación al almacén  con el fin de adelantar el trámite de Baja; se adjuntan informes correspondientes  y formato requerido.  '. "$puerto_sw". "\r\n" . "\r\n" .
                  'observaciones      : '. "$observaciones". "\r\n" . "\r\n" .

                          'Muchas gracias,'. "\r\n" . "\r\n" .

                  'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos del Laboratorio de Micros.' ;
          //Attachment file
          $mail->AddAttachment($archivo_formato['tmp_name'],$archivo_formato['name']);
          $mail->AddAttachment($archivo_soporte['tmp_name'],$archivo_soporte['name']);

         // echo $archivo_soporte;
         // echo $archivo_formato;
          
          //send the message, check for errors
          if (!$mail->send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
              
          } else {
              echo "Message sent!";
          }
          //  print "<meta http-equiv=Refresh content=\"2 ; url=almacen-form_ingresar_baja.php\">"; 
           // header('Location: almacen-form_ingresar_baja.php');
           // die("<span class='success'>Su mensaje ha sido enviado.</span><br /><a href='almacen-form_ingresar_baja.php'>Volver</a>");
        
      ?>
  </body>
</html>
 