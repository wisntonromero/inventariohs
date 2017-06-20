<?php
    include('config.php');
    require_once('sesion.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $orden_de_compra        = $_POST['orden_de_compra'];
    $id_tip                 = $_POST['id_tip'];
    $id_mar                 = $_POST['id_mar'];
    $modelo_equipo          = $_POST['modelo_equipo'];
    $id_pri                 = $_POST['id_pri'];
    $activo_equipo          = $_POST['activo_equipo'];
    $serial_equipo          = $_POST['serial_equipo'];
    $id_cen                 = $_POST['id_cen'];
    $activo_monitor         = $_POST['activo_monitor'];
    $serial_monitor         = $_POST['serial_monitor'];
    $estado_equipo          = $_POST['estado_equipo'];
    $activo_equipo_retirar  = $_POST['activo_equipo_retirar'];
    $activo_monitor_retirar = $_POST['activo_monitor_retirar'];
    $id_pro                 = $_POST['id_pro'];

    $responsable            = $_POST['responsable'];
    $usuario                = $_POST['usuario'];
    $ext_tel                = $_POST['ext_tel'];

    $bloque                 = $_POST['bloque']; 
    $piso                   = $_POST['piso']; 
    $cubiculo               = $_POST['cubiculo']; 
    $observaciones          = $_POST['observaciones'];

   $query = "INSERT INTO compras(com_orden_de_compra,com_tipo_equipo, com_marca_equipo, com_modelo_equipo,com_prioridad,com_activo_equipo,com_serial_equipo,com_centro_costo,com_activo_monitor, com_serial_monitor, com_estado_equipo, com_activo_equipo_retirar, com_activo_monitor_retirar, com_proceso_equipo, com_responsable, com_usuario,com_extension, com_dir_ip, com_dir_mac, com_ot_sigma, com_punto_de_red, com_bloque, com_piso,com_cubiculo, com_observaciones) 
                            VALUES ('$orden_de_compra','$id_tip', '$id_mar','$modelo_equipo','$id_pri','$activo_equipo','$serial_equipo','$id_cen','$activo_monitor', '$serial_monitor','1', '$activo_equipo_retirar', '$activo_monitor_retirar', '$id_pro', '$responsable', '$usuario', '$ext_tel', '000.000.000.000', 'AA-AA-AA-AA-AA-AA', '', 'NO TIENE',  '$bloque', '$piso', '$cubiculo','$observaciones')";
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