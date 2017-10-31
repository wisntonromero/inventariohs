<?php
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_usuario = $_POST['id_usuario'];
    $permiso    = $_POST['permiso'];
   

    $query = "INSERT INTO arduino_bitacora(id_usuario, fecha_hora, permiso) 
    VALUES ('$id_usuario', now(), '$permiso') ";
    
    $resultado = mysql_query($query,$conexion);
    
    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>

 