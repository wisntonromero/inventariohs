<?php
  include('config.php');

    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST["activo_equipo"];

    $query = "SELECT  * FROM compras WHERE com_activo_equipo = '$activo_equipo'";
    
    $resultado = mysql_query($query,$conexion);
    $datos = mysql_num_rows($resultado);
  /*  $registro = mysql_fetch_array($resultado); */
    $consultar_activo = array();

    if(mysql_num_rows($resultado)>0)
    {
      $registro = mysql_fetch_array($resultado);
      $consultar_activo['activo_equipo'] = $registro['com_activo_equipo'];
      $consultar_activo['orden_de_compra'] = $registro['com_orden_de_compra'];
    } 
    else
    {
      echo "<script>confirmar(\"\")</script>";
    };
    echo json_encode($consultar_activo);
?>



