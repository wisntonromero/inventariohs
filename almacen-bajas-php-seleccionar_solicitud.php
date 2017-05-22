<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id = $_POST['id'];
    $solicitud = $_POST['solicitud'];

    $query = "SELECT * FROM bajas_reubicaciones_almacen WHERE id='$id'";
    
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $seleccionar_solicitud  = array();
    $registro               = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $seleccionar_solicitud['id']          = $registro['id'];
      $seleccionar_solicitud['solicitud']   = $registro['solicitud'];
    }
  echo json_encode($seleccionar_solicitud);
?>

