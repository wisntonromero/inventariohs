<?php
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_usuario = $_GET['id_usuario'];
    $permiso    = $_GET['permiso'];
   
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

 