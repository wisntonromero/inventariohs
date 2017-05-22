<?php
/* Inicia la sesión, función utilizada para mantener
la sesión y variables de sesión para que no se pierdan
sus valores al navegar a través de las páginas del sitio */
//session_start();
$server = "localhost";
$database = "inventario"; //nombre de la base de datos que estas usando para el proyecto
$username = "root"; // nombre del usuario con el que te conectas a esa base de datos
$password = "root"; // la password de dicho usuario

$conexion = mysql_connect($server,$username,$password);
mysql_select_db($database) or die("Oops! Coudn't select Database"); // Select the database

date_default_timezone_set("America/Bogota");


?>
