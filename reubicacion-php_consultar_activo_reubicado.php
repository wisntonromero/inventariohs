<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $activo_equipo = $_POST['activo_equipo'];

    $query = "SELECT * FROM reubicaciones
    LEFT JOIN tipos_equipo ON reubicaciones.reu_tipo_equipo = tipos_equipo.tip_id
    LEFT JOIN marcas ON reubicaciones.reu_marca_equipo = marcas.mar_id
    LEFT JOIN procesos ON reubicaciones.reu_proceso_equipo_retirar = procesos.pro_id
    WHERE reu_activo='$activo_equipo' and reu_estado_equipo <> 6";
   /* $query = "SELECT * FROM hardware,puntos_de_red WHERE activo_equipo='$activo_equipo' and hardware.punto_de_red = puntos_de_red.punto_de_red"; */
    $resultado = mysql_query($query,$conexion);

    $numero_de_filas = mysql_num_rows($resultado);

    mysql_close($conexion);

    $consulta = array();

    if( $numero_de_filas > 0)
    {
      $registro = mysql_fetch_array($resultado);

      $consulta['reu_id']                 = $registro['reu_id'];
      $consulta['activo_equipo']          = $registro['reu_activo'];
      $consulta['id_tip']                 = $registro['reu_tipo_equipo'];
      $consulta['tipo_equipo']            = $registro['tip_descripcion'];
      $consulta['id_mar']                 = $registro['reu_marca_equipo'];
      $consulta['marca']                  = $registro['mar_descripcion'];
      $consulta['modelo_equipo']          = $registro['reu_modelo_equipo'];
      $consulta['activo_monitor']         = $registro['reu_activo_monitor'];
      $consulta['prioridad']              = $registro['reu_prioridad'];
      $consulta['estado_equipo']          = $registro['reu_estado_equipo'];

      $consulta['responsable']            = $registro['reu_responsable'];
      $consulta['usuario']                = $registro['reu_usuario'];
      $consulta['ext_tel']                = $registro['reu_extension'];

      $consulta['bloque']                 = $registro['reu_bloque'];
      $consulta['piso']                   = $registro['reu_piso'];
      $consulta['cubiculo']               = $registro['reu_cubiculo'];

      $consulta['dir_ip']                 = $registro['reu_dir_ip'];
      $consulta['dir_mac']                = $registro['reu_dir_mac'];
      $consulta['punto_de_red']           = $registro['reu_punto_de_red'];

      $consulta['activo_equipo_retirar']  = $registro['reu_activo_equipo_retirar'];
      $consulta['activo_monitor_retirar'] = $registro['reu_activo_monitor_retirar'];
      $consulta['id_pro']                 = $registro['reu_proceso_equipo_retirar'];
      $consulta['proceso_equipo_retirar'] = $registro['pro_descripcion'];

      $consulta['nuevo_responsable']      = $registro['reu_nuevo_responsable'];
      $consulta['email_nuevo_responsable']= $registro['reu_email_nuevo_responsable'];
      $consulta['nuevo_usuario']          = $registro['reu_nuevo_usuario'];
      $consulta['email_nuevo_usuario']    = $registro['reu_email_nuevo_usuario'];
      $consulta['nuevo_ext_tel']          = $registro['reu_extension'];

      $consulta['nuevo_bloque']           = $registro['reu_nuevo_bloque'];
      $consulta['nuevo_piso']             = $registro['reu_nuevo_piso'];
      $consulta['nuevo_cubiculo']         = $registro['reu_nuevo_cubiculo'];

      $consulta['ot_sigma']               = $registro['reu_ot_sigma'];
      $consulta['activo_equipo_soporte']  = $registro['reu_activo_soporte'];
      $consulta['observaciones']          = $registro['reu_observacion'];
      $consulta['f_ult_actualizacion']    = $registro['reu_f_ult_actualizacion'];


    } else
      {
            echo "<script>confirmar(\"\")</script>";
      };
   echo json_encode($consulta);
?>

