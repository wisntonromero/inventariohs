<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $correo = $_POST['correo'];

    $query = "SELECT * FROM clientes WHERE correo='$correo'";
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consultar_cliente = array();
    $registro = mysql_fetch_array($resultado);

    if( $numero_de_filas > 0){
      $consultar_cliente['id']            = $registro['id'];
      $consultar_cliente['cliente']       = $registro['cliente'];
      $consultar_cliente['empresa']       = $registro['empresa'];
      $consultar_cliente['departamento']  = $registro['departamento'];
      $consultar_cliente['cargo']         = $registro['cargo'];
      $consultar_cliente['correo']        = $registro['correo'];
      $consultar_cliente['ext_tel']       = $registro['ext_tel'];
    }
  echo json_encode($consultar_cliente);
?>


