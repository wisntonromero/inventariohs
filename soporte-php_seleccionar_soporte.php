<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id = $_POST['id'];

    $query = "SELECT * FROM hardware WHERE id='$id'";

    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $seleccionar_activo_soporte = array();
    $registro = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0){

      $seleccionar_activo_soporte['id']             = $registro['id'];
      $seleccionar_activo_soporte['activo_equipo']  = $registro['activo_equipo'];
      $seleccionar_activo_soporte['tipo_equipo']    = $registro['tipo_equipo'];
      $seleccionar_activo_soporte['marca_equipo']   = $registro['marca_equipo'];
      $seleccionar_activo_soporte['modelo_equipo']  = $registro['modelo_equipo'];
      $seleccionar_activo_soporte['serial_equipo']  = $registro['serial_equipo'];
    }
  echo json_encode($seleccionar_activo_soporte);
?>

