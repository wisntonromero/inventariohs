<?php
    include('config.php');
   // require_once('sesion.php');
    require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');
  
    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    //Traemos la información por POST
    
    $id                 = $_POST['id'];
    $solicitud          = $_POST['solicitud'];
            
    $query = "UPDATE bajas_reubicaciones_almacen SET f_cierre = NOW(), estado2 = 'RECIBIDO POR ALMACEN A SATISFACCIÓN' WHERE id = '$id' ";
    $resultado = mysql_query($query,$conexion);


    $query = "SELECT  (@numero:=@numero+1) AS item, id, solicitud, activo, recibido_almacen,f_recibido,observaciones FROM (SELECT @numero:=0) r, bajas_reubicaciones_detalle WHERE solicitud = '$solicitud' ORDER BY solicitud ASC";

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
    $mail->Encoding = "base64";
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
    
    // this will add the closing tags and now body has your built email
    //$Body = 'se envian activos recibidos por almacen'
    $Body .= 'Solicitud #              : '. "\r\n" . "\r\n" .
    $body = '<table border="1">
            <tr>
                <th>Item</th>
                <th>Solicitud</th>
                <th>Activo</th>
                <th>Recibido almacén</th>
                <th>Fecha Recibido</th>
                <th>Observaciones</th>
            </tr>';

    while($row=mysql_fetch_assoc($resultado2)) {
       // $end_dt = $row['end_dt'];
       // $dpd = floor((abs(strtotime(date("Y-m-d")) - strtotime($end_dt))/(60*60*24)));
        $body .= "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['solicitud']."</td>
                    <td>".$row['activo']."  </td>
                    <td>".$row['recibido_almacen']."</td>
                    <td>".$row['f_recibido']."</td>
                    <td>".$row['observaciones']."</td>
                    <td>"."</td>
                </tr>"; 
    }
    
    'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos del Laboratorio de Micros.' ;

    $mail->Body = $body.'</table>'.'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos del Laboratorio de Micros.';


 //  $mail->AltBody =   'Este E-mail es enviado automáticamente desde el sistema de inventario de equipos del Laboratorio de Micros.' ;
           
    $mail->IsHTML(true);
    //Attachment file
   // $mail->AddAttachment($archivo_formato['tmp_name'],$archivo_formato['name']);
   // $mail->AddAttachment($archivo_soporte['tmp_name'],$archivo_soporte['name']);

   // echo $archivo_soporte;
   // echo $archivo_formato;
    
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        
    } else {
        echo "Message sent!";
    }

?>

 