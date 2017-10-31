<?php
include_once("config.php");
?>
<?php

// ** Campos con lo que voy a realizar la consulta, los del formulario.
$departamento = $_POST['departamento'];
$responsable = $_POST['responsable'];
$usuario = $_POST['usuario'];
$bloque = $_POST['bloque'];
$piso = $_POST['piso'];
$cubiculo = $_POST['cubiculo'];
$estado_equipo = $_POST['estado_equipo'];

echo "<p>Consulta de Equipos por: Bloque : $bloque  Piso : $piso Ubicacion: $cubiculo Departamento : $departamento Estado : $estado_equipo Responsable: $responsable Usuario: $usuario</p>" ;

$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);

mysql_select_db($database);

$query = "SELECT (@numero:=@numero+1) AS Item, activo_equipo,tipo_equipo,marca_equipo,modelo_equipo,activo_mon,estado_equipo,dir_ip,dir_mac,puntos_de_red.punto_de_red,f_ult_actualiza,departamento,responsable,usuario,ext_tel,puntos_de_red.bloque, puntos_de_red.piso, puntos_de_red.cubiculo,observaciones
FROM (SELECT @numero:=0) r, puntos_de_red,hardware
WHERE puntos_de_red.bloque like '%$bloque' and puntos_de_red.piso like '%$piso%' and hardware.departamento like '%$departamento%' and puntos_de_red.cubiculo <> '' and puntos_de_red.cubiculo like '%$cubiculo%' and responsable like '%$responsable%' and usuario like '%$usuario%' and estado_equipo like '%$estado_equipo%' and puntos_de_red.punto_de_red = hardware.punto_de_red";



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
