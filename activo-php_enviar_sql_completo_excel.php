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

        $activo_equipo = $_POST['activo_equipo'];
        $tipo_equipo = $_POST['tipo_equipo'];
        $marca_equipo = $_POST['marca_equipo'];
        $modelo_equipo = $_POST['modelo_equipo'];
        $activo_mon = $_POST['activo_mon'];
        $estado_equipo = $_POST['estado_equipo'];
        $dir_ip = $_POST['dir_ip'];
        $dir_mac = $_POST['dir_mac'];
        $punto_de_red = $_POST['punto_de_red'];
        $f_ult_actualiza = $_POST['f_ult_actualiza'];
        $departamento = $_POST['departamento'];
        $responsable = $_POST['responsable'];
        $usuario = $_POST['usuario'];
        $bloque = $_POST['bloque'];
        $piso = $_POST['piso'];
        $cubiculo = $_POST['cubiculo'];



       // echo "Consulta de salones del bloque : $bloque piso : $piso por ubicacion: $cubiculo" ;

      //  echo "$activo_equipo" ;


$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);


$query = "SELECT activo_equipo,tipo_equipo,marca_equipo,modelo_equipo,activo_mon,estado_equipo,dir_ip,dir_mac,
puntos_de_red.punto_de_red,f_ult_actualiza,departamento,responsable,usuario,ext_tel,puntos_de_red.bloque,
puntos_de_red.piso, puntos_de_red.cubiculo,observaciones FROM puntos_de_red,hardware WHERE puntos_de_red.bloque like '%$bloque' and
puntos_de_red.piso like '%$piso%' and puntos_de_red.cubiculo <> '' and puntos_de_red.cubiculo like '%$cubiculo%' and
usuario like '%$usuario%' and puntos_de_red.punto_de_red = hardware.punto_de_red";


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
header("Content-Disposition: attachment; filename=NombreDelExcel_".date('d-m-Y').".xls");
echo $return;

?>
