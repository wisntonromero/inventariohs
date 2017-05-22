<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_pro = $_POST['id_pro'];

    $query = "SELECT * FROM procesos WHERE pro_id ='$id_pro'";

    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_proceso  = array();
    $registro            = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $selecciona_proceso['id_pro']                   = $registro['pro_id'];
      $selecciona_proceso['proceso_equipo_retirar']   = $registro['pro_descripcion'];
    }
  echo json_encode($selecciona_proceso);
?>

