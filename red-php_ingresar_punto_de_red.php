<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

        $punto_de_red = strtoupper($_POST['punto_de_red']);
        $id_sw = $_POST['id_sw'];
        $puerto_sw = strtoupper($_POST['puerto_sw']);
        $vlan_puerto_sw = $_POST['vlan_puerto_sw'];
        $estado_puerto_sw = strtoupper($_POST['estado_puerto_sw']);      
        $bloque = strtoupper($_POST['bloque']);
        $piso = strtoupper($_POST['piso']);
        $cubiculo = strtoupper($_POST['cubiculo']);
        $estado_punto_de_red = strtoupper($_POST['estado_punto_de_red']); 
        
        $query = "INSERT INTO puntos_de_red(punto_de_red, bloque, piso, cubiculo, estado_punto_de_red) 
        VALUES ('$punto_de_red', '$bloque', '$piso', '$cubiculo', '$estado_punto_de_red') ";
        $resultado = mysql_query($query,$conexion);

        $query = "INSERT INTO bitacora_switches(id_sw, puerto_sw, vlan, punto_de_red, estado_puerto_sw) 
        VALUES ('$id_sw', '$puerto_sw', '$vlan_puerto_sw', '$punto_de_red', '$estado_puerto_sw') ";
        $resultado2 = mysql_query($query,$conexion);

        if(mysql_affected_rows()>0){
           echo "1";
        }
        else{
            echo "2";
        }
        mysql_close($conexion);
?>