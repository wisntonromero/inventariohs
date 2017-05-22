<?php 
	require_once('config.php');
  require_once('adodb5/adodb.inc.php');
	
try {
	if (isset($_POST)) {
		$activo = $_POST['activo'];
	}else{
		print_r('Error al Enviar Datos'); 
	}

  	$con = ADONewConnection('mysql');
    $con->debug=false;
    $con->PConnect($server,$username,$password,$database);
    $con->SetFetchMode(ADODB_FETCH_ASSOC);
    $query = "SELECT bit_fecha_estado,bit_activo,bit_usuario,est_descripcion FROM bitacoras,estado WHERE bit_cod_estado=est_id AND  bit_activo = $activo ORDER BY bit_fecha_estado ";
    $rs=$con->Execute($query);

    /*
    	$vec = array( 'estado'  =>$rs->fields['bit_cod_estado'],
    				  'fecha'	=>$rs->fields['bit_fecha_estado'],
    				  'activo'	=>$rs->fields['bit_activo'],
    				  'usuario'	 =>$rs->fields['bit_usuario']);
    	echo json_encode($vec);
    }*/

if(!$rs->EOF){
    echo "<table class='centered'>
                <thead><tr>
                    <th>Activo</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr></thead><tbody>";
        $i=0;
          foreach($rs as $k => $row) {
            echo "<tr>
                <td>".utf8_encode($rs->fields['bit_activo'])."</td>
                <td>".utf8_encode($rs->fields['bit_usuario'])."</td>
                <td>".utf8_encode($rs->fields['est_descripcion'])."</td>
                <td>".utf8_encode($rs->fields['bit_fecha_estado'])."</td>
              </tr>";
              $i++;
          };
          echo "</tbody>";
          echo "</table>";
}else{
  echo "<p class='error'><strong>Equipo Inexistente.<strong><p>";
  echo "<script>$('#activo').val('')</script>";
  echo "<script>$('#activo').focus()</script>";
};


    $con->Close();
} catch (Exception $e) {
	echo $e;
}


	


?>