<?php
    include('config.php');
    require_once('sesion.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo          = $_POST['activo_equipo'];
    $id_tip                 = $_POST['id_tip'];
    $id_mar                 = $_POST['id_mar'];
    $modelo_equipo          = $_POST['modelo_equipo'];
    $activo_monitor         = $_POST['activo_monitor'];
    $id_pri                 = $_POST['id_pri'];
    $id_est                 = $_POST['estado_equipo'];

    $responsable            = $_POST['responsable'];
    $usuario                = $_POST['usuario'];

    $bloque                 = $_POST['bloque'];
    $piso                   = $_POST['piso'];
    $cubiculo               = $_POST['cubiculo'];

    $activo_equipo_retirar  = $_POST['activo_equipo_retirar'];
    $activo_monitor_retirar = $_POST['activo_monitor_retirar'];
    $id_pro                 = $_POST['id_pro'];
    $proceso_equipo_retirar = $_POST['proceso_equipo_retirar'];

    $nuevo_responsable      = $_POST['nuevo_responsable'];
    $nuevo_usuario          = $_POST['nuevo_usuario'];
    $nuevo_bloque           = $_POST['nuevo_bloque'];
    $nuevo_piso             = $_POST['nuevo_piso'];
    $nuevo_cubiculo         = $_POST['nuevo_cubiculo'];
    $activo_equipo_soporte  = $_POST['activo_equipo_soporte'];
    $nuevo_dir_ip           = $_POST['nuevo_dir_ip'];
    $dir_mac                = $_POST['dir_mac'];
    $nuevo_punto_de_red     = $_POST['nuevo_punto_de_red'];
    $ot_sigma               = $_POST['ot_sigma'];
    $nuevo_ext_tel          = $_POST['nuevo_ext_tel'];
    $observaciones          = $_POST['observaciones'];


    $query = "INSERT INTO reubicaciones(reu_activo, reu_tipo_equipo, reu_marca_equipo, reu_modelo_equipo, reu_activo_monitor, reu_estado_equipo, reu_prioridad, reu_responsable, reu_usuario, reu_bloque, reu_piso, reu_cubiculo, reu_activo_equipo_retirar, reu_activo_monitor_retirar, reu_proceso_equipo_retirar, reu_nuevo_responsable, reu_nuevo_usuario, reu_nuevo_bloque, reu_nuevo_piso, reu_nuevo_cubiculo, reu_activo_soporte, reu_dir_ip, reu_dir_mac, reu_punto_de_red, reu_extension, reu_ot_sigma, reu_observacion,reu_f_ult_actualizacion)
                              VALUES ('$activo_equipo','$id_tip', '$id_mar','$modelo_equipo','$activo_monitor','1', '$id_pri', '$responsable', '$usuario', '$bloque', '$piso', '$cubiculo', '$activo_equipo_retirar', '$activo_monitor_retirar', '$id_pro', '$nuevo_responsable', '$nuevo_usuario', '$nuevo_bloque', '$nuevo_piso', '$nuevo_cubiculo', '$activo_equipo_soporte', '$nuevo_dir_ip', '$dir_mac','$nuevo_punto_de_red','$nuevo_ext_tel', '$ot_sigma', '$observaciones', NOW())";
    $resultado1 = mysql_query($query,$conexion);

    $query  = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('1',NOW(),'$activo_equipo',upper('$user'))" or die("Error in the consult.." . mysqli_error($query));
    $resultado2 = mysql_query($query,$conexion);

    if(mysql_affected_rows()>0){
        echo "1";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>