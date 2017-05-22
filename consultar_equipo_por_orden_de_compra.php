
 <?php
  include("config.php");
  require_once('adodb5/adodb.inc.php');

try {
  
  $activo = $_POST['activo'];
  $con = ADONewConnection('mysql');
  $con->PConnect($server,$username,$password,$database);
  $con->SetFetchMode(ADODB_FETCH_ASSOC);
  $activo    = mb_convert_case($activo, MB_CASE_UPPER, "UTF-8");

  $query    = " SELECT com_activo_equipo
                FROM compras
                WHERE com_activo_equipo = '$activo'";
  $rs = $con->Execute($query);

  if(!$rs->EOF){

    $query    = " SELECT *
                  FROM compras
                  WHERE com_activo_equipo = '$activo'";

    $rs = $con->Execute($query);

        $vec = array( 'marca'         =>$rs->fields['com_cod_marca'],
                      'modelo'        =>$rs->fields['com_modelo'],
                      'centro'        =>$rs->fields['com_cod_centro_costo'],
                      'activo'        =>$rs->fields['com_activo_a_retirar'],
                      'activo_monitor_retirar'  =>$rs->fields['com_activo_monitor_retirar'],
                      'responsable'   =>$rs->fields['com_responsable'],
                      'orden'         =>$rs->fields['com_orden_de_compra'],
                      'ubicacion'     =>$rs->fields['com_ubicacion'],
                      'nuevo_activo'  =>$rs->fields['com_activo_equipo'],
                      'serial_equipo' =>$rs->fields['com_serial_equipo'],
                      'activo_monitor'=>$rs->fields['com_activo_monitor'],
                      'serial_monitor'=>$rs->fields['com_serial_monitor'],
                      'estado'        =>$rs->fields['com_cod_estado_proceso'],
                      'ot'            =>$rs->fields['com_ot_sigma'],
                      'observacion'   =>$rs->fields['com_observacion'],
                      'prioridad'     =>$rs->fields['com_cod_prioridad'],
                      'ip'            =>$rs->fields['com_dir_ip'],
                      'mac'           =>$rs->fields['com_dir_mac'],
                      'red'           =>$rs->fields['com_punto_de_red'],
                      'usuario'       =>$rs->fields['com_usuario'],
                      'extension'     =>$rs->fields['com_extension'],
                      'tipo_equipo'   =>$rs->fields['com_cod_tipo_equipo'],
                      'proceso'       =>$rs->fields['com_cod_proceso']);
    $con->Close();
    echo json_encode($vec);
  }else{
    echo "2";
  };
} catch (Exception $e) {
 echo $e; 
}

?>