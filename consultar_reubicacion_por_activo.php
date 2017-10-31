
 <?php
  include("config.php");
  require_once('adodb5/adodb.inc.php');
  $activo = $_POST['activo'];
try {
  $conexion = mysql_connect($server,$username,$password);
  $con = ADONewConnection('mysql');
  $con->PConnect($server,$username,$password,$database);
  $con->SetFetchMode(ADODB_FETCH_ASSOC);

  $query    = " SELECT * 
                FROM reubicaciones 
                WHERE reu_nuevo_activo= '$activo'";
  $rs = $con->Execute($query);
  
  if(!$rs->EOF){
        $vec = array( 'responsable'    =>$rs->fields['reu_responsable'],
                      'nuevo_responsable'=>$rs->fields['reu_nuevo_responsable'],
                      'ubicacion'      =>$rs->fields['reu_ubicacion'],
                      'nueva_ubicacion'=>$rs->fields['reu_nueva_ubicacion'],
                      'activo_retirar'   =>$rs->fields['reu_activo_equipo'],
                      'activo_monitor_retirar'   =>$rs->fields['reu_activo_monitor_equipo'],
                      'activo_monitor' =>$rs->fields['reu_activo_monitor'],
                      'ot'             =>$rs->fields['reu_ot_sigma'],
                      'observacion'    =>$rs->fields['reu_observacion'],
                      'prioridad'      =>$rs->fields['reu_cod_prioridad'],
                      'activo_soporte' =>$rs->fields['reu_activo_soporte'],
                      'ip'             =>$rs->fields['reu_dir_ip'],
                      'mac'            =>$rs->fields['reu_dir_mac'],
                      'red'            =>$rs->fields['reu_punto_de_red'],
                      'extension'      =>$rs->fields['reu_extension'],
                      'tipo_equipo'    =>$rs->fields['reu_cod_tipo_equipo'],
                      'estado'         =>$rs->fields['reu_cod_estado'],
                      'proceso'        =>$rs->fields['reu_cod_proceso']);
    $con->Close();
    echo json_encode($vec);
  }else{
    echo "2";
  };
} catch (Exception $e) {
 echo $e; 
}

?>