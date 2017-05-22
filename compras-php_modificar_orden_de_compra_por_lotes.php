<?php
    include('config.php');
    //include('sesion.php');
    require_once('sesion.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);


    $orden_de_compra        = strtoupper($_POST['orden_de_compra']);
    $id_est                 = $_POST['id_est'];

    // $query = "UPDATE compras SET com_observaciones='$observaciones' WHERE com_activo_equipo='$activo_equipo'";
    // $resultado1 = mysql_query($query,$conexion);

    $query = "UPDATE compras SET com_estado_equipo='$id_est', com_f_ult_actualizacion=NOW() WHERE com_orden_de_compra='$orden_de_compra'";
    $resultado1 = mysql_query($query,$conexion);

    $query = "SELECT * FROM compras WHERE com_orden_de_compra = '$orden_de_compra'";
    $resultado2 = mysql_query($query,$conexion);

    while($registro=mysql_fetch_array($resultado2)){
        $activo = $registro['com_activo_equipo'];

        $query  = "INSERT INTO bitacoras(bit_cod_estado,bit_fecha_estado,bit_activo,bit_usuario) VALUES('$id_est',NOW(),'$activo','$user')" or die("Error in the consult.." . mysqli_error($query));
        $resultado3 = mysql_query($query,$conexion);

    }
    if(mysql_affected_rows()>0){
        echo "1";
        //echo "location.href = compras-form_modificar_estado_de_equipos_por_lotes.php";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>


