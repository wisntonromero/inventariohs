<?php
include_once("config.php");
?>
<?php
/*
Mysql To Excel
Generación de excel versión 1.0
Nicolás Pardo - 2007
*/
#Conexion a la db

#Sql, acá pone tu consulta a la tabla que necesites exportar filtrando los datos que creas necesarios.
                                
$activo_equipo          = $_POST['activo_equipo'];
 
              
$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);
                  
$query = "SELECT  bit_id  AS Id, est_descripcion AS Descripcion, bit_fecha_estado AS Fecha_Modificacion, bit_activo AS Activo_Equipo, bit_usuario AS Usuario FROM  bitacoras LEFT JOIN estado ON bitacoras.bit_cod_estado = estado.est_id   WHERE bit_activo = $activo_equipo ";


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
#Cambiando el content-type más las <table> se pueden exportar formatos como csv
header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=Bitacora_"."activo_".$activo_equipo."_".date('d-m-Y').".xls");
echo $return;  

?>
