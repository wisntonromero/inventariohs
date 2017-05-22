<?php
  include('config.php');

    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $dir_ip = $_POST["dir_ip"];
    $activo_equipo = $_POST["activo_equipo"];

    $query = "SELECT  * FROM hardware WHERE dir_ip='$dir_ip' and activo_equipo <> '$activo_equipo' and dir_ip <> '' and dir_ip <> '000.000.000.000' ";
    
    $resultado = mysql_query($query,$conexion);
    $datos = mysql_num_rows($resultado);
  /*  $registro = mysql_fetch_array($resultado); */
    $consultar_ip = array();

    if(mysql_num_rows($resultado)>=1 and 'activo_equipo' <> $activo_equipo)
    {
      $registro = mysql_fetch_array($resultado);
      $consultar_ip['activo_equipo'] = $registro['activo_equipo'];
      $consultar_ip['tipo_equipo'] = $registro['tipo_equipo'];
      $consultar_ip['estado_equipo'] = $registro['estado_equipo'];
      $consultar_ip['dir_ip'] = $registro['dir_ip'];
      $consultar_ip['punto_de_red'] = $registro['punto_de_red'];
    } 
    else
    {
      echo "<script>confirmar(\"\")</script>";
    };
    echo json_encode($consultar_ip);
?>



