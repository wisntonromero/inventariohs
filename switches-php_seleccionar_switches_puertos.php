<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_sw_id = $_POST['id_sw_id'];
    $nro_cc = $_POST['nro_cc'];
    $sw_id = $_POST['sw_id'];

    $query = "SELECT puntos_de_red.punto_de_red, puntos_de_red.bloque, puntos_de_red.piso, puntos_de_red.cubiculo,  puntos_de_red.estado_punto_de_red, puntos_de_red.tipo_de_punto_de_red,
    puntos_de_red.categoria_punto_de_red, switches.sw_id, switches.nro_cc, switches.dir_ip_sw, switches.unidad, bitacora_switches.bit_sw_id, bitacora_switches.id_sw, bitacora_switches.puerto_sw,
    bitacora_switches.vlan, bitacora_switches.punto_de_red, bitacora_switches.estado_puerto_sw
    FROM puntos_de_red LEFT JOIN bitacora_switches ON puntos_de_red.punto_de_red = bitacora_switches.punto_de_red LEFT JOIN switches ON bitacora_switches.id_sw = switches.sw_id
    WHERE bitacora_switches.punto_de_red = '$punto_de_red' AND bitacora_switches.id_sw = switches.sw_id OR puntos_de_red.punto_de_red = '$punto_de_red' ";

    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consultar_switches_puertos  = array();
    $registro         = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
        $consultar_switches_puertos['bit_sw_id'] = $registro['bit_sw_id'];
        $consultar_switches_puertos['sw_id'] = $registro['sw_id'];
        $consultar_switches_puertos['nro_cc'] = $registro['nro_cc'];
        $consultar_switches_puertos['dir_ip_sw'] = $registro['dir_ip_sw'];
        $consultar_switches_puertos['unidad'] = $registro['unidad'];
        $consultar_switches_puertos['puerto_sw'] = $registro['puerto_sw'];
        $consultar_switches_puertos['punto_de_red_actual'] = $registro['punto_de_red_actual'];
        $consultar_switches_puertos['vlan_puerto_sw'] = $registro['vlan'];
        $consultar_switches_puertos['estado_puerto_sw'] = $registro['estado_puerto_sw'];

        $consultar_switches_puertos['bloque'] = $registro['bloque'];
        $consultar_switches_puertos['piso'] = $registro['piso'];
        $consultar_switches_puertos['cubiculo'] = $registro['cubiculo'];
        $consultar_switches_puertos['estado_punto_de_red'] = $registro['estado_punto_de_red'];
        $consultar_switches_puertos['tipo_de_punto_de_red'] = $registro['tipo_de_punto_de_red'];
        $consultar_switches_puertos['categoria_punto_de_red'] = $registro['categoria_punto_de_red'];
        $consultar_switches_puertos['id_sw'] = $registro['id_sw'];
    }
  echo json_encode($consultar_switches_puertos);
?>