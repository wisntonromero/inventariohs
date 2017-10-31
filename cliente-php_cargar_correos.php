<?php
  $conexion = mysql_connect($server,$username,$password);
  mysql_select_db($database);

  $query = "SELECT * FROM clientes ORDER BY cliente ASC";
  $resultado = mysql_query($query,$conexion);
  /*$usuario2 = $registro['cliente'];*/
  $registro = mysql_fetch_array($resultado)
  while(!$registro->EOF){
    /*if( $registro['id'] == $cliente ){
        $usuario2 = $registro['cliente'];
        $seleccionado = 'selected="selected"';
    }else{
      $seleccionado = '';
    }*/
    $correos[$i] = array('codigo'=>$rs->fields['id'],'cliente'=>$rs->fields['cliente']);
      /*$registro->MoveNext();*/
      $i++;
    };
  mysql_close($conexion);
  echo json_encode($correos);
?>