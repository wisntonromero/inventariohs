<?php 
	require_once('config.php');
	require_once('adodb5/adodb.inc.php');
	try 
	{
	   $con = ADONewConnection('mysql');
	   $con->debug=false;
	   $con->PConnect($server,$username,$password,$database);
	   $con->SetFetchMode(ADODB_FETCH_ASSOC);
	   $query = "SELECT * FROM centros_de_costos Where cen_estado = 'Activo' ORDER BY cen_descripcion";
	   $rs=$con->Execute($query);
	   $i=0;
	   while(!$rs->EOF)
	   {
	   	$centros[$i] = array('id'=>$rs->fields['cen_id'],'centro'=>$rs->fields['cen_descripcion']);
	   	$rs->MoveNext();
	   	$i++;
	   }
	   $con->Close();
	   echo json_encode($centros);
	}catch (Exception $e) 
	{
		echo $e;
	}
?>