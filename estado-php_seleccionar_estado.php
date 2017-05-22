<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_est = $_POST['id_est'];

    $query = "SELECT * FROM estado WHERE est_id='$id_est'";

    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_estado = array();
    $registro          = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $selecciona_estado['id_est']          = $registro['est_id'];
      $selecciona_estado['estado_equipo']   = $registro['est_descripcion'];
    }
  echo json_encode($selecciona_estado);
?>

