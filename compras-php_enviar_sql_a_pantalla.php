<?php
include_once("config.php");
?>
<?php

// ** Campos con lo que voy a realizar la consulta, los del formulario.
$id_est = $_POST['id_est'];
$orden_de_compra = $_POST['orden_de_compra'];
$activo_equipo = $_POST['activo_equipo'];
$activo_monitor = $_POST['activo_monitor'];
$activo_equipo_a_retirar = $_POST['activo_equipo_a_retirar'];
$activo_monitor_a_retirar = $_POST['activo_monitor_a_retirar'];


echo "<p>Consulta de orden de compra: $orden_de_compra </p>" ;

$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);

$query = "SELECT (@numero:=@numero+1) AS Items, com_f_ult_actualizacion AS Fecha_ultima_actualizacion, compras.com_orden_de_compra AS orden_de_compra, tipos_equipo.tip_descripcion AS tipo_de_equipo,
marcas.mar_descripcion AS marca_de_equipo, com_modelo_equipo AS modelo_equipo, prioridades.pri_descripcion AS prioridad_del_equipo,
com_activo_equipo AS activo_equipo, com_serial_equipo AS serial_del_equipo, com_activo_monitor AS activo_monitor, com_serial_monitor AS serial_monitor,
estado.est_descripcion AS estado_del_equipo, com_activo_equipo_retirar AS activo_equipo_a_retirar, com_activo_monitor_retirar AS activo_monitor_a_retirar,
procesos.pro_descripcion AS proceso_del_equipo, com_responsable AS responsable, com_usuario AS usuario, com_extension AS nro_extension, com_bloque AS bloque,
com_piso AS piso, com_cubiculo AS cubiculo, com_dir_ip AS dir_ip, com_dir_mac AS dir_mac, com_punto_de_red  AS punto_de_red,
com_ot_sigma AS ot_sigma, com_observaciones AS observaciones FROM (SELECT @numero:=0) r, compras
LEFT JOIN tipos_equipo ON compras.com_tipo_equipo = tipos_equipo.tip_id
LEFT JOIN marcas ON compras.com_marca_equipo = marcas.mar_id
LEFT JOIN prioridades ON compras.com_prioridad = prioridades.pri_id
LEFT JOIN estado ON compras.com_estado_equipo = estado.est_id
LEFT JOIN procesos ON compras.com_proceso_equipo = procesos.pro_id
WHERE com_orden_de_compra LIKE '%$orden_de_compra%' AND com_activo_equipo LIKE '%$activo_equipo%' AND com_activo_monitor LIKE '%$activo_monitor%' AND com_activo_equipo_retirar LIKE '%$activo_equipo_a_retirar%' AND com_activo_monitor_retirar LIKE '%$activo_monitor_a_retirar%' AND com_estado_equipo LIKE '%$id_est%'";

$r = mysql_query($query,$conexion);

$return = '';
if( mysql_num_rows($r)>0)
{
  $return .= '<table border=1>';
  $cols = 0;
  while($rs = mysql_fetch_row($r))
  {
    $return .= '<tr>';
    if($cols==0)
    {
      $cols = sizeof($rs);
      $cols_names = array();
      for($i=0; $i<$cols; $i++)
      {
        $col_name = mysql_field_name($r,$i);
        $return .= '<th>'.htmlspecialchars($col_name).'</th>';
        $cols_names[$i] = $col_name;
      }
      $return .= '</tr><tr>';
    }
    for($i=0; $i<$cols; $i++)
    {
            #En esta iteración podes manejar de manera personalizada datos, por ejemplo:
      if($cols_names[$i] == 'fechaAlta')
            { #Fromateo el registro en formato Timestamp
              $return .= '<td>'.htmlspecialchars(date('d/m/Y H:i:s',$rs[$i])).'</td>';
            }else if($cols_names[$i] == 'activo')
            { #Estado lógico del registro, en vez de 1 o 0 le muestro Si o No.
              $return .= '<td>'.htmlspecialchars( $rs[$i]==1? 'SI':'NO' ).'</td>';
            }else
            {
              $return .= '<td>'.htmlspecialchars($rs[$i]).'</td>';
            }
          }
          $return .= '</tr>';
        }
        $return .= '</table>';
        mysql_free_result($r);
      }
      echo $return;
?>
