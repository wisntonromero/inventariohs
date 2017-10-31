<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_cc = $_POST['id_cc'];

    $query = "SELECT * FROM c_cableados WHERE id_cc = '$id_cc'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_c_cableado = array();
    $registro = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0){

      $selecciona_c_cableado['id_cc']           = $registro['id_cc'];
      $selecciona_c_cableado['nro_cc']          = $registro['nro_cc'];
      $selecciona_c_cableado['descripcion_cc']  = $registro['descripcion_cc'];
      $selecciona_c_cableado['ubicacion_cc']    = $registro['ubicacion_cc'];
    }
  echo json_encode($selecciona_c_cableado);
?>

