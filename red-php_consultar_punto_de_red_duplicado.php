<?php
  include('config.php');

    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $punto_de_red = $_POST["punto_de_red"];
    $activo_equipo = $_POST["activo_equipo"];

    $query = "SELECT  * FROM hardware WHERE punto_de_red='$punto_de_red' and activo_equipo <> '$activo_equipo' and punto_de_red <> '' and punto_de_red <> 'NO TIENE' ";
    
    $resultado = mysql_query($query,$conexion);
    $datos = mysql_num_rows($resultado);
  /*  $registro = mysql_fetch_array($resultado); */
    $consultar_punto_de_red = array();

    if(mysql_num_rows($resultado)>=1 and 'activo_equipo' <> $activo_equipo)
    {
      $registro = mysql_fetch_array($resultado);
      $consultar_punto_de_red['activo_equipo'] = $registro['activo_equipo'];
      $consultar_punto_de_red['tipo_equipo'] = $registro['tipo_equipo'];
      $consultar_punto_de_red['estado_equipo'] = $registro['estado_equipo'];
      $consultar_punto_de_red['punto_de_red'] = $registro['punto_de_red'];
    } 
    else
    {
      echo "<script>confirmar(\"\")</script>";
    };
    echo json_encode($consultar_punto_de_red);
?>



