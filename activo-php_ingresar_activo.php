<?php
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST['activo_equipo'];
    $tipo_equipo = $_POST['tipo_equipo'];
    $marca_equipo = $_POST['marca_equipo'];
    $modelo_equipo = $_POST['modelo_equipo'];
    $activo_mon = $_POST['activo_mon'];
    $estado_equipo = $_POST['estado_equipo'];

    $dir_ip = $_POST['dir_ip'];
    $dir_mac = $_POST['dir_mac'];
    $punto_de_red = $_POST['punto_de_red'];
    $punto_de_voz = $_POST['punto_de_voz'];
    $f_ult_actualiza = $_POST['f_ult_actualiza'];

    $departamento = $_POST['departamento'];
    $responsable = $_POST['responsable'];
    $email_responsable = $_POST['email_responsable'];
    $usuario = $_POST['usuario'];
    $email_usuario = $_POST['email_usuario'];
    $ext_tel = $_POST['ext_tel'];
    $observaciones = $_POST['observaciones'];

    $query = "INSERT INTO hardware(activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, activo_mon, estado_equipo, dir_ip, dir_mac, punto_de_red, punto_de_voz, f_ult_actualiza, departamento, responsable, email_responsable, usuario, email_usuario, ext_tel, observaciones) 
    VALUES ('$activo_equipo', '$tipo_equipo', '$marca_equipo', '$modelo_equipo', '$activo_mon', '$estado_equipo', '$dir_ip', '$dir_mac', '$punto_de_red', '$punto_de_voz', NOW(), '$departamento', '$responsable', '$email_responsable', '$usuario', '$email_usuario', '$ext_tel', '$observaciones') ";
    
    $resultado = mysql_query($query,$conexion);
    
    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>

 