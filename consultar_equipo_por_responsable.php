<?php 
  require_once('config.php');
  require_once('adodb5/adodb.inc.php');
  $responsable = $_POST['responsable'];
  try 
  {
     $con = ADONewConnection('mysql');
     $con->debug=false;
     $con->PConnect($server,$username,$password,$database);
     $con->SetFetchMode(ADODB_FETCH_ASSOC);
     $query = "SELECT *
               FROM compras,marcas,centros_de_costos,procesos,prioridades,tipos_equipo,estado 
               WHERE com_cod_estado_proceso=est_id and com_cod_marca=mar_id AND com_cod_centro_costo=cen_id AND com_cod_proceso=pro_id AND com_cod_prioridad=pri_id AND com_cod_tipo_equipo=tip_id AND com_responsable LIKE '%$responsable%'";
     $rs=$con->Execute($query);

     if(!$rs->EOF && $responsable!=''){
      echo"<script>$('#tabla').show();</script>";
      echo"<script>
        $(':text').each(function(){ 
          $($(this)).val('');
      </script>";
     echo "<table class='table table-bordered table-stripered'>
              <thead><tr>
                  <th>Orden de Compra</th>
                  <th>Responsable</th>
                  <th>Usuario</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Activo Equipo</th>
                  <th>Serial Equipo</th>
                  <th>Activo Monitor</th>
                  <th>Serial Monitor</th>
                  <th>Activo a Retirar</th>
                  <th>Activo monitor a Retirar</th>  
                  <th>Proceso</th>
                  <th>Estado</th>
                  <th>Centro de Costo</th>
                  <th>Ubicación</th>
                  <th>Extensión</th>
                  <th>Prioridad</th>
                  <th>Tipo Equipo</th>
                  <th>OT SIGMA</th>
                  <th>Dir. IP</th>
                  <th>Dir. MAC</th>
                  <th>Punto de Red</th>
                  <th>Observaciones</th>
              </tr></thead><tbody>";
                $i=0;
                foreach($rs as $k => $row) {
                    echo "<tr>
                        <td>".utf8_encode($row['com_orden_de_compra'])."</td>
                        <td>".utf8_encode($row['com_responsable'])."</td>
                        <td>".utf8_encode($row['com_usuario'])."</td>
                        <td>".utf8_encode($row['mar_descripcion'])."</td>
                        <td>".utf8_encode($row['com_modelo'])."</td>
                        <td>".utf8_encode($row['com_activo_equipo'])."</td>
                        <td>".utf8_encode($row['com_serial_equipo'])."</td>
                        <td>".utf8_encode($row['com_activo_monitor'])."</td>
                        <td>".utf8_encode($row['com_serial_monitor'])."</td>
                        <td>".utf8_encode($row['com_activo_a_retirar'])."</td>
                        <td>".utf8_encode($row['com_activo_monitor_retirar'])."</td>
                        <td>".utf8_encode($row['pro_descripcion'])."</td>
                        <td>".utf8_encode($row['est_descripcion'])."</td>
                        <td>".utf8_encode($row['cen_descripcion'])."</td>
                        <td>".utf8_encode($row['com_ubicacion'])."</td>
                        <td>".utf8_encode($row['com_extension'])."</td>
                        <td>".utf8_encode($row['pri_descripcion'])."</td>
                        <td>".utf8_encode($row['tip_descripcion'])."</td>
                        <td>".utf8_encode($row['com_ot_sigma'])."</td>
                        <td>".utf8_encode($row['com_dir_ip'])."</td>
                        <td>".utf8_encode($row['com_dir_mac'])."</td>
                        <td>".utf8_encode($row['com_punto_de_red'])."</td>
                        <td>".utf8_encode($row['com_observacion'])."</td>
                      </tr>";
                      $i++;
                  };
                  echo "</tbody>";
                  echo "</table>";
            }else{
              echo "";
            };
     $con->Close();
     /*echo json_encode($equipo);*/
  }catch (Exception $e) 
  {
    echo $e;
  }







 ?>