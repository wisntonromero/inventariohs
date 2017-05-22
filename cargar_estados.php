<?php 
	require_once('config.php');
	require_once('adodb5/adodb.inc.php');
	try 
	{
	   $con = ADONewConnection('mysql');
	   $con->debug=false;
	   $con->PConnect($server,$username,$password,$database);
	   $con->SetFetchMode(ADODB_FETCH_ASSOC);
	   $query = "SELECT * FROM estado ORDER BY est_descripcion";
	   $rs=$con->Execute($query);
	   $i=0;
	   while(!$rs->EOF)
	   {
	   	$estado[$i] = array('id'=>$rs->fields['est_id'],'estado'=>utf8_encode($rs->fields['est_descripcion']));
	   	$rs->MoveNext();
	   	$i++;
	   }
	   $con->Close();
	   echo json_encode($estado);
	}catch (Exception $e) 
	{
		echo $e;
	}
?>