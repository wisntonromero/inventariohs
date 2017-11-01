<?php
    $server = "localhost";
    $database = "inventario"; //nombre de la base de datos que estas usando para el proyecto
    $username = "root"; // nombre del usuario con el que te conectas a esa base de datos
    $password = "root"; // la password de dicho usuario
  

    date_default_timezone_set("America/Bogota");
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_select_db($database) or die("Oops! Coudn't select Database"); // Select the database
    mysql_set_charset('utf8',$conexion);
 
    $id_usuario = ($_GET['id_usuario'],ENT_QUOTES);
    $id_usuario = mysqli_real_escape_string($id_usuario);
    $permiso    = ($_GET['permiso'],ENT_QUOTES);
   
    $query = "INSERT INTO arduino_bitacora(id_usuario, fecha_hora, permiso) VALUES ('".$_GET["id_usuario"]."',now(), '".$_GET["permiso"]."')";  
      
    $resultado = mysql_query($query,$conexion);
    
    if(mysql_affected_rows()>0){
        echo "add";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>

 