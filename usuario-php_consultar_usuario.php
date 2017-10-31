<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $usuario = $_POST['usuario'];

    $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consultar_usuario = array();

    if( $numero_de_filas > 0)
    {

      $registro = mysql_fetch_array($resultado);

      $consultar_usuario['usuario'] = $registro['usuario'];
      $consultar_usuario['contrasena'] = $registro['contrasena'];
      $consultar_usuario['nivel'] = $registro['nivel'];
      $consultar_usuario['nombre'] = $registro['nombre'];
      $consultar_usuario['correo'] = $registro['correo'];
      $consultar_usuario['departamento'] = $registro['departamento'];
      $consultar_usuario['cargo'] = $registro['cargo'];
      $consultar_usuario['ext_tel'] = $registro['ext_tel'];
      $consultar_usuario['ubicacion_foto'] = $registro['ubicacion_foto'];
    }
  echo json_encode($consultar_usuario);
?>


