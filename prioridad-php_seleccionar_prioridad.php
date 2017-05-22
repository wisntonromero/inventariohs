<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_pri = $_POST['id_pri'];

    $query = "SELECT * FROM prioridades WHERE pri_id ='$id_pri'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_prioridad = array();
    $registro             = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $selecciona_prioridad['id_pri']     = $registro['pri_id'];
      $selecciona_prioridad['prioridad']  = $registro['pri_descripcion'];
    }
  echo json_encode($selecciona_prioridad);
?>

