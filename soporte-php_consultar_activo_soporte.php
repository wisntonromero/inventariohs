<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST['activo_equipo'];

    $query = "SELECT activo_equipo, tipo_equipo, marca_equipo, modelo_equipo, serial_equipo, estado_equipo, dir_mac, responsable, email_responsable, usuario, email_usuario, ext_tel, f_compra, bodega_actual, observaciones
    FROM hardware
    WHERE activo_equipo = '$activo_equipo' AND estado_equipo = 'SOPORTE'";

    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consulta = array();

    if( $numero_de_filas > 0)
    {
      $registro = mysql_fetch_array($resultado);

      $consulta['activo_equipo'] = $registro['activo_equipo'];
      $consulta['tipo_equipo'] = $registro['tipo_equipo'];
      $consulta['marca_equipo'] = $registro['marca_equipo'];
      $consulta['modelo_equipo'] = $registro['modelo_equipo'];
      $consulta['serial_equipo'] = $registro['serial_equipo'];
      $consulta['estado_equipo'] = $registro['estado_equipo'];
      $consulta['dir_mac'] = $registro['dir_mac'];
      $consulta['responsable'] = $registro['responsable'];
      $consulta['email_responsable'] = $registro['email_responsable'];
      $consulta['usuario'] = $registro['usuario'];
      $consulta['email_usuario'] = $registro['email_usuario'];
      $consulta['ext_tel'] = $registro['ext_tel'];
      $consulta['f_compra'] = $registro['f_compra'];
      $consulta['bodega_actual'] = $registro['bodega_actual'];
      $consulta['observaciones'] = $registro['observaciones'];
    } else
      {

      };
   echo json_encode($consulta);
?>

