<?php 
	//Crear sesión
	session_start();
	//Vaciar sesión
	$_SESSION = array();
	//Destruir Sesión
	if(session_destroy())
	{
	header("location: index.php");
	}

?>

