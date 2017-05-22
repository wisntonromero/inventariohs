<?php
include_once("config.php");
?>
<?php

// ** Campos con lo que voy a realizar la consulta, los del formulario.
$nro_cc = $_POST['nro_cc'];
$letra_pp = $_POST['letra_pp'];

$nro_cc_letra_pp = $nro_cc . $letra_pp;

echo "<p>Consulta por: Nro de Centro de Cableado : $nro_cc Letra Patch Panel : $letra_pp </p>" ;

$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);

mysql_select_db($database);

$query = "SELECT (@numero:=@numero+1) AS Item, punto_de_red,bloque,piso,cubiculo,tipo_de_punto_de_red,categoria_punto_de_red,color_toma,estado_punto_de_red
FROM (SELECT @numero:=0) r, puntos_de_red
WHERE punto_de_red like '$nro_cc_letra_pp%'";

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
