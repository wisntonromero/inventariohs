
<?php 

	include("config.php");
	include("sesion.php");
	require_once('adodb5/adodb.inc.php');
try {
	$bitacora       = $_POST['bitacora'];
	$id             = $_POST['id'];
	$activo_retirar = $_POST['activo_retirar'];
	$tipo_equipo    = $_POST['tipo_equipo'];
	$ip				= $_POST['ip'];
	$mac 			= $_POST['mac'];
	$ubicacion      = $_POST['ubicacion'];
	$nueva_ubicacion= $_POST['nueva_ubicacion'];
	$activo_monitor = $_POST['activo_monitor'];
	$ot				= $_POST['ot'];
	$responsable    = $_POST['responsable'];
	$nuevo_responsable= $_POST['nuevo_responsable'];
	$activo_soporte = $_POST['activo_soporte'];
	$extension      = $_POST['extension'];
	$prioridad      = $_POST['prioridad'];
	$estado         = $_POST['estado'];
	$proceso        = $_POST['proceso'];
	$red	        = $_POST['red'];
	$observacion    = $_POST['observacion'];

	$con = ADONewConnection('mysql');
	$con->PConnect($server,$username,$password,$database);
	$con->SetFetchMode(ADODB_FETCH_ASSOC);
	$query    = "UPDATE reubicaciones 
	SET reu_cod_proceso='$proceso',
		reu_responsable='$responsable',
		reu_ubicacion  ='$ubicacion',
		reu_nueva_ubicacion='$nueva_ubicacion',
		reu_nuevo_responsable='$nuevo_responsable',
		reu_nueva_ubicacion='$nueva_ubicacion',
		reu_activo_equipo='$activo_retirar',
		reu_activo_monitor='$activo_monitor',
		reu_cod_estado='$estado',
		reu_ot_sigma='$ot',
		reu_observacion='$observacion' ,
		reu_activo_soporte='$activo_soporte',
		reu_cod_prioridad='$prioridad',
		reu_dir_ip='$ip',
		reu_dir_mac='$mac',
		reu_punto_de_red='$red',
		reu_extension='$extension',
		reu_cod_tipo_equipo='$tipo_equipo'
	WHERE reu_nuevo_activo= '$id'";
	$rs       = $con->Execute($query);

	if($bitacora>0){
		$query=null;
		$query = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$estado',NOW(),'$id','$user')";
		$rs       = $con->Execute($query);
	}
	$con->Close();
	echo "1";
} catch (Exception $e) {
	echo $e;
}

?>