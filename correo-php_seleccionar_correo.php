<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id_correo= $_POST['id_correo'];

    $query = "SELECT * FROM correo WHERE id_correo='$id_correo'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_cliente = array();
    $registro = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0){
/*
      $selecciona_cliente['id']           = $registro['id'];
      $selecciona_cliente['cliente']      = $registro['cliente'];
      $selecciona_cliente['empresa']      = $registro['empresa'];
      $selecciona_cliente['departamento'] = $registro['departamento'];
      $selecciona_cliente['cargo']        = $registro['cargo'];*/
      $selecciona_cliente['nombres']      = $registro['nombres'];
      $selecciona_cliente['correo']       = $registro['correo'];
      $selecciona_cliente['ext']          = $registro['ext'];
    }
  echo json_encode($selecciona_cliente);
?>

