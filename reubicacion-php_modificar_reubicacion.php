<?php
    include('config.php');
    require_once('sesion.php');
    require 'phpmailer/PHPMailerAutoload.php';
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $reu_id                 = ($_POST['reu_id']);
    $activo_equipo          = strtoupper($_POST['activo_equipo']);
    $id_tip                 = $_POST['id_tip'];
    $tipo_equipo            = $_POST['tipo_equipo'];
    $id_mar                 = $_POST['id_mar'];
    $modelo_equipo          = strtoupper($_POST['modelo_equipo']);
    $id_pri                 = $_POST['id_pri'];
    $id_cen                 = $_POST['id_cen'];
    $activo_monitor         = strtoupper($_POST['activo_monitor']);
    $serial_monitor         = strtoupper($_POST['serial_monitor']);
    $id_est                 = $_POST['id_est'];
    $estado_equipo          = strtoupper($_POST['estado_equipo']);
    $activo_equipo_retirar  = strtoupper($_POST['activo_equipo_retirar']);
    $activo_monitor_retirar = strtoupper($_POST['activo_monitor_retirar']);
    $id_pro                 = $_POST['id_pro'];
    $proceso_equipo_retirar = $_POST['proceso_equipo_retirar'];

    $responsable_actual     = strtoupper($_POST['responsable_actual']);
    $usuario_actual         = strtoupper($_POST['usuario_actual']);
    $nuevo_ext_tel          = strtoupper($_POST['nuevo_ext_tel']);

    $bloque_actual          = strtoupper($_POST['bloque_actual']);
    $piso_actual            = strtoupper($_POST['piso_actual']);
    $cubiculo_actual        = strtoupper($_POST['cubiculo_actual']);

    $dir_ip                 = $_POST['dir_ip'];
    $dir_mac                = strtoupper($_POST['dir_mac']);
    $punto_de_red           = strtoupper($_POST['punto_de_red']);
    $ot_sigma               = strtoupper($_POST['ot_sigma']);
    $activo_equipo_soporte  = strtoupper($_POST['activo_equipo_soporte']);
    $observaciones          = strtoupper($_POST['observaciones']);

    $responsable            = strtoupper($_POST['responsable']);
    $email_nuevo_responsable= strtolower($_POST['email_nuevo_responsable']);
    $usuario                = strtoupper($_POST['usuario']);
    $email_nuevo_usuario    = strtolower($_POST['email_nuevo_usuario']);

    $bloque                 = strtoupper($_POST['bloque']);
    $piso                   = strtoupper($_POST['piso']);
    $cubiculo               = strtoupper($_POST['cubiculo']);

    // $query = "UPDATE compras SET com_observaciones='$observaciones' WHERE com_activo_equipo='$activo_equipo'";
    // $resultado1 = mysql_query($query,$conexion);

    $query = "UPDATE reubicaciones SET reu_activo='$activo_equipo', reu_tipo_equipo='$id_tip', reu_marca_equipo='$id_mar', reu_modelo_equipo='$modelo_equipo',
    reu_activo_monitor='$activo_monitor',reu_estado_equipo='$id_est',reu_prioridad='$id_pri',reu_responsable='$responsable_actual', reu_usuario='$usuario_actual',
    reu_bloque='$bloque_actual', reu_piso='$piso_actual', reu_cubiculo='$cubiculo_actual', reu_activo_equipo_retirar='$activo_equipo_retirar', reu_activo_monitor_retirar='$activo_monitor_retirar',
    reu_proceso_equipo_retirar='$id_pro', reu_nuevo_responsable='$responsable', reu_email_nuevo_responsable='$email_nuevo_responsable', reu_nuevo_usuario='$usuario', reu_email_nuevo_usuario='$email_nuevo_usuario', reu_nuevo_bloque='$bloque', reu_nuevo_piso='$piso',
    reu_nuevo_cubiculo='$cubiculo', reu_dir_ip='$dir_ip', reu_dir_mac='$dir_mac', reu_punto_de_red='$punto_de_red', reu_extension='$nuevo_ext_tel', reu_ot_sigma='$ot_sigma',
    reu_activo_soporte='$activo_equipo_soporte', reu_observacion='$observaciones', reu_f_ult_actualizacion=NOW() WHERE reu_id ='$reu_id'";
    $resultado1 = mysql_query($query,$conexion);


    $query  = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$id_est',NOW(),'$activo_equipo',upper('$user'))" or die("Error in the consult.." . mysqli_error($query));
    $resultado2 = mysql_query($query,$conexion);


    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);

?>


