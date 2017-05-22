<?php

    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

        $activo_equipo = strtoupper($_POST['activo_equipo']);
        $tipo_equipo = strtoupper($_POST['tipo_equipo']);
        $marca_equipo = strtoupper($_POST['marca_equipo']);
        $modelo_equipo = strtoupper($_POST['modelo_equipo']);
        $serial_equipo = strtoupper($_POST['serial_equipo']);
        $estado_equipo = strtoupper($_POST['estado_equipo']);

        $dir_mac = strtoupper($_POST['dir_mac']);

        $responsable = strtoupper($_POST['responsable']);
        $email_responsable = strtolower ($_POST['email_responsable']);
        $usuario = strtoupper($_POST['usuario']);
        $email_usuario = strtolower ($_POST['email_usuario']);
        $ext_tel = $_POST['ext_tel'];
        $f_compra = $_POST['f_compra'];
        $bodega_actual = strtoupper($_POST['bodega_actual']);
        $observaciones = strtoupper($_POST['observaciones']);


        $query = "UPDATE hardware SET tipo_equipo='$tipo_equipo', marca_equipo='$marca_equipo', modelo_equipo='$modelo_equipo', serial_equipo='$serial_equipo', activo_mon='NO APLICA',
        estado_equipo='$estado_equipo', dir_ip='000.000.000.000', dir_mac='$dir_mac', punto_de_red='NO TIENE', punto_de_voz='NO TIENE', f_ult_actualiza=NOW(), departamento='NO TIENE',
        responsable='$responsable', email_responsable='$email_responsable', usuario='$usuario', email_usuario='$email_usuario', ext_tel='$ext_tel', f_compra='$f_compra',
        bodega_actual='$bodega_actual',  observaciones='$observaciones' WHERE activo_equipo='$activo_equipo' ";
        $resultado = mysql_query($query,$conexion);

        if(mysql_affected_rows()>0){
            echo "1";
        }
        else{
            echo "2";
        }

        mysql_close($conexion);
?>