<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_mar = $_POST['id_mar'];

    $query = "SELECT * FROM marcas WHERE mar_id='$id_mar'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_marca = array();
    $registro         = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $selecciona_marca['id_mar'] = $registro['mar_id'];
      $selecciona_marca['marca']  = $registro['mar_descripcion'];
    }
  echo json_encode($selecciona_marca);
?>

