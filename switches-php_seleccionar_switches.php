<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

   // $nro_cc = $_POST['nro_cc'];
    $id_sw = $_POST['id_sw'];


    $query = "SELECT * FROM switches WHERE id_sw='$id_sw'";

    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_tipo  = array();
    $registro         = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $selecciona_tipo['id_sw']      = $registro['id_sw'];
      $selecciona_tipo['nro_cc']      = $registro['nro_cc'];
      $selecciona_tipo['dir_ip_sw']   = $registro['dir_ip_sw'];
      $selecciona_tipo['unidad']      = $registro['unidad'];
    }
  echo json_encode($selecciona_tipo);
?>