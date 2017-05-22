<?php
include ("config.php");
include ("functions/functions.php");
require ("phpmailer/PHPMailerAutoload.php");
$action = $_REQUEST['action'];

switch($action) {

	case "load":
		$query 	= mysql_query("SELECT id,nro_cc,descripcion_cc,f_h_prestamo,f_h_limite,f_h_recibido,cliente,empresa,correo,ext_tel,trabajo FROM prestamo_llaves where f_h_recibido='0000-00-00 00:00:00'");
		$count  = mysql_num_rows($query);

        $consultar_llaves = array();

		if($count > 0) {
			while($fetch = mysql_fetch_array($query)) {
				$record[] = $fetch;
			}
		}
		//$department = array('Software Architect', 'Inventor', 'Programmer', 'Entrepreneur');
		?>
        <table class="as_gridder_table">
            <tr class="grid_header">
                <td><div class="grid_heading">Item</div></td>
                <td><div class="grid_heading">Centro de Cableado</div></td>
                <td><div class="grid_heading">Descripción</div></td>
                <td><div class="grid_heading">Fecha de Prestamo</div></td>
                <td><div class="grid_heading">Fecha Limite</div></td>
                <td><div class="grid_heading">Fecha Recibido</div></td>
                <td><div class="grid_heading">Cliente</div></td>
                <td><div class="grid_heading">Empresa</div></td>
                <td><div class="grid_heading">Correo</div></td>
                <td><div class="grid_heading">Extensión</div></td>
                <td><div class="grid_heading">Trabajo a Realizar</div></td>

            </tr>
            <tr id="addnew">
            	<td>&nbsp;</td>
            	<td colspan="6">
                <form id="gridder_addform" method="post">
                <input type="hidden" name="action" value="addnew" />
                <table width="100%">
                <tr>
                    <td><input type="text" name="nro_cc"            id="nro_cc"         class="gridder_add" /></td>
                    <td><input type="text" name="descripcion_cc"    id="descripcion_cc" class="gridder_add" /></td>
                    <td><input type="text" name="f_h_prestamo"      id="f_h_prestamo"   class="gridder_add" /></td>
                    <td><input type="text" name="f_h_limite"        id="f_h_limite"     class="gridder_add" /></td>
                    <td><input type="text" name="f_h_recibido"      id="f_h_recibido"   class="gridder_add datepiker" /></td>
                    <td><input type="text" name="cliente"           id="cliente"        class="gridder_add" /></td>
                    <td><input type="text" name="empresa"           id="empresa"        class="gridder_add" /></td>
                    <td><input type="text" name="correo"            id="correo"         class="gridder_add" /></td>
                    <td><input type="text" name="ext_tel"           id="ext_tel"        class="gridder_add" /></td>
                    <td><input type="text" name="trabajo"           id="trabajo"        class="gridder_add" /></td>

                    <td>&nbsp;
                    <input type="submit" id="gridder_addrecord" value="" class="gridder_addrecord_button" title="Add" />
                    <a href="cancel" id="gridder_cancel" class="gridder_cancel"><img src="images/delete.png" alt="Cancel" title="Cancel" /></a></td>
				</tr>
                </table>
                </form>
            </tr>
            <?php
            if($count <= 0) {
            ?>
            <tr id="norecords">
                <td colspan="7" align="center">No records found <a href="addnew" id="gridder_insert" class="gridder_insert"><img src="images/insert.png" alt="Add New" title="Add New" /></a></td>
            </tr>
            <?php } else {
            $i = 0;
            foreach($record as $records) {
            $i = $i + 1;
            ?>
            <tr class="<?php if($i%2 == 0) { echo 'even'; } else { echo 'odd'; } ?>">
                <td><div class="grid_content sno"><span><?php echo $i; ?></span></div></td>
                <td><div ><span><?php echo $records['nro_cc']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("nro_cc|".$records['id']); ?>" value="<?php echo $records['nro_cc']; ?>" /></div></td>
                <td><div ><span><?php echo $records['descripcion_cc']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("descripcion_cc|".$records['id']); ?>" value="<?php echo $records['descripcion_cc']; ?>" /></div></td>
                <td><div ><span><?php echo $records['f_h_prestamo']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("f_h_prestamo|".$records['id']); ?>" value="<?php echo $records['f_h_prestamo']; ?>" /></div></td>
                <td><div ><span><?php echo $records['f_h_limite']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("f_h_limite|".$records['id']); ?>" value="<?php echo $records['f_h_limite']; ?>" /></div></td>
                <td><div class="grid_content editable"><span><?php echo date("Y/m/d", strtotime($records['f_h_recibido'])); ?></span><input type="text" class="gridder_input datepicker" name="<?php echo encrypt("f_h_recibido|".$records['id']); ?>" value="<?php echo date("Y/m/d", strtotime($records['f_h_recibido'])); ?>" /></div></td>
                <td><div ><span><?php echo $records['cliente']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("cliente|".$records['id']); ?>" value="<?php echo $records['cliente']; ?>" /></div></td>
                <td><div ><span><?php echo $records['empresa']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("empresa|".$records['id']); ?>" value="<?php echo $records['empresa']; ?>" /></div></td>
                <td><div ><span><?php echo $records['correo']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("correo|".$records['id']); ?>" value="<?php echo $records['correo']; ?>" /></div></td>
                <td><div ><span><?php echo $records['ext_tel']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("ext_tel|".$records['id']); ?>" value="<?php echo $records['ext_tel']; ?>" /></div></td>
                <td><div ><span><?php echo $records['trabajo']; ?></span><input type="text" class="gridder_input" name="<?php echo encrypt("trabajo|".$records['id']); ?>" value="<?php echo $records['trabajo']; ?>" /></div></td>
                <td>
                    <!-- <a href="gridder_addnew" id="gridder_addnew" class="gridder_addnew"><img src="images/insert.png" alt="Add New" title="Add New" /></a> -->
                    <a href="" id="enviar_email_llaves_recibidas" class="gridder_send_email"><img src="images/save.png" alt="Send Mail" title="Send Mail" /></a>
                    <a href="<?php echo encrypt($records['id']); ?>" class="gridder_delete"><img src="images/delete.png" alt="Delete" title="Delete" /></a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
            </table>
        <?php
	break;

	/*case "addnew":
		$nro_cc           = isset($_POST['nro_cc']) ? mysql_real_escape_string($_POST['nro_cc']) : '';
		$descripcion_cc   = isset($_POST['descripcion_cc']) ? mysql_real_escape_string($_POST['descripcion_cc']) : '';
		$f_h_prestamo 	  = isset($_POST['f_h_prestamo']) ? mysql_real_escape_string($_POST['f_h_prestamo']) : '';
		$profession       = isset($_POST['f_h_limite']) ? mysql_real_escape_string($_POST['f_h_limite']) : '';
		$date 		      = isset($_POST['f_h_recibido']) ? mysql_real_escape_string($_POST['f_h_recibido']) : '';
		mysql_query("INSERT INTO `prestamo_llaves` (nro_cc, descripcion_cc, f_h_prestamo, f_h_limite, f_h_recibido) VALUES ('$nro_cc', '$descripcion_cc', '$f_h_prestamo', '$f_h_limite', '$f_h_recibido')");
	break;
	*/

	case "update":
		$value 	          = $_POST['value'];
		$crypto           = decrypt($_POST['crypto']);
		$explode          = explode('|', $crypto);
		$columnName       = $explode[0];
		$rowId            = $explode[1];
		if($columnName == 'f_h_recibido') { // Check the column is 'date', if yes convert it to date format
			$datevalue = $value;
			$value 	   = date('Y-m-d', strtotime($datevalue));
		}
		$query = mysql_query("UPDATE `prestamo_llaves` SET `$columnName` = '$value' WHERE id = '$rowId' ");

        $query = mysql_query("SELECT id,nro_cc,descripcion_cc,f_h_prestamo,f_h_limite,f_h_recibido,cliente,empresa,correo,ext_tel,trabajo FROM prestamo_llaves where  WHERE id = '$rowId'");


        $resultado = mysql_query($query,$conexion);
        $datos = mysql_num_rows($resultado);
      /*  $registro = mysql_fetch_array($resultado); */
        $consultar_activo = array();

        if(mysql_num_rows($resultado)>0)
        {
          $registro = mysql_fetch_array($resultado);
          $consultar_activo['activo_equipo'] = $registro['com_activo_equipo'];
          $consultar_activo['orden_de_compra'] = $registro['com_orden_de_compra'];
        }
        else
        {
          echo "<script>confirmar(\"\")</script>";
        };
        echo json_encode($consultar_activo);


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
            $mail->Username = "weromero@uninorte.edu.co";
            //Password to use for SMTP authentication
            $mail->Password = "werd741110";
            //Set who the message is to be sent from
            $mail->setFrom('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
            //Set an alternative reply-to address
            $mail->addReplyTo('weromero@uninorte.edu.co', 'Winston Elias Romero Duarte');
            //Set who the message is to be sent to
            $mail->addAddress("$correo", "$cliente");
            //$mail->addAddress("weromero@uninorte.edu.co", 'weromero@uninorte.edu.co');
            $mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
            //Set the subject line
            $mail->Subject = 'Devolucion de llaves del :' . "$descripcion_cc" .' al Lab de micros ';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
            //Replace the plain text body with one created manually
            $mail->Body =   'El dia : ' . "$f_h_recibido" . ' se realizo la devolucion de las llaves del ' . "$descripcion_cc " . ' al laboratorio de micros'."\r\n" .
                                        'Tenga en cuenta la siguientes información descrita abajo. '. "\r\n" . "\r\n" .
                                        'La fecha y hora de la devolución de las llaves     : '."$f_h_recibido" . "\r\n" .
                                        'Usuario que que se le prestaron las llaves         : '."$cliente". "\r\n" .
                                        'Trabajo que se realizo en el centro de cableado    : '."$trabajo". "\r\n" .  "\r\n" .
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

	break;

	/*case "delete":
		$value 	= decrypt($_POST['value']);
		$query = mysql_query("DELETE FROM `prestamo_llaves` WHERE id = '$value' ");
	break;*/
}
?>