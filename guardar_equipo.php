<?php 
	require_once('config.php');
	require_once('sesion.php');
	$orden         =$_POST['orden'];
	$marca         =$_POST['marca'];
	$modelo        =$_POST['modelo'];
	$tipo_equipo   =$_POST['tipo_equipo'];
	
	$centro_costo  =$_POST['centro_costo'];
	$prioridad     =$_POST['prioridad'];
	$nuevo_activo  =$_POST['nuevo_activo'];
	$serial_equipo =$_POST['serial_equipo'];
	
	$activo_monitor=$_POST['activo_monitor'];
	$serial_monitor=$_POST['serial_monitor'];
	$activo_retirar=$_POST['activo_retirar'];
	$monitor_retirar=$_POST['monitor_retirar'];
		
	$accion_con_equipo=$_POST['accion_con_equipo'];
	$responsable   =$_POST['nombre'];
	$ubicacion     =$_POST['ubicacion'];
	$extension     =$_POST['extension'];
	$observaciones =$_POST['observaciones'];
	$usuario       =$_POST['usuario'];
	$proceso       =$_POST['proceso'];


	try {
		//Conexión
		$conexion = mysql_connect($server,$username,$password);
		mysql_select_db($database);

		//Verificar que el Nombre del Registro no Exista en la BD
		$query= "SELECT com_activo_equipo FROM compras where com_activo_equipo = '$nuevo_activo'";
		$resultado = mysql_query($query,$conexion);
		$num_filas = mysql_num_rows($resultado);
		    
	    if($num_filas>0){
			echo"3"; 
		}else{
			//Convertir a Mayusculas
				$orden         = mb_convert_case($orden, MB_CASE_UPPER, "UTF-8");
				$modelo        = mb_convert_case($modelo, MB_CASE_UPPER, "UTF-8");
				$ubicacion     = mb_convert_case($ubicacion, MB_CASE_UPPER, "UTF-8");
				$usuario       = mb_convert_case($usuario, MB_CASE_UPPER, "UTF-8");
				$serial_equipo = mb_convert_case($serial_equipo, MB_CASE_UPPER, "UTF-8");
				$serial_monitor= mb_convert_case($serial_monitor, MB_CASE_UPPER, "UTF-8");
				$observaciones = mb_convert_case($observaciones, MB_CASE_UPPER, "UTF-8");

			//ejecutar query. 
				$query = "INSERT INTO compras(com_orden_de_compra,com_cod_marca,com_modelo,com_cod_centro_costo,com_activo_a_retirar,com_activo_monitor_retirar,com_responsable,com_ubicacion,com_activo_equipo,com_serial_equipo,com_activo_monitor,com_serial_monitor,com_observacion,com_cod_prioridad,com_usuario,com_extension,com_cod_tipo_equipo,com_cod_proceso) 
				VALUES('$orden','$marca','$modelo','$centro_costo','$activo_retirar', '$monitor_retirar','$responsable','$ubicacion','$nuevo_activo','$serial_equipo','$activo_monitor','$serial_monitor','$observaciones','$prioridad','$usuario','$extension','$tipo_equipo','$proceso')" or die("Error in the consult.." . mysqli_error($query)); 
			    $resultado = mysql_query($query,$conexion);

			    $query = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) 
			    		  VALUES(1,NOW(),'$nuevo_activo','$user')" or die("Error in the consult.." . mysqli_error($query)); 
			    $resultado = mysql_query($query,$conexion);
		}
	} catch (Exception $e) {
		echo $e;		
	}
?>