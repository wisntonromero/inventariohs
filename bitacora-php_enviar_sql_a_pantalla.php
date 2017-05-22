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

$query = "SELECT  bit_id  AS Id, est_descripcion AS Descripción, bit_fecha_estado AS Fecha_Modificación, bit_activo AS Activo_Equipo, bit_usuario AS Usuario FROM  bitacoras LEFT JOIN estado ON bitacoras.bit_cod_estado = estado.est_id   WHERE bit_activo = $activo_equipo ";

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
