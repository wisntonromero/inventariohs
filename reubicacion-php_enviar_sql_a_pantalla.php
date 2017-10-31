<?php
  include_once("config.php");
?>
<?php

// ** Campos con lo que voy a realizar la consulta, los del formulario.
//$orden_de_compra = $_POST['orden_de_compra'];
$id_est = $_POST['id_est'];
$activo_equipo = $_POST['activo_equipo'];
$activo_monitor = $_POST['activo_monitor'];
$activo_equipo_retirar = $_POST['activo_equipo_retirar'];
$activo_monitor_a_retirar = $_POST['activo_monitor_a_retirar'];
$responsable_actual = $_POST['responsable_actual'];
$usuario_anterior = $_POST['usuario_anterior'];
$responsable = $_POST['responsable'];
$usuario = $_POST['usuario'];

echo "<p>Consulta de orden de compra: $orden_de_compra - Activo Equipo: $activo_equipo - Activo Equipo a rebicar: $activo_equipo_retirar - Responsable: $responsable - Nuevo Responsable: $nuevo_responsable </p>";

$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);

$query = "SELECT (@numero:=@numero+1) AS Items, reu_activo AS activo_equipo, tipos_equipo.tip_descripcion AS tipo_de_equipo,
marcas.mar_descripcion AS marca_de_equipo, reu_modelo_equipo AS modelo_equipo, prioridades.pri_descripcion AS prioridad_del_equipo,
reu_activo_monitor AS activo_monitor, estado.est_descripcion AS estado_del_equipo,
reu_activo_equipo_retirar AS activo_equipo_a_retirar, reu_activo_monitor_retirar AS activo_monitor_a_retirar,
procesos.pro_descripcion AS proceso_del_equipo, reu_responsable AS responsable_anterior, reu_usuario AS usuario_anterior, reu_bloque AS bloque,
reu_piso AS piso, reu_cubiculo AS cubiculo, reu_dir_ip AS dir_ip, reu_dir_mac AS dir_mac,
reu_nuevo_responsable AS nuevo_responsable, reu_nuevo_usuario AS usuario, reu_nuevo_bloque AS nuevo_bloque, reu_nuevo_piso AS nuevo_piso, reu_nuevo_cubiculo AS nuevo_cubiculo,
reu_ot_sigma AS Ot_de_Servicio, reu_observacion AS observaciones, reu_f_ult_actualizacion AS Fecha_ultima_actualizacion FROM (SELECT @numero:=0) r,reubicaciones
LEFT JOIN tipos_equipo ON reubicaciones.reu_tipo_equipo = tipos_equipo.tip_id
LEFT JOIN marcas ON reubicaciones.reu_marca_equipo = marcas.mar_id
LEFT JOIN prioridades ON reubicaciones.reu_prioridad = prioridades.pri_id
LEFT JOIN estado ON reubicaciones.reu_estado_equipo = estado.est_id
LEFT JOIN procesos ON reubicaciones.reu_proceso_equipo_retirar = procesos.pro_id
WHERE reu_activo LIKE '%$activo_equipo%' AND reu_activo_monitor LIKE '%$activo_monitor' AND reu_activo_equipo_retirar LIKE '%$activo_equipo_retirar%' AND reu_activo_monitor_retirar LIKE '%$activo_monitor_a_retirar%' AND  reu_responsable LIKE '%$responsable_actual%' AND reu_usuario LIKE '%$usuario_anterior%' AND  reu_nuevo_responsable LIKE '%$responsable%' AND reu_nuevo_usuario LIKE '%$usuario%' AND  reu_estado_equipo LIKE '%$id_est%'";

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
