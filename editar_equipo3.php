<?php 
	include('config.php');
	require_once('sesion.php');
	header('Content-Type: application/json');

	//Conexión
	$conexion = mysql_connect($server,$username,$password);
	mysql_set_charset('utf8',$conexion);
	mysql_select_db($database);

	/*	$orden         =$_POST['orden'];
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
		$proceso       =$_POST['proceso'];*/


		$bitacora       = $_POST['bitacora'];
		$id             = $_POST['id'];
		$extension      = $_POST['extension'];
		$ubicacion      = $_POST['ubicacion'];
		$marca          = $_POST['marca'];
		$modelo         = $_POST['modelo'];
		$tipo_equipo    = $_POST['tipo_equipo'];
		$activo_a_retirar = $_POST['activo_retirar'];
		$activo_monitor_retirar = $_POST['activo_monitor_retirar'];
		$responsable    = $_POST['responsable'];
		$usuario        = $_POST['usuario'];
		$orden  		= $_POST['orden'];
		$serial_equipo  = $_POST['serial_equipo'];
		$activo_monitor = $_POST['activo_monitor'];
		$serial_monitor = $_POST['serial_monitor'];
		$centro_de_costo= $_POST['centro_de_costo'];
		$estado         = $_POST['estado'];
		$prioridad      = $_POST['prioridad'];
		$proceso        = $_POST['proceso'];
		$observacion    = $_POST['observacion'];

		//ejecutar query. 
		$query    = "UPDATE compras SET com_cod_marca='$marca',
					com_modelo='$modelo', com_serial_equipo='$serial_equipo',
					com_activo_monitor='$activo_monitor', com_serial_monitor='$serial_monitor',
					com_activo_a_retirar='$activo_a_retirar', com_activo_monitor_retirar='$activo_monitor_retirar',
					com_cod_proceso='$proceso', com_cod_estado_proceso='$estado',
					com_cod_centro_costo='$centro_de_costo', com_ubicacion='$ubicacion',
					com_responsable='$responsable', com_extension='$extension',
					com_cod_prioridad='$prioridad', com_cod_tipo_equipo='$tipo_equipo',
					com_observacion='$observacion', com_orden_de_compra='$orden',
					com_usuario='$usuario' WHERE com_activo_equipo= '$id'";

		$query = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) 
		   		  VALUES(1,NOW(),'$nuevo_activo','$user')" or die("Error in the consult.." . mysqli_error($query)); 
			    $resultado = mysql_query($query,$conexion);
		        
			    if(mysql_affected_rows()>0){
			       echo "1";
			    }
			    else{
			            echo "2";
			    }
			    mysql_close($conexion);
      
?>