<?php 
  require_once('config.php');
  require_once('adodb5/adodb.inc.php');

  $activo = $_POST['activo'];
  try 
  {
     $con = ADONewConnection('mysql');
     $con->debug=false;
     $con->PConnect($server,$username,$password,$database);
     $con->SetFetchMode(ADODB_FETCH_ASSOC);
     $query = "SELECT *
               FROM reubicaciones,marcas,centros_de_costos,procesos,prioridades,tipos_equipo,estado 
               WHERE reu_cod_proceso=est_id and reu_cod_proceso=pro_id AND reu_cod_prioridad=pri_id AND reu_cod_tipo_equipo=tip_id AND reu_activo_equipo like '$activo%'";
     $rs=$con->Execute($query);
     $con->Close();
if($activo != ''){

  if(!$rs->EOF){
    echo"<script>$('#tabla').show();</script>";
    echo"<script>
      $(':text').each(function(){ 
        $($(this)).val('');
    </script>";
       echo "<table class='table table-bordered table-stripered'>
                <thead><tr>
                    <th>Activo Equipo</th>
                    <th>Activo Monitor</th>
                    <th>Tipo Equipo</th>
                    <th>Proceso</th>
                    <th>Responsable</th>
                    <th>Ubicación</th>
                    <th>Activo a Retirar</th>
                    <th>Activo monitor a Retirar</th>
                    <th>Nuevo Responsable</th>
                    <th>Nueva Ubicación</th>
                    <th>Estado del Equipo</th>
                    <th>OT Sigma</th>
                    <th>Activo de Soporte</th>
                    <th>Prioridad</th>
                    <th>Dir. IP</th>
                    <th>Dir. MAC</th>
                    <th>Punto de Red</th>
                    <th>Extensión</th>
                    <th>Observaciones</th>
                </tr></thead><tbody>";
        $i=0;
          foreach($rs as $k => $row) {
            echo "<tr>
                <td>".utf8_encode($row['reu_activo_equipo'])."</td>
                <td>".utf8_encode($row['com_activo_monitor'])."</td>
                
                <td>".utf8_encode($row['com_activo_a_retirar'])."</td>
                <td>".utf8_encode($row['com_activo_monitor_retirar'])."</td>
                <td>".utf8_encode($row['pro_descripcion'])."</td>
                <td>".utf8_encode($row['est_descripcion'])."</td>
                <td>".utf8_encode($row['cen_descripcion'])."</td>
                <td>".utf8_encode($row['reu_ubicacion'])."</td>
                <td>".utf8_encode($row['reu_responsable'])."</td>
                
                <td>".utf8_encode($row['reu_extension'])."</td>
                <td>".utf8_encode($row['pri_descripcion'])."</td>
                <td>".utf8_encode($row['tip_descripcion'])."</td>
                <td>".utf8_encode($row['reu_ot_sigma'])."</td>
                <td>".utf8_encode($row['reu_dir_ip'])."</td>
                <td>".utf8_encode($row['reu_dir_mac'])."</td>
                <td>".utf8_encode($row['reu_punto_de_red'])."</td>
                <td>".utf8_encode($row['reu_observacion'])."</td>
              </tr>";
              $i++;
          };
          echo "</tbody>";
          echo "</table>";
  }
}else{
  echo"";
}

  }catch (Exception $e) 
  {
    echo $e;
  }
 ?>