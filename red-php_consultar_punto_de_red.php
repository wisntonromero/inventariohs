<?php
  include('config.php');
   	header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $punto_de_red   = $_POST['punto_de_red'];
    $nro_cc         = $_POST['nro_cc'];
    
    $query = "SELECT puntos_de_red.punto_de_red, puntos_de_red.bloque, puntos_de_red.piso, puntos_de_red.cubiculo,  puntos_de_red.estado_punto_de_red, puntos_de_red.tipo_de_punto_de_red,puntos_de_red.color_toma,
    puntos_de_red.categoria_punto_de_red, switches.sw_id, switches.nro_cc, switches.dir_ip_sw, switches.unidad, bitacora_switches.bit_sw_id, bitacora_switches.id_sw, bitacora_switches.puerto_sw,
    bitacora_switches.vlan, bitacora_switches.punto_de_red, bitacora_switches.estado_puerto_sw 
    FROM puntos_de_red LEFT JOIN bitacora_switches ON puntos_de_red.punto_de_red = bitacora_switches.punto_de_red LEFT JOIN switches ON bitacora_switches.id_sw = switches.sw_id  
    WHERE bitacora_switches.punto_de_red = '$punto_de_red' AND bitacora_switches.id_sw = switches.sw_id OR puntos_de_red.punto_de_red = '$punto_de_red'";
		
    $resultado = mysql_query($query,$conexion);
     
    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consulta_punto_de_red = array();

    
    if( $numero_de_filas > 0)
    {

        $registro         = mysql_fetch_array($resultado);

        $consulta_punto_de_red['bit_sw_id']             = $registro['bit_sw_id'];  
        $consulta_punto_de_red['sw_id']                 = $registro['sw_id'];  
        $consulta_punto_de_red['dir_ip_sw']             = $registro['dir_ip_sw'];
        $consulta_punto_de_red['unidad']                = $registro['unidad'];
        $consulta_punto_de_red['punto_de_red_actual']   = $registro['punto_de_red'];
        $consulta_punto_de_red['puerto_sw']             = $registro['puerto_sw'];
        $consulta_punto_de_red['vlan_puerto_sw']        = $registro['vlan'];
        $consulta_punto_de_red['estado_puerto_sw']      = $registro['estado_puerto_sw'];


        
        $consulta_punto_de_red['bloque']                    = $registro['bloque'];
        $consulta_punto_de_red['piso']                      = $registro['piso'];
        $consulta_punto_de_red['cubiculo']                  = $registro['cubiculo'];
        $consulta_punto_de_red['estado_punto_de_red']       = $registro['estado_punto_de_red'];
        $consulta_punto_de_red['color_toma']                = $registro['color_toma'];
        $consulta_punto_de_red['tipo_de_punto_de_red']      = $registro['tipo_de_punto_de_red'];
        $consulta_punto_de_red['categoria_punto_de_red']    = $registro['categoria_punto_de_red'];
        $consulta_punto_de_red['id_sw']                     = $registro['id_sw'];
        
      /*}else
        {
              echo "<script>confirmar(\"\")</script>"; */
    }
    echo json_encode($consulta_punto_de_red);
?>