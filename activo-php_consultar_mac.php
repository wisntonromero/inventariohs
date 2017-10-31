<?php
  include('config.php');

    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $dir_mac = $_POST["dir_mac"];
    $activo_equipo = $_POST["activo_equipo"];

    $query = "SELECT  * FROM hardware WHERE dir_mac='$dir_mac' and activo_equipo <> '$activo_equipo' and dir_mac <> '' and dir_mac <> 'NO TIENE' and dir_mac <> 'AA-AA-AA-AA-AA-AA' ";
    
    $resultado = mysql_query($query,$conexion);
    $datos = mysql_num_rows($resultado);
  /*  $registro = mysql_fetch_array($resultado); */
    $consultar_mac = array();

    if(mysql_num_rows($resultado)>=1 and 'activo_equipo' <> $activo_equipo)
    {
      $registro = mysql_fetch_array($resultado);
      $consultar_mac['activo_equipo'] = $registro['activo_equipo'];
      $consultar_mac['tipo_equipo'] = $registro['tipo_equipo'];
      $consultar_mac['estado_equipo'] = $registro['estado_equipo'];
      $consultar_mac['dir_ip'] = $registro['dir_ip'];
      $consultar_mac['punto_de_red'] = $registro['punto_de_red'];
    } 
    else
    {
      echo "<script>confirmar(\"\")</script>";
    };
    echo json_encode($consultar_mac);
?>



