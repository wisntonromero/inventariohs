<?php 
	require_once('config.php');
	require_once('sesion.php');
	
	$activo    		  =$_POST['activo'];
	$activo_monitor   =$_POST['activo_monitor'];
	$tipo_equipo      =$_POST['tipo_equipo'];
	$ubicacion        =$_POST['ubicacion'];
	$responsable      =$_POST['responsable'];
	$activo_retirar   =$_POST['activo_retirar'];
	$activo_monitor_retirar   =$_POST['activo_monitor_retirar'];
	$nueva_ubicacion  =$_POST['nueva_ubicacion'];
	$nuevo_responsable=$_POST['nuevo_responsable'];
	$activo_soporte   = $_POST['activo_soporte'];
	$prioridad        =$_POST['prioridad'];
	$proceso          =$_POST['proceso'];
	$extension        =$_POST['extension'];
	$ip               = $_POST['ip'];
	$ot 			  = $_POST['ot'];
	$mac   			  = $_POST['mac'];
	$red 			  = $_POST['red'];
	$observacion      =$_POST['observacion'];

	try {
		//Conexión
		$conexion = mysql_connect($server,$username,$password);
		mysql_select_db($database);

		//Verificar que el Nombre del Registro no Exista en la BD
		$query= "SELECT * FROM estado,reubicaciones WHERE reu_cod_estado=est_id AND reu_cod_proceso='$proceso' AND reu_activo='$activo'";
		$resultado = mysql_query($query,$conexion);
		$num_filas = mysql_num_rows($resultado);
		    
	    if($num_filas>0){
			echo"2"; 
		}else{
			//Convertir a Mayusculas
				$ubicacion        = mb_convert_case($ubicacion, MB_CASE_UPPER, "UTF-8");
				$nueva_ubicacion  = mb_convert_case($nueva_ubicacion, MB_CASE_UPPER, "UTF-8");
				$responsable      = mb_convert_case($responsable, MB_CASE_UPPER, "UTF-8");
				$nuevo_responsable= mb_convert_case($nuevo_responsable, MB_CASE_UPPER, "UTF-8");
				$observacion      = mb_convert_case($observacion, MB_CASE_UPPER, "UTF-8");

			//ejecutar query. 
				$query = "INSERT INTO reubicaciones(reu_activo,reu_activo_monitor,reu_cod_proceso,reu_responsable,reu_ubicacion,reu_nuevo_responsable,reu_nueva_ubicacion,reu_activo_retirar,reu_activo_monitor_retirar,reu_cod_estado,reu_observacion,reu_activo_soporte,reu_cod_prioridad,reu_extension,reu_cod_tipo_equipo,reu_dir_ip,reu_dir_mac,reu_ot_sigma,reu_punto_de_red) 
				VALUES('$activo','$activo_monitor','$proceso','$responsable','$ubicacion','$nuevo_responsable','$nueva_ubicacion','$activo_retirar','$activo_monitor_retirar','1','$observacion','$activo_soporte','$prioridad','$extension','$tipo_equipo','$ip','$mac','$ot','$red')" or die("Error in the consult.." . mysqli_error($query)); 
			    $resultado = mysql_query($query,$conexion);

			    $query = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) 
			    		  VALUES(1,NOW(),'$nuevo_activo','$user')" or die("Error in the consult.." . mysqli_error($query)); 
			    $resultado = mysql_query($query,$conexion);
			    echo"1";
		}
	} catch (Exception $e) {
		echo $e;		
	}
?>