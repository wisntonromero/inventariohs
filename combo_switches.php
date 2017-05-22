<?php
include('conexion.php');
$salida="";
$nro_cc=$_POST["elegido"];
// construimos el combo de ciudades deacuerdo al pais seleccionado
$combog = mysql_query("SELECT * FROM switches WHERE nro_cc=$nro_cc");
	

  while($sql_p = mysql_fetch_row($combog))
  {
   $salida.= "<option value='".$sql_p[0]."'>".$sql_p[5]."".$sql_p[6]."".' - Ip Sw: ' ."".' - Ip Sw: ' ."".$sql_p[1]."".' - Unidad: ' ."".$sql_p[2]."</option>";
  }  

	echo $salida;

	$combog = mysql_query("SELECT switches.sw_id, switches.dir_ip_sw, switches.unidad, bitacora_switches.id_sw, bitacora_switches.puerto_sw, bitacora_switches.punto_de_red, bitacora_switches.vlan, bitacora_switches.estado_puerto_sw FROM switches,bitacora_switches WHERE bitacora_switches.id_sw = '3'  AND switches.sw_id = '3' GROUP BY dir_ip_sw,unidad,puerto_sw ASC ");
	//$query = "SELECT switches.sw_id, switches.dir_ip_sw, switches.unidad, bitacora_switches.id_sw, bitacora_switches.puerto_sw, bitacora_switches.punto_de_red, bitacora_switches.vlan, bitacora_switches.estado_puerto_sw FROM switches,bitacora_switches WHERE bitacora_switches.id_sw = '$q'  AND switches.sw_id = '$q' GROUP BY dir_ip_sw,unidad,puerto_sw ASC ";

	$consulta = array();
	$registro = mysql_fetch_array($combog);
	$consulta['sw_id'] = $registro['sw_id'];


	 echo json_encode($consulta);
?>


