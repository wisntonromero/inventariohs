<?php 
	require_once('config.php');
	require_once('adodb5/adodb.inc.php');
	try 
	{
	   $con = ADONewConnection('mysql');
	   $con->debug=false;
	   $con->PConnect($server,$username,$password,$database);
	   $con->SetFetchMode(ADODB_FETCH_ASSOC);
	   $query = "SELECT * FROM prioridades ORDER BY pri_descripcion";
	   $rs=$con->Execute($query);
	   $i=0;
	   while(!$rs->EOF)
	   {
	   	$prioridades[$i] = array('id'=>$rs->fields['pri_id'],'prioridad'=>$rs->fields['pri_descripcion']);
	   	$rs->MoveNext();
	   	$i++;
	   }
	   $con->Close();
	   echo json_encode($prioridades);
	}catch (Exception $e) 
	{
		echo $e;
	}
?>