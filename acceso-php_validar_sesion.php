<?php
	include_once("config.php");
	session_start();

	if(isset($_SESSION['usuario'])){
		echo "Has iniciado Sesion: ".$_SESSION['usuario'];
		echo $_SESSION['nombre']; 
		echo $_SESSION['correo']; 
		echo $_SESSION['contrasena']; 
		echo $_SESSION['ubicacion_foto'];
	}else{
		//echo "Acceso Restringido";
		header("location: index.php");
		echo $_SESSION['usuario'];
		echo $_SESSION['nombre'];
		echo $_SESSION['correo']; 
		echo $_SESSION['contrasena']; 
		echo $_SESSION['ubicacion_foto']; 
	}
?>