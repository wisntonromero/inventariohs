<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST['activo_equipo'];

    $query = "SELECT * FROM compras
    LEFT JOIN tipos_equipo ON compras.com_tipo_equipo = tipos_equipo.tip_id 
    LEFT JOIN marcas ON compras.com_marca_equipo = marcas.mar_id
    LEFT JOIN procesos ON compras.com_proceso_equipo = procesos.pro_id 
    WHERE com_activo_equipo='$activo_equipo' ";
   
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consulta = array();

    if( $numero_de_filas > 0)
    {
      $registro = mysql_fetch_array($resultado);

      //$consulta['activo_equipo'] = $registro['activo_equipo'];
      $consulta['id_tip']                 = $registro['com_tipo_equipo'];
      $consulta['tipo_equipo']            = $registro['tip_descripcion'];
      $consulta['marca']                  = $registro['com_marca_equipo'];
      $consulta['modelo_equipo']          = $registro['com_modelo_equipo'];
      $consulta['prioridad']              = $registro['com_prioridad'];
      $consulta['orden_de_compra']        = $registro['com_orden_de_compra'];
      $consulta['serial_equipo']          = $registro['com_serial_equipo'];
      $consulta['centro_costo']           = $registro['com_centro_costo'];
      $consulta['activo_monitor']         = $registro['com_activo_monitor'];
      $consulta['serial_monitor']         = $registro['com_serial_monitor'];
      $consulta['estado_equipo']          = $registro['com_estado_equipo'];
      $consulta['activo_equipo_retirar']  = $registro['com_activo_equipo_retirar'];
      $consulta['activo_monitor_retirar'] = $registro['com_activo_monitor_retirar'];
      $consulta['id_pro']                 = $registro['com_proceso_equipo'];
      $consulta['proceso_equipo_retirar'] = $registro['pro_descripcion'];

      $consulta['responsable']            = $registro['com_responsable'];
      $consulta['email_responsable']      = $registro['com_email_responsable'];
      $consulta['usuario']                = $registro['com_usuario'];
      $consulta['email_usuario']          = $registro['com_email_usuario'];
      $consulta['ext_tel']                = $registro['com_extension'];
      
      $consulta['bloque']                 = $registro['com_bloque'];
      $consulta['piso']                   = $registro['com_piso'];
      $consulta['cubiculo']               = $registro['com_cubiculo'];

      
      $consulta['dir_ip']                 = $registro['com_dir_ip'];
      $consulta['dir_mac']                = $registro['com_dir_mac'];
      $consulta['punto_de_red']           = $registro['com_punto_de_red'];
      $consulta['ot_sigma']               = $registro['com_ot_sigma'];
      $consulta['observaciones']          = $registro['com_observaciones'];
      $consulta['f_ult_actualizacion']    = $registro['com_f_ult_actualizacion'];

    } else
      {
            echo "<script>confirmar(\"\")</script>";
      };
   echo json_encode($consulta);
?>

