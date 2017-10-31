<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $id = $_POST['id'];

    $query = "SELECT * FROM clientes WHERE id='$id'";
       
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $selecciona_cliente = array();
    $registro = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0){

      $selecciona_cliente['id']           = $registro['id'];
      $selecciona_cliente['cliente']      = $registro['cliente'];
      $selecciona_cliente['empresa']      = $registro['empresa'];
      $selecciona_cliente['departamento'] = $registro['departamento'];
      $selecciona_cliente['cargo']        = $registro['cargo'];
      $selecciona_cliente['correo']       = $registro['correo'];
      $selecciona_cliente['ext_tel']      = $registro['ext_tel'];
    }
  echo json_encode($selecciona_cliente);
?>

