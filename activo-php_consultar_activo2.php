<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST['activo_equipo'];

   // $query = "SELECT activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, activo_mon, estado_equipo, dir_ip, dir_mac, punto_de_voz, f_ult_actualiza, departamento, responsable, usuario, ext_tel, observaciones, hardware.punto_de_red, bitacora_switches.dir_ip_sw, bitacora_switches.puerto_sw, bitacora_switches.vlan_puerto_sw, puntos_de_red_importar.bloque, puntos_de_red_importar.piso, puntos_de_red_importar.cubiculo 
   // FROM hardware,puntos_de_red_importar,bitacora_switches WHERE activo_equipo='$activo_equipo' and hardware.punto_de_red = puntos_de_red_importar.punto_de_red"; 

    $query = "SELECT activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, activo_mon, estado_equipo, dir_ip, dir_mac,  hardware.punto_de_red, punto_de_voz, f_ult_actualiza, departamento, responsable, usuario, ext_tel, hardware.observaciones,
    switches.sw_id, switches.dir_ip_sw, bitacora_switches.id_sw, bitacora_switches.puerto_sw, bitacora_switches.vlan, bitacora_switches.punto_de_red, puntos_de_red_importar.bloque, puntos_de_red_importar.piso, puntos_de_red_importar.cubiculo 
    FROM hardware,puntos_de_red_importar JOIN bitacora_switches ON puntos_de_red_importar.punto_de_red = bitacora_switches.punto_de_red JOIN switches ON bitacora_switches.id_sw = switches.sw_id  
    WHERE hardware.activo_equipo = '$activo_equipo' and hardware.punto_de_red = bitacora_switches.punto_de_red AND bitacora_switches.id_sw = switches.sw_id";

   /* $query = "SELECT * FROM hardware,puntos_de_red WHERE activo_equipo='$activo_equipo' and hardware.punto_de_red = puntos_de_red.punto_de_red"; */

    // $query = "SELECT activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, activo_mon, estado_equipo, dir_ip, dir_mac, hardware.punto_de_red, puntos_de_red.bloque, puntos_de_red.piso, puntos_de_red.cubiculo, f_ult_actualiza, departamento, responsable, usuario, ext_tel, hardware.observaciones, switches.dir_ip_sw, bitacora_switches.puerto_sw, bitacora_switches.vlan FROM hardware JOIN bitacora_switches ON hardware.punto_de_red = bitacora_switches.punto_de_red JOIN switches ON bitacora_switches.id_sw = switches.sw_id JOIN puntos_de_red ON puntos_de_red.punto_de_red = bitacora_switches.punto_de_red WHERE activo_equipo = $activo_equipo";


    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consulta = array();

    if( $numero_de_filas > 0)
    {
      $registro = mysql_fetch_array($resultado);

      $consulta['activo_equipo'] = $registro['activo_equipo'];
      $consulta['tipo_equipo'] = $registro['tipo_equipo'];
      $consulta['marca_equipo'] = $registro['marca_equipo'];
      $consulta['modelo_equipo'] = $registro['modelo_equipo'];
      $consulta['activo_mon'] = $registro['activo_mon'];
      $consulta['estado_equipo'] = $registro['estado_equipo'];

      $consulta['dir_ip'] = $registro['dir_ip'];
      $consulta['dir_mac'] = $registro['dir_mac'];
      $consulta['punto_de_red'] = $registro['punto_de_red'];
      $consulta['punto_de_voz'] = $registro['punto_de_voz'];
      $consulta['dir_ip_sw'] = $registro['dir_ip_sw'];
      $consulta['puerto_sw'] = $registro['puerto_sw'];
      $consulta['vlan_puerto_sw'] = $registro['vlan'];
      $consulta['bloque'] = $registro['bloque'];
      $consulta['piso'] = $registro['piso'];  
      $consulta['cubiculo'] = $registro['cubiculo'];
      $consulta['f_ult_actualiza'] = $registro['f_ult_actualiza'];
      $consulta['departamento'] = $registro['departamento'];
 
      $consulta['responsable'] = $registro['responsable'];
      $consulta['usuario'] = $registro['usuario'];
      $consulta['ext_tel'] = $registro['ext_tel'];
      $consulta['observaciones'] = $registro['observaciones'];
    } else
      {
            echo "<script>confirmar(\"\")</script>";
      };
   echo json_encode($consulta);
?>

