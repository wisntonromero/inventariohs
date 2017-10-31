<?php
include_once("config.php");
session_start();

if(isset($_SESSION['usuario'])){
	$user 			=  $_SESSION['usuario'];
	$correo 		=  $_SESSION['correo'];
	$contrasena 	=  $_SESSION['contrasena'];
	$ext_tel 		=  $_SESSION['ext_tel'];
	$current_file 	=  basename($_SERVER['PHP_SELF']);

	$conexion = mysql_connect($server,$username,$password);
	mysql_set_charset('utf8',$conexion);
	mysql_select_db($database);
	
	$query = "SELECT permisos FROM usuarios WHERE usuario='$user'";
       
	$result = mysql_query($query, $conexion);
	
	$row = mysql_fetch_array($result);
	$permisos_usuarios = explode(",",$row['permisos']);

	if( in_array($current_file,$permisos_usuarios) === false ){
		header("location: inicio.php");
	}
}else{
	header("location: index.php");
}
?>