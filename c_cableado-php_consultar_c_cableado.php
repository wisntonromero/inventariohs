<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $nro_cc = $_POST['nro_cc'];
  
    $query = "SELECT * FROM c_cableados WHERE nro_cc='$nro_cc'";
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consultar_c_cableado = array();
    $registro = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0){
      $consultar_c_cableado['id_cc']           = $registro['id_cc'];
      $consultar_c_cableado['nro_cc']          = $registro['nro_cc'];
      $consultar_c_cableado['descripcion_cc']  = $registro['descripcion_cc'];
      $consultar_c_cableado['ubicacion_cc']    = $registro['ubicacion_cc'];
    }
  echo json_encode($consultar_c_cableado);
?>