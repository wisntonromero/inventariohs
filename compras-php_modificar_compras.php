<?php
    include('config.php');
    require_once('sesion.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo          = strtoupper($_POST['activo_equipo']);
    $orden_de_compra        = strtoupper($_POST['orden_de_compra']);
    $id_tip                 = $_POST['id_tip'];
    $id_mar                 = $_POST['id_mar'];
    $modelo_equipo          = strtoupper($_POST['modelo_equipo']);
    $id_pri                 = $_POST['id_pri'];
    $serial_equipo          = strtoupper($_POST['serial_equipo']);
    $id_cen                 = $_POST['id_cen'];
    $activo_monitor         = strtoupper($_POST['activo_monitor']);
    $serial_monitor         = strtoupper($_POST['serial_monitor']);
    $id_est                 = $_POST['id_est'];
    $estado_equipo          = strtoupper($_POST['estado_equipo']);
    $activo_equipo_retirar  = strtoupper($_POST['activo_equipo_retirar']);
    $activo_monitor_retirar = strtoupper($_POST['activo_monitor_retirar']);
    $id_pro                 = $_POST['id_pro']; 
    
    $responsable            = strtoupper($_POST['responsable']);
    $email_responsable      = strtolower($_POST['email_responsable']);
    $usuario                = strtoupper($_POST['usuario']);
    $email_usuario          = strtolower($_POST['email_usuario']);

    $ext_tel                = strtoupper($_POST['ext_tel']);

    $bloque                 = strtoupper($_POST['bloque']); 
    $piso                   = strtoupper($_POST['piso']); 
    $cubiculo               = strtoupper($_POST['cubiculo']); 

    $dir_ip                 = $_POST['dir_ip'];
    $dir_mac                = strtoupper($_POST['dir_mac']);
    $punto_de_red           = strtoupper($_POST['punto_de_red']);
    $ot_sigma               = strtoupper($_POST['ot_sigma']); 
    $observaciones          = strtoupper($_POST['observaciones']);
    

    // $query = "UPDATE compras SET com_observaciones='$observaciones' WHERE com_activo_equipo='$activo_equipo'";
    // $resultado1 = mysql_query($query,$conexion); 

    $query = "UPDATE compras SET com_orden_de_compra='$orden_de_compra',com_tipo_equipo='$id_tip', com_marca_equipo='$id_mar', com_modelo_equipo='$modelo_equipo',
    com_prioridad='$id_pri',com_serial_equipo='$serial_equipo',com_centro_costo='$id_cen',com_activo_monitor='$activo_monitor', com_serial_monitor='$serial_monitor',
    com_estado_equipo='$id_est', com_activo_equipo_retirar='$activo_equipo_retirar', com_activo_monitor_retirar='$activo_monitor_retirar', com_proceso_equipo='$id_pro', 
    com_responsable='$responsable', com_email_responsable='$email_responsable', com_usuario='$usuario', com_email_usuario='$email_usuario', com_extension='$ext_tel',com_bloque='$bloque', com_piso='$piso',com_cubiculo='$cubiculo', com_dir_ip='$dir_ip', 
    com_dir_mac='$dir_mac', com_punto_de_red='$punto_de_red', com_ot_sigma='$ot_sigma',com_observaciones='$observaciones', com_f_ult_actualizacion=NOW() WHERE com_activo_equipo='$activo_equipo'";
    $resultado1 = mysql_query($query,$conexion); 
  
    $query  = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$id_est',NOW(),'$activo_equipo', upper('$user'))" or die("Error in the consult.." . mysqli_error($query)); 
    $resultado2 = mysql_query($query,$conexion); 
    
    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>


