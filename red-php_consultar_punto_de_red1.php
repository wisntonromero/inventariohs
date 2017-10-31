<?php
  include('config.php');

   	header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $punto_de_red = $_POST['punto_de_red'];

    $query = "SELECT puntos_de_red.punto_de_red FROM puntos_de_red WHERE punto_de_red = '$punto_de_red'";

		$resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consulta_punto_de_red = array();

    if( $numero_de_filas > 0){

    	$registro = mysql_fetch_array($resultado);
      $consulta_punto_de_red1['punto_de_red'] = $registro['punto_de_red'];    
    }else
      {
            echo "<script>confirmar(\"\")</script>";
      };
    echo json_encode($consulta_punto_de_red1);
?>