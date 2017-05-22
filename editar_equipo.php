<?php 
	include("sesion.php");
	include("config.php");
	require_once('adodb5/adodb.inc.php');
try {
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

	$con = ADONewConnection('mysql');
	$con->PConnect($server,$username,$password,$database);
	$con->SetFetchMode(ADODB_FETCH_ASSOC);
	$query    = "UPDATE compras 
	SET com_cod_marca='$marca',
		com_modelo='$modelo',
		com_serial_equipo='$serial_equipo',
		com_activo_monitor='$activo_monitor',
		com_serial_monitor='$serial_monitor',
		com_activo_a_retirar='$activo_a_retirar',
		com_activo_monitor_retirar='$activo_monitor_retirar',
		com_cod_proceso='$proceso',
		com_cod_estado_proceso='$estado',
		com_cod_centro_costo='$centro_de_costo',
		com_ubicacion='$ubicacion',
		com_responsable='$responsable',
		com_extension='$extension',
		com_cod_prioridad='$prioridad',
		com_cod_tipo_equipo='$tipo_equipo',
		com_observacion='$observacion',
		com_orden_de_compra='$orden',
		com_usuario='$usuario'
		WHERE com_activo_equipo= '$id'";
	
	$rs       = $con->Execute($query);
	

	if($bitacora>0){
		$query=null;
		$query = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$estado',NOW(),'$nuevo_activo','$user')";
		
		$rs       = $con->Execute($query);
		
	}
	$con->Close();
	echo "1";
} catch (Exception $e) {
	echo $e;
}

?>