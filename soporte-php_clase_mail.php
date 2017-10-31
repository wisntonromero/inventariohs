<!--  formulario -  clase -->
<?php

include_once("sesion.php");
?>

<?php
include('config.php');
require 'phpmailer/PHPMailerAutoload.php';
/*header('Content-Type: application/json');*/
 $activo_equipo = strtoupper($_POST['activo_equipo']);

// se declara una clase para hacer la conexion con la base de datos
class Conexion


{
	var $con;
	function Conexion()
	{
		// se definen los datos del servidor de base de datos
		$conection['server']="localhost";  //host
		$conection['user']="root";         //  usuario
		$conection['pass']="root";             //password
		$conection['base']="inventario";   //base de datos

		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_connect($conection['server'],$conection['user'],$conection['pass']);

		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);
			$this->con=$conect;
		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}

}
 // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
class sQuery
{

	var $coneccion;
	var $consulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->coneccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->consulta= mysql_query($cons,$this->coneccion->getConexion());
		return $this->consulta;
	}
	function getResults()   // retorna la consulta en forma de result.
	{return $this->consulta;}

	function Close()		// cierra la conexion
	{$this->coneccion->Close();}

	function Clean() // libera la consulta
	{mysql_free_result($this->consulta);}

	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}

	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}

    function fetchAll()
    {
        $rows=array();
		if ($this->consulta)
		{
			while($row=  mysql_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
        return $rows;
    }
}


class Cliente
{
	//se declaran los atributos de la clase, que son los atributos del prestamo
	Var $id;
	var $activo_equipo;
	var $tipo_equipo;
	var $marca_equipo;
	var $modelo_equipo;
	var $serial_equipo;
	var $f_prestamo;
	var $f_limite;
	var $f_recibido;
	var $activo_danado;
	var $bloque;
	var $piso;
	var $cubiculo;
	var $departamento;
	var $usuario_equipo;
	var $email_usuario;
	var $ext_tel;
	var $ot_sigma;
	var $usuario_tecnico;
	var $email_usuario_tecnico;
	var $usuario_que_presta_soporte;
	var $observaciones;

	public static function getPrestamo()
		{
			$obj_cliente=new sQuery();
			// ejecuta la consulta para traer informacion de prestamo
			$obj_cliente->executeQuery("SELECT id,activo_equipo,f_prestamo,f_limite,f_recibido,activo_danado,tipo_equipo,bloque,piso,cubiculo,departamento,usuario_equipo,email_usuario,ext_tel,ot_sigma,usuario_tecnico,email_usuario_tecnico,usuario_que_presta_soporte,observaciones	FROM prestamo_soportes where f_recibido='0000-00-00 00:00:00'");

			return $obj_cliente->fetchAll(); // retorna todos los prestamos
		}

	function Cliente($id=0) // declara el constructor, si trae el numero de prestamo lo busca , si no, trae todos los prestamos
	{
		if ($id!=0)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("SELECT * FROM prestamo_soportes WHERE id ='$id'"); // ejecuta la consulta para traer al prestamo
			$row=mysql_fetch_array($result);
			$this->id=$row['id'];
			$this->activo_equipo=$row['activo_equipo'];
			$this->tipo_equipo=$row['tipo_equipo'];
			$this->f_prestamo=$row['f_prestamo'];
			$this->f_limite=$row['f_limite'];
			$this->f_recibido=$row['f_recibido'];
			$this->activo_danado=$row['activo_danado'];
			$this->bloque=$row['bloque'];
			$this->piso=$row['piso'];
			$this->cubiculo=$row['cubiculo'];
			$this->departamento=$row['departamento'];
			$this->usuario_equipo=$row['usuario_equipo'];
			$this->email_usuario=$row['email_usuario'];
			$this->ext_tel=$row['ext_tel'];
			$this->ot_sigma=$row['ot_sigma'];
			$this->usuario_tecnico=$row['usuario_tecnico'];
			$this->email_usuario_tecnico=$row['email_usuario_tecnico'];
			$this->usuario_que_presta_soporte=$row['usuario_que_presta_soporte'];
			$this->observaciones=$row['observaciones'];
		}
	}

	// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getActivo_equipo()
	 { return $this->activo_equipo;}
	function getTipo_equipo()
	 { return $this->tipo_equipo;}
	function getF_prestamo()
	 { return $this->f_prestamo;}
	function getF_limite()
	 { return $this->f_limite;}
	function getF_recibido()
	 { return $this->f_recibido;}
	function getActivo_danado()
	 { return $this->activo_danado;}
	function getBloque()
	 { return $this->bloque;}
	function getPiso()
	 { return $this->piso;}
	function getCubiculo()
	 { return $this->cubiculo;}
	function getDepartamento()
	 { return $this->departamento;}
	function getUsuario_equipo()
	 { return $this->usuario_equipo;}
	function getEmail_usuario()
	 { return $this->email_usuario;}
	function getExtension()
	 { return $this->ext_tel;}
	function getOt_sigma()
	 { return $this->ot_sigma;}
	function getUsuario_tecnico()
	 { return $this->usuario_tecnico;}
	function getEmail_usuario_tecnico()
	 { return $this->email_usuario_tecnico;}
	function getUsuario_que_presta_soporte()
	 { return $this->usuario_que_presta_soporte;}
	function getObservaciones()
	 { return $this->observaciones;}

	// metodos que setean los valores
	function setActivo_equipo($val)
	 { $this->activo_equipo=$val;}
	function setTipo_equipo($val)
	 { $this->tipo_equipo=$val;}
	function setF_prestamo($val)
	 {  $this->f_prestamo=$val;}
	function setF_limite($val)
	 {  $this->f_limite=$val;}
	function setF_recibido($val)
	 {  $this->f_recibido=$val;}
	function setActivo_danado($val)
	 {  $this->activo_danado=$val;}
	function setBloque($val)
	 {  $this->bloque=$val;}
	function setPiso($val)
	 {  $this->piso=$val;}
	function setCubiculo($val)
	 {  $this->cubiculo=$val;}
	function setDepartamento($val)
	 {  $this->departamento=$val;}
	function setUsuario_equipo($val)
	 {  $this->usuario_equipo=$val;}
	function setEmail_usuario($val)
	 {  $this->email_usuario=$val;}
	function setExtension($val)
	 {  $this->ext_tel=$val;}
	function setot_sigma($val)
	 {  $this->ot_sigma=$val;}
	function setUsuario_tecnico($val)
	 {  $this->usuario_tecnico=$val;}
	function setEmail_usuario_tecnico($val)
	 {  $this->email_usuario_tecnico=$val;}
	function setUsuario_que_presta_soporte($val)
	 {  $this->usuario_que_presta_soporte=$val;}
	function setObservaciones($val)
	 {  $this->observaciones=$val;}

	function save()
    {
        if($this->id)
        {$this->updatePrestamo();}
        else
        {$this->recordatorioPrestamo();}
     	//{$this->insertPrestamo();}
    }
	function recordatoriosave()
    {
        if($this->id)
        {$this->recordatorioPrestamo();}

    	if($this->activo_equipo)
        {$this->recordatorioPrestamo();}
    }
	private function updatePrestamo()	// actualiza el Prestamo cargado en los atributos
	{
			$obj_cliente=new sQuery();
			$query="UPDATE prestamo_soportes SET f_recibido='$this->f_recibido', usuario_equipo='$this->usuario_equipo', email_usuario='$this->email_usuario' where id = $this->id";

			$query2="UPDATE hardware SET estado_equipo='SOPORTE' WHERE activo_equipo = '$this->activo_equipo'";

			/*$query="UPDATE prestamo_llaves SET descripcion_cc=$descripcion_cc where id = $this->id";*/

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
			$mail->addAddress("$this->email_usuario", "$this->usuario_equipo");
			$mail->addAddress($_SESSION['correo'], $_SESSION['nombre']);
			$mail->AddCC("$this->email_usuario_tecnico", "$this->usuario_tecnico");
			$mail->AddCC("coordinadorequipoinformatico@uninorte.edu.co", 'Alvaro Ivan Santiago Arellana');
			$mail->AddCC("comprasmantenimiento3@uninorte.edu.co", 'Compras Mantenimiento Uninorte 03');
			//Set the subject line
			$mail->Subject = 'Devolución de equipo de soporte activo :' . "$this->activo_equipo" .' a bodega. ';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
			//Replace the plain text body with one created manually
			$mail->Body =   'El día : ' . "$this->f_recibido" . ' se realizo la devolución del activo Nro: ' . "$this->activo_equipo " . ' '."\r\n" . "\r\n" .
			                            
			                            'La fecha de la devolución del equipo 		: '."$this->f_recibido" . "\r\n" .
			                            'Usuario al que se le retira el equipo		: '."$this->usuario_equipo". "\r\n" .
			                            'Tecnico que devuelve el equipo a bodega 	: '."$this->usuario_tecnico". "\r\n" .
			                            'Tecnico que ingresa el equipo a bodega 		: '."$this->usuario_que_presta_soporte". "\r\n" .  "\r\n" .
			                            'Nota importante.'. "\r\n" .
			                            'Con este E-mail queda nota de que el técnico entrego el equipo a su bodega correspondiente.'. "\r\n" .
			                            'Este E-mail es enviado automáticamente desde el sistema de Inventario de equipos del Laboratorio de Micros.' ;//Mensaje de 2 lineas
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			}
			$query2="UPDATE hardware SET estado_equipo='SOPORTE' WHERE activo_equipo = '$this->activo_equipo'";
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al prestamo
			$obj_cliente->executeQuery($query2);

			//return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}

	private function recordatorioPrestamo()	// envia recordatorio del Prestamo
	{
			$obj_cliente=new sQuery();
			$query="SELECT * FROM prestamo_soportes WHERE id = $this->id";

			 $activo_equipo = strtoupper($_POST['activo_equipo']);
	
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
			$mail->addAddress("$this->email_usuario", "$this->usuario_equipo");
			//$mail->addAddress("weromero@uninorte.edu.co", 'weromero@uninorte.edu.co');
			$mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
			$mail->AddCC("coordinadorequipoinformatico@uninorte.edu.co", "Alvaro Ivan Santiago Arellana");
			$mail->AddCC("egaliano@uninorte.edu.co", "Emma Beatriz Galiano Vargas");
			//Set the subject line
			$mail->Subject = 'Aviso de recordatorio - Devolución del equipo de soporte o préstamo. Activo:'."$this->activo_equipo".' al Laboratorio de micros. ';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
			//Replace the plain text body with one created manually
			$mail->Body =   'Sr. usuario muy atentamente le recordamos que la fecha limite de la devolución del equipo es el  : ' . "$this->f_limite" . '. Por favor confirmar si ya realizó la solicitud del nuevo equipo con la DTIC (Dirección de Tecnología Informática.)'."\r\n" .  "\r\n" .
			                            
			                            'Activo del equipo dañado					:'."$this->activo_danado" . "\r\n" .
			                            'Tipo de equipo 								:'."$this->tipo_equipo" . "\r\n" .
			                            'La fecha en la que se realizo el prestamo 		:'."$this->f_prestamo" . "\r\n" .
			                            'La fecha limite para la devolución del equipo es 	:'."$this->f_limite" . "\r\n" .
			                            'Usuario al que se le presto el equipo de soporte 	:'."$this->usuario_equipo". "\r\n" . "\r\n" .
			                            'Nota importante.'. "\r\n" .
			                            'Este E-mail es enviado automáticamente desde el sistema de préstamo de equipos de soporte.' ;//Mensaje de 2 lineas
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			//send the message, check for errors
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			}
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al prestamo

			return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}

	private function insertPrestamo()	// inserta el prestamo cargado en los atributos
	{
			$obj_cliente=new sQuery();
			$query="INSERT INTO prestamo_soportes(activo_equipo,f_prestamo,f_limite,f_recibido,ext_tel)VALUES('$this->activo_equipo', '$this->f_prestamo','$this->f_limite','$this->f_recibido','$this->ex_tel')";

			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al prestamo
			return $obj_cliente->getAffect(); // retorna todos los registros afectados

	}
	function delete()	// elimina el prestamo
	{
			$obj_cliente=new sQuery();
			$query="DELETE FROM prestamo_soportes where id=$this->id";
			$obj_cliente->executeQuery($query); // ejecuta la consulta para  borrar el prestamo
			return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}
}
	function cleanString($string)
	{
	    $string=trim($string);
	    $string=mysql_escape_string($string);
		$string=htmlspecialchars($string);
	    return $string;
	}
