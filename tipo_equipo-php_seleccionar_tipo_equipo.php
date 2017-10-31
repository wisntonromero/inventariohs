<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_tip = $_POST['id_tip'];

    $query = "SELECT * FROM tipos_equipo WHERE tip_id='$id_tip'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_tipo  = array();
    $registro         = mysql_fetch_array($resultado);
   
    if( $numero_de_filas > 0)
    {
      $selecciona_tipo['id_tip']        = $registro['tip_id'];
      $selecciona_tipo['tipo_equipo']   = $registro['tip_descripcion'];
    }
  echo json_encode($selecciona_tipo);
?>

