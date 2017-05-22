<?php
include_once("config.php");
//include_once("sesion.php");

?>
<?php
/*
Mysql To Excel
Generación de excel versión 1.0
Nicolás Pardo - 2007
*/
#Conexion a la db

#Sql, acá pone tu consulta a la tabla que necesites exportar filtrando los datos que creas necesarios.
/*
        $activo_equipo = $_POST['activo_equipo'];
        $tipo_equipo = $_POST['tipo_equipo'];
        $f_prestamo = $_POST['f_prestamo'];
        $f_limite = $_POST['f_limite'];
        $activo_danado = $_POST['activo_danado'];
        $bloque = $_POST['bloque'];
        $piso = $_POST['piso'];
        $cubiculo = $_POST['cubiculo'];
        $departamento = $_POST['departamento'];
        $usuario_equipo = $_POST['usuario_equipo'];
        $email_usuario = $_POST['email_usuario'];
        $ext_tel = $_POST['ext_tel'];
        $ot_sigma = $_POST['ot_sigma'];
        $usuario_tecnico = $_POST['usuario_tecnico'];
        $email_usuario_tecnico = $_POST['email_usuario_tecnico'];
        $usuario_que_presta_soporte = $_POST['usuario_que_presta_soporte'];
        $observaciones = $_POST['observaciones'];*/
                
       // echo "Consulta de salones del bloque : $bloque piso : $piso por ubicacion: $cubiculo" ;

      //  echo "$activo_equipo" ;


$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);


$query = "SELECT activo_equipo,tipo_equipo,f_prestamo,f_limite,activo_danado,bloque,piso,cubiculo,departamento,usuario_equipo,email_usuario,
ext_tel,ot_sigma,usuario_tecnico,email_usuario_tecnico, usuario_que_presta_soporte,observaciones FROM prestamo_soportes WHERE f_recibido = '0000-00-00' ";


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
