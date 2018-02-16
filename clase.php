<?php
include('config.php');
include_once("sesion.php");
require 'phpmailer/PHPMailerAutoload.php';
/*header('Content-Type: application/json');*/

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
	var $nro_cc;
	var $descripcion_cc;
	var $f_h_prestamo;
	var $f_h_limite;
	var $f_h_recibido;
	var $nomcliente;
	var $empresa;
	var $correo;
	var $ext_tel;
	var $trabajo;

	public static function getPrestamo() 
		{
			$obj_cliente=new sQuery();
			// ejecuta la consulta para traer informacion de prestamo
			$obj_cliente->executeQuery("SELECT id,nro_cc,descripcion_cc,f_h_prestamo,f_h_limite,f_h_recibido,cliente,empresa,correo,ext_tel,trabajo FROM prestamo_llaves where f_h_recibido='0000-00-00 00:00:00'"); 

			return $obj_cliente->fetchAll(); // retorna todos los prestamos
		}

	function Cliente($nro=0) // declara el constructor, si trae el numero de prestamo lo busca , si no, trae todos los prestamos
	{
		if ($nro!=0)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("SELECT * FROM prestamo_llaves WHERE id='$nro'"); // ejecuta la consulta para traer al prestamo 
			$row=mysql_fetch_array($result);
			$this->id=$row['id'];
			$this->nro_cc=$row['nro_cc'];
			$this->descripcion_cc=$row['descripcion_cc'];
			$this->f_h_prestamo=$row['f_h_prestamo'];
			$this->f_h_limite=$row['f_h_limite'];
			$this->f_h_recibido=$row['f_h_recibido'];
			$this->nomcliente=$row['cliente'];
			$this->empresa=$row['empresa'];
			$this->correo=$row['correo'];
			$this->ext_tel=$row['ext_tel'];
			$this->trabajo=$row['trabajo'];
		}
	}
		
	// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getNroCC()
	 { return $this->nro_cc;}
	function getDescripcion()
	 { return $this->descripcion_cc;}
	function getFechaPrestamo()
	 { return $this->f_h_prestamo;}
	function getFechaLimite()
	 { return $this->f_h_limite;}
	function getFechaRecibido()
	 { return $this->f_h_recibido;}
	function getCliente()
	 { return $this->nomcliente;}
	function getEmpresa()
	 { return $this->empresa;}
	function getCorreo()
	 { return $this->correo;}
	function getExtension()
	 { return $this->ext_tel;}
	function getTrabajo()
	 { return $this->trabajo;}

	// metodos que setean los valores
	function setNroCC($val)
	 { $this->nro_cc=$val;}
	function setDescripcion($val)
	 {  $this->descripcion_cc=$val;}
	function setFechaPrestamo($val)
	 {  $this->f_h_prestamo=$val;}
	function setFechaLimite($val)
	 {  $this->f_h_limite=$val;}
	function setFechaRecibido($val)
	 {  $this->f_h_recibido=$val;}
	function setCliente($val)
	 {  $this->nomcliente=$val;}
	function setEmpresa($val)
	 {  $this->empresa=$val;}
	function setCorreo($val)
	 {  $this->correo=$val;}
	function setExtension($val)
	 {  $this->ext_tel=$val;}
	function setTrabajo($val)
	 {  $this->trabajo=$val;}

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
    }
	private function updatePrestamo()	// actualiza el Prestamo cargado en los atributos
	{
			$obj_cliente=new sQuery();
			$query="UPDATE prestamo_llaves SET f_h_recibido='$this->f_h_recibido', cliente='$this->nomcliente',correo='$this->correo' where id = $this->id";
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
			$mail->addAddress("$this->correo", "$this->nomcliente");
			//$mail->addAddress("weromero@uninorte.edu.co", 'weromero@uninorte.edu.co');
			$mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
			$mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
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
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al prestamo 
			
			return $obj_cliente->getAffect(); // retorna todos los registros afectados
	}

	private function recordatorioPrestamo()	// envia recordatorio del Prestamo 
	{
			$obj_cliente=new sQuery();
			//$query="UPDATE prestamo_llaves SET f_h_recibido='$this->f_h_recibido', cliente='$this->nomcliente',correo='$this->correo' where id = $this->id";
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
			$mail->addAddress("$this->correo", "$this->nomcliente");
			//$mail->addAddress("weromero@uninorte.edu.co", 'weromero@uninorte.edu.co');
			$mail->AddCC("weromero@uninorte.edu.co", "Winston Elias Romero Duarte");
			$mail->AddCC($_SESSION['correo'], $_SESSION['nombre']);
			//Set the subject line
			$mail->Subject = 'Aviso de recordatorio - Devolucion de las llaves del : ' . "$this->descripcion_cc" .' al Lab de micros. ';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('inicio.php'), dirname(__FILE__));
			//Replace the plain text body with one created manually
			$mail->Body =   'Sr. usuario muy atentamente le recordamos que la fecha limite de la las llaves era para el  : ' . "$this->f_h_limite" . ' favor hacer la devolucion de las llaves del ' . "$this->descripcion_cc " . ' al laboratorio de micros.'."\r\n" .
			                            'Tenga en cuenta la siguientes información descrita abajo. '. "\r\n" . "\r\n" .
			                            'La fecha y hora de la devolución de las llaves era : '."$this->f_h_limite" . "\r\n" .
			                            'Usuario que que se le prestaron las llaves         : '."$this->nomcliente". "\r\n" .
			                            'Trabajo que se realizo en el centro de cableado    : '."$this->trabajo". "\r\n" .  "\r\n" . 
			                            'Nota importante.'. "\r\n" .
			                            'Le agradecemos que por favor haga llegar estas llaves al Laboratorio de Micros lo mas pronto posible.'. "\r\n" .
			                            'Este E-mail es enviado automáticamente desde el sistema de préstamo de llaves.' ;//Mensaje de 2 lineas
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
			$query="INSERT INTO prestamo_llaves(nro_cc,descripcion_cc,f_h_prestamo,f_h_limite,f_h_recibido,cliente,empresa,correo,ext_tel,trabajo)VALUES('$this->nro_cc', '$this->descripcion_cc','$this->f_h_prestamo','$this->f_h_limite','$this->f_h_recibido','$this->cliente','$this->empresa','$this->correo','$this->ex_tel','$this->trabajo')";
			
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al prestamo 
			return $obj_cliente->getAffect(); // retorna todos los registros afectados
	
	}
	function delete()	// elimina el prestamo
	{
			$obj_cliente=new sQuery();
			$query="DELETE FROM prestamo_llaves where id=$this->id";
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
