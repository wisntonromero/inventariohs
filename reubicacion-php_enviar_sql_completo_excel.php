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

        $orden_de_compra        = $_POST['orden_de_compra'];
        $id_tip                 = $_POST['id_tip'];
        $id_mar                 = $_POST['id_mar'];
        $modelo_equipo          = $_POST['modelo_equipo'];
        $id_pri                 = $_POST['id_pri'];
        $id_est                 = $_POST['id_est'];
        $activo_equipo          = $_POST['activo_equipo'];
        $serial_equipo          = $_POST['serial_equipo'];
        $id_cen                 = $_POST['id_cen'];
        $activo_monitor         = $_POST['activo_monitor'];
        $serial_monitor         = $_POST['serial_monitor'];
        $estado_equipo          = $_POST['estado_equipo'];
        $activo_equipo_retirar  = $_POST['activo_equipo_retirar'];
        $activo_monitor_retirar = $_POST['activo_monitor_retirar'];
        $id_pro                 = $_POST['id_pro'];
        $proceso_equipo_retirar = $_POST['proceso_equipo_retirar'];

        $responsable            = $_POST['responsable'];
        $nuevo_responsable      = $_POST['nuevo_responsable'];
        $usuario                = $_POST['usuario'];
        $nuevo_usuario          = $_POST['nuevo_usuario'];
        $ext_tel                = $_POST['ext_tel'];

        $bloque                 = $_POST['bloque'];
        $piso                   = $_POST['piso'];
        $cubiculo               = $_POST['cubiculo'];
        $nuevo_bloque           = $_POST['nuevo_bloque'];
        $nuevo_piso             = $_POST['nuevo_piso'];
        $nuevo_cubiculo         = $_POST['nuevo_cubiculo'];
        $observaciones          = $_POST['observaciones'];


       // echo "Consulta de salones del bloque : $bloque piso : $piso por ubicacion: $cubiculo" ;

      //  echo "$orden_de_compra" ;


$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);


//$query = "SELECT compras.com_orden_de_compra, tipos_equipo.tip_descripcion, marcas.mar_descripcion, com_modelo_equipo, prioridades.pri_descripcion, com_activo_equipo, com_serial_equipo, centros_de_costos.cen_descripcion, com_activo_monitor, com_serial_monitor, estado.est_descripcion, com_activo_equipo_retirar, com_activo_monitor_retirar, procesos.pro_descripcion, com_responsable, com_usuario, com_extension, com_bloque, com_piso, com_cubiculo, com_dir_ip, com_dir_mac, com_punto_de_red, com_ot_sigma, com_observaciones from compras,tipos_equipo,marcas,prioridades,centros_de_costos,estado, procesos WHERE com_orden_de_compra like '%$orden_de_compra%' AND compras.com_marca_equipo = mar_id AND compras.com_tipo_equipo = tip_id AND com_prioridad = prioridades.pri_id AND com_centro_costo = centros_de_costos.cen_id AND com_estado_equipo = estado.est_id AND com_proceso_equipo = procesos.pro_id";

$query = "SELECT (@numero:=@numero+1) AS Items, reu_activo AS activo_equipo, tipos_equipo.tip_descripcion AS tipo_de_equipo,
marcas.mar_descripcion AS marca_de_equipo, reu_modelo_equipo AS modelo_equipo, prioridades.pri_descripcion AS prioridad_del_equipo,
reu_activo_monitor AS activo_monitor, estado.est_descripcion AS estado_del_equipo,
reu_activo_equipo_retirar AS activo_equipo_a_retirar, reu_activo_monitor_retirar AS activo_monitor_a_retirar,
procesos.pro_descripcion AS proceso_del_equipo, reu_responsable AS responsable_anterior, reu_usuario AS usuario_anterior, reu_bloque AS bloque,
reu_piso AS piso, reu_cubiculo AS cubiculo, reu_dir_ip AS dir_ip, reu_dir_mac AS dir_mac,
reu_nuevo_responsable AS nuevo_responsable, reu_nuevo_usuario AS nuevo_usuario, reu_nuevo_bloque AS nuevo_bloque, reu_nuevo_piso AS nuevo_piso, reu_nuevo_cubiculo AS nuevo_cubiculo,
reu_ot_sigma AS Ot_de_Servicio, reu_observacion AS observaciones, reu_f_ult_actualizacion AS Fecha_ultima_actualizacion FROM (SELECT @numero:=0) r,reubicaciones
LEFT JOIN tipos_equipo ON reubicaciones.reu_tipo_equipo = tipos_equipo.tip_id
LEFT JOIN marcas ON reubicaciones.reu_marca_equipo = marcas.mar_id
LEFT JOIN prioridades ON reubicaciones.reu_prioridad = prioridades.pri_id
LEFT JOIN estado ON reubicaciones.reu_estado_equipo = estado.est_id
LEFT JOIN procesos ON reubicaciones.reu_proceso_equipo_retirar = procesos.pro_id
WHERE reu_activo LIKE '%$activo_equipo%' AND reu_activo_monitor LIKE '%$activo_monitor' AND reu_activo_equipo_retirar LIKE '%$activo_equipo_retirar%' AND reu_activo_monitor_retirar LIKE '%$activo_monitor_a_retirar%' AND  reu_responsable LIKE '%$responsable%' AND reu_usuario LIKE '%$usuario_anterior%' AND  reu_nuevo_responsable LIKE '%$nuevo_responsable%' AND reu_nuevo_usuario LIKE '%$nuevo_usuario%' AND  reu_estado_equipo LIKE '%$id_est%'";


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
header("Content-Disposition: attachment; filename=Equipos_Reubicados_".date('d-m-Y').".xls");
echo $return;

?>
