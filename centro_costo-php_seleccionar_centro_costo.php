<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_cen = $_POST['id_cen'];

    $query = "SELECT * FROM centros_de_costos WHERE cen_id ='$id_cen'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_centro_costo  = array();
    $registro                 = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0)
    {
      $selecciona_centro_costo['id_cen']        = $registro['cen_id'];
      $selecciona_centro_costo['centro_costo']  = $registro['cen_descripcion'];
    }
  echo json_encode($selecciona_centro_costo);
?>

