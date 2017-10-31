<?php
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo              = $_POST['activo_equipo'];
    $tipo_equipo                = $_POST['tipo_equipo'];
    $marca                      = $_POST['marca'];
    $modelo_equipo              = $_POST['modelo_equipo'];
    $activo_monitor             = $_POST['activo_monitor'];
   
    $dir_ip                     = $_POST['dir_ip'];
    $dir_mac                    = $_POST['dir_mac'];
    $punto_de_red               = $_POST['punto_de_red'];
    
    $nuevo_responsable          = $_POST['nuevo_responsable'];
    $email_nuevo_responsable    = $_POST['email_nuevo_responsable'];
    $nuevo_usuario              = $_POST['nuevo_usuario'];
    $email_nuevo_usuario        = $_POST['email_nuevo_usuario'];
    $nuevo_ext_tel              = $_POST['nuevo_ext_tel'];
    $observaciones              = $_POST['observaciones'];

    $query = "INSERT INTO hardware(activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, activo_mon, estado_equipo, dir_ip, dir_mac, punto_de_red, punto_de_voz, f_ult_actualiza, departamento, responsable, email_responsable, usuario, email_usuario, ext_tel, observaciones) 
    VALUES ('$activo_equipo', '$tipo_equipo', '$marca', '$modelo_equipo', '$activo_monitor', 'ACTIVO', '$dir_ip', '$dir_mac', '$punto_de_red', 'NO TIENE', NOW(), 'NO TIENE', '$nuevo_responsable', '$email_nuevo_responsable', '$nuevo_usuario', '$email_nuevo_usuario', '$nuevo_ext_tel', '$observaciones') ";
    
    $resultado = mysql_query($query,$conexion);
    
    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>

 